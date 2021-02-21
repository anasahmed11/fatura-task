<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\PaginationService;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductProviderRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use View ;
class HomeController extends Controller
{
    public function __construct(CategoryRepository $CategoryRepository,ProductProviderRepository $ProductProviderRepository,PaginationService $PaginationService)
    {
        $this->CategoryRepository= $CategoryRepository;
        $this->ProductProviderRepository= $ProductProviderRepository;
        //the middleware of pagination
        $this->PaginationService= $PaginationService;
    }

    public function index()
    {
        $categories=$this->PaginationService->pagination($this->CategoryRepository->search(request()));
        $categories->appends(request()->all());
        return view('index')
            ->with('categories',$categories);

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

    // pagination service is the middleware that receive data and allow pagination of this data with page parameter
    // and return 25 result per page
    // app - http - services -pagination service

}
