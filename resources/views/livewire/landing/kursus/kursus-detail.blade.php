<section class="course-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="course-details__thumb">
                    <img
                        src="{{ Storage::url($kursus->thumbnail) }}"
                        alt="eduact"
                    >
                </div><!-- details-thumb -->
                <div class="course-details__meta">
                    <div class="course-details__meta__author">
                        <h5 class="course-details__meta__name"></h5>
                        <p class="course-details__meta__designation"></p>
                    </div>
                    <div class="course-details__meta__price">
                        {{ Number::currency($kursus->price, 'IDR', 'ID', 2) }}
                    </div>
                </div><!-- details-meta -->
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
                            <li><i class="icon-book"></i>
                                Total Schedule:
                                <span class="text-end">{{ $kursus->jadwals()->count() }}</span>
                            </li>
                            <li>
                                <i class="icon-book"></i>
                                Last Schedule:
                                <span
                                    class="text-end">{{ $lastSchedule->format('Y-m-d H:i a') ?? 'None' }}</span>
                            </li>
                        </ul>
                        <a
                            href="{{ route('landing.kursus.booking' , ['slug' => $kursus->slug]) }}"
                            class="eduact-btn eduact-btn-second"
                        >
                            <span class="eduact-btn__curve">
                            </span>Booking<i class="icon-arrow"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
