<?php
namespace Framework\Core\Repositories;

class BaseRepository implements BaseRepositoryContract
{
    protected $model;

    public function paginate()
    {
        return $this->model->paginate(env('ITEM_PER_PAGE', 10));
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $model = $this->find($id);
        return $model->update($data);
    }
    
    public function destroy($id)
    {
        $model = $this->find($id);
        return $model->destroy($id);
    }
}