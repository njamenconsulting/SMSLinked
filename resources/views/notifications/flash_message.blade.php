@if ($message = Session::get('success'))

    <div class="notification is-success is-light">
        <button class="delete"></button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('error'))

    <div class="notification is-danger is-light">
        <button class="delete"></button>
        <strong>{{ $message }}</strong>
    </div>

@endif


@if ($message = Session::get('warning'))

    <div class="notification is-warning is-light">
        <button class="delete"></button>
        <strong>{{ $message }}</strong>
    </div>

@endif
<script>
    document.addEventListener('DOMContentLoaded', () => {
        (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
        const $notification = $delete.parentNode;

        $delete.addEventListener('click', () => {
            $notification.parentNode.removeChild($notification);
            });
        });
    });

</script>


@if ($message = Session::get('info'))

    <div class="notification is-info is-light">
        <button class="delete"></button>
        <strong>{{ $message }}</strong>
    </div>

@endif


@if ($errors->any())

    <div class="notification is-danger is-light">
        <button class="delete"></button>
        <strong>

                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>


        </strong>
    </div>

@endif
