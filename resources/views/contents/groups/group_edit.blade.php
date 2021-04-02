@extends('contents.layouts.card',['BreadcrumpTitle'=>'Groups'])

@section('card-header')

  <p class="card-header-title has-text-info-light  is-size-4"> Update Group</p>

@stop

@section('card-content')

    <!-- Flash message  -->
    @include('notifications.flash_message')
    <!-- ./ Flash message -->

<form class="box" action="{{ route('group.update',$group->id) }}" method="POST">
  @csrf
  @method('put')
    <input type="hidden" name="updated_by" id="updated_by" value="{{Auth::user()->name }}">
    <input type="hidden" name="group_id" id="group_id" value="{{ $group->id  }}">

    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">Group's Name:</label>
      </div>
      <div class="field-body">
        <div class="field">
          <div class="control">
            <input type="text" autocomplete="on" name="group_name" placeholder=" Name of Group" value="{{old('group_name',$group->group_name) }}" class="input @error('group_name') is-danger @enderror">
          </div>
          @error('group_name')
               <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </div>
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">Group's Code:</label>
      </div>
      <div class="field-body">
        <div class="field">
          <div class="control">
            <input type="text" autocomplete="on" name="group_code" placeholder=" Code of Group" value="{{old('group_code', $group->group_code) }}" class="input @error('group_code') is-danger @enderror">
          </div>
          @error('group_code')
               <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </div>

    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">Group's Description:</label>
      </div>
      <div class="field-body">
        <div class="field">
          <div class="control">
              <textarea name="group_description" onKeyPress   class="textarea @error('group_description') is-danger @enderror" placeholder=" Descripe the Group in few words" >
                  {{ old('group_description', $group->group_description) }}
              </textarea>
          </div>
           @error('group_description')
                 <p class="help is-danger">{{ $message }}</p>
           @enderror
        </div>
      </div>
    </div>


    <div class="field is-horizontal">
      <div class="field-label is-normal"></div>
      <div class="field-body">
        <div class="field">
          <div class="control">
            <button type="submit" class="button is-info">
              <span class="icon"><i class="mdi mdi-telegram"></i></span>
              <span class="menu-item-label"> Update </span>
            </button>
          </div>
        </div>
      </div>
    </div>
</form>
@endsection

@section('card-footer')
<a class="button is-primary" href="{{ route('group.index') }}">
  <span class="icon"><i class="mdi mdi-cryengine"></i></span>
  <span>See All Group</span>
</a>
@endsection
