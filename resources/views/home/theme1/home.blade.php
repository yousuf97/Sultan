  @extends('templates.theme1')
  @section('content')

  <div class="fh5co-hero">
                <div class="fh5co-overlay"></div>
                <div class="fh5co-cover" data-stellar-background-ratio="0.5"style="padding-top: 2em;">
                    <video class="fh5co-overlay" id="video1" src="storage/web/TFS promo video.mp4" autoplay loop style="width: 67%;padding-right: 2em;
"></video>
                    <ul class="video_ul" style="text-decoration: none;right: 32em;bottom: -20em;">
                        <li><p class="video1btn" onclick="play_pause()">
                            <!-- <i id="play" class="fa fa-play"></i> -->
                            <svg id="play" style="text-align: center;display:block" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                            <!-- <i class="fa fa-pause" id="pause" style="display:none;" ></i> -->
                            <svg id="pause"  style="display:none;text-align: center;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pause"><rect x="6" y="4" width="4" height="16"></rect><rect x="14" y="4" width="4" height="16"></rect></svg>
                        </p></li>
                        <li class="video1btn" id="" onclick="muteUnmute()">
                            <svg class="svg-icon" style="display:block;" id="mute" viewBox="0 0 20 20">
                                <path fill="none" d="M3.401,13.367h0.959l1.56-1.56H4.181v-4.07h3.177c0.207,0,0.405-0.084,0.553-0.23l3.608-3.633V6.21l1.56-1.56V1.983c0-0.315-0.192-0.602-0.485-0.721c-0.29-0.122-0.624-0.055-0.85,0.171L7.032,6.178h-3.63c-0.433,0-0.78,0.349-0.78,0.78v5.629C2.621,13.018,2.968,13.367,3.401,13.367z"></path>
                                <path fill="none" d="M11.519,15.674l-2.416-2.418L8,14.358l3.745,3.753c0.149,0.149,0.349,0.228,0.553,0.228c0.1,0,0.201-0.019,0.297-0.059c0.291-0.12,0.483-0.405,0.483-0.72V9.28l-1.56,1.56V15.674z"></path>
                                <path fill="none" d="M19.259,0.785c-0.167-0.168-0.387-0.25-0.606-0.25s-0.438,0.082-0.606,0.25l-4.968,4.968l-1.56,1.56l-4.496,4.494l-1.56,1.56L0.83,18.001c-0.335,0.335-0.335,0.877,0,1.213c0.167,0.167,0.386,0.251,0.606,0.251c0.22,0,0.439-0.084,0.606-0.251l5.407-5.407l1.105-1.104l2.965-2.966l1.56-1.56l6.18-6.181C19.594,1.664,19.594,1.12,19.259,0.785z"></path>
                            </svg>
                            <svg id="unmute" style="display:none;" class="svg-icon" viewBox="0 0 20 20">
                                <path fill="none" d="M9.344,2.593c-0.253-0.104-0.547-0.045-0.743,0.15L4.486,6.887H1.313c-0.377,0-0.681,0.305-0.681,0.681v4.916c0,0.377,0.304,0.681,0.681,0.681h3.154l4.137,4.142c0.13,0.132,0.304,0.201,0.482,0.201c0.088,0,0.176-0.017,0.261-0.052c0.254-0.105,0.42-0.354,0.42-0.629L9.765,3.224C9.765,2.947,9.599,2.699,9.344,2.593z M5.233,12.003c-0.128-0.127-0.302-0.2-0.483-0.2H1.994V8.249h2.774c0.182,0,0.355-0.072,0.483-0.201l3.151-3.173l0.001,10.305L5.233,12.003z"></path>
                                <path fill="none" d="M16.434,10.007c0-2.553-1.518-4.853-3.869-5.858C12.223,4,11.821,4.16,11.672,4.506c-0.148,0.346,0.013,0.746,0.359,0.894c1.846,0.793,3.041,2.6,3.041,4.608c0,1.997-1.188,3.799-3.025,4.592c-0.346,0.149-0.505,0.551-0.356,0.895c0.112,0.258,0.362,0.411,0.625,0.411c0.091,0,0.181-0.017,0.269-0.056C14.922,14.843,16.434,12.548,16.434,10.007z"></path>
                                <path fill="none" d="M13.418,10.005c0-1.349-0.802-2.559-2.042-3.086c-0.346-0.144-0.745,0.015-0.894,0.362c-0.146,0.346,0.016,0.745,0.362,0.893c0.737,0.312,1.212,1.031,1.212,1.832c0,0.792-0.471,1.509-1.2,1.825c-0.345,0.149-0.504,0.551-0.352,0.895c0.112,0.257,0.362,0.41,0.625,0.41c0.091,0,0.181-0.017,0.27-0.057C12.625,12.545,13.418,11.339,13.418,10.005z"></path>
                                <path fill="none" d="M13.724,1.453c-0.345-0.15-0.746,0.012-0.895,0.358c-0.148,0.346,0.013,0.745,0.358,0.894c2.928,1.256,4.819,4.122,4.819,7.303c0,3.171-1.886,6.031-4.802,7.289c-0.346,0.149-0.505,0.55-0.356,0.894c0.112,0.258,0.362,0.412,0.626,0.412c0.09,0,0.181-0.019,0.269-0.056c3.419-1.474,5.626-4.826,5.626-8.54C19.368,6.282,17.152,2.923,13.724,1.453z"></path>
                            </svg>
                       </li>
                    </ul>


                    <a href="http://www.sultanofarts.com/competition/list_competition">     
        <img src="/storage/media/media_source/popup.jpeg" style="width:25%;height: 32em;padding: 1em;background: #d8edf1;box-shadow:0px 0px 24px 6px rgb(4 4 4 / 20%);border-radius:1em;vertical-align: top !important;" />
        </a> 
                    <!-- <div class="desc">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-5 col-md-5">
                                    <div class="desc2 animate-box">
                                        <div class="col-sm-12 col-sm-push-1 col-md-12 col-md-push-1">
                                            <h2>Explore Qatar</h2>
                                            <h3>All you need to know about Qatar</h3>
                                            <span class="price"></span>
                                            <br>
                                            <p><a class="btn btn-primary btn-lg" href="blog-single.html">Get Started</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
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
<script type="text/javascript">
    $(window).on('load', function() {
        $('#exampleModal').modal('show');
    });
</script>

 @endsection
