@extends('client.layouts.master')
@section('title', $data['category']->name)
@section('content')
    <div class="mb-3">
        <section class="post-wrapper-top jt-shadow heading-top clearfix" style="">
            <div class="container-fluid" style="padding: 10px 5%;">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1>{{ $data['category']->name }}</h1>
                        <ul class="breadcrumb">
                            <span><a class="link" href="/">Trang Chủ</a></span>
                            <span class="dark">/</span>
                            <li class="active">{{ $data['category']->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <div class="global container home_service_calatogue top30">
            <div class="home-service-cate top30">
                @if (count($data['project']) > 0)
                    <div class="projects-grid">
                        @foreach ($data['project'] as $project)
                            <div class="project-card" data-aos="zoom-in" data-aos-delay="300">
                                <div class="project-media">
                                    <img src="{{ $project->thumbnail }}" class="project-image" alt="Sunshine Complex">
                                    <div class="play-button" data-video-id="{{ $project->url }}">
                                        <i class="fas fa-play"></i>
                                    </div>
                                    <span class="project-badge" data-aos="fade-up"
                                        data-aos-delay="200">{{ $data['category']->name }}</span>
                                </div>
                                <div class="project-content">
                                    <h3 class="project-title">{{ $project->title }}</h3>
                                    <p class="project-description">{{ $project->content }}</p>
                                    <div class="project-meta">
                                        <a href="{{ url('/du-an/' . $data['category']->slug . '/' . $project->slug) }}"
                                            class="read-more">Xem dự án <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="mx-auto justify-center">
                        @include('client.components.empty')
                    </div>
                @endif
            </div>
            <div class="mx-auto mt-4 d-flex justify-content-center">
                {{ $data['project']->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
