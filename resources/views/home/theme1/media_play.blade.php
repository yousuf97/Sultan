@extends('templates.theme1')
@section('content')

    <div class="ms_album_single_wrapper ms_artist_single">
        @if ($media->mType == 'video')
        <div class="row">
            <div class="col-md-5">
                <div class="album_single_data">
                    <div class="album_single_img">
                        <img src="{{ asset('storage/' . $media->mThumbnail) }}" alt="" class="img-fluid">
                    </div>

                    <div class="album_single_text">
                        <h2>{{$media->uName}}</h2>
                        <p class="singer_name">Category: {{$media->mcategory}}</p>
                        <div class="about_artist">
                            {{$media->mDescription}}
                        </div>
                        <div class="album_btn">
                            <a  href="javascript:void(0)" post_id = "{{$media->media_entry_id}}" input_action="add_playlist" onclick="post_action(this)" class="ms_btn">Add To Favorites</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <video id="videojs-hls-quality-selector-player" class="video-js vjs-default-skin" width="640" height="360" controls>
                    <source src="{{ asset('storage/' . $media->fUrl) }}" type="{{$media->mimeType}}">
                </video>

            </div>
        </div>
        @endif

        @if ($media->mType == 'audio' || $media->mType == 'image')
        <div class="album_single_data">
            @if ($media->mType == 'image')
            <div class="album_single_img image-set" id="photo-viewer">
                <a data-gallery="photoviewer" data-title="{{$media->mTitle}}" data-group="a"
                    href="{{ asset('storage/' . $media->fUrl) }}">
                    <img src="{{ asset('storage/' . $media->mThumbnail) }}" alt="">
                </a>
            </div>
            @endif
            @if ($media->mType == 'audio')
            <div class="album_single_img">
                <img src="{{ asset('storage/' . $media->mThumbnail) }}" alt="" class="img-fluid">
            </div>
            @endif

            <div class="album_single_text">
                <h2>{{$media->uName}}</h2>
                <p class="singer_name">Category: {{$media->mType}}</p>
                <div class="about_artist">
                    {{$media->mDescription}}
                </div>
                <div class="album_btn">
                    @if ($media->mType == 'image')
                        <a id="photo-viewer-view" data-gallery="photoviewer" href="#" class="ms_btn">View</a>
                    @endif
                    @if ($media->mType == 'audio')
                    <a href="#" class="ms_btn play_btn"><span class="play_all"><img src="{{ asset('home/theme1/images/svg/play_all.jpg') }}"
                        alt="">Play</span></a>
                    @endif

                    <a href="javascript:void(0)" post_id = "{{$media->media_entry_id}}" input_action="add_playlist" onclick="post_action(this)" class="ms_btn"><span class="play_all">Add To
                        Favorites</span></a>
                </div>
            </div>

        </div>

        @endif


        <!----Song List---->
        <div class="album_inner_list marger_top60">
            <div class="ms_heading">
                <h1>Recently Played</h1>
            </div>
            <div class="album_list_wrapper">
                <ul class="album_list_name">
                    <li>#</li>
                    <li>Song Title</li>
                    <li>Artist</li>
                    <li class="text-center">Type</li>
                    <li class="text-center">Mime Type</li>
                    <li class="text-center">Duration</li>
                </ul>

                @foreach ($recent_views as $uploads)
                <ul>
                    <li>
                        <a href="{{ url('media/play/'.encript($uploads->media_entry_id)) }}"><span class="play_no">{{ $loop->index+1 }}</span><span class="play_hover"></span></a>
                    </li>
                    <li class="cut_text"><a href="#">{{$uploads->mTitle}}</a></li>
                    <li><a href="#">{{$uploads->uName}}</a></li>
                    <li class="text-center"><a href="#">{{$uploads->mType}}</a></li>
                    <li class="text-center"><a href="#">{{$uploads->mimeType}}</a></li>
                    <li class="text-center"><a href="#">{{gmdate("H:i:s", $uploads->mDuration)}}</a></li>
                </ul>
                @endforeach

            </div>
        </div>
    </div>


    <!---Main Content Start--->
        <div class="ms_content_wrapper ms_artist_content">
            <div class="ms_featured_slider">
                <div class="ms_heading">
                    <h1>Other popular {{$media->mcategory}}s</h1>
                    {{-- <span class="veiw_all"><a href="#">view more</a></span> --}}
                </div>
                <div class="ms_relative_inner">
                    <div class="ms_feature_slider swiper-container">
                        <div class="swiper-wrapper">

                            @foreach ($category_based_medias as $uploads)
                            <div class="swiper-slide">
                                <div class="ms_rcnt_box">
                                    <div class="ms_rcnt_box_img">
                                        <img src="{{ asset('storage/' . $uploads->media_thumbnail) }}" alt="">
                                        <div class="ms_main_overlay">
                                            <div class="ms_box_overlay"></div>

                                            @auth
                                            <div class="ms_more_icon">
                                                <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                            </div>
                                            <ul class="more_option">
                                                {!! media_short_icons($uploads->id) !!}
                                            </ul>
                                            @endauth

                                            @if ($uploads->media_type == 'audio')
                                            <a  class="ms_play_icon" onclick="init_audio_player({{$uploads->id}})" >
                                                <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                            </a>
                                            @endif
                                            @if ($uploads->media_type == 'image')
                                            <a  class="ms_play_icon" href="{{ url('media/play/'.encript($uploads->id)) }}" >
                                                <img src="{{ asset('home/theme1/images/svg/view.svg') }}" alt="">
                                            </a>
                                            @endif
                                            @if ($uploads->media_type == 'video')
                                            <a href="{{ url('media/play/'.encript($uploads->id)) }}" class="ms_play_icon" >
                                                <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                            </a>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="ms_rcnt_box_text">
                                        <h3 class="cut_text"><a href="#">{{$uploads->title}}</a></h3>
                                        <p class="cut_text">{{$uploads->description}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next1 slider_nav_next"></div>
                    <div class="swiper-button-prev1 slider_nav_prev"></div>
                </div>
            </div>
            <!----Live Radio Section Start---->
            <div class="ms_radio_wrapper padder_top20">
                <div class="ms_heading">
                    <h1>Best of {{$media->uName}}</h1>
                    {{-- <span class="veiw_all"><a href="#">view more</a></span> --}}
                </div>
                <div class="ms_radio_slider swiper-container">
                    <div class="swiper-wrapper">

                        @foreach ($artist_based_medias as $uploads)
                            <div class="swiper-slide">
                                <div class="ms_rcnt_box">
                                    <div class="ms_rcnt_box_img">
                                        <img src="{{ asset('storage/' . $uploads->media_thumbnail) }}" alt="">
                                        <div class="ms_main_overlay">
                                            <div class="ms_box_overlay"></div>

                                            @auth
                                            <div class="ms_more_icon">
                                                <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                            </div>
                                            <ul class="more_option">
                                                {!! media_short_icons($uploads->id) !!}
                                            </ul>
                                            @endauth

                                            @if ($uploads->media_type == 'audio')
                                            <a  class="ms_play_icon" onclick="init_audio_player({{$uploads->id}})" >
                                                <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                            </a>
                                            @endif
                                            @if ($uploads->media_type == 'image')
                                            <a  class="ms_play_icon" href="{{ url('media/play/'.encript($uploads->id)) }}" >
                                                <img src="{{ asset('home/theme1/images/svg/view.svg') }}" alt="">
                                            </a>
                                            @endif
                                            @if ($uploads->media_type == 'video')
                                            <a href="{{ url('media/play/'.encript($uploads->id)) }}" class="ms_play_icon" >
                                                <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="ms_rcnt_box_text">
                                        <h3 class="cut_text"><a href="#">{{$uploads->title}}</a></h3>
                                        <p class="cut_text">{{$uploads->description}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach



                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next4 slider_nav_next"></div>
                <div class="swiper-button-prev4 slider_nav_prev"></div>
            </div>
            <!----Main div close---->
        </div>

@endsection
