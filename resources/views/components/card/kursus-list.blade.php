@props([
    'price',
    'name',
    'duration',
    'image',
    'slug',
    'thumbnail',
    'benefits'
])
<div class="col-xl-4 col-md-6 wow fadeInUp animated" data-wow-delay="100ms"
    style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
    <div class="course-two__item">
        <div class="course-two__thumb">
            <img src="{{ Storage::url($thumbnail) }}" alt="eduact" style="height: 200px"  >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 353 177">
                <path
                    d="M37 0C16.5655 0 0 16.5655 0 37V93.4816C0 103.547 4.00259 113.295 11.7361 119.737C54.2735 155.171 112.403 177 176.496 177C240.589 177 298.718 155.171 341.261 119.737C348.996 113.295 353 103.546 353 93.4795V37C353 16.5655 336.435 0 316 0H37Z">
                </path>
            </svg>
        </div><!-- /.course-thumb -->
        <div class="course-two__content">
            <div class="course-two__time">{{ $duration }} Hours</div>
            <h3 class="course-two__title" style="height: 70px">
                <a href="{{ route('landing.kursus.detail' , ['slug' => $slug]) }}" class="mb-2">{{ $name }}</a>
                <br />
                @foreach ($benefits as $benefit )
                    <span class="badge bg-success" >{{ $benefit }}</span>
                @endforeach
            </h3>
            <div class="course-two__bottom">
                <div class="course-two__author">
                    <img src="landing/assets/images/course/author-1.png" alt="eduact">
                    <h5 class="course-two__author__name">Price</h5>
                </div>
                <div class="course-two__meta">
                    <h4 class="course-two__meta__price">
                        {{ Number::currency($price, 'IDR', 'ID', 2) }}
                    </h4>
                    <p class="course-two__meta__class"></p>
                </div>
            </div>
        </div>
    </div>

</div>
