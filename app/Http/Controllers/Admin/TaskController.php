<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\PaginationService;
use App\Models\ProductProvider;
use App\Repositories\ProductProviderRepository;
use App\Repositories\ProviderRepository;
use Response;
use Validator;
use View;
use Auth;

class TaskController extends Controller
{

    private $ProviderRepository;
    private $ProductProviderRepository;

    public function __construct(ProviderRepository $ProviderRepository,ProductProviderRepository $ProductProviderRepository,PaginationService $PaginationService)
    {
        $this->ProviderRepository= $ProviderRepository;
        $this->ProductProviderRepository= $ProductProviderRepository;
        $this->PaginationService= $PaginationService;
    }

    //return all available products within it's category with min provider price
    public function category_products($id)
    {
        $data=$this->ProductProviderRepository->search(request())->whereHas('product', function($q) use ($id) {
            $q->where('category_id','=', $id);

        })
            ->where('available','=',1)
            ->with('product','provider')
            ->selectRaw('product_id as product_id ,min(price) as min_price')->groupBy('product_id');
        $products=$this->PaginationService->pagination($data);
        $products->appends(request()->all());
        return view('category-products')
            ->with('products',$products);

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
