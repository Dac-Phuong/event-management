@extends('client.layouts.master')
@section('title', $data['project']->title)
@section('content')
    <div>
        <div class="row pt-5">
            <div class="col-md-7" style="max-height: 700px">
                <div class="mb-5">
                    <div class="position-relative card-img">
                        <div id="thumbnail">
                            <img src="{{ $data['project']->thumbnail }}" width="100%" height="100%" alt="">
                            <a href="javascript:void(0)" id="play-button" data-video-id="{{ $data['project']->url }}">
                                <div class="play-button" data-video-id="DnKJ1NCxi5s" style="opacity: 1 !important;">
                                    <i class="fas fa-play"></i>
                                </div>
                            </a>

                        </div>
                        <div id="video-wrapper" class="w-100 h-100 video-wrapper" style="display: none;">
                            <iframe src="" frameborder="0" width="100%" height="100%"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 container-left">
                <div class="left-content">
                    <div class="portforlio-heading">
                        <h1>{{ $data['project']->title }}</h1>
                        <div class="feature-block">
                            <span style="color:#1E64A5">Tác giả</span> :
                            <span>{{ $data['project']->author->name ?? 'Admin' }}</span> <br>
                            <span style="color:#1E64A5">Ngày viết</span> :
                            <span>{{ \Carbon\Carbon::parse($data['project']->created_at)->format('d/m/Y') }}</span> <br>
                        </div>
                    </div>
                    <div class="detail_box wrap article" style="">
                        <div class="news-content">{!! $data['project']->description !!}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container service-cate-page related top30 bottom30 overflow-hidden">
            <h2 class="service-cate-title"
                style="text-align: center; margin-bottom: 40px; font-weight: bold; font-size: 24px;color:#1E64A5">
                Dự án nổi bật
            </h2>
            <div class="owl-carousel owl-theme" id="feature-carousel">
                @foreach ($data['feature'] as $item)
                    <div class="item">
                        <div class="service">
                            <a href="{{ url('du-an/' . $item->category->slug . '/' . $item->slug) }}">
                                <img src="{{ $item->thumbnail }}" alt="{{ $item->title }}" class="service-img lozad">
                            </a>
                            <div class="service-overlay">
                                <div class="blog-carousel-content">
                                    <h3 class="blog-cate-title">
                                        <a href="{{ url('du-an/' . $item->category->slug . '/' . $item->slug) }}">
                                            {{ $item->title }}
                                        </a>
                                    </h3>
                                    <p class="blog-cate-brief">{{ $item->content }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#play-button').click(function() {
            const videoId = $(this).attr('data-video-id');
            if (!videoId) {
                alert('Chưa có video!');
                return
            }
            $('.video-wrapper iframe').attr('src', `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`);
            $('#thumbnail').hide();
            $(this).hide();
            $('#video-wrapper').show();
        });
        // service carousel
        $('#feature-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: false,
            navText: [
                '<span class="owl-prev-icon">‹</span>',
                '<span class="owl-next-icon">›</span>'
            ],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1024: {
                    items: 4
                }
            }
        });
    </script>
@endpush
<style>
    .container-left {
        max-height: 700px;
        overflow-y: scroll;
    }

    #feature-carousel .item {
        background: #fff;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    #feature-carousel .item:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .item a:hover {
        text-decoration: none;
        color: #fff;
    }


    @media (max-width: 768px) {
        .container-left {
            max-height: unset;
            overflow-y: unset;
            padding: 20px !important;
        }
    }
</style>
