@extends('contents.layouts.card',['BreadcrumpTitle'=>'Groups'])

@section('card-header')

  <p class="card-header-title has-text-info-light  is-size-4"> New Group</p>
  <a class="button is-warning" href="{{ route('group.index') }}">Show Group</a>

@stop

@section('card-content')
<!-- Flash message  -->
    @include('notifications.flash_message')
<!-- ./ Flash message -->
<form class="box" action="{{ route('group.store') }}" method="POST">
  @csrf
    <input type="hidden" name="created_by" id="created_by" value="{{Auth::user()->name }}">
    <input type="hidden" name="updated_by" id="updated_by" value="{{Auth::user()->name }}">

    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">Group's Name:</label>
      </div>
      <div class="field-body">
        <div class="field">
          <div class="control">
            <input type="text" autocomplete="on" name="group_name" placeholder=" Civil Engineering 5" value="{{old('group_name') }}" class="input @error('group_name') is-danger @enderror">
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
            <input type="text" autocomplete="on" name="group_code" placeholder=" GCV5" value="{{old('group_code') }}" class="input @error('group_code') is-danger @enderror">
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
              <textarea name="group_description" placeholder=" Give a few word about Group"  onKeyPress  class="textarea @error('group_description') is-danger @enderror">{{ old('group_description') }}</textarea>
          </div>
           @error('group_description')
                 <p class="help is-danger">{{ $message }}</p>
           @enderror
        </div>
      </div>
    </div>
  <hr/>
    <div class="columns is-centered">
      <div class="field is-grouped">
        <p class="control">
          <button type="submit" class="button is-link">
            <span class="icon"><i class="mdi mdi-telegram"></i></span>
            <span>Submit</span>
          </button>
        </p>
        <p class="control">
          <button type="reset" class="button is-danger">
            <span class="icon"><i class="mdi mdi-rotate-3d-variant"></i></span>
            <span>Reset</span>
          </button>
        </p>
      </div>
    </div>

</form>
@endsection

@section('card-footer')

@endsection
