<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Search\SearchServices;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct(private SearchServices $searchServices)
    {
    }

    public function search()
    {
        return $this->searchServices->search(request('search'));
    }
}
