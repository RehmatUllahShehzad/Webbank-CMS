<div class="testimonials">
    @foreach (getHomepageTestimonials() as $testimonial)
        <div class="testimonial-card">
            <div class="testimonial-ratings">
                <img class="lazy" data-src="/images/ratings.png" alt="5 ratings" class="img-fluid" />
            </div>
            <p>{{$testimonial->description}}</p> 
            <strong>{{ $testimonial->name }}</strong>
        </div>
    @endforeach
</div>