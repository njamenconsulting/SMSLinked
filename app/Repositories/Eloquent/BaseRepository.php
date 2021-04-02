<?php

namespace App\Repositories;
namespace App\Repositories\Eloquent;

use App\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;


abstract class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }
    //
    public function getAllWithPaginate($n)
    {
        return $this->model->latest('created_at')->paginate($n);
    }
    //
    public function store(Array $inputs)
    {
        return $this->model->create($inputs);
    }
    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?Model
    {
        return $this->model->findOrFail($id);
    }

   //
    public function update(Array $inputs):bool
    {
        return $this->model->update($inputs);
    }
   //
    public function destroy($id)
    {
        $this->find($id)->delete();
    }

}
