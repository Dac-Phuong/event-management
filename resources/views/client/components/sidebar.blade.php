<div class="hidden-xs hidden-sm col-md-4 col-lg-4">
    <div id="sidebar" class="new-sidebar">
        <div class="widget-sidebar" style="">
            <div class="title">
                <p>TIN MỚI NHẤT</p>
            </div>
            @foreach ($data['new'] as $item)
                <div class="most-pop-post top20">
                    <a title="Mẫu Kịch Bản Khai Trương Doanh Nghiệp Chi Tiết"
                        href="{{ url('/blog/' . $item->category->slug . '/' . $item->slug) }}">
                        <img class="most-pop-img lozad" data-src="{{ $item->thumbnail }}" src="{{ $item->thumbnail }}"
                            alt="Mẫu Kịch Bản Khai Trương Doanh Nghiệp Chi Tiết" data-loaded="true">
                    </a>
                    <div class="most-pop-post-title">
                        <a title="Mẫu Kịch Bản Khai Trương Doanh Nghiệp Chi Tiết"
                            href="{{ url('/blog/' . $item->category->slug . '/' . $item->slug) }}">
                            <h5>{{ $item->title }}.</h5>
                        </a>
                        <a href="/blog">
                            <p style="font-size:11px;font-weight: bold;">{{ $item->category->name }} <span>•&nbsp;
                                    {{ $item->created_at }}</span>
                            </p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="widget-sidebar" style="">
            <div class="title">
                <p>tin nổi bật</p>
            </div>
            @foreach ($data['featured'] as $item)
                <div class="most-pop-post top20">
                    <a title="Kịch bản MC sự kiện" href="{{ url('/blog/' . $item->category->slug . '/' . $item->slug) }}">
                        <img class="most-pop-img lozad" data-src="{{ $item->thumbnail }}"
                            src="{{ $item->thumbnail }}" alt="Kịch bản MC sự kiện" data-loaded="true">
                    </a>
                    <div class="most-pop-post-title">
                        <a title="Kịch bản MC sự kiện" href="{{ url('/blog/' . $item->category->slug . '/' . $item->slug)}}">
                            <h5>{{ $item->title }}</h5>
                        </a>
                        <a title="Tin Tức" href="/tin-tuc">
                            <p style="font-size:11px;font-weight: bold;">{{ $item->category->name }} <span>•&nbsp; {{ $item->created_at }}</span>
                            </p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

