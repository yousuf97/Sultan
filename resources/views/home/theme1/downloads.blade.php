       @extends('templates.theme1')
       @section('content')

           <!----Album Single Section Start---->
           <div class="ms_content_wrapper padder_top80">
               <!----Free Download Css Start---->
               <div class="ms_free_download">
                   <div class="ms_heading">
                       <h1>Free Downloads</h1>
                   </div>
                   <div class="album_inner_list">
                       <div class="album_list_wrapper">
                           <ul class="album_list_name">
                               <li>#</li>
                               <li>Song Title</li>
                               <li>Album</li>
                               <li class="text-center">Duration</li>
                               <li class="text-center">Add To Favourites</li>
                               <li class="text-center">More</li>
                               <li class="text-center">remove</li>
                           </ul>
                           <ul>
                               <li><a href="#"><span class="play_no">01</span><span class="play_hover"></span></a></li>
                               <li><a href="#">Bloodlust</a></li>
                               <li><a href="#">Dream Your Moments</a></li>
                               <li class="text-center"><a href="#">5:26</a></li>
                               <li class="text-center"><a href="#"><span class="ms_icon1 ms_fav_icon"></span></a></li>
                               <li class="text-center ms_more_icon"><a href="javascript:;"><span
                                           class="ms_icon1 ms_active_icon"></span></a>
                                   <ul class="more_option">
                                    {!! media_short_icons(0) !!}
                                   </ul>
                               </li>
                               <li class="text-center"><a href="#"><span class="ms_close">
                                           <img src="{{ asset('home/theme1/images/svg/close.svg') }}" alt=""></span></a></li>
                           </ul>
                           <ul>
                               <li><a href="#"><span class="play_no">02</span><span class="play_hover"></span></a></li>
                               <li><a href="#">Desired Games</a></li>
                               <li><a href="#">Dream Your Moments</a></li>
                               <li class="text-center"><a href="#">5:26</a></li>
                               <li class="text-center"><a href="#"><span class="ms_icon1 ms_fav_icon"></span></a></li>
                               <li class="text-center ms_more_icon"><a href="javascript:;"><span
                                           class="ms_icon1 ms_active_icon"></span></a>
                                   <ul class="more_option">
                                       <li><a href="#"><span class="opt_icon"><span class="icon icon_fav"></span></span>Add
                                               To Favourites</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_queue"></span></span>Add To Queue</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_dwn"></span></span>Download Now</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_playlst"></span></span>Add To Playlist</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_share"></span></span>Share</a></li>
                                   </ul>
                               </li>
                               <li class="text-center"><a href="#"><span class="ms_close">
                                           <img src="{{ asset('home/theme1/images/svg/close.svg') }}" alt=""></span></a></li>
                           </ul>
                           <ul>
                               <li><a href="#"><span class="play_no">03</span><span class="play_hover"></span></a></li>
                               <li><a href="#">Until I Met You</a></li>
                               <li><a href="#">Dream Your Moments</a></li>
                               <li class="text-center"><a href="#">5:26</a></li>
                               <li class="text-center"><a href="#"><span class="ms_icon1 ms_fav_icon"></span></a></li>
                               <li class="text-center ms_more_icon"><a href="javascript:;"><span
                                           class="ms_icon1 ms_active_icon"></span></a>
                                   <ul class="more_option">
                                       <li><a href="#"><span class="opt_icon"><span class="icon icon_fav"></span></span>Add
                                               To Favourites</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_queue"></span></span>Add To Queue</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_dwn"></span></span>Download Now</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_playlst"></span></span>Add To Playlist</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_share"></span></span>Share</a></li>
                                   </ul>
                               </li>
                               <li class="text-center"><a href="#"><span class="ms_close">
                                           <img src="{{ asset('home/theme1/images/svg/close.svg') }}" alt=""></span></a></li>
                           </ul>
                           <ul class="play_active_song">
                               <li><a href="#"><span class="play_no">04</span><span class="play_hover"></span></a></li>
                               <li><a href="#">Dark Alley Acoustic</a></li>
                               <li><a href="#">Dream Your Moments</a></li>
                               <li class="text-center"><a href="#">5:26</a></li>
                               <li class="text-center"><a href="#"><span class="ms_icon1 ms_fav_icon"></span></a></li>
                               <li class="text-center ms_more_icon"><a href="javascript:;"><span
                                           class="ms_icon1 ms_active_icon"></span></a>
                                   <ul class="more_option">
                                       <li><a href="#"><span class="opt_icon"><span class="icon icon_fav"></span></span>Add
                                               To Favourites</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_queue"></span></span>Add To Queue</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_dwn"></span></span>Download Now</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_playlst"></span></span>Add To Playlist</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_share"></span></span>Share</a></li>
                                   </ul>
                               </li>
                               <li class="text-center"><a href="#"><span class="ms_close">
                                           <img src="{{ asset('home/theme1/images/svg/close.svg') }}" alt=""></span></a></li>
                           </ul>
                           <ul>
                               <li><a href="#"><span class="play_no">05</span><span class="play_hover"></span></a></li>
                               <li><a href="#">Cloud nine</a></li>
                               <li><a href="#">Dream Your Moments</a></li>
                               <li class="text-center"><a href="#">5:26</a></li>
                               <li class="text-center"><a href="#"><span class="ms_icon1 ms_fav_icon"></span></a></li>
                               <li class="text-center ms_more_icon"><a href="javascript:;"><span
                                           class="ms_icon1 ms_active_icon"></span></a>
                                   <ul class="more_option">
                                       <li><a href="#"><span class="opt_icon"><span class="icon icon_fav"></span></span>Add
                                               To Favourites</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_queue"></span></span>Add To Queue</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_dwn"></span></span>Download Now</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_playlst"></span></span>Add To Playlist</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_share"></span></span>Share</a></li>
                                   </ul>
                               </li>
                               <li class="text-center"><a href="#"><span class="ms_close">
                                           <img src="{{ asset('home/theme1/images/svg/close.svg') }}" alt=""></span></a></li>
                           </ul>
                           <ul>
                               <li><a href="#"><span class="play_no">06</span><span class="play_hover"></span></a></li>
                               <li><a href="#">Walking Promises</a></li>
                               <li><a href="#">Dream Your Moments</a></li>
                               <li class="text-center"><a href="#">5:26</a></li>
                               <li class="text-center"><a href="#"><span class="ms_icon1 ms_fav_icon"></span></a></li>
                               <li class="text-center ms_more_icon"><a href="javascript:;"><span
                                           class="ms_icon1 ms_active_icon"></span></a>
                                   <ul class="more_option">
                                       <li><a href="#"><span class="opt_icon"><span class="icon icon_fav"></span></span>Add
                                               To Favourites</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_queue"></span></span>Add To Queue</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_dwn"></span></span>Download Now</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_playlst"></span></span>Add To Playlist</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_share"></span></span>Share</a></li>
                                   </ul>
                               </li>
                               <li class="text-center"><a href="#"><span class="ms_close">
                                           <img src="{{ asset('home/theme1/images/svg/close.svg') }}" alt=""></span></a></li>
                           </ul>
                           <ul>
                               <li><a href="#"><span class="play_no">07</span><span class="play_hover"></span></a></li>
                               <li><a href="#">Endless Things</a></li>
                               <li><a href="#">Dream Your Moments</a></li>
                               <li class="text-center"><a href="#">5:26</a></li>
                               <li class="text-center"><a href="#"><span class="ms_icon1 ms_fav_icon"></span></a></li>
                               <li class="text-center ms_more_icon"><a href="javascript:;"><span
                                           class="ms_icon1 ms_active_icon"></span></a>
                                   <ul class="more_option">
                                       <li><a href="#"><span class="opt_icon"><span class="icon icon_fav"></span></span>Add
                                               To Favourites</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_queue"></span></span>Add To Queue</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_dwn"></span></span>Download Now</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_playlst"></span></span>Add To Playlist</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_share"></span></span>Share</a></li>
                                   </ul>
                               </li>
                               <li class="text-center"><a href="#"><span class="ms_close">
                                           <img src="{{ asset('home/theme1/images/svg/close.svg') }}" alt=""></span></a></li>
                           </ul>
                           <ul>
                               <li><a href="#"><span class="play_no">08</span><span class="play_hover"></span></a></li>
                               <li><a href="#">Gimme Some Courage</a></li>
                               <li><a href="#">Dream Your Moments</a></li>
                               <li class="text-center"><a href="#">5:26</a></li>
                               <li class="text-center"><a href="#"><span class="ms_icon1 ms_fav_icon"></span></a></li>
                               <li class="text-center ms_more_icon"><a href="javascript:;"><span
                                           class="ms_icon1 ms_active_icon"></span></a>
                                   <ul class="more_option">
                                       <li><a href="#"><span class="opt_icon"><span class="icon icon_fav"></span></span>Add
                                               To Favourites</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_queue"></span></span>Add To Queue</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_dwn"></span></span>Download Now</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_playlst"></span></span>Add To Playlist</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_share"></span></span>Share</a></li>
                                   </ul>
                               </li>
                               <li class="text-center"><a href="#"><span class="ms_close">
                                           <img src="{{ asset('home/theme1/images/svg/close.svg') }}" alt=""></span></a></li>
                           </ul>
                           <ul>
                               <li><a href="#"><span class="play_no">09</span><span class="play_hover"></span></a></li>
                               <li><a href="#">One More Stranger</a></li>
                               <li><a href="#">Dream Your Moments</a></li>
                               <li class="text-center"><a href="#">5:26</a></li>
                               <li class="text-center"><a href="#"><span class="ms_icon1 ms_fav_icon"></span></a></li>
                               <li class="text-center ms_more_icon"><a href="javascript:;"><span
                                           class="ms_icon1 ms_active_icon"></span></a>
                                   <ul class="more_option">
                                       <li><a href="#"><span class="opt_icon"><span class="icon icon_fav"></span></span>Add
                                               To Favourites</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_queue"></span></span>Add To Queue</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_dwn"></span></span>Download Now</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_playlst"></span></span>Add To Playlist</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_share"></span></span>Share</a></li>
                                   </ul>
                               </li>
                               <li class="text-center"><a href="#"><span class="ms_close">
                                           <img src="{{ asset('home/theme1/images/svg/close.svg') }}" alt=""></span></a></li>
                           </ul>
                           <ul>
                               <li><a href="#"><span class="play_no">10</span><span class="play_hover"></span></a></li>
                               <li><a href="#">Cloud nine</a></li>
                               <li><a href="#">Dream Your Moments</a></li>
                               <li class="text-center"><a href="#">5:26</a></li>
                               <li class="text-center"><a href="#"><span class="ms_icon1 ms_fav_icon"></span></a></li>
                               <li class="text-center ms_more_icon"><a href="javascript:;"><span
                                           class="ms_icon1 ms_active_icon"></span></a>
                                   <ul class="more_option">
                                       <li><a href="#"><span class="opt_icon"><span class="icon icon_fav"></span></span>Add
                                               To Favourites</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_queue"></span></span>Add To Queue</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_dwn"></span></span>Download Now</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_playlst"></span></span>Add To Playlist</a></li>
                                       <li><a href="#"><span class="opt_icon"><span
                                                       class="icon icon_share"></span></span>Share</a></li>
                                   </ul>
                               </li>
                               <li class="text-center"><a href="#"><span class="ms_close">
                                           <img src="{{ asset('home/theme1/images/svg/close.svg') }}" alt=""></span></a></li>
                           </ul>
                       </div>
                   </div>
                   <div class="ms_view_more padder_bottom20">
                       <a href="#" class="ms_btn">view more</a>
                   </div>
               </div>
               <div class="ms_featured_slider">
                   <div class="ms_heading">
                       <h1>Download Now</h1>
                       <span class="veiw_all"><a href="#">view more</a></span>
                   </div>
                   <div class="ms_feature_slider swiper-container">
                       <div class="swiper-wrapper">
                           <div class="swiper-slide">
                               <div class="ms_rcnt_box">
                                   <div class="ms_rcnt_box_img">
                                       <img src="{{ asset('home/theme1/images/album/album7.jpg') }}" alt="">
                                       <div class="ms_main_overlay">
                                           <div class="ms_box_overlay"></div>
                                           <div class="ms_more_icon">
                                               <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                           </div>
                                           <ul class="more_option">
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_fav"></span></span>Add To Favourites</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_queue"></span></span>Add To Queue</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_dwn"></span></span>Download Now</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_playlst"></span></span>Add To Playlist</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_share"></span></span>Share</a></li>
                                           </ul>
                                           <div class="ms_play_icon">
                                               <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="ms_rcnt_box_text">
                                       <h3><a href="#">Dream Your Moments</a></h3>
                                       <p>Ava Cornish &amp; Brian Hill</p>
                                   </div>
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="ms_rcnt_box">
                                   <div class="ms_rcnt_box_img">
                                       <img src="{{ asset('home/theme1/images/album/album5.jpg') }}" alt="">
                                       <div class="ms_main_overlay">
                                           <div class="ms_box_overlay"></div>
                                           <div class="ms_more_icon">
                                               <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                           </div>
                                           <ul class="more_option">
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_fav"></span></span>Add To Favourites</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_queue"></span></span>Add To Queue</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_dwn"></span></span>Download Now</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_playlst"></span></span>Add To Playlist</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_share"></span></span>Share</a></li>
                                           </ul>
                                           <div class="ms_play_icon">
                                               <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="ms_rcnt_box_text">
                                       <h3><a href="#">Until I Met You</a></h3>
                                       <p>Ava Cornish &amp; Brian Hill</p>
                                   </div>
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="ms_rcnt_box">
                                   <div class="ms_rcnt_box_img">
                                       <img src="{{ asset('home/theme1/images/album/album8.jpg') }}" alt="">
                                       <div class="ms_main_overlay">
                                           <div class="ms_box_overlay"></div>
                                           <div class="ms_more_icon">
                                               <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                           </div>
                                           <ul class="more_option">
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_fav"></span></span>Add To Favourites</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_queue"></span></span>Add To Queue</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_dwn"></span></span>Download Now</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_playlst"></span></span>Add To Playlist</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_share"></span></span>Share</a></li>
                                           </ul>
                                           <div class="ms_play_icon">
                                               <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="ms_rcnt_box_text">
                                       <h3><a href="#">Gimme Some Courage</a></h3>
                                       <p>Ava Cornish &amp; Brian Hill</p>
                                   </div>
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="ms_rcnt_box">
                                   <div class="ms_rcnt_box_img">
                                       <img src="{{ asset('home/theme1/images/music/r_music3.jpg') }}" alt="">
                                       <div class="ms_main_overlay">
                                           <div class="ms_box_overlay"></div>
                                           <div class="ms_more_icon">
                                               <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                           </div>
                                           <ul class="more_option">
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_fav"></span></span>Add To Favourites</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_queue"></span></span>Add To Queue</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_dwn"></span></span>Download Now</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_playlst"></span></span>Add To Playlist</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_share"></span></span>Share</a></li>
                                           </ul>
                                           <div class="ms_play_icon">
                                               <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="ms_rcnt_box_text">
                                       <h3><a href="#">Dark Alley Acoustic</a></h3>
                                       <p>Ava Cornish &amp; Brian Hill</p>
                                   </div>
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="ms_rcnt_box">
                                   <div class="ms_rcnt_box_img">
                                       <img src="{{ asset('home/theme1/images/album/album4.jpg') }}" alt="">
                                       <div class="ms_main_overlay">
                                           <div class="ms_box_overlay"></div>
                                           <div class="ms_more_icon">
                                               <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                           </div>
                                           <ul class="more_option">
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_fav"></span></span>Add To Favourites</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_queue"></span></span>Add To Queue</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_dwn"></span></span>Download Now</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_playlst"></span></span>Add To Playlist</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_share"></span></span>Share</a></li>
                                           </ul>
                                           <div class="ms_play_icon">
                                               <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="ms_rcnt_box_text">
                                       <h3><a href="#">Walking Promises</a></h3>
                                       <p>Ava Cornish &amp; Brian Hill</p>
                                   </div>
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="ms_rcnt_box">
                                   <div class="ms_rcnt_box_img">
                                       <img src="{{ asset('home/theme1/images/album/album9.jpg') }}" alt="">
                                       <div class="ms_main_overlay">
                                           <div class="ms_box_overlay"></div>
                                           <div class="ms_more_icon">
                                               <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                           </div>
                                           <ul class="more_option">
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_fav"></span></span>Add To Favourites</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_queue"></span></span>Add To Queue</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_dwn"></span></span>Download Now</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_playlst"></span></span>Add To Playlist</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_share"></span></span>Share</a></li>
                                           </ul>
                                           <div class="ms_play_icon">
                                               <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="ms_rcnt_box_text">
                                       <h3><a href="#">Desired Games</a></h3>
                                       <p>Ava Cornish &amp; Brian Hill</p>
                                   </div>
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="ms_rcnt_box">
                                   <div class="ms_rcnt_box_img">
                                       <img src="{{ asset('home/theme1/images/featured/song1.jpg') }}" alt="">
                                       <div class="ms_main_overlay">
                                           <div class="ms_box_overlay"></div>
                                           <div class="ms_more_icon">
                                               <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                           </div>
                                           <ul class="more_option">
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_fav"></span></span>Add To Favourites</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_queue"></span></span>Add To Queue</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_dwn"></span></span>Download Now</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_playlst"></span></span>Add To Playlist</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_share"></span></span>Share</a></li>
                                           </ul>
                                           <div class="ms_play_icon">
                                               <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="ms_rcnt_box_text">
                                       <h3><a href="#">Dream Your Moments (Duet)</a></h3>
                                       <p>Ava Cornish &amp; Brian Hill</p>
                                   </div>
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="ms_rcnt_box">
                                   <div class="ms_rcnt_box_img">
                                       <img src="{{ asset('home/theme1/images/featured/song2.jpg') }}" alt="">
                                       <div class="ms_main_overlay">
                                           <div class="ms_box_overlay"></div>
                                           <div class="ms_more_icon">
                                               <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                           </div>
                                           <ul class="more_option">
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_fav"></span></span>Add To Favourites</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_queue"></span></span>Add To Queue</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_dwn"></span></span>Download Now</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_playlst"></span></span>Add To Playlist</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_share"></span></span>Share</a></li>
                                           </ul>
                                           <div class="ms_play_icon">
                                               <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="ms_rcnt_box_text">
                                       <h3><a href="#">Until I Met You</a></h3>
                                       <p>Ava Cornish &amp; Brian Hill</p>
                                   </div>
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="ms_rcnt_box">
                                   <div class="ms_rcnt_box_img">
                                       <img src="{{ asset('home/theme1/images/featured/song3.jpg') }}" alt="">
                                       <div class="ms_main_overlay">
                                           <div class="ms_box_overlay"></div>
                                           <div class="ms_more_icon">
                                               <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                           </div>
                                           <ul class="more_option">
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_fav"></span></span>Add To Favourites</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_queue"></span></span>Add To Queue</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_dwn"></span></span>Download Now</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_playlst"></span></span>Add To Playlist</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_share"></span></span>Share</a></li>
                                           </ul>
                                           <div class="ms_play_icon">
                                               <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="ms_rcnt_box_text">
                                       <h3><a href="#">Gimme Some Courage</a></h3>
                                       <p>Ava Cornish &amp; Brian Hill</p>
                                   </div>
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="ms_rcnt_box">
                                   <div class="ms_rcnt_box_img">
                                       <img src="{{ asset('home/theme1/images/featured/song4.jpg') }}" alt="">
                                       <div class="ms_main_overlay">
                                           <div class="ms_box_overlay"></div>
                                           <div class="ms_more_icon">
                                               <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                           </div>
                                           <ul class="more_option">
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_fav"></span></span>Add To Favourites</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_queue"></span></span>Add To Queue</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_dwn"></span></span>Download Now</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_playlst"></span></span>Add To Playlist</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_share"></span></span>Share</a></li>
                                           </ul>
                                           <div class="ms_play_icon">
                                               <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="ms_rcnt_box_text">
                                       <h3><a href="#">Dark Alley Acoustic</a></h3>
                                       <p>Ava Cornish &amp; Brian Hill</p>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- Add Arrows -->
                   <div class="swiper-button-next1 slider_nav_next"></div>
                   <div class="swiper-button-prev1 slider_nav_prev"></div>
               </div>
               <!----Live Radio Section Start---->
               <div class="ms_radio_wrapper padder_top20">
                   <div class="ms_heading">
                       <h1>Recently Played</h1>
                       <span class="veiw_all"><a href="#">view more</a></span>
                   </div>
                   <div class="ms_radio_slider swiper-container">
                       <div class="swiper-wrapper">
                           <div class="swiper-slide">
                               <div class="ms_rcnt_box">
                                   <div class="ms_rcnt_box_img">
                                       <img src="{{ asset('home/theme1/images/music/r_music1.jpg') }}" alt="">
                                       <div class="ms_main_overlay">
                                           <div class="ms_box_overlay"></div>
                                           <div class="ms_more_icon">
                                               <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                           </div>
                                           <ul class="more_option">
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_fav"></span></span>Add To Favourites</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_queue"></span></span>Add To Queue</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_dwn"></span></span>Download Now</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_playlst"></span></span>Add To Playlist</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_share"></span></span>Share</a></li>
                                           </ul>
                                           <div class="ms_play_icon">
                                               <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="ms_rcnt_box_text">
                                       <h3><a href="#">Top Trendings</a></h3>
                                       <p>Ava Cornish &amp; Brian Hill</p>
                                   </div>
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="ms_rcnt_box">
                                   <div class="ms_rcnt_box_img">
                                       <img src="{{ asset('home/theme1/images/featured/song4.jpg') }}" alt="">
                                       <div class="ms_main_overlay">
                                           <div class="ms_box_overlay"></div>
                                           <div class="ms_more_icon">
                                               <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                           </div>
                                           <ul class="more_option">
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_fav"></span></span>Add To Favourites</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_queue"></span></span>Add To Queue</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_dwn"></span></span>Download Now</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_playlst"></span></span>Add To Playlist</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_share"></span></span>Share</a></li>
                                           </ul>
                                           <div class="ms_play_icon">
                                               <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="ms_rcnt_box_text">
                                       <h3><a href="#">New Romantic Charts</a></h3>
                                       <p>Ava Cornish &amp; Brian Hill</p>
                                   </div>
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="ms_rcnt_box">
                                   <div class="ms_rcnt_box_img">
                                       <img src="{{ asset('home/theme1/images/artist/artist2.jpg') }}" alt="">
                                       <div class="ms_main_overlay">
                                           <div class="ms_box_overlay"></div>
                                           <div class="ms_more_icon">
                                               <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                           </div>
                                           <ul class="more_option">
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_fav"></span></span>Add To Favourites</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_queue"></span></span>Add To Queue</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_dwn"></span></span>Download Now</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_playlst"></span></span>Add To Playlist</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_share"></span></span>Share</a></li>
                                           </ul>
                                           <div class="ms_play_icon">
                                               <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="ms_rcnt_box_text">
                                       <h3><a href="#">Dance Beats - Hip Hops</a></h3>
                                       <p>Ava Cornish &amp; Brian Hill</p>
                                   </div>
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="ms_rcnt_box">
                                   <div class="ms_rcnt_box_img">
                                       <img src="{{ asset('home/theme1/images/music/r_music4.jpg') }}" alt="">
                                       <div class="ms_main_overlay">
                                           <div class="ms_box_overlay"></div>
                                           <div class="ms_more_icon">
                                               <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                           </div>
                                           <ul class="more_option">
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_fav"></span></span>Add To Favourites</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_queue"></span></span>Add To Queue</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_dwn"></span></span>Download Now</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_playlst"></span></span>Add To Playlist</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_share"></span></span>Share</a></li>
                                           </ul>
                                           <div class="ms_play_icon">
                                               <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="ms_rcnt_box_text">
                                       <h3><a href="#">Workout Time</a></h3>
                                       <p>Ava Cornish &amp; Brian Hill</p>
                                   </div>
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="ms_rcnt_box">
                                   <div class="ms_rcnt_box_img">
                                       <img src="{{ asset('home/theme1/images/music/r_music5.jpg') }}" alt="">
                                       <div class="ms_main_overlay">
                                           <div class="ms_box_overlay"></div>
                                           <div class="ms_more_icon">
                                               <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                           </div>
                                           <ul class="more_option">
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_fav"></span></span>Add To Favourites</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_queue"></span></span>Add To Queue</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_dwn"></span></span>Download Now</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_playlst"></span></span>Add To Playlist</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_share"></span></span>Share</a></li>
                                           </ul>
                                           <div class="ms_play_icon">
                                               <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="ms_rcnt_box_text">
                                       <h3><a href="#">Best Classics Of All Time</a></h3>
                                       <p>Ava Cornish &amp; Brian Hill</p>
                                   </div>
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="ms_rcnt_box">
                                   <div class="ms_rcnt_box_img">
                                       <img src="{{ asset('home/theme1/images/music/r_music6.jpg') }}" alt="">
                                       <div class="ms_main_overlay">
                                           <div class="ms_box_overlay"></div>
                                           <div class="ms_more_icon">
                                               <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                           </div>
                                           <ul class="more_option">
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_fav"></span></span>Add To Favourites</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_queue"></span></span>Add To Queue</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_dwn"></span></span>Download Now</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_playlst"></span></span>Add To Playlist</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_share"></span></span>Share</a></li>
                                           </ul>
                                           <div class="ms_play_icon">
                                               <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="ms_rcnt_box_text">
                                       <h3><a href="#">Heart Broken - Soul Music</a></h3>
                                       <p>Ava Cornish &amp; Brian Hill</p>
                                   </div>
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="ms_rcnt_box">
                                   <div class="ms_rcnt_box_img">
                                       <img src="{{ asset('home/theme1/images/radio/img1.jpg') }}" alt="">
                                       <div class="ms_main_overlay">
                                           <div class="ms_box_overlay"></div>
                                           <div class="ms_more_icon">
                                               <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                           </div>
                                           <ul class="more_option">
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_fav"></span></span>Add To Favourites</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_queue"></span></span>Add To Queue</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_dwn"></span></span>Download Now</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_playlst"></span></span>Add To Playlist</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_share"></span></span>Share</a></li>
                                           </ul>
                                           <div class="ms_play_icon">
                                               <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="ms_rcnt_box_text">
                                       <h3><a href="#">Dream Your Moments (Duet)</a></h3>
                                       <p>Ava Cornish &amp; Brian Hill</p>
                                   </div>
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="ms_rcnt_box">
                                   <div class="ms_rcnt_box_img">
                                       <img src="{{ asset('home/theme1/images/radio/img2.jpg') }}" alt="">
                                       <div class="ms_main_overlay">
                                           <div class="ms_box_overlay"></div>
                                           <div class="ms_more_icon">
                                               <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                           </div>
                                           <ul class="more_option">
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_fav"></span></span>Add To Favourites</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_queue"></span></span>Add To Queue</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_dwn"></span></span>Download Now</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_playlst"></span></span>Add To Playlist</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_share"></span></span>Share</a></li>
                                           </ul>
                                           <div class="ms_play_icon">
                                               <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="ms_rcnt_box_text">
                                       <h3><a href="#">Until I Met You</a></h3>
                                       <p>Ava Cornish &amp; Brian Hill</p>
                                   </div>
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="ms_rcnt_box">
                                   <div class="ms_rcnt_box_img">
                                       <img src="{{ asset('home/theme1/images/radio/img3.jpg') }}" alt="">
                                       <div class="ms_main_overlay">
                                           <div class="ms_box_overlay"></div>
                                           <div class="ms_more_icon">
                                               <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                           </div>
                                           <ul class="more_option">
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_fav"></span></span>Add To Favourites</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_queue"></span></span>Add To Queue</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_dwn"></span></span>Download Now</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_playlst"></span></span>Add To Playlist</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_share"></span></span>Share</a></li>
                                           </ul>
                                           <div class="ms_play_icon">
                                               <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="ms_rcnt_box_text">
                                       <h3><a href="#">Gimme Some Courage</a></h3>
                                       <p>Ava Cornish &amp; Brian Hill</p>
                                   </div>
                               </div>
                           </div>
                           <div class="swiper-slide">
                               <div class="ms_rcnt_box">
                                   <div class="ms_rcnt_box_img">
                                       <img src="{{ asset('home/theme1/images/radio/img4.jpg') }}" alt="">
                                       <div class="ms_main_overlay">
                                           <div class="ms_box_overlay"></div>
                                           <div class="ms_more_icon">
                                               <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                           </div>
                                           <ul class="more_option">
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_fav"></span></span>Add To Favourites</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_queue"></span></span>Add To Queue</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_dwn"></span></span>Download Now</a></li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_playlst"></span></span>Add To Playlist</a>
                                               </li>
                                               <li><a href="#"><span class="opt_icon"><span
                                                               class="icon icon_share"></span></span>Share</a></li>
                                           </ul>
                                           <div class="ms_play_icon">
                                               <img src="{{ asset('home/theme1/images/svg/play.svg') }}" alt="">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="ms_rcnt_box_text">
                                       <h3><a href="#">Dark Alley Acoustic</a></h3>
                                       <p>Ava Cornish &amp; Brian Hill</p>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- Add Arrows -->
                   <div class="swiper-button-next4 slider_nav_next"></div>
                   <div class="swiper-button-prev4 slider_nav_prev"></div>
               </div>
           </div>
       @endsection
