<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\PaginationService;
use App\Models\ProductProvider;
use App\Models\Provider;
use App\Repositories\ProductProviderRepository;
use App\Repositories\ProviderRepository;
use Carbon\Carbon;
use Response;
use Validator;
use Illuminate\Http\Request;
use View;
use Auth;

class ProviderController extends Controller
{
    protected $rules =
        [
            'name' => 'required|',
        ];
    protected $messages =
        [
            'name.required' =>'you should enter name',
        ];

    private $ProviderRepository;
    private $ProductProviderRepository;

    public function __construct(ProviderRepository $ProviderRepository,ProductProviderRepository $ProductProviderRepository,PaginationService $PaginationService)
    {
        $this->ProviderRepository= $ProviderRepository;
        $this->ProductProviderRepository= $ProductProviderRepository;
        $this->PaginationService= $PaginationService;
    }

    public function index()
    {
        $articles=$this->PaginationService->pagination($this->ProviderRepository->search(request()));
        $articles->appends(request()->all());
        return View::make('admin.pages.providers', ['articles' => $articles ]);

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

            $article=new Provider();
            $article->name = $request->input('name');
            $article->save();
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
            $article=Provider::find($id);
            $article->save();
            return response()->json($article);
        }
    }

    public function destroy($id)
    {
        $article = Provider::find($id);

        //delete all product in product providers table
        $article->product_providers()->delete();

        $article->delete();
        return response()->json($article);
    }

    public function add_product(Request $request,$id)
    {
        $validator = Validator::make($request->all(),
            [
                'product_id.*' => 'required|exists:products,id',
                'price.*' => 'required|min:1',
                'available.*' => 'required|min:0|max:1',
            ],[

            ]);
        if ($validator->fails()) {
            return response()->json(
                array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray())
                , 400);
        }else{
            $current_time =Carbon::parse(Carbon::now());
            $current_date=$current_time->addHour(2);
            foreach ($request->product_id as $key=>$v){
                //to validate the provider not supply the same product again
                if(! ProductProvider::where('product_id','=',$v)->where('provider_id','=',$id)->first()){
                    $data=array(
                        'provider_id'=>$id,
                        'price'=>$request->price[$key],
                        'available'=>$request->available[$key],
                        'product_id'=>$v,
                        'created_at'=>$current_time,
                    );
                }else{
                    return response()->json(
                        array(
                            'success' => false,
                            'errors' => ['product'=>'the product entered in the system before'])
                        , 400);
                }

                ProductProvider::insert($data);

            }
            return response()->json($data);

        }
    }

    public function provider_products($id)
    {
        $articles=$this->PaginationService->pagination($this->ProductProviderRepository->search(request())->where('provider_id','=',$id));
        $articles->appends(request()->all());
        return View::make('admin.pages.provider-products',
            [
                'articles' => $articles,
            ]
        );
    }

    // set / unset product
    public function change_product_availability($id,$available)
    {
        $product = ProductProvider::find($id);
        $product->available = $available;
        $product->save();
        return response()->json($product);
    }

}
