<?php

namespace App\Repositories;

use App\Models\Provider;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class ProviderRepository
{

    /**
     * @param $request
     * @return $this|mixed
     */
    public function search(Request $request)
    {
        $articles = Provider::orderByDesc("id")
            ->when($request->get('provider_name'), function ($articles) use ($request) {
                return $articles->where('name', 'like', '%' . $request->query->get('provider_name') . '%');
            });
        return $articles;
    }

}
