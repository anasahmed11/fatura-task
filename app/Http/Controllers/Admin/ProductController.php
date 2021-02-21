<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\PaginationService;
use App\Models\Category;
use App\Models\ProductProvider;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Response;
use Validator;
use Illuminate\Http\Request;
use View;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rules =
        [
            'name' => 'required|',
            'category_id' => 'required|exists:categories,id',
            'photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:100000',
        ];
    protected $messages =
        [

            'category_id.required' =>'you should choose category',

        ];
    /**
     * @var ProductRepository
     */
    private $ProductRepository;

    public function __construct(ProductRepository $ProductRepository,PaginationService $PaginationService)
    {
        $this->ProductRepository= $ProductRepository;
        $this->PaginationService= $PaginationService;
    }
    public function index()
    {
        $articles=$this->PaginationService->pagination($this->ProductRepository->search(request()));
        $articles->appends(request()->all());
        return View::make('admin.pages.products',
            [
                'articles' => $articles,
            ]
        );

    }

    //send-data to the select options
    public function select(Request $request)
    {
        $products=$this->PaginationService->pagination(Product::where('name','like',"%$request->name%")->select('name','id'));
        return response()->json($products);

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
            $article=new Product();
            $article->name = $request->input('name');
            $article->category_id = $request->input('category_id');
            if ($request->hasFile('photo')) {
                //upload product image if exist
                $photo = $request->file('photo');
                $ext = $photo->getClientOriginalExtension();
                $fileStore = time() . '.' . $ext;
                $photo->move(public_path('pages/products'), $fileStore);
                $article->image_url = 'public/pages/products/' . $fileStore;
            }
            $article->save();
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
            $article=Product::find($id);
            $article->name = $request->input('name');
            $article->category_id = $request->input('category_id');
            if ($request->hasFile('photo')) {
                //delete the old  product image to save server memory
                $filename = $article->image_url;
                File::delete($filename);
                //upload the new image
                $photo = $request->file('photo');
                $ext = $photo->getClientOriginalExtension();
                $fileStore = time() . '.' . $ext;
                $photo->move(public_path('pages/products'), $fileStore);
                $article->image_url = 'public/pages/products/'.$fileStore;
            }
            $article->save();
            $article->load('category');
            return response()->json($article);
        }
    }


    public function destroy($id)
    {
        $article = Product::find($id);

        //delete product image to save server memory
        $filename = $article->photo;
        File::delete($filename);
        //delete all product in product providers table
        $article->product_providers()->delete();
        //delete the product
        $article->delete();

        return response()->json($article);
    }

}
