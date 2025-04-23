<div>
    <x-section.header-overlay title="Kursus" />

    <section class="course-two course-two--page">
        <div class="course-two__shape-top wow fadeInRight animated" data-wow-delay="300ms"
            style="visibility: visible; animation-delay: 300ms; animation-name: fadeInRight;"><img
                src="landing/assets/images/shapes/course-shape-1.png" alt="eduact"></div>
        <div class="container">
            <div class="row">
                @foreach ($kursuses as $kursus)
                    <x-card.kursus-list  
                        :duration="$kursus->hour_duration"  
                        :name="$kursus->name"    
                        :price="$kursus->price"    
                        :image="$kursus->thumbnail"
                    />
                @endforeach
            </div>
        </div>
        <div class="course-two__shape-bottom wow fadeInLeft animated" data-wow-delay="400ms"
            style="visibility: visible; animation-delay: 400ms; animation-name: fadeInLeft;"><img
                src="landing/assets/images/shapes/course-shape-2.png" alt="eduact"></div>
    </section>
</div>
