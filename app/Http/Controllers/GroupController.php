<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Repositories\GroupRepositoryInterface;

use App\Http\Requests\Groups\CreateGroupRequest;
use App\Http\Requests\Groups\UpdateGroupRequest;


class GroupController extends Controller
{
  protected $groupRepository;

    protected $nbrPerPage = 4;

    public function __construct(GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $groups = $this->groupRepository->getAllWithPaginate($this->nbrPerPage);
        $links = $groups->setPath('')->render();

        return view('contents.groups.group_index', compact('groups', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contents.groups.group_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGroupRequest $request)
    {
        $this->groupRepository->store($request->all());

        return redirect()->route('group.create')->with('success', 'A new Group has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group  $group)
    {
        return view('contents.groups.group_show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('contents.groups.group_edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request)
    {
        $this->groupRepository->update($request->all());
        return redirect()->route('group.show',$request->group_id )->with('success', 'This Group has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
