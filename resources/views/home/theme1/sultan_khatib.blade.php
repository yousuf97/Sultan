@extends('templates.theme1')
@section('content')
<div class="ms_blog_single_wrapper">
    <div class="row">
        <div class="col-lg-9 col-md-9">

            <div class="ms_blog_single">
                <div class="blog_single_img">
                    <img src="{{ asset('sultan_assets/sultan_banner.jpg') }}" alt="" class="img-fluid">
                </div>
                <div class="blog_single_content">
                    <h3 class="ms_blog_title">About Sultan Al Khatib</h3>
                    <div class="ms_post_meta">
                        <ul>
                            <li>May 05,2018 / </li>
                            <li>12 likes /    </li>
                            <li>8 comments    </li>
                        </ul>
                    </div>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                    <blockquote>
                        Music is composed and performed for many purposes, ranging from aesthetic pleasure, religious or ceremonial purposes, or as an entertainment product for the marketplace.
                    </blockquote>
                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>
                    <div class="ms_blog_tag foo_sharing">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div> <br>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ms_heading">
                        <h1>Sultan's Performance</h1>
                    </div>
                </div>

                @foreach ($medias as $uploads)
                <div class="col-lg-2 col-md-6">
                    <div class="ms_rcnt_box marger_bottom30">
                        <div class="ms_rcnt_box_img">
                            <img src="{{ asset('storage/' . $uploads->media_thumbnail) }}" alt="" class="img-fluid">
                            <div class="ms_main_overlay">
                                <div class="ms_box_overlay"></div>
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
        <div class="col-lg-3 col-md-3">
            <div class="ms_sidebar">
                <div class="widget widget_categories">
                    <h2 class="widget-title">Specialized on</h2>
                    <ul>
                        <li><a href="#"> Artist & Band Profile</a></li>
                        <li><a href="#"> Best Sale Album</a></li>
                        <li><a href="#"> Concert Ticket</a></li>
                        <li><a href="#"> Most View Videos</a></li>
                        <li><a href="#"> Musical Instrument</a></li>
                        <li><a href="#"> Top Songs</a></li>
                    </ul>
               </div>
               <div class="widget widget_recent_entries">
                    <h2 class="widget-title">Achievements</h2>


                    {{-- <div class="album_single_img image-set" id="photo-viewer">
                        <a data-gallery="photoviewer" data-title="Test" data-group="a"
                            href="{{ asset('sultan_assets/sultan_banner.jpg') }}">
                            <img src="{{ asset('sultan_assets/sultan_banner.jpg') }}" width="50" alt="">
                        </a>
                    </div> --}}


                    <ul>
                        <li>
                            <div class="recent_cmnt_img">
                                <img src="{{ asset('sultan_assets/achivement.jpg') }}" width="50" alt="">
                            </div>
                            <div class="recent_cmnt_data">
                                <h4>
                                    <a data-gallery="manual" data-title="Test" index="0" data-group="a" href="{{ asset('sultan_assets/img1.jpg') }}">Dream Your Moments (Duet)</a>
                                </h4>
                                <span>07 October 2018</span>
                            </div>
                        </li>
                        <li>
                            <div class="recent_cmnt_img">
                                <img src="{{ asset('sultan_assets/achivement.jpg') }}" alt="">
                            </div>
                            <div class="recent_cmnt_data">
                                <h4>
                                    <a data-gallery="manual" data-title="Test" index="1" data-group="a"  href="{{ asset('sultan_assets/img1.jpg') }}">Gimme Some Courage</a>
                                </h4>
                                <span>11 Apr, 2018</span>
                            </div>
                        </li>
                        <li>
                            <div class="recent_cmnt_img">
                                <img src="{{ asset('sultan_assets/achivement.jpg') }}" alt="">
                            </div>
                            <div class="recent_cmnt_data">
                                <h4>
                                    <a data-gallery="manual" data-title="Test" index="2" data-group="a"  href="{{ asset('sultan_assets/sultan_banner.jpg') }}">Until I Met You</a>
                                </h4>
                                <span>24 Apr, 2018</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('[data-gallery=manual]').click(function (e) {

        e.preventDefault();

        var items = [],
        // get index of element clicked
        options = {
            index: $(this).attr("index")
        };

        // looping to create images array
        $('[data-gallery=manual]').each(function () {
        let src = $(this).attr('href');
        items.push({
            src: src
        });
        });

        new PhotoViewer(items, options);

    });
</script>
@endsection
