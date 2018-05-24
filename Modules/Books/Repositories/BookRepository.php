<?php
namespace Modules\Books\Repositories;

use Modules\Books\Models\Book;
use Framework\Core\Repositories\BaseRepository;

class BookRepository extends BaseRepository implements BookRepositoryContract
{
    public function __construct(Book $model)
    {
        $this->model = $model;
    }
}