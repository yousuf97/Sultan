@extends('templates.theme1')
@section('content')

 <!----Top Artist Section---->
 <div class="ms_top_artist">
    <div class="container-fluid">
        {{-- "col-lg-9 col-md-9 --}}
        <div class="row">
            <div class="col-lg-9 col-md-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ms_heading">
                            <h1>Search Result</h1>
                        </div>
                    </div>
                    @if ($medias->count() <= 0)
                        <p class="no-record-found">No records found </p>
                    @endif
                    @foreach ($medias as $uploads)
                    <div class="col-lg-2 col-md-6">
                        <div class="ms_rcnt_box marger_bottom30">
                            <div class="ms_rcnt_box_img">
                                <img src="{{ asset('storage/' . $uploads->media_thumbnail) }}" alt="" class="img-fluid">
                                <div class="ms_main_overlay">
                                    <div class="ms_box_overlay"></div>
                                    <div class="ms_more_icon">
                                        <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                    </div>
                                    <ul class="more_option" style="right: 30px;max-width: 150px;">
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
            <div class="col-lg-3 col-md-3">
                <div class="ms_sidebar">
                    <!--Categories-->
                    <div class="widget widget_categories">
                        <h2 class="widget-title">Main Categories</h2>
                        <ul>
                            @foreach ($event_categories as $category)
                            <li><a href="{{ url('media/search_list?category='.$category->value) }}"> {{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!--Feature Post-->
                    <!---Tags--->
                    <div class="widget widget_tag_cloud">
                        <h2 class="widget-title">Tags</h2>
                        <ul>
                            @foreach ($tags as $tag)
                            <li><a href="{{ url('media/search_list?tag='.$tag->tag_name) }}">{{$tag->tag_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

@endsection
