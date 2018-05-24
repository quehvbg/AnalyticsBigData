<?php
namespace Modules\Books\Services;
use Modules\Books\Repositories\BookRepositoryContract;
use Framework\Core\Services\BaseService;

class BookService extends BaseService implements BookServiceContract
{
    public function __construct(BookRepositoryContract $repository)
    {
        return $this->repository = $repository;
    }
}