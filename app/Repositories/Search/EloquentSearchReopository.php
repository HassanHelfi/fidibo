<?php
namespace App\Repositories\Search;

use App\Models\Book;
use Illuminate\Support\Collection;

class EloquentSearchReopository implements SearchRepositoryInterface
{
    public function search(string $keyword): Collection
    {
        $books = Book::query()->whereFullText('title', $keyword)->get();
        return $books;
    }
}