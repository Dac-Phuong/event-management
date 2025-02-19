<div class="container pb-5" data-aos="fade-up">
    <h2 class="text-primary fw-bold text-center text-uppercase" >Dịch vụ của chúng tôi</h2>
    <div class="row row-cols-1 row-cols-md-3 g-6 mb-12 mt-5">
        @foreach ($services as $service)
            <div class="col mb-3">
                <div class="card h-100 card-hover">
                    <a href="{{ url('service', $service->slug) }}" class="overflow-hidden">
                        <img class="card-img-top hover" style="height: 270px" width="100%"
                            src="{{ asset($service->thumbnail) }}" alt="Card image cap"></a>
                    <div class="card-body">
                        <a href="{{ url('service', $service->slug) }}">
                            <h5 class="card-title">{{ $service->name }}</h5>
                        </a>
                        <p class="card-text truncate-3">
                           {{$service->description}}
                        </p>
                        <a href="{{ url('service', $service->slug) }}" class="btn btn-primary rounded-pill">Xem thêm <i
                                class="ti ti-arrow-right" style="margin-left: 5px"></i> </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
