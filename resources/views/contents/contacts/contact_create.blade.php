@extends('contents.layouts.card',['BreadcrumpTitle'=>'Contacts','cardHeaderTitle'=>'New Contact'])

@section('card-header')

  <p class="card-header-title has-text-info-light  is-size-4"> New Contact</p>

@stop

@section('card-content')

    <!-- Flash message  -->
    @include('notifications.flash_message')
    <!-- ./ Flash message -->

<form class="box" action="{{ route('contact.store') }}" method="POST">
  @csrf

<input type="hidden" name="created_by" id="created_by" value="{{Auth::user()->name }}">
<input type="hidden" name="status" id="status" value="pending">

<fieldset>
    <div class="columns is-multiline is-mobile">
        <!--  INPUT FIRSTNAME -->
        <div class="column is-half">

          <div class="field">
            <label class="label" for="contact_firstname"> <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>Firstname:</label>
            <div class="control">
              <input id="contact_firstname" name="contact_firstname" type="text" value="{{ old('contact_firstname') }}" placeholder="placeholder" class="input @error('contact_firstname') is-danger @enderror">
              @error('contact_firstname')
                   <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
        </div><!-- ../ INPUT FIRSTNAME -->
        <!--  INPUT LASTNAME -->
        <div class="column is-half">

          <div class="field">
            <label class="label" for="contact_lastname"> <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span> Lastname:</label>
            <div class="control">
              <input id="contact_lastname" name="contact_lastname" type="text" value="{{ old('contact_lastname') }}" placeholder="placeholder" class="input @error('contact_lastname') is-danger @enderror">
              @error('contact_lastname')
                   <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
        </div><!-- ../ INPUT LASTNAME -->
        <!--  INPUT PHONE -->
        <div class="column is-half">
          <!-- Text input-->
          <div class="field">
            <label class="label" for="contact_phone1">  <span class="icon is-small is-left"><i class="mdi mdi-cellphone-iphone"></i></span> Phone Number 1:</label>
            <div class="control">
              <input id="contact_phone1" name="contact_phone1" type="text" value="{{ old('contact_phone1') }}" placeholder="placeholder" class="input @error('contact_phone1') is-danger @enderror">
              @error('contact_phone1')
                   <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
        </div><!-- ../ INPUT PHONE -->
        <!-- SELECT CAMPUS -->
        <div class="column is-half">

            <div class="field">
                <label class="label" for="contact_campus"><span class="icon"><i class="mdi mdi-home-city"></i></span> Campus :</label>
                <div class="control">
                    <div class="select">
                        <select name="contact_campus">
                            <option value="">Select campus...</option>

                            <option value="bangangte" @if(old('contact_campus') == 'bangangte') {{ 'selected' }} @endif>
                                Campus principal de Bangangte
                            </option>

                            <option value="douala" @if(old('contact_campus') == 'douala') {{ 'selected' }} @endif>
                                Campus annexe de Douala
                            </option>

                            <option value="yaounde" @if(old('contact_campus') == 'yaounde') {{ 'selected' }} @endif>
                                Campus annexe de Yaounde
                            </option>

                        </select>
                    </div>
                    @error('contact_campus')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>     <!-- ../ SELECT CAMPUS-->
        <!-- INPUT EMAIL-->
        <div class="column is-half">

          <div class="field">
            <label class="label" for="contact_email"> <span class="icon is-small is-left"><i class="mdi mdi-mail"></i></span> Email Address:</label>
            <div class="control">
              <input id="contact_email" name="contact_email" type="text" value="{{ old('contact_email') }}"  placeholder="placeholder" class="input @error('contact_email') is-danger @enderror">
              @error('contact_email')
                   <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
        </div><!-- ../ INPUT EMAIL-->
        <!-- SELECT GROUP -->
        <div class="column is-half">

              <div class="field">
                <label class="label" for="group_id"><span class="icon"><i class="mdi mdi-account-group"></i></span> Group :</label>
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

        </div><!-- ../ SELECT GROUP -->

    </div>
  <hr/>
<!-- Button -->
<div class="columns is-centered">
  <div class="field is-grouped">
    <p class="control">
      <button type="submit" name="submit" value="add-by-form-filling" class="button is-link">
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
</div><!-- ../ Button -->

</fieldset>
</form>
@endsection

@section('card-footer')

  <a class="button is-primary" href="{{ route('contact.index') }}">
    <span class="icon"><i class="mdi mdi-cryengine"></i></span>
    <span>See All Contact</span>
  </a>
@endsection
