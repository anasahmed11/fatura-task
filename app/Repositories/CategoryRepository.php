<?php

namespace App\Repositories;

use App\Models\Category;
use Symfony\Component\HttpFoundation\Request;

class CategoryRepository
{

    /**
     * @param $request
     * @return $this|mixed
     */
    public function search(Request $request)
    {
        $articles = Category::
            when($request->get('category_name'), function ($articles) use ($request) {
                return $articles->where('name', 'like', '%' . $request->query->get('category_name') . '%');
            })
            ->when($request->get('parent'), function ($articles) use ($request) {
                return $articles->WhereHas('category', function ($articles) use ($request){
                    $articles->where('name', 'like', '%' . $request->query->get('parent') . '%');
                });
            })
        ;
        return $articles;
    }

}
