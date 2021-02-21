<?php

namespace App\Repositories;

use App\Models\Product;
use Symfony\Component\HttpFoundation\Request;

class ProductRepository
{

    /**
     * @param $request
     * @return $this|mixed
     */
    public function search(Request $request)
    {
        $articles = Product::orderByDesc("id")->
            when($request->get('product_name'), function ($articles) use ($request) {
                return $articles->where('name', 'like', '%' . $request->query->get('product_name') . '%');
            })
            ->when($request->get('category'), function ($articles) use ($request) {
                return $articles->WhereHas('category', function ($articles) use ($request){
                    $articles->where('name', 'like', '%' . $request->query->get('category') . '%');
                });
            });
        return $articles;
    }

}
