@if (isset($alert))
    <div class="alert alert-{{$alertType}} alert-dismissible fade show d-flex align-items-center" role="alert">
        <strong>Holy guacamole!</strong> {{$alert}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif