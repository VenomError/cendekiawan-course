<div class="">
    <x-section.header-overlay title="Kursus" />

    <section class="course-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="course-details__thumb">
                        <img src="{{ Storage::url($kursus->thumbnail) }}" alt="eduact">
                    </div><!-- details-thumb -->
                    <div class="course-details__meta">
                        <div class="course-details__meta__author">
                            <img src="{{ asset(Storage::url($kursus->teacher_foto)) }}"
                                alt=""
                            >
                            <h5 class="course-details__meta__name">
                                {{ $kursus->teacher_name ?? '-' }}</h5>
                            <p class="course-details__meta__designation">Teacher</p>
                        </div>
                        <div class="course-details__meta__cats"></div>
                        <div class="course-details__meta__ratings">

                        </div>
                        <div class="course-details__meta__price">
                            {{ Number::currency($kursus->price, 'IDR', 'ID') }}
                        </div>
                    </div>
                    <h3 class="course-details__title">{{ Str::title($kursus->name) }}</h3>
                    <!-- details-title -->
                    <div class="course-details__tabs tabs-box">

                        {!! $kursus->description !!}
                    </div>
                    <!-- tabs -->
                </div>
                <div
                    class="col-xl-4 wow fadeInRight animated"
                    data-wow-delay="300ms"
                    style="visibility: visible; animation-delay: 300ms; animation-name: fadeInRight;"
                >
                    <div class="course-details__sidebar">
                        <div class="course-details__sidebar__item">
                            <h3 class="course-details__sidebar__title">Course Detail</h3>
                            <ul class="course-details__sidebar__lists clerfix">
                                <li><i
                                        class="icon-history"></i>Duration:<span>{{ $kursus->hour_duration }}</span>
                                </li>
                                <li>
                                    <i class="icon-history"></i>
                                    Duration:
                                    <span>{{ convertHoursToDaysAndHours($kursus->hour_duration) }}</span>
                                </li>
                                  <li>
                                    <i class="icon-map-marker"></i>
                                    Location:
                                    <span>{{ $location }}</span>
                                </li>
                                <li><i
                                        class="icon-reading"></i>Teacher:<span>{{ $kursus->teacher_name ?? '-' }}</span>
                                </li>
                                <li><i class="icon-book"></i>
                                    Active Schedule:
                                    <span class="text-end">{{ $kursus->jadwalCountStart }}</span>
                                </li>
                                <li>
                                    <i class="icon-book"></i>
                                    Last Schedule:
                                    <span
                                        class="text-end">{{ $lastSchedule?->format('Y-m-d H:i a') ?? 'None' }}</span>
                                </li>
                                @foreach ($kursus->benefits as $item)
                                    <li>
                                        @if ($loop->first)
                                        Benefit
                                        @endif
                                        <span>{{ $item }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <a href="{{ route('landing.kursus.booking', ['slug' => $kursus->slug]) }}"
                                class="eduact-btn eduact-btn-second"
                            >
                                <span class="eduact-btn__curve">
                                </span>Register<i class="icon-arrow"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
