<?php

    namespace App\Repositories\Eloquent;

    use App\Models\Group;
    use App\Repositories\GroupRepositoryInterface;
    use Illuminate\Support\Collection;

    class GroupRepository extends BaseRepository implements GroupRepositoryInterface
    {

        /**
         * GroupRepository constructor.
         *
         * @param Group $model
         */
        public function __construct(Group $model)
        {
            parent::__construct($model);
        }

        //
        public function getIdByConstraintsQuery($group_code)
        {

            $group = $this->model->where('group_code',$group_code)->first(['id'])->toArray();

		    return $group['id'];

        }
        //
        public function  getOrCreate( $data ){
            $group =$this->model->firstOrNew([
                'group_code' => $data,
                'group_name' => 'Group name',
                'group_description' => 'Group description',
                'created_by' => 'Autor',
            ]);
        }
    }

