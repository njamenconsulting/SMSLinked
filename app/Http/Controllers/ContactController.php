<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contacts\UpdateContactRequest;
use App\Models\Contact;
use App\Repositories\ContactRepositoryInterface;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Contacts\CreateContactRequest;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{
    protected $contactRepository;

    protected $nbrPerPage = 4;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = $this->contactRepository->getAllWithPaginate($this->nbrPerPage);
        $links = $contacts->setPath('')->render();

        return view('contents.contacts.contact_index', compact('contacts', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $groups = DB::table('groups')->get();
        return view('contents.contacts.contact_create_form',compact('groups'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(CreateContactRequest  $request)
     {
         $this->contactRepository->store($request->all());

         return redirect()->route('contact.create')->with('success', ' A new Contact has been added successfully');
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contents.contacts.contact_show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $groups = DB::table('groups')->get();
        return view('contents.contacts.contact_edit', compact('contact'),compact('groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Contacts\UpdateContactRequest $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {

        $this->contactRepository->update($request->all());

        return redirect()->route('contact.show',$request->contact_id)->with('success', ' This Contact has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
