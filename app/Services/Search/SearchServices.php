<?php

namespace App\Services\Search;

use App\Repositories\Search\SearchRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class SearchServices
{
    public function __construct(private SearchRepositoryInterface $searchRepository)
    {}

    public function search(string $keyword): Collection
    {
        return Cache::remember('search', 10, function() use($keyword){
            return $this->searchRepository->search($keyword);
        });
    }
}