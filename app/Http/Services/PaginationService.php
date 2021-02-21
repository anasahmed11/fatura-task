<?php

namespace App\Http\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class PaginationService
{
    public function pagination($data)
    {
        return $data->paginate(25);
    }

}
