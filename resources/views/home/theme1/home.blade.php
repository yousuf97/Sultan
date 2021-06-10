  @extends('templates.theme1')
  @section('content')
            <!---Banner--->
            <div class="ms-banner">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="ms_banner_img">
                                <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(1,'banner_img_file')) }}" alt="" class="img-fluid">
                            </div>
                            <div class="ms_banner_text">
                                <h1>{{get_settings_meta_by_termid_metaKey(1,'title1')}}</h1>
                                <h1 class="ms_color">{{get_settings_meta_by_termid_metaKey(1,'title2')}}</h1>
                                <p>{{get_settings_meta_by_termid_metaKey(1,'description')}}</p>
                                <div class="ms_banner_btn">
                                    <a href="{{ url(get_settings_meta_by_termid_metaKey(1,'btn_1_link')) }}" class="ms_btn">{{get_settings_meta_by_termid_metaKey(1,'btn_1_label')}}</a>
                                    <a href="{{ url(get_settings_meta_by_termid_metaKey(1,'btn_2_link')) }}" class="ms_btn">{{get_settings_meta_by_termid_metaKey(1,'btn_2_label')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---Recently Played Music--->
            <div class="ms_rcnt_slider">
                <div class="ms_heading">
                    <h1>Recently Uploaded</h1>
                </div>
                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        @foreach ($recently_uploaded as $uploads)
                        <div class="swiper-slide">
                            <div class="ms_rcnt_box">
                                <div class="ms_rcnt_box_img">
                                    <img src="{{ asset('storage/' . $uploads->media_thumbnail) }}" alt="">
                                    <div class="ms_main_overlay">
                                        <div class="ms_box_overlay"></div>
                                        <div class="ms_more_icon">
                                            <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                        </div>
                                        <ul class="more_option">
                                            {!! media_short_icons($uploads->id) !!}
                                        </ul>
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
                <div class="swiper-button-next slider_nav_next"></div>
                <div class="swiper-button-prev slider_nav_prev"></div>
            </div>
            <!---Weekly Top 15--->
            @if (count($top_score_media_chunks) > 0)
            <div class="ms_weekly_wrapper">
                <div class="ms_weekly_inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ms_heading">
                                <h1>Top scored</h1>
                            </div>
                        </div>
                        @if (count($top_score_media_chunks) >= 1)
                        <div class="col-lg-4 col-md-12 padding_right40">
                            @php
                            $counter = 1;
                            @endphp
                            @foreach ($top_score_media_chunks[0] as $top_media)
                            <div class="ms_weekly_box">
                                <div class="weekly_left">
                                    <span class="w_top_no">
										{{sprintf("%02d", $counter++)}}
									</span>
                                    <div class="w_top_song">
                                        <div class="w_tp_song_img">
                                            <img width="50" src="{{ asset('storage/' . $top_media->mThumbnail) }}" alt="" class="img-fluid">
                                            <div class="ms_song_overlay">
                                            </div>

                                            @if ($top_media->mType == 'audio')
                                            <a  class="ms_play_icon" onclick="init_audio_player({{$top_media->media_entry_id}})" >
                                                <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                            </a>
                                            @endif
                                            @if ($top_media->mType == 'image')
                                            <a  class="ms_play_icon" href="{{ url('media/play/'.encript($top_media->media_entry_id)) }}" >
                                                <img src="{{ asset('home/theme1/images/svg/view.svg') }}" alt="">
                                            </a>
                                            @endif
                                            @if ($top_media->mType == 'video')
                                            <a href="{{ url('media/play/'.encript($top_media->media_entry_id)) }}" class="ms_play_icon" >
                                                <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                            </a>
                                            @endif


                                        </div>
                                        <div class="w_tp_song_name">
                                            <h3><a href="#">{{$top_media->mTitle}}</a></h3>
                                            <p>{{$top_media->mCategory}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="weekly_right">
                                    <span class="w_song_time">{{gmdate("H:i:s", $top_media->mFileDuration)}}</span>
                                    <span class="ms_more_icon" data-other="1">
										<img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
									</span>
                                </div>
                                <ul class="more_option">
                                    {!! media_short_icons($top_media->media_entry_id) !!}
                                </ul>
                            </div>
                            <div class="ms_divider"></div>
                            @endforeach

                        </div>
                        @endif

                        @if (count($top_score_media_chunks) >= 2)
                        <div class="col-lg-4 col-md-12 padding_right40">
                            @foreach ($top_score_media_chunks[1] as $top_media)
                            <div class="ms_weekly_box">
                                <div class="weekly_left">
                                    <span class="w_top_no">
										{{sprintf("%02d", $counter++)}}
									</span>
                                    <div class="w_top_song">
                                        <div class="w_tp_song_img">
                                            <img width="50" src="{{ asset('storage/' . $top_media->mThumbnail) }}" alt="" class="img-fluid">
                                            <div class="ms_song_overlay">
                                            </div>

                                            @if ($top_media->mType == 'audio')
                                            <a  class="ms_play_icon" onclick="init_audio_player({{$top_media->media_entry_id}})" >
                                                <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                            </a>
                                            @endif
                                            @if ($top_media->mType == 'image')
                                            <a  class="ms_play_icon" href="{{ url('media/play/'.encript($top_media->media_entry_id)) }}" >
                                                <img src="{{ asset('home/theme1/images/svg/view.svg') }}" alt="">
                                            </a>
                                            @endif
                                            @if ($top_media->mType == 'video')
                                            <a href="{{ url('media/play/'.encript($top_media->media_entry_id)) }}" class="ms_play_icon" >
                                                <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                            </a>
                                            @endif


                                        </div>
                                        <div class="w_tp_song_name">
                                            <h3><a href="#">{{$top_media->mTitle}}</a></h3>
                                            <p>{{$top_media->mCategory}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="weekly_right">
                                    <span class="w_song_time">{{gmdate("H:i:s", $top_media->mFileDuration)}}</span>
                                    <span class="ms_more_icon" data-other="1">
										<img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
									</span>
                                </div>
                                <ul class="more_option">
                                    {!! media_short_icons($top_media->media_entry_id) !!}
                                </ul>
                            </div>
                            <div class="ms_divider"></div>
                            @endforeach
                        </div>
                        @endif

                        @if (count($top_score_media_chunks) >= 3)
                        <div class="col-lg-4 col-md-12">
                            @foreach ($top_score_media_chunks[2] as $top_media)
                            <div class="ms_weekly_box">
                                <div class="weekly_left">
                                    <span class="w_top_no">
										{{sprintf("%02d", $counter++)}}
									</span>
                                    <div class="w_top_song">
                                        <div class="w_tp_song_img">
                                            <img width="50" src="{{ asset('storage/' . $top_media->mThumbnail) }}" alt="" class="img-fluid">
                                            <div class="ms_song_overlay">
                                            </div>

                                            @if ($top_media->mType == 'audio')
                                            <a  class="ms_play_icon" onclick="init_audio_player({{$top_media->media_entry_id}})" >
                                                <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                            </a>
                                            @endif
                                            @if ($top_media->mType == 'image')
                                            <a  class="ms_play_icon" href="{{ url('media/play/'.encript($top_media->media_entry_id)) }}" >
                                                <img src="{{ asset('home/theme1/images/svg/view.svg') }}" alt="">
                                            </a>
                                            @endif
                                            @if ($top_media->mType == 'video')
                                            <a href="{{ url('media/play/'.encript($top_media->media_entry_id)) }}" class="ms_play_icon" >
                                                <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                            </a>
                                            @endif


                                        </div>
                                        <div class="w_tp_song_name">
                                            <h3><a href="#">{{$top_media->mTitle}}</a></h3>
                                            <p>{{$top_media->mCategory}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="weekly_right">
                                    <span class="w_song_time">{{gmdate("H:i:s", $top_media->mFileDuration)}}</span>
                                    <span class="ms_more_icon" data-other="1">
										<img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
									</span>
                                </div>
                                <ul class="more_option">
                                    {!! media_short_icons($top_media->media_entry_id) !!}
                                </ul>
                            </div>
                            <div class="ms_divider"></div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            <!---Featured Artists Music--->
            @if (count($fine_arts) > 0)
            <div class="ms_featured_slider">
                <div class="ms_heading">
                    <h1>Fine Arts</h1>
                    <span class="veiw_all"><a href="{{url('media/list/finearts')}}">view more</a></span>
                </div>
                <div class="ms_feature_slider swiper-container">
                    <div class="swiper-wrapper">

                        @foreach ($fine_arts as $uploads)
                        <div class="swiper-slide">
                            <div class="ms_rcnt_box">
                                <div class="ms_rcnt_box_img">
                                    <img src="{{ asset('storage/' . $uploads->media_thumbnail) }}" alt="">
                                    <div class="ms_main_overlay">
                                        <div class="ms_box_overlay"></div>
                                        <div class="ms_more_icon">
                                            <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                        </div>
                                        <ul class="more_option">
                                            {!! media_short_icons($uploads->id) !!}
                                        </ul>
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
            @endif
			<!----Add Section Start---->
			<div class="ms_advr_wrapper">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<a href="#"><img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(4,'ads_banner_1')) }}" alt="" class="img-fluid"/></a>
						</div>
					</div>
				</div>
			</div>

            <!----Featured Albumn Section Start---->
            @if (count($ballets) > 0)
            <div class="ms_fea_album_slider">
                <div class="ms_heading">
                    <h1>Playlist from Ballet</h1>
                    <span class="veiw_all"><a href="{{ url('media/list/ballets') }}">view more</a></span>
                </div>
                <div class="ms_album_slider swiper-container">
                    <div class="swiper-wrapper">

                        @foreach ($ballets as $uploads)
                        <div class="swiper-slide">
                            <div class="ms_rcnt_box">
                                <div class="ms_rcnt_box_img">
                                    <img src="{{ asset('storage/' . $uploads->media_thumbnail) }}" alt="">
                                    <div class="ms_main_overlay">
                                        <div class="ms_box_overlay"></div>
                                        <div class="ms_more_icon">
                                            <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                        </div>
                                        <ul class="more_option">
                                            {!! media_short_icons($uploads->id) !!}
                                        </ul>
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
                <div class="swiper-button-next3 slider_nav_next"></div>
                <div class="swiper-button-prev3 slider_nav_prev"></div>
            </div>
            @endif

            <!----Top Genres Section Start---->
            <div class="ms_genres_wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ms_heading">
                            <h1>Top Instruments</h1>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ms_genres_box">
                            <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(4,'ads_banner_510x510')) }}" alt="" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="ms_genres_box">
                                    <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(4,'ads_banner_240x240')) }}" alt="" class="img-fluid" />
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="ms_genres_box">
                                    <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(4,'ads_banner_510x240')) }}" alt="" class="img-fluid" />
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="ms_genres_box">
                                    <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(4,'ads_banner_510x240_1')) }}" alt="" class="img-fluid" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="ms_genres_box">
                                    <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(4,'ads_banner_240x240_1')) }}" alt="" class="img-fluid" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="ms_genres_box">
                            <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(4,'ads_banner_240x510')) }}" alt="" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
			<!----Add Section Start---->
			<div class="ms_advr_wrapper ms_advr2">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<a href="#"><img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(4,'ads_banner_2')) }}" alt="" class="img-fluid"/></a>
						</div>
					</div>
				</div>
			</div>
            <!----Live Radio Section Start---->
            @if (count($musics) > 0)
            <div class="ms_radio_wrapper">
                <div class="ms_heading">
                    <h1>Enjoy Music</h1>
                    <span class="veiw_all"><a href="#">view more</a></span>
                </div>
                <div class="ms_radio_slider swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($musics as $uploads)
                        <div class="swiper-slide">
                            <div class="ms_rcnt_box">
                                <div class="ms_rcnt_box_img">
                                    <img src="{{ asset('storage/' . $uploads->media_thumbnail) }}" alt="">
                                    <div class="ms_main_overlay">
                                        <div class="ms_box_overlay"></div>
                                        <div class="ms_more_icon">
                                            <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                        </div>
                                        <ul class="more_option">
                                            {!! media_short_icons($uploads->id) !!}
                                        </ul>
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
                                        <a  class="ms_play_icon" href="{{ url('media/play/'.encript($uploads->id)) }}" >
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
            @endif
            <!----Main div close---->
        </div>


 @endsection
