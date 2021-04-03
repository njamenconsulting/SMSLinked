<?php
    namespace App\Repositories;

    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Database\Eloquent\Model;

    /**
     * Interface EloquentRepositoryInterface
     * @package App\Repositories
     */
    interface EloquentRepositoryInterface
    {
        /**
         * @return Collection
         */
        public function getAll();

        public function getAllWithPaginate($n);
        /**
         * @param array $attributes
         * @return Model
         */
        public function create(array $attributes): Model;

        /**
         * @param $id
         * @return Model
         */
        public function find($id): ?Model;

        public function store(Array $inputs);

        public function update(Array $inputs):bool;

        public function destroy($id);
    }
