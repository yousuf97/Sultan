@extends('templates.theme1')
@section('content')
    <!----Live Radio Section Start---->
    <div class="ms_top_artist">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ms_heading">
                        <h1>Your Playlists</h1>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger" style="margin: 20px 0px 35px 0px;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                @foreach ($play_lists as $play_list)
                @if ($play_list->title != 'Competition')
                <div class="col-lg-2 col-md-6">
                    <div class="ms_rcnt_box marger_bottom25">
                        <div class="ms_rcnt_box_img">
                            <img src="{{ asset('storage/' . $play_list->thumbnail) }}" alt="" class="img-fluid">
                            <div class="ms_main_overlay">
                                <div class="ms_box_overlay"></div>
                                <div class="ms_more_icon">
                                    <img src="{{ asset('home/theme1/images/svg/more.svg') }}" alt="">
                                </div>
                                <ul class="more_option">
                                    <li class="c_media_icons" onclick="editPlayList('{{encript($play_list->id)}}','{{trim($play_list->title)}}','{{trim($play_list->thumbnail)}}')"><a><span class="opt_icon"><i class="fa fa-edit"></i></span>Edit Playlist</a></li>
                                    <li class="c_media_icons"><a href="{{ url('my_account/play_list/delete_playlist/'.encript($play_list->id)) }}" onclick="return confirm('Are you sure to delete {{trim($play_list->title)}} from the playlist?')"><span class="opt_icon"><i class="fa fa-trash"></i></span>Delete Playlist</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="ms_rcnt_box_text">
                            <h3><a href="#">{{$play_list->title}}</a></h3>
                            <p>{{$play_list->line_count}} files</p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach

                <div class="col-lg-2">
                    <div class="ms_rcnt_box marger_bottom25" data-toggle="modal" data-target="#playlistModal">
                        <div class="create_playlist">
                            <i class="ms_icon icon_playlist"></i>
                        </div>
                        <div class="ms_rcnt_box_text">
                            <h3>
                                <a href="clear_modal" class="ms_save" data-toggle="modal" data-target="#exampleModal">Create New Playlist</a>
                            </h3>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ms_top_artist">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ms_heading">
                        <h1>My Uploads</h1>
                    </div>
                </div>
                @if ($medias->count() <= 0)
                    <p class="no-record-found">No records found from your uploads</p>
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
                                <ul class="more_option">
                                    <li class="c_media_icons"><a href="{{ url('my_account/play_list/delete_my_media/'.encript($uploads->id)) }}" onclick="return confirm('Are you sure to delete {{trim($uploads->title)}} from your media entries?')"><span class="opt_icon"><i class="fa fa-trash"></i></span>Delete Media</a></li>
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
                          <p>Status: <span style="background: grey;padding: 7px;border-radius: 15px;"> {{$uploads->status}} </span> </p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!----Main div close---->

@endsection
