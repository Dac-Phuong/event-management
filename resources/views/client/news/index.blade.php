@extends('client.layouts.master')
@section('title', 'Tin tức - Tin tức sự kiện')
@section('content')
    <div>
        @include('client.components.breadcrumb', [
            'title' => 'Tin tức sự kiện',
            'subtitle' => $data['category']->name ?? '',
        ])
        <div class="container py-5">
            <div class="row ">
                <div class="col-md-9">
                    @if (isset($data['news']) && count($data['news']) > 0)
                        @foreach ($data['news'] as $item)
                            <div class="col-md" data-aos="fade-right">
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-4 overflow-hidden card-hover">
                                            <a href="{{ $data['category']->slug . '/' . $item->slug }}">
                                                <img class="card-img card-img-left" height="100%"
                                                    src="{{ asset($item->thumbnail) }}" alt="Card image">
                                            </a>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <a href="{{ $data['category']->slug . '/' . $item->slug }}"
                                                    class="text-decoration-none text-black">
                                                    <h5 class="card-title">{{ $item->title }}</h5>
                                                </a>
                                                <p class="card-text mb-1"
                                                    style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                                    {!! nl2br(e($item->content)) !!}
                                                </p>
                                                <p class="card-text mb-0"><small class="text-muted">Tác giả:
                                                        {{ $item->author->name ?? 'Admin' }}</small></p>
                                                <p class="card-text"><small class="text-muted">Thời gian:
                                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</small>
                                                </p>
                                                </small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $data['news']->links('pagination::custom') }}
                    @else
                        @include('client.components.empty')
                    @endif
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
                                        <a href="{{ url('blog/' . $item->slug) }}" class="text-list text-hover">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @include('client.components.outstanding', ['feature' => $data['feature']])
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
                                                    <div class="avatar me-2" >
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
