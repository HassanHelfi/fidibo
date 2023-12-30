<?php

use App\Repositories\Search\SearchRepositoryInterface;
use Illuminate\Support\Collection;

class ElasticSearchReoppository implements SearchRepositoryInterface
{
    public function search(string $keyword): Collection
    {
        // ...
        return collect(/* ... */);
    }
}