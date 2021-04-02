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
                <th > FirstName </th>
                <th > LastName </th>
                <th>  Phone 1</th>
                <th>  Phone 2</th>
                <th>  Email Address </th>
                <th>  Group code </th>
            </tr>
        </thead>
        <tbody>
        <form class="box" action="{{ route('upload.store') }}" method="POST">
            @csrf

            @foreach($contacts as $key => $value )

                <tr>
                    <td>
                        <input name="contact_firstname[]" type="text" value="{{ $value['firstname'] ?? old('contact_firstname') }}"  class="input @error('contact_firstname.' . $key) is-danger @enderror">
                        @error('contact_firstname.' . $key)
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror

                    </td>
                    <td>
                        <input name="contact_lastname[]" type="text" value="{{ $value['lastname'] ?? old('contact_lastname') }}"class="input @error('contact_lastname.' . $key) is-danger @enderror">
                        @error('contact_lastname.' . $key)
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </td>
                    <td>
                        <input  name="contact_phone1[]" type="tel" value="{{ $value['phone1'] ?? old('contact_phone1') }}" class="input @error('contact_phone1.' . $key) is-danger @enderror">
                        @error('contact_phone1.' . $key)
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </td>
                    <td>
                        <input name="contact_phone2[]" type="tel" value="{{ $value['phone2'] ??  old('contact_phone2') }}"class="input @error('contact_phone2.' . $key) is-danger @enderror">
                        @error('contact_phone2.' . $key)
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </td>
                    <td>
                        <input name="contact_email[]" type="email" value="{{ $value['email']  ?? old('contact_email') }}" class="input @error('contact_email.' . $key) is-danger @enderror">
                        @error('contact_email.' . $key)
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </td>
                    <td>
                        <input name="group_code[]" type="text" value="{{ $value['group_code'] ?? old('group_code') }}" class="input @error('group_code.' . $key) is-danger @enderror">
                        @error('group_code.' . $key)
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>

        @endforeach
        <!-- Button -->
            <button type="submit" class="button is-link">
                <span class="icon"><i class="mdi mdi-telegram"></i></span>
                <span>Submit</span>
            </button>
            <!-- ../ Button -->

        </form>
        </tbody>

    </table>

@endsection


