@extends('layouts.base-landing')

@section('title', $title ?? 'Cendekiawan Course')

@section('content')
    {{ $slot }}

    <footer class="main-footer-two">
        <div class="main-footer-two__bg"
            style="background-image: url({{ asset('landing/assets/images/shapes/footer-bg-2.png') }});"
        ></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-5 wow fadeInUp" data-wow-delay="100ms">
                    <div class="main-footer-two__about">
                        <a href="/" class="main-footer-two__logo">
                            <img
                                src="{{ asset('logo.png') }}"
                                alt="eduact"
                                width="159"
                                height="40"
                            >
                        </a><!-- /.footer-logo -->
                        <ul class="main-footer-two__info-list">
                            <li><span class="icon-Location"></span>
                                {{ getMetadata('metadata_location') }}
                            </li>
                            <li><span class="icon-Telephone"></span><a
                                    href="tel:{{ getMetadata('metadata_phone_number') }}"
                                >
                                    {{ getMetadata('metadata_phone_number') }}
                                </a></li>
                            <li><span class="icon-Email"></span><a
                                    href="mailto:{{ getMetadata('metadata_email') }}"
                                >{{ getMetadata('metadata_email') }}</a></li>
                        </ul>
                        <div class="main-footer-two__social">
                            <a href="{{ getMetadata('metadata_instagram') }}" class="me-2" target="__blank"><i
                                    class="fab fa-instagram"
                                ></i></a> <span class="fw-bold text-white ">instagram</span>
                        </div><!-- /.footer-social -->
                    </div><!-- footer-top -->
                </div>
                <div class="col-xl-3 col-md-4 wow fadeInUp" data-wow-delay="200ms">
                    <div class="main-footer-two__navmenu main-footer-two__widget01">
                        <h3 class="main-footer-two__title">Quick Links</h3>
                        <ul>
                            <li><a href="{{ route('landing.kursus.list') }}">Kursus</a></li>

                        </ul><!-- /.list-unstyled -->
                    </div><!-- /.footer-menu -->
                </div>
                <div class="col-xl-2 col-md-3 wow fadeInUp" data-wow-delay="300ms">
                    <div class="main-footer-two__navmenu main-footer-two__widget02">

                    </div><!-- /.footer-menu -->
                </div>
                <div class="col-xl-3 col-md-12 wow fadeInUp" data-wow-delay="400ms">

                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </footer>
@endsection
