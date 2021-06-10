  @extends('templates.theme1')
  @section('content')

          <!----Top Artist Section---->
          <div class="ms_top_artist">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="ms_heading">
                              <h1>{{$type}}</h1>
                          </div>
                      </div>
                      @if ($medias->count() <= 0)
                          <p class="no-record-found">No records found from {{$type}}</p>
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
          </div>

        <div class="card-footer">
            @if ($medias->count() > 0)
                <nav aria-label="Contacts Page Navigation">
                    {{ $medias->links('pagination::bootstrap-4') }}
               </nav>
            @endif
        </div>

      </div>
  @endsection
