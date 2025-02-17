@extends('client.layouts.master')
@section('title', 'Trang chủ')
@section('content')
    <div data-bs-spy="scroll" class="scrollspy-example">
        @include('client.components.home.banner')
        @include('client.components.home.introduce')
        <section id="landingPricing">
            <div class="journey py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="text-primary fw-bold fs-2 text-uppercase" data-aos="fade-up">
                                Với gần 20 năm chinh phục những con số ấn tượng
                            </h2>
                            <div class="statistics">
                                <div class="card card-border-shadow-primary h-100" data-aos="fade-up">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="avatar me-4">
                                                <span class="avatar-initial rounded bg-label-primary">
                                                    <i class="fas fa-users"></i>
                                                </span>
                                            </div>
                                            <h4 class="mb-0">200,000+</h4>
                                        </div>
                                        <p class="mb-1">Khách hàng trên toàn quốc</p>
                                    </div>
                                </div>
                                <div class="card card-border-shadow-primary h-100" data-aos="fade-up">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="avatar me-4">
                                                <span class="avatar-initial rounded bg-label-primary">
                                                    <i class="ti ti-gift"></i>
                                                </span>
                                            </div>
                                            <h4 class="mb-0">1000+</h4>
                                        </div>
                                        <p class="mb-1">Tham gia sự kiện lớn</p>
                                    </div>
                                </div>
                                <div class="card card-border-shadow-primary h-100" data-aos="fade-up">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="avatar me-4">
                                                <span class="avatar-initial rounded bg-label-primary">
                                                    <i class="ti ti-users-plus"></i>
                                                </span>
                                            </div>
                                            <h4 class="mb-0">100+</h4>
                                        </div>
                                        <p class="mb-1">nhân sự chất lượng cao</p>
                                    </div>
                                </div>
                                <div class="card card-border-shadow-primary h-100" data-aos="fade-up">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="avatar me-4">
                                                <span class="avatar-initial rounded bg-label-primary">
                                                    <i class="ti ti-user-star"></i>
                                                </span>
                                            </div>
                                            <h4 class="mb-0">30+</h4>
                                        </div>
                                        <p class="mb-1">Đối tác trên toàn quốc</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card w-100 h-100 p-2" data-aos="fade-up">
                                <iframe src="https://www.google.com/maps/" id="map-iframe" frameborder="0" style="border-radius: 12px; z-index: 1; min-height: 500px ;"
                                    width="100%" height="100%">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('client.components.home.service')
        @include('client.components.home.reviews')
        @include('client.components.home.contact')
    </div>
@endsection
