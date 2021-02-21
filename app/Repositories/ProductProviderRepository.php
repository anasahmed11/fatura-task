<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductProvider;
use Symfony\Component\HttpFoundation\Request;

class ProductProviderRepository
{

    /**
     * @param $request
     * @return $this|mixed
     */
    public function search(Request $request)
    {
        $articles = ProductProvider::orderByDesc("id")->
            when($request->get('available'), function ($articles) use ($request) {
                return $articles->where('available', '=', $request->query->get('available') );
            })
            ->when($request->get('product_name'), function ($articles) use ($request) {
                return $articles->WhereHas('product', function ($articles) use ($request){
                    $articles->where('name', 'like', '%' . $request->query->get('product_name') . '%');
                });
            })->when($request->get('provider_name'), function ($articles) use ($request) {
                return $articles->WhereHas('provider', function ($articles) use ($request){
                    $articles->where('name', 'like', '%' . $request->query->get('provider_name') . '%');
                });
            })->when($request->get('category'), function ($articles) use ($request) {
                return $articles->WhereHas('product', function ($articles) use ($request) {
                    return $articles->WhereHas('category', function ($articles) use ($request) {
                        $articles->where('name', 'like', '%' . $request->query->get('category') . '%');
                    });
                });
            });;
        return $articles;
    }

}
