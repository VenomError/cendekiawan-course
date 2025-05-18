<div>
    <x-section.header-overlay title="Riwayat Pendaftaran" />
    <section class="blog-page">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($riwayats as $pendaftar)
                @php
                    $pendaftar->load(['jadwal']);
                @endphp

                
                    <div class="col-xl-8 col-lg-7 mb-4">
                        <div class="row">
                            <div
                                class="col-xl-12 col-lg-12 col-md-12 wow fadeInUp"
                                data-wow-delay="200ms"
                                style="visibility: hidden; animation-delay: 200ms; animation-name: none;"
                            >
                            
                                <div class="blog-two__item blog-two__item--list">
                                    <div class="blog-two__content">
                                        <div class="blog-two__top-meta">
                                            <div class="blog-two__cats bg-{{ pendaftarStatusColor($pendaftar->status) }} rounded ">
                                                <a class="text-white">{{ $pendaftar->status }}</a>
                                            </div>
                                            <div class="blog-two__date">
                                                <i class="icon-clock"></i>
                                                {{ $pendaftar->jadwal->start_datetime?->format('D d M, Y h:i a') }}
                                            </div>
                                        </div>
                                        <h3 class="blog-two__title">
                                            <a href="{{ route('landing.kursus.detail' , ['slug' => $pendaftar->jadwal?->kursus?->slug]) }}">
                                               {{ $pendaftar->jadwal?->kursus?->name }}
                                            </a>
                                        </h3><!-- /.blog-title -->
                                     
                                        <div class="blog-two__meta">
                                          
                                        </div><!-- /.blog-meta -->
                                    </div><!-- /.blog-content -->
                                </div><!-- /.blog-two-one -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
