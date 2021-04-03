<?php

namespace App\Repositories\Eloquent;

use App\Models\Contact;
use App\Repositories\ContactRepositoryInterface;
use App\Repositories\GroupRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{
    /**
     * @var GroupRepositoryInterface
     */
    private $groupRepository;

    /**
     * ContactRepository constructor.
     *
     * @param Contact $model
     * @param GroupRepositoryInterface $groupRepository
     */
    public function __construct(Contact $model, GroupRepositoryInterface $groupRepository)
    {
        parent::__construct($model);
        $this->groupRepository = $groupRepository;
    }

    /*
     * Store Array data into database
     * */
    public function storeCsvContents(Array $inputs)
    {

        $count =count(array_values($inputs['contact_firstname']));

        for ($i = 0; $i < $count; $i++) {

            //Retrieve group_id value matching to group_code within of CSV file
            $groupId = $this->groupRepository->getIdByConstraintsQuery($inputs['group_code'][$i]);

            //Prepare attributes of insertion
            $data[$i]['contact_firstname'] = $inputs['contact_firstname'][$i];
            $data[$i] ['contact_lastname']= $inputs['contact_lastname'][$i];
            $data[$i] ['contact_phone1'] = $inputs['contact_phone1'] [$i];
            $data[$i] ['contact_campus'] = $inputs['contact_campus'] [$i];
            $data[$i] ['contact_email']= $inputs['contact_email'][$i];
            $data[$i] ['group_id'] = $groupId;
            $data[$i] ['created_by']= Auth::user()->name;

        }

        DB::transaction(function () use ($data) { // Start the transaction

            // Store in database
            $this->model->insert($data);

        }); // End transaction
    }

}
