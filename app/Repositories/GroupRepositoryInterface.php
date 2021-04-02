<?php

    namespace App\Repositories;

    use App\Models\Group;
    use Illuminate\Support\Collection;

    Interface GroupRepositoryInterface
    {

        public function getIdByConstraintsQuery($data);

    }
