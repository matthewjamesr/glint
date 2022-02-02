@if (isset($alert))
    <div class="alert alert-{{$alertType}} alert-dismissible fade show d-flex align-items-center" role="alert">
        <strong>Holy guacamole!</strong>
        <ul>
            @foreach ($alert as $error => $value)
                <li><b>{{ $error }}:</b> {{ $value }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif