@extends('contents.layouts.card',['BreadcrumpTitle'=>'Contacts'])



@section('card-header')

  <p class="card-header-title has-text-info-light  is-size-4">Contact's Items</p>
  <a class="button is-warning" href="{{ route('contact.create') }}">New Contact</a>

@stop

@section('card-content')
<div class="control is-loading">
  <input class="input" type="search" placeholder="Loading input">
</div>
  <table class="table is-hoverable has-text-centered">
      <thead class ="has-background-link-light is-uppercase has-text-weight-medium">
        <tr>
            <th>#</th>
            <th > FirstName </th>
            <th>  Phone Number</th>
            <th>  Email Address </th>
            <th>  Action </th>
        </tr>
      </thead>
      <tbody>
        @foreach($contacts as $contact)
          <tr>
              <td> {{ $contact->id}} </td>
              <td> {{ $contact->contact_firstname}}  </td>
              <td> {{ $contact->contact_phone1}}  </td>
              <td> {{ $contact->contact_email}} </td>
              <td class="is-actions-cell">
                <div class="buttons is-right">
                    <a class="button is-small is-info is-light" href="{{ route('contact.show', $contact->id) }}">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                      <span>view</span>
                    </a>

                    <a class="button is-small is-warning is-light" href="{{ route('contact.edit', $contact->id)}}">
                      <span class="icon"><i class="mdi mdi-file-edit"></i></span>
                      <span>Edit</span>
                    </a>

                </div>
              </td>
          </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>

        </tr>
      </tfoot>
  </table>

@endsection

@section('card-footer')
{{ $contacts->links() }}
@endsection
