<div class="landing-header">
    <div class="breadcrumb-content">
        <h1 class="entry-title mb-0 text-white text-center text-uppercase">{{ $title }}</h1>
        <ol class="breadcrumb mb-0 justify-center w-full" style="justify-content: center">
            <li class="breadcrumb-item fs-5"><a href="{{ url('/') }}">Trang chủ</a></li>
            @if (isset($subtitle) && isset($url) && isset($name))
                <li class="breadcrumb-item fs-5"><a href="{{ url($url) }}">{{ $name }}</a></li>
                <li class="breadcrumb-item fs-5 active" aria-current="page">{{ $subtitle }}</li>
            @else
                <li class="breadcrumb-item fs-5 active" aria-current="page">{{ $subtitle }}</li>
            @endif
        </ol>
    </div>
</div>
