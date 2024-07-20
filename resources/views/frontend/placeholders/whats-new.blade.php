@if (count($newses = getAllNews()))
    <div class="newsroom-head">
        <h2>What’s New?</h2>
    </div>
    <div class="news-card-main div-flex">
        @foreach ($newses as $news)
            <div class="news-card">
                <a href="{{ route('news.show',$news->slug) }}" class="news-card-img" style="background-image: url('{{$news->feature}}')"></a>
                <h3>{{$news->title}}</h3>
                <span>{{date("M, d Y", strtotime($news->date))}}</span>
                <div class="read-more">
                    <a href="{{ route('news.show',$news->slug) }}">
                        Read More 
                        <svg width="9" height="10" viewBox="0 0 9 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.79619 7.08399V0.972992H2.70019V2.20399H6.66819L0.492188 8.36399L1.40419 9.29199L7.54819 3.11599V7.06799L8.79619 7.08399Z" fill="#A5D9C5"/>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach 
    </div>
@else
<div class="w-100 text-center py-4">
    <h5 style="color: #013068;">There is no news avaiable</h5>
</div>
@endif