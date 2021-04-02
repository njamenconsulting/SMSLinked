@extends('contents.layouts.card',['BreadcrumpTitle'=>'Groups'])

@section('card-header')
 <p class="card-header-title has-text-info-light  is-size-4"> Group's Details</p>
@stop

@section('card-content')
    <!-- Flash message  -->
    @include('notifications.flash_message')
    <!-- ./ Flash message -->

  <div class="content">
      <p> ID of Group :<span class="has-text-link-dark  has-text-weight-medium is-size-6"> {{ $group->id }}</span> </p>

      <p> Name of Group :<span class="has-text-link-dark  has-text-weight-medium is-size-6">{{ $group->group_name}}</span> </p>

      <p> Code of Group : <span class="has-text-link-dark  has-text-weight-medium is-size-6">  {{ $group->group_code }} </span> </p>

      <p> Desciption of Group: <span class="has-text-link-dark  has-text-weight-medium is-size-6"> {{ $group->group_description }} </span> </p>
      <p> Create by: <span class="has-text-link-dark  has-text-weight-medium is-size-6"> {{ $group->created_by}} </span> </p>
      <p> Create at: <span class="has-text-link-dark  has-text-weight-medium is-size-6"> {{ $group->created_at}} </span> </p>
      <p> Update by: <span class="has-text-link-dark  has-text-weight-medium is-size-6"> {{ $group->updated_by}} </span> </p>
      <p> Update at: <span class="has-text-link-dark  has-text-weight-medium is-size-6"> {{ $group->updated_at}} </span> </p>
  </div>

@endsection

@section('card-footer')
<a class="button is-warning" href="{{ route('group.edit', $group->id)}}">
  <span class="icon"><i class="mdi mdi-file-edit"></i></span>
  <span>Edit</span>
</a>
  <a class="button is-primary" href="{{ route('group.index') }}">
    <span class="icon"><i class="mdi mdi-cryengine"></i></span>
    <span>See All Group</span>
  </a>
@endsection
