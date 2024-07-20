@foreach (getNews() as $news)
    <div class="newsroom-head">
        <h2>Featured:</h2>
    </div>
    <div class="newsroom-featured div-flex">
        <div class="newsroom-featured-img">
            <img src="{{ asset($news->feature) }}" alt="">
        </div>
        <div class="news-card">
            <h3>{{ $news->title }}</h3>
            <span>{{ $news->date->format('M, d Y') }}</span>
            <p> {{$news->getDescription(30)}}</p>
            <div class="read-more">
                <a href="{{ route('news.show',$news->slug) }}">
                    Read More
                    <svg width="9" height="10" viewBox="0 0 9 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.79619 7.08399V0.972992H2.70019V2.20399H6.66819L0.492188 8.36399L1.40419 9.29199L7.54819 3.11599V7.06799L8.79619 7.08399Z"
                            fill="#A5D9C5"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endforeach
