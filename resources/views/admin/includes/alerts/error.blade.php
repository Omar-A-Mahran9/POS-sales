@if (Session::has('error'))
    <div class='alert alert-danger w-25' role="alert">
       {{ Session::get('error') }}
    </div>
@endif