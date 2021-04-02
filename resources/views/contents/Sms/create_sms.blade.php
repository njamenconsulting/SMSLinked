@extends('contents.layouts.card',['BreadcrumpTitle'=>'Sms','cardHeaderTitle'=>'New Sms'])

@section('card-header')

  <p class="card-header-title has-text-info-light  is-size-4"> New SMS</p>
  <a class="button is-warning" href="{{ route('group.index') }}">Show SMS</a>

@stop

@section('card-content')

<form class="box" action="{{ url('sms') }}" method="POST">
  @csrf

  <input type="hidden" name="created_by" id="created_by" value="{{Auth::user()->name }}">

  <fieldset>

    <div class="column is-horizontal">
      <!-- Text input-->
      <div class="field">
        <label class="label" for="sms_recipients"> <span class="icon is-small is-left"><i class="mdi mdi-cellphone-basic"></i></span> Recipient(s) phone:</label>
        <div class="control">
          <input id="sms_recipients" name="sms_recipients" type="text" value="{{ old('sms_recipients') }}" placeholder="placeholder" class="input @error('sms_recipients') is-danger @enderror">
          @error('sms_recipients')
               <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </div>

    <div class="columns is-multiline is-mobile">

          <div class="column is-half">
            <!-- Text input-->
            <div class="field">
              <label class="label" for="sms_message"> <span class="icon is-small is-left"><i class="mdi mdi-tooltip-edit"></i></span> Message:</label>
              <div class="control">
                  <textarea name="sms_message" placeholder=" Must be less than 160 characters"  class="textarea @error('sms_message') is-danger @enderror" >{{ old('sms_message') }}</textarea>
              </div>
               @error('sms_message')
                     <p class="help is-danger">{{ $message }}</p>
               @enderror
            </div>
           </div>

        <div class="column is-half">
              <!-- Select Basic -->
          <div class="field">
            <label class="label" for="group_id"><span class="icon"><i class="mdi mdi-account-multiple-plus"></i></span> Select Group :</label>
            <div class="control">
            	<div class="select">
                <select name="group_id">
                  <option value="">Select a Group ...</option>
                  @foreach($groups as $group)
                   <option value="{{ $group->id }}" @if(old('group_id') == $group->id) {{ 'selected' }} @endif>
                     {{ $group->group_name }}
                   </option>
                  @endforeach
                </select>
          	</div>
            @error('group_id')
                 <p class="help is-danger">{{ $message }}</p>
            @enderror
            </div>
          </div>

        <hr/>
          <div class="field has-text-link-dark has-text-weight-bold has-background-link-light">
            <div class="control">

              <label class="checkbox">
                <input type="checkbox" name="checkbox">
                <span>Send also by email</span>
              </label>

            </div>
          </div>
      </div>

     </div><!-- End multiline columns -->

        <hr/>
      <!-- Button -->
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

 </fieldset>
</form>
@endsection

@section('card-footer')

  <a class="button is-primary" href="{{ route('sms.index') }}">
    <span class="icon"><i class="mdi mdi-cryengine"></i></span>
    <span>See All Contact</span>
  </a>
@endsection
