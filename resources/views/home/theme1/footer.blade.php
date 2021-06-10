 <!----Footer Start---->
</div>
        <div class="ms_footer_wrapper">
            <div class="ms_footer_logo">
                <a href="index.html"><img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(2,'close_logo')) }}" alt=""></a>
            </div>
            <div class="ms_footer_inner">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer_box">
                            <h1 class="footer_title">{{get_settings_meta_by_termid_metaKey(3,'footer_sec_1_head')}}</h1>
                            <p>{{get_settings_meta_by_termid_metaKey(3,'footer_sec_1_desc')}}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer_box footer_app">
                            <h1 class="footer_title">{{get_settings_meta_by_termid_metaKey(3,'footer_sec_2_head')}}</h1>
                            <p>{{get_settings_meta_by_termid_metaKey(3,'footer_sec_2_desc')}}</p>
                            {{-- <a href="#" class="foo_app_btn"><img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(3,'playstore_app')) }}" alt="" class="img-fluid"></a>
                            <a href="#" class="foo_app_btn"><img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(3,'appstore_app')) }}" alt="" class="img-fluid"></a> --}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer_box footer_subscribe">
                            <h1 class="footer_title">{{get_settings_meta_by_termid_metaKey(3,'footer_sec_3_head')}}</h1>
                            <p>{{get_settings_meta_by_termid_metaKey(3,'footer_sec_3_desc')}}</p>

                            {!! Form::open(['action' => 'home\HomeController@save_subscription', 'method' => 'POST',
                            'enctype' => 'multipart/form-data','class' => ""]) !!}
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Your Name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Your Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="ms_btn ms_btn_custom" value="Subscribe Now">
                                </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer_box footer_contacts">
                            <h1 class="footer_title">{{get_settings_meta_by_termid_metaKey(3,'footer_sec_4_head')}}</h1>
                            <ul class="foo_con_info">
                                <li>
                                    <div class="foo_con_icon">
                                        <img src="{{ asset('home/theme1/images/svg/phone.svg') }}" alt="">
                                    </div>
                                    <div class="foo_con_data">
                                        <span class="con-title">Call us :</span>
                                        <span>{{get_settings_meta_by_termid_metaKey(3,'contact_phone')}}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="foo_con_icon">
                                        <img src="{{ asset('home/theme1/images/svg/message.svg') }}" alt="">
                                    </div>
                                    <div class="foo_con_data">
                                        <span class="con-title">email us :</span>
                                        <span>{{get_settings_meta_by_termid_metaKey(3,'contact_email')}}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="foo_con_icon">
                                        <img src="{{ asset('home/theme1/images/svg/add.svg') }}" alt="">
                                    </div>
                                    <div class="foo_con_data">
                                        <span class="con-title">walk in :</span>
                                        <span>{{get_settings_meta_by_termid_metaKey(3,'location_address')}}</span>
                                    </div>
                                </li>
                            </ul>
                            <div class="foo_sharing">
                                <div class="share_title">follow us :</div>
                                <ul>
                                    @php
                                        $fb = get_settings_meta_by_termid_metaKey(3,'fb_address');
                                        $lin = get_settings_meta_by_termid_metaKey(3,'linkedin_address');
                                        $twit = get_settings_meta_by_termid_metaKey(3,'twitter_address');
                                        $goo = get_settings_meta_by_termid_metaKey(3,'google_address');
                                    @endphp
                                    @if ($fb!= '')
                                        <li><a href="{{$fb}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    @endif
                                    @if ($lin!= '')
                                        <li><a href="{{$lin}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    @endif
                                    @if ($twit!= '')
                                        <li><a href="{{$twit}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    @endif
                                    @if ($goo!= '')
                                        <li><a href="{{$goo}}"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!----Copyright---->
            <div class="col-lg-12">
                <div class="ms_copyright">
                    <div class="footer_border"></div>
                    <p>Copyright &copy; 2020 - 2021 <a href="#">Sultan of Art</a>. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>


        <!----Audio Player Section---->
        <div class="ms_player_wrapper _hide" id="sultan_player">
			<div class="ms_player_close">
				<i class="fa fa-angle-up" aria-hidden="true"></i>
			</div>
            <div class="player_mid">
                <div class="audio-player">
                    <div id="jquery_jplayer_1" class="jp-jplayer"></div>
                    <div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
                        <div class="player_left">
                            <div class="ms_play_song">
                                <div class="play_song_name">
                                    <a href="javascript:void(0);" id="playlist-text">
                                        <div class="jp-now-playing flex-item">
                                            <div class="jp-track-name"></div>
                                            <div class="jp-artist-name"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <!----Right Queue---->
                        <div class="jp_queue_wrapper">
                            <span class="que_text" id="myPlaylistQueue"><i class="fa fa-angle-up" aria-hidden="true"></i> queue</span>
                            <span class="que_text" onclick="closePlayer()"><i class="fa fa-close" aria-hidden="true"></i> Close</span>
                            <div id="playlist-wrap" class="jp-playlist">
								<div class="jp_queue_cls"><i class="fa fa-times" aria-hidden="true"></i></div>
                                <h2>queue</h2>
								<div class="jp_queue_list_inner">
									<ul>
										<li>&nbsp;</li>
									</ul>
								</div>
                            </div>
                        </div>
                        <div class="jp-type-playlist">
                            <div class="jp-gui jp-interface flex-wrap">
                                <div class="jp-controls flex-item">
                                    <button class="jp-previous" tabindex="0">
					<i class="ms_play_control"></i>
				</button>
                                    <button class="jp-play" tabindex="0">
					<i class="ms_play_control"></i>
				</button>
                                    <button class="jp-next" tabindex="0">
					<i class="ms_play_control"></i>
				</button>
                                </div>
                                <div class="jp-progress-container flex-item">
                                    <div class="jp-time-holder">
                                        <span class="jp-current-time" role="timer" aria-label="time">&nbsp;</span>
                                        <span class="jp-duration" role="timer" aria-label="duration">&nbsp;</span>
                                    </div>
                                    <div class="jp-progress">
                                        <div class="jp-seek-bar">
                                            <div class="jp-play-bar">
                                                <div class="bullet">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="jp-volume-controls flex-item">
                                    <div class="widget knob-container">
                                        <div class="knob-wrapper-outer">
                                            <div class="knob-wrapper">
                                                <div class="knob-mask">
                                                    <div class="knob d3"><span></span></div>
                                                    <div class="handle"></div>
                                                    <div class="round">
                                                        <img src="{{ asset('home/theme1/images/svg/volume.svg') }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <input></input> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="jp-toggles flex-item">
                                    <button class="jp-shuffle" tabindex="0" title="Shuffle">
									<i class="ms_play_control"></i></button>
									<button class="jp-repeat" tabindex="0" title="Repeat"><i class="ms_play_control"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!----Register Modal Start---->
    <!-- Modal -->
    <div class="ms_register_popup">
        <div id="myModal" class="modal  centered-modal" role="dialog">
            <div class="modal-dialog register_dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">
						<i class="fa_icon form_close"></i>
					</button>
                    <div class="modal-body">
                        <div class="ms_register_img">
                            <img src="{{ asset('home/theme1/images/register_img.png') }}" alt="" class="img-fluid" />
                        </div>
                        {!! Form::open(['action' => 'home\HomeController@process_signup', 'method' => 'POST', 'id' => 'signup-form']) !!}
                            {{ csrf_field() }}
                            <div class="ms_register_form">
                                <h2>Register / Sign Up</h2>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Your Full Name" name="name" class="form-control" required>
                                    <span class="form_icon">
                                <i class="fa_icon form-user" aria-hidden="true"></i>
                                </span>
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Your Email" name="email" class="form-control" required>
                                    <span class="form_icon">
                                <i class="fa_icon form-envelope" aria-hidden="true"></i>
                                </span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" placeholder="Enter Password" id="register_password" name="password" class="form-control" required>
                                        <span class="form_icon">
                                        <i class="fa_icon form-lock" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control" required>
                                        <span class="form_icon">
                                <i class=" fa_icon form-lock" aria-hidden="true"></i>
                                </span>
                                    </div>
                                    {{-- <a href="#" class="ms_btn">register now</a> --}}
                                    <div class="form-group">
                                            <input type="submit" class="ms_btn ms_btn_custom" value="Register Now">
                                    </div>
                                    <p>Already Have An Account? <a href="#myModal1" data-toggle="modal" class="ms_modal hideCurrentModel">login here</a></p>
                            </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
        <!----Login Popup Start---->
        <div id="myModal1" class="modal  centered-modal" role="dialog">
            <div class="modal-dialog login_dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">
						<i class="fa_icon form_close"></i>
					</button>
                    <div class="modal-body">
                        <div class="ms_register_img">
                            <img src="{{ asset('home/theme1/images/register_img.png') }}" alt="" class="img-fluid" />
                        </div>
                        {!! Form::open(['action' => 'home\HomeController@process_login', 'method' => 'POST', 'id' => 'login-form']) !!}
                            {{ csrf_field() }}
                        <div class="ms_register_form">
                            <h2>login / Sign in</h2>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Your Email" name="email" class="form-control" required>
                                <span class="form_icon">
                                    <i class="fa_icon form-envelope" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Enter Password" name="password" class="form-control" required>
                                <span class="form_icon">
                                    <i class="fa_icon form-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="remember_checkbox">
                                <label>Keep me signed in
							<input type="checkbox" name="remember_me" value="true">
							<span class="checkmark"></span>
						</label>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="ms_btn ms_btn_custom" value="Login Now">
                            </div>
                            <div class="popup_forgot">
                                <a href="#">Forgot Password ?</a>
                            </div>
                            <p>Don't Have An Account? <a href="#myModal" data-toggle="modal" class="ms_modal1 hideCurrentModel">register here</a></p>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!----Language Selection Modal---->
    <div class="ms_lang_popup">
        <div id="lang_modal" class="modal  centered-modal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">
						<i class="fa_icon form_close"></i>
					</button>
                    <div class="modal-body">
                        <h1>language selection</h1>
                        <p>Please select the language(s) of the music you listen to.</p>
                        <ul class="lang_list">
                            <li>
                                <label class="lang_check_label">
							English
							<input type="checkbox" name="check">
							<span class="label-text"></span>
							</label>
                            </li>
                            <li>
                                <label class="lang_check_label">
							hindi
							<input type="checkbox" name="check">
							<span class="label-text"></span>
							</label>
                            </li>
                            <li>
                                <label class="lang_check_label">
							punjabi
							<input type="checkbox" name="check">
							<span class="label-text"></span>
							</label>
                            </li>
                            <li>
                                <label class="lang_check_label">
							French
							<input type="checkbox" name="check">
							<span class="label-text"></span>
							</label>
                            </li>
                            <li>
                                <label class="lang_check_label">
							 German
							<input type="checkbox" name="check">
							<span class="label-text"></span>
							</label>
                            </li>
                            <li>
                                <label class="lang_check_label">
							Spanish
							<input type="checkbox" name="check">
							<span class="label-text"></span>
							</label>
                            </li>
                            <li>
                                <label class="lang_check_label">
							Chinese
							<input type="checkbox" name="check">
							<span class="label-text"></span>
							</label>
                            </li>
                            <li>
                                <label class="lang_check_label">
							Japanese
							<input type="checkbox" name="check">
							<span class="label-text"></span>
							</label>
                            </li>
                            <li>
                                <label class="lang_check_label">
							Arabic
							<input type="checkbox" name="check">
							<span class="label-text"></span>
							</label>
                            </li>
                            <li>
                                <label class="lang_check_label">
							 Italian
							<input type="checkbox" name="check">
							<span class="label-text"></span>
							</label>
                            </li>
                        </ul>
                        <div class="ms_lang_btn">
                            <a href="#" class="ms_btn">apply</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!----Queue Clear Model ---->
	<div class="ms_clear_modal">
		<div id="clear_modal" class="modal  centered-modal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">
						<i class="fa_icon form_close"></i>
					</button>
                    <div class="modal-body">
						<h1>Are you sure you want to clear your queue?</h1>
						<div class="clr_modal_btn">
							<a href="#">clear all</a>
							<a href="#">cancel</a>
						</div>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<!----Queue Save Modal---->
	<div class="ms_save_modal">
		<div id="save_modal" class="modal centered-modal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">
						<i class="fa_icon form_close"></i>
					</button>
                    <div class="modal-body">
						<h1>Log in to start sharing your music!</h1>
						<div class="save_modal_btn">
							<a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i> continue with google </a>
							<a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i> continue with facebook</a>
						</div>
						<div class="ms_save_email">
							<h3>or use your email</h3>
							<div class="save_input_group">
								<input type="text" placeholder="Enter Your Name" class="form-control">
							</div>
							<div class="save_input_group">
                                <input type="password" placeholder="Enter Password" class="form-control">
                            </div>
							<button class="save_btn">Log in</button>
						</div>
						<div class="ms_dnt_have">
						    <span>Dont't have an account ?</span>
							<a href="javascript:;" class="hideCurrentModel" data-toggle="modal" data-target="#myModal">Register Now</a>
						</div>
                    </div>
                </div>
            </div>
        </div>
	</div>

    <div class="ms_clear_modal">
        <div id="playlistModal" class="modal  centered-modal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->

                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="fa_icon form_close"></i>
                    </button>
                    {!! Form::open(['action' => 'home\MediaManagerController@create_play_list', 'method' => 'POST',
                    'enctype' => 'multipart/form-data','class' => ""]) !!}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <h1>Create Playlist Group!</h1>
                        <br>
                        <div class="save_input_group">
                            <input type="text" id="play_list_title_input" name="title" placeholder="Enter title here" class="form-control" required>
                        </div><br>
                        <div class="save_input_group">
                            <label style="color: #fff; width: 100%;text-align: left;">Upload playlist File</label> <br>
                            <input style="width: 100%;color: #fff;" type="file"  name="media_thumbnail" id="playlist_image_file" >
                            <span style="float: left;">(Type: jpg, jpeg, png, gif, ttf, in 240x240 Pixel & Size: &lt;2Mb)</span>
                        </div>
                        <input value="0" id="playlist_update_id" name="update_id" type="hidden">
                        <br>
                        <div class="clr_modal_btn">
                            <input type="submit" class="ms_btn ms_btn_custom" value="Save Playlist">
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

    <div class="ms_clear_modal">
        <div id="reportMedia" class="modal  centered-modal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->

                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="fa_icon form_close"></i>
                    </button>
                    {!! Form::open(['action' => 'home\MediaManagerController@report_media', 'method' => 'POST',
                    'enctype' => 'multipart/form-data','class' => ""]) !!}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <h1>Report us about the media!</h1>
                        <br>
                        <div class="save_input_group">
                            <textarea name="issue" placeholder="Please enter details here" rows="4" cols="50" required></textarea>
                        </div>
                        <input value="0" id="report_media_entry_id" name="media_id" type="hidden">
                        <div class="clr_modal_btn">
                            <input type="submit" class="ms_btn ms_btn_custom" value="Report to us">
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="cropModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel">Crop Image</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-times" style="font-size: 15px;"></i>
              </button>
            </div>
            <div class="modal-body">
              <div class="img-container">
                  <div class="row">
                      <div class="col-md-8">
                      <div style="height: 500px;">
                        <img id="image" width="200" class="crop-img" src="https://avatars0.githubusercontent.com/u/3456749">
                      </div>

                      </div>
                      <div class="col-md-4">
                          <div class="preview"></div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer" style="    height: 50px;">
              <a type="button" class="btn btn-secondary crop-btn" data-dismiss="modal">Cancel</a>
              <a type="button" class="btn btn-primary crop-btn" id="crop">Crop & upload</a>
            </div>
          </div>
        </div>
    </div>

    <!--Main js file Style-->
   <script type="text/javascript" src="{{ asset('admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/theme1/js/plugins/swiper/js/swiper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/theme1/js/plugins/player/jplayer.playlist.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/theme1/js/plugins/player/jquery.jplayer.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/theme1/js/plugins/player/audio-player.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/theme1/js/plugins/player/volume.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/theme1/js/plugins/nice_select/jquery.nice-select.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('home/theme1/js/plugins/scroll/jquery.mCustomScrollbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/theme1/js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('toastr/toastr.min.js') }}"></script>

    @if (Route::currentRouteName() == "media_play")
    <script type="text/javascript" src="{{ asset('home/theme1/video/js/video.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/theme1/video/js/videojs-contrib-quality-levels.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/theme1/video/js/videojs-hls-quality-selector.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/theme1/js/video_player.js') }}"></script>
    @endif
    <script type="text/javascript" src="{{ asset('home/theme1/photoviewer/photoviewer.js') }}"></script>

    <script type="text/javascript" src="{{ asset('home/theme1/js/app.js') }}"></script>

    @if (Session::has('flash'))
        <script>
            (function ($) {
                var flash_obj = @json(Session::get('flash'));
                var msg = flash_obj.msg;
                var type = flash_obj.type;
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "5000",
                    "hideDuration": "5000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                if (type == 'success') {
                    toastr.success(msg);
                } else if (type == 'error') {
                    toastr.error(msg)
                } else if (type == 'info') {
                    toastr.info(msg)
                } else if (type == 'warning') {
                    toastr.warning(msg)
                } else {
                    console.log('unknown error status');
                }
            })(jQuery);
        </script>
    @endif

    <script>
        var form = document.getElementById("search_form_h");
        document.getElementById("submit_search_form_h").addEventListener("click", function () {
        form.submit();
        });
    </script>

</body>

</html>
