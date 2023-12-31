<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Resources\SearchResource;
use App\Services\Search\SearchServices;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends Controller
{
    public function __construct(private SearchServices $searchServices)
    {
    }

    public function search(SearchRequest $request): JsonResponse
    {
        $keyword = $request->search;
        $books = $this->searchServices->search($keyword);
        return response()->json(SearchResource::collection($books), Response::HTTP_OK);
    }
}
