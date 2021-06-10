<!DOCTYPE html>

<html lang="en">

<head>
    <title>Sultan of Art - Sultan Al Khatib</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Music">
    <meta name="keywords" content="">
    <meta name="author" content="kamleshyadav">
    <meta name="MobileOptimized" content="320">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/theme1/css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/theme1/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/theme1/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/theme1/js/plugins/swiper/css/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/theme1/js/plugins/nice_select/nice-select.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/theme1/js/plugins/player/volume.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/theme1/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/theme1/css/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/theme1/cropper/cropper.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('home/theme1/js/plugins/scroll/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/theme1/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('toastr/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/theme1/css/custom.css') }}">

    @if (Route::currentRouteName() == "media_play")
    <link rel="stylesheet" type="text/css" href="{{ asset('home/theme1/video/css/video-js.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/theme1/video/css/videojs-hls-quality-selector.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/theme1/video/css/videojs.thumbnails.css') }}">
    @endif

    <link rel="stylesheet" type="text/css" href="{{ asset('home/theme1/photoviewer/photoviewer.css') }}">

    <link rel="shortcut icon" type="image/png" href="{{ asset('home/theme1/images/favicon.png') }}">
    <script type="text/javascript" src="{{ asset('home/theme1/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/theme1/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/theme1/js/select2.full.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('home/theme1/cropper/cropper.js') }}"></script>
</head>

<body>
    <!----Loader Start---->
    <div class="ms_loader" id="app_loader">
        <div class="wrap">
            <img src="{{ asset('home/theme1/images/loader.gif') }}" alt="">
        </div>
    </div>

    <!----Main Wrapper Start---->
    <div class="ms_main_wrapper">
        <!---Side Menu Start--->
        <div class="ms_sidemenu_wrapper">
            <div class="ms_nav_close">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </div>
            <div class="ms_sidemenu_inner">
                <div class="ms_logo_inner">
                    <div class="ms_logo">
                        <a href="/"><img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(2,'open_logo')) }}" alt=""
                                class="img-fluid" /></a>
                    </div>
                    <div class="ms_logo_open">
                        <a href="/"><img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(2,'close_logo')) }}" alt=""
                                class="img-fluid" /></a>
                    </div>
                </div>
                <div class="ms_nav_wrapper">
                    <ul id="nav">
                        <li><a href="{{ url('/') }}" title="Discover">
                                <span class="nav_icon">
                                    <span class="icon icon_discover"></span>
                                </span>
                                <span class="nav_text">
                                    Home
                                </span>
                            </a>
                        </li>

                        <li><a href="{{ url('media/list/ballets') }}" title="Stations">
                                <span class="nav_icon">
                                    <span class="icon icon_tracks"></span>
                                </span>
                                <span class="nav_text">
                                    Ballets
                                </span>
                            </a>
                        </li>

                        <li><a href="{{ url('media/list/pantomime') }}" title="Artists">
                                <span class="nav_icon">
                                    <span class="icon icon_artists"></span>
                                </span>
                                <span class="nav_text">
                                    Pantomime
                                </span>
                            </a>
                        </li>
                        <li><a href="{{ url('media/list/finearts') }}" title="Genres">
                                <span class="nav_icon">
                                    <span class="icon icon_genres"></span>
                                </span>
                                <span class="nav_text">
                                    Fine Arts
                                </span>
                            </a>
                        </li>

                        <li><a href="{{ url('media/list/music') }}" title="Free Music">
                            <span class="nav_icon">
                                <span class="icon icon_music"></span>
                            </span>
                            <span class="nav_text">
                                Musics
                            </span>
                        </a>
                    </li>

                    </ul>

                    <ul class="nav_downloads" id="nav_downloads">
                        <li><a href="{{ url('about/sultan-al-khatib') }}" title="Featured Playlist">
                            <span class="nav_icon">
                                <span class="icon icon_albums"></span>
                            </span>
                            <span class="nav_text">
                               Sultan Al Khatib
                            </span>
                            </a>
                        </li>
                    </ul>


                    <ul class="nav_downloads" id="nav_downloads">
                        @auth
                        <li><a href="{{ url('my_account/my_playlist') }}" title="Featured Playlist">
                            <span class="nav_icon">
                                <span class="icon icon_fe_playlist"></span>
                            </span>
                            <span class="nav_text">
                                my playlist
                            </span>
                            </a>
                        </li>
                        <li>

                            <a href="{{ url('media/list/my_favs') }}" title="Favourites">
                            <span class="nav_icon">
                                <span class="icon icon_favourite"></span>
                            </span>
                            <span class="nav_text">
                               My favourites
                            </span>
                        </a>
                        </li>
                        <li><a href="{{ url('media/list/my_history') }}" title="History">
                                <span class="nav_icon">
                                    <span class="icon icon_history"></span>
                                </span>
                                <span class="nav_text">
                                    history
                                </span>
                            </a>
                        </li>
                        @endauth
                    </ul>

                </div>
            </div>
        </div>

        <!---Main Content Start--->
        <div class="{{$wraper_class}}  @auth ms_profile @endauth">
            <!---Header--->
            <div class="ms_header">
                <div class="ms_top_left">
                    {!! Form::open(['action' => 'home\HomeController@media_search', 'method' => 'GET', 'id' => 'search_form_h']) !!}
                    <div class="ms_top_search">
                        <input type="text" class="form-control" placeholder="Search for Arts Here.." name="search_str">
                        {{-- <button type="submit" class="search_icon" style="border: 1px solid #3bc8e7;">
                            <img src="{{ asset('home/theme1/images/svg/search.svg') }}" alt="">
                        </button> --}}
                        <span class="search_icon" id='submit_search_form_h'>
							<img src="{{ asset('home/theme1/images/svg/search.svg') }}" alt="">
						</span>
                    </div>
                    {!! Form::close() !!}

                    <div class="ms_top_trend">
                        <span><a href="javascript:;" class="ms_color">Winner of the Month :</a></span> <span class="top_marquee"><a
                                href="{{get_settings_meta_by_termid_metaKey(3,'winner_url')}}">{{get_settings_meta_by_termid_metaKey(3,'winner_title')}}</a></span>
                    </div>
                </div>
                <div class="ms_top_right">

                    @auth
                    @php
                        $name = auth()->user()->name;
                        $acronym = acronym($name);
                    @endphp
                    <div class="ms_top_btn" >
                        {{-- <div class="ms_top_lang">
                            <a href="{{ url('competition/list_competition') }}">Competitions</a>
                        </div> --}}

                        <a href="{{ url('my_account/upload_track') }}" class="ms_btn">upload</a>
                        <a href="javascript:;" class="ms_admin_name">
                            Hello {{$name}}<span class="ms_pro_name">{{ $acronym }}</span>
						</a>
						<ul class="pro_dropdown_menu">
							<li><a href="{{ url('my_account/profile') }}">Profile</a></li>
							<li><a href="{{ url('user/logout') }}">Logout</a></li>
						</ul>
                    </div>
                    @endauth

                    @guest

                    <div class="ms_top_btn">
                        <div class="ms_top_lang">
                            <a href="{{ url('competition/list_competition') }}">Competitions</a>
                        </div>
                        <a href="javascript:;" class="ms_btn reg_btn" data-toggle="modal"
                            data-target="#myModal"><span>register</span></a>
                        <a href="javascript:;" class="ms_btn login_btn" data-toggle="modal"
                            data-target="#myModal1"><span>login</span></a>
                    </div>
                    @endguest

                </div>
            </div>
