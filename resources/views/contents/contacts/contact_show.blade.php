@extends('contents.layouts.card',['BreadcrumpTitle'=>'Contacts'])

@section('card-header')
 <p class="card-header-title has-text-info-light  is-size-4"> Contact's Details</p>
@stop

@section('card-content')

    <!-- Flash message  -->
    @include('notifications.flash_message')
    <!-- ./ Flash message -->

  <div class="content">
      <p> ID of Contact :<span class="has-text-link-dark  has-text-weight-medium is-size-6"> {{ $contact->id }}</span> </p>

      <p> FirstName:<span class="has-text-link-dark  has-text-weight-medium is-size-6">{{ $contact->contact_firstname}}</span> </p>

      <p> LastName : <span class="has-text-link-dark  has-text-weight-medium is-size-6">  {{ $contact->contact_lastname }} </span> </p>

      <p> Phone Number 1: <span class="has-text-link-dark  has-text-weight-medium is-size-6"> {{ $contact->contact_phone1 }} </span> </p>

      <p> Campus: <span class="has-text-link-dark  has-text-weight-medium is-size-6"> {{ $contact->contact_campus }} </span> </p>

      <p> Email:<span class="has-text-link-dark  has-text-weight-medium is-size-6"> {{ $contact->contact_email }}</span> </p>

      <p> Group:<span class="has-text-link-dark  has-text-weight-medium is-size-6">{{ $contact->group_id}}</span> </p>

      <p> Created By : <span class="has-text-link-dark  has-text-weight-medium is-size-6">  {{ $contact->created_by }} </span> </p>

      <p> Update By : <span class="has-text-link-dark  has-text-weight-medium is-size-6">  {{ $contact->updated_by }} </span> </p>
  </div>

@endsection

@section('card-footer')
<a class="button is-warning" href="{{ route('contact.edit', $contact->id)}}">
  <span class="icon"><i class="mdi mdi-file-edit"></i></span>
  <span>Edit</span>
</a>
  <a class="button is-primary" href="{{ route('contact.index') }}">
    <span class="icon"><i class="mdi mdi-cryengine"></i></span>
    <span>See All Contact</span>
  </a>
@endsection
