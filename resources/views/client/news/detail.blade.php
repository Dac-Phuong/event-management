@extends('client.layouts.master')
@section('title', 'Tin tức - Tin tức sự kiện')
@section('content')
    <div>
        @include('client.components.breadcrumb', [
            'title' => 'Tin tức sự kiện',
            'url' => url('blog/' . $data['category']->slug),
            'name' => $data['category']->name,
            'subtitle' => $data['news']->title,
        ])
        <div class="container py-5">
            <div class="row ">
                <div class="col-md-9" data-aos="fade-right">
                    <div class="card mb-5 p-3" style="height: 450px; border-radius: 12px">
                        <div class="position-relative" style="height: 83%">
                            <img src="{{ $data['news']->thumbnail }}" width="100%" height="100%" style="border-radius:12px"
                                alt="">
                            <div class="position-absolute top-0 start-0 bg-primary text-white px-2 py-1"
                                style="border-radius: 12px 0 12px 0">{{ $data['category']->name }}</div>

                        </div>
                        <h4 class="card-title mt-3 mb-1">{{ $data['news']->title }}</h4>
                        <div class="d-flex flex-wrap">
                            <p class="card-text me-3"><small class="text-muted">Người viết:
                                    {{ $data['news']->author->name ?? 'Admin' }} </small></p>
                            <p class="card-text d-flex align-items-center me-3"><small class="text-muted"><i
                                        class="ti ti-clock-hour-9 me-1"></i>
                                    {{ \Carbon\Carbon::parse($data['news']->created_at)->format('d/m/Y') }}</small></p>
                            <p class="d-flex align-items-center"><small class="text-muted"><i class="ti ti-eye me-1"></i>
                                    {{ number_format($data['news']->views) }} Lượt xem</small></p>
                        </div>
                    </div>
                    <div class="news-content">{!! $data['news']->description !!}</div>
                    <div class="d-flex align-items-center mb-3">
                        @if (!empty($data['news']->tags))
                            <p class="mb-0"><i class="ti ti-tag me-1"></i>Tags:
                                @foreach ($data['news']->tags as $tag)
                                    <a href="{{ url('tag/' . $tag->slug) }}" class="badge bg-label-primary rounded-pill me-2 fw-bold">{{ $tag->name }}</a>
                                @endforeach
                            </p>
                        @endif
                    </div>
                </div>  
                <div class="col-md-3" data-aos="fade-left">
                    <div class="card">
                        <img src="https://bizmanmedia.vn/wp-content/uploads/2024/05/banner-doc-web-01-01-1.png"
                            width="100%" alt="" srcset="">
                    </div>
                    <div class="card mt-4">
                        <div class="card-header pb-2">
                            <div class="position-relative">
                                <input type="text" id="search-input" class="form-control" placeholder="Tìm kiếm">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <ul id="search-results" class="list-group list-group-flush" style="display: none;"></ul>
                        <div class="card-body pt-2">
                            <ul class="list-group list-group-flush border-bottom">
                                @foreach ($data['categories'] as $item)
                                    <li class="list-group-item">
                                        <a href="{{ url('blog/' . $item->slug) }}"
                                            class="text-list text-hover">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header pb-0">
                            <h5 class="card-title text-uppercase">Tin tức nổi bật</h5>
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                @if (count($data['feature']) > 0)
                                    @foreach ($data['feature'] as $item)
                                        <a href="{{ url('blog/' . $item['category']->slug . '/' . $item->slug) }}"
                                            class="text-decoration-none mb-2">
                                            <div class="d-flex w-100 justify-content-between">
                                                <img class="card-img " height="70" width="50"
                                                    src="{{ asset($item->thumbnail) }}" alt="Card image"
                                                    style="width: 80px; ">
                                                <div style="margin-left: 10px">
                                                    <h5 class="card-title fs-6 text-uppercase m-0"
                                                        style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                        {{ $item->title }}</h5>
                                                    <p class="card-text"><small class="text-muted"><i
                                                                class="ti ti-calendar-stats me-2"></i>
                                                            {{ $item->created_at }}</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                @else
                                    <p class="text-primary">Chưa có tin nổi bật</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('client.components.home.contact')
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            var timeout = null;
            var resultsContainer = $("#search-results");
            $("#search-input").on("input", function() {
                clearTimeout(timeout);
                var query = $(this).val().trim();
                if (!query.length) return resultsContainer.hide().empty();
                $("#search-input").removeClass("is-invalid").parent().find(".invalid-feedback").text("");
                resultsContainer.empty().show().append(`
                    <li class="list-group-item result-item d-flex justify-content-center">
                        <div class="spinner-border spinner-border-sm text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </li>
                `);
                timeout = setTimeout(function() {
                    $.ajax({
                        url: "{{ route('news.search') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            keyword: query
                        },
                        success: function(res) {
                            resultsContainer.empty();
                            if (res.error_code == -1) {
                                $("#search-input").addClass("is-invalid");
                                $("#search-input").parent().find(".invalid-feedback")
                                    .text(res.data);
                            } else if (res.error_code == 0) {
                                if (res.data.length == 0) {
                                    resultsContainer.append(
                                        `<li class="list-group-item result-item">Không tìm thấy kết quả</li>`
                                    );
                                } else {
                                    res.data.forEach(item => {
                                        resultsContainer.append(
                                            `<li class="list-group-item result-item p-2"> 
                                                <a href="${item.category.slug}/${item.slug}" class="text-decoration-none d-flex align-items-center">
                                                    <div class="avatar me-2">
                                                        <img src="${item.thumbnail}" style="width: 30px; height: 30px;" alt="Avatar" class="rounded-circle">
                                                    </div>
                                                    <span class="text-uppercase text-list text-hover">${item.title}</span>
                                                </a>
                                            </li>`
                                        );
                                    });
                                }
                                resultsContainer.show();
                            }
                        },
                        error: function() {
                            console.error("Lỗi khi gọi API tìm kiếm");
                            resultsContainer.empty().append(
                                `<li class="list-group-item result-item">Lỗi khi tải dữ liệu</li>`
                            );
                        }
                    });
                }, 500);
            });
        });
    </script>
@endpush
