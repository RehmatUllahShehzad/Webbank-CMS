<div class="newsroom-detail">

    <img src="{{ asset($newsdata->feature) }}" alt="" class="img-fluid" />
    <h1>{{ $newsdata->title }}</h1>
    <span>{{ $newsdata->date->format('M, d Y') }}</span>
    <br /> <br />
    <p>{!! $newsdata->description !!}</p>

</div>
