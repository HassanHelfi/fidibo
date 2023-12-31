<?php

namespace App\Repositories\Search;

use App\Models\Book;
use Illuminate\Support\Collection;

class MysqlSearchReopository implements SearchRepositoryInterface
{
    public function search(string $keyword): Collection
    {
        $books = Book::query()->whereRaw("MATCH(title) AGAINST(? IN BOOLEAN MODE)", [$keyword . '*'])->get();

        # This is not optimal query.
        # $books = Book::query()->whereFullText('title', $keyword)->get();
        return $books;
    }
}
