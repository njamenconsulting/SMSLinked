@extends('contents.layouts.card',['BreadcrumpTitle'=>'Groups'])

@section('card-header')

  <p class="card-header-title has-text-info-light  is-size-4">Group's Items</p>
  <a class="button is-warning" href="{{ route('group.create') }}">New Group</a>

@stop

@section('card-content')

    <div class="field has-addons has-addons-centered">
        <div class="control">
            <input class="input" type="text" name="search" value="" placeholder="Search">
        </div>

        <div class="control">
            <div class="select">
                <select>
                    // loop from district data
                    <option value="">All</option>
                    <option value="">XXXX</option>
                </select>
            </div>
        </div>

        <div class="control">
            <button class="button is-primary" type="submit" name="button">Search</button>
        </div>
    </div>

    <table class="table is-hoverable has-text-centered">
        <thead class ="has-background-link-light is-uppercase has-text-weight-medium">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Code</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($groups as $group)
          <tr>
              <td> {{ $group->id}} </td>
              <td> {{ $group->group_name}} </td>
              <td> {{ $group->group_code}} </td>
              <td class="is-actions-cell">
                <div class="buttons is-right">
                    <a class="button is-small is-info is-light" href="{{ route('group.show', $group->id) }}">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                      <span>view</span>
                    </a>

                    <a class="button is-small is-warning is-light" href="{{ route('group.edit', $group->id) }}">
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
{{ $groups->links() }}
@endsection
