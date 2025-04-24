<div class="logo-container">
    <a href="{{ url('/') }}">
        @if (!empty($config->value))
            <img width="70" height="70" style="object-fit: contain" src="{{ asset($config->value ?? '') }}"
                alt="Logo">
        @endif
    </a>
</div>
