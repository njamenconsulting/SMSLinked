@extends('contents.layouts.card',['BreadcrumpTitle'=>'Contacts'])



@section('card-header')

    <p class="card-header-title has-text-info-light  is-size-4"> Csv file Contents</p>
    <a class="button is-warning" href="{{ route('contact.create') }}">New Contact</a>

@stop

@section('card-content')

    <table class="table is-hoverable has-text-centered is-size-7 is-small">
        <thead class ="has-background-link-light is-uppercase has-text-weight-medium">
            <tr>
                <th > FirstName </th>
                <th > LastName </th>
                <th>  Phone 1</th>
                <th>  Campus</th>
                <th>  Email Address </th>
                <th>  Group code </th>
            </tr>
        </thead>
        <tfoot>
        <tr>
            <th><abbr title="Position">Pos</abbr></th>
            <th>Team</th>
            <th><abbr title="Played">Pld</abbr></th>
            <th><abbr title="Won">W</abbr></th>
            <th><abbr title="Drawn">D</abbr></th>
            <th><abbr title="Lost">L</abbr></th>

        </tr>
        </tfoot>
        <tbody>
        <form class="box" action="{{ route('upload.store') }}" method="POST">
            @csrf

            @foreach($contacts as $key => $value )

                <tr>
                    <td>
                        <input name="contact_firstname[]" type="text" value="{{ $value['firstname'] ?? old('contact_firstname') }}"  class="is-small input @error('contact_firstname.' . $key) is-danger @enderror">
                        @error('contact_firstname.' . $key)
                        <p class="help is-danger is-small">{{ $message }}</p>
                        @enderror

                    </td>
                    <td>
                        <input name="contact_lastname[]" type="text" value="{{ $value['lastname'] ?? old('contact_lastname') }}"class=" is-small input @error('contact_lastname.' . $key) is-danger @enderror">
                        @error('contact_lastname.' . $key)
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </td>
                    <td>
                        <input  name="contact_phone1[]" type="tel" value="{{ $value['phone1'] ?? old('contact_phone1') }}" class="is-small input @error('contact_phone1.' . $key) is-danger @enderror">
                        @error('contact_phone1.' . $key)
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </td>
                    <td>
                        <input name="contact_campus[]" type="tel" value="{{ $value['campus'] ??  old('contact_campus') }}"class=" is-small input @error('contact_campus.' . $key) is-danger @enderror">
                        @error('contact_campus.' . $key)
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </td>
                    <td>
                        <input name="contact_email[]" type="email" value="{{ $value['email']  ?? old('contact_email') }}" class=" is-small input @error('contact_email.' . $key) is-danger @enderror">
                        @error('contact_email.' . $key)
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </td>
                    <td>
                        <input name="group_code[]" type="text" value="{{ $value['group_code'] ?? old('group_code') }}" class=" is-small input @error('group_code.' . $key) is-danger @enderror">
                        @error('group_code.' . $key)
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>

        @endforeach

        </tbody>

    </table>
    <!-- Button -->
    <button type="submit" class="button is-link is-small">
        <span class="icon"><i class="mdi mdi-telegram"></i></span>
        <span>Submit</span>
    </button>
    <!-- ../ Button -->

    </form>
@endsection


