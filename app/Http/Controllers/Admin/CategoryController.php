<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\PaginationService;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Response;
use Validator;
use Illuminate\Http\Request;
use View;
use Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rules =
        [
            'name' => 'required|string|max:45',
            'parent_id'=>'nullable|exists:categories,id'
        ];
    protected $messages =
        [
            'name.required' =>'you should enter name',
        ];
    /**
     * @var CategoryRepository
     */
    private $CategoryRepository;

    public function __construct(CategoryRepository $CategoryRepository,ProductRepository $ProductRepository,PaginationService $PaginationService)
    {
        $this->CategoryRepository= $CategoryRepository;
        $this->ProductRepository= $ProductRepository;
        //the middleware of pagination
        $this->PaginationService= $PaginationService;
    }

    public function index()
    {
        $articles=$this->PaginationService->pagination($this->CategoryRepository->search(request())->orderByDesc("id"));
        $articles->appends(request()->all());
        $categories=Category::select('name','id')->get();
        return View::make('admin.pages.categories', ['articles' => $articles,'categories' => $categories ]);

    }

    //send-data to the select option
    public function select(Request $request)
    {
        $categories=$this->PaginationService->pagination(Category::where('name','like',"%$request->name%")->select('name','id'));
        return response()->json($categories);

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules,$this->messages);
        if ($validator->fails()) {
            return response()->json(
                array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray())
                , 400);
        }else{

            $article=new Category();
            $article->name = $request->input('name');
            $article->parent_id = $request->input('parent_id');
            $article->save();
            //load the relation category to view parent name if exist
            $article->load('category');
            return response()->json($article);
        }
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $this->rules,$this->messages);
        if ($validator->fails()) {
            return response()->json(
                array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray())
                , 400);
        }else{
            $article=Category::find($id);
            $article->name = $request->input('name');
            $article->parent_id = $request->input('parent_id');
            $article->save();
            //load the relation category to view parent name if exist
            $article->load('category');
            return response()->json($article);

        }
    }

    //all products within it's category
    public function category_products($id)
    {
        $articles=$this->ProductRepository->search(request())->where('category_id','=',$id)->paginate(25);
        $articles->appends(request()->all());
        $categories=Category::select('name','id')->get();
        return View::make('admin.pages.products',
            [
                'articles' => $articles,
                'categories' => $categories ,
            ]
        );
    }

    public function destroy($id)
    {
        $article = Category::find($id);

        //delete all products belongs to this category
        $article->products()->delete();
        //delete categories child of  this category
        $article->sub_categories()->delete();
        //delete category
        $article->delete();

        return response()->json($article);
    }
}
