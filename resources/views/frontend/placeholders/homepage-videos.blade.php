
    <div class="video-plugin-main" data-aos="fade-up" data-aos-duration="2000" data-aos-once="true">
        <div class="video-plugin-upper">
            @foreach (getHomepageVideos() as $video)
                <div class="video-plugin-upper-img">

                    <video poster="{{$video->image}}" class="vone" width="100%" height="755" playsinline  controls >
                        <source src="{{$video->video}}" type="video/mp4" /> 
                        <source src="{{$video->video}}" type="video/webm" /> 
                        <!-- <source src="https://videos.dotlogicstest.com/webm/502117167.webm" type="video/webm" /> -->
                        <!-- <source src="media/dr-dawson.mov" type="video/mov"></source> -->
                        Your browser does not support the video tag.
                    </video>
                </div>   
            @endforeach
        </div>
        <div class="video-plugin-lowery" data-aos="fade-left" data-aos-duration="2000" data-aos-once="true">
            <div class="position-relative w-100 h-100" style="overflow: hidden">
                <a class="toggle-menu active">
                    <em class="fas fa-angle-right"></em>
                </a>
                <div class="video-plugin-lower-main open">
                    <h3>Watch more</h3>
                    <div class="video-plugin-lower">
                @foreach (getHomepageVideos() as $video)
                        <div class="video-plugin-lower-img">
                            <div class="video-thimbnail video-one">
                                <img src="{{$video->s_thumbnail}}" alt="" />
                                <p>{{$video->description}}</p>
                            </div>
                        </div>
                @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>