@foreach (getSlider() as $slider)
    <div class="home-banner" style="background-image: url('{{ $slider->image }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="home-banner-tex-wrap">
                        <div class="home-banner-text div-flex">
                            <h1>
                                {{ $slider->title }}
                            </h1>
                            {!! $slider->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
