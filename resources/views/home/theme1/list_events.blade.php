  @extends('templates.theme1')
  @section('content')

      <!--- blog section start --->
      <div class="ms_blog_wrapper">
        <div class="ms_heading">
            <h1>Latest Competitions</h1>
        </div>
          <div class="row">
            @if (count($all_events) <= 0)
              <p style="text-align: center;width:100%;">Sorry, no record found</p>
            @endif

            @foreach ($all_events as $event)
              <div class="col-lg-6">
                  <div class="ms_blog_section blog_active marger_bottom30">
                      <div class="ms_blog_img">
                          <img src="{{asset('storage/'.$event->file)}}" alt="" class="img-fluid">
                      </div>
                      <div class="ms_main_overlay">
                          <div class="ms_box_overlay"></div>
                          <div class="ovrly_text_div">
                              <span class="ovrly_text1"><a href="{{ url('competition/details/'.encript($event->id)) }}">{{ $event->title }}</a></span>
                              <div class="bottom">
                                  <span class="ovrly_text1">{{ formatDate($event->start_date) }} To {{ formatDate($event->end_date) }}</span>
                                  <span class="ovrly_text2"><a href="{{ url('competition/details') }}"><i
                                              class="fa fa-long-arrow-right"></i></a></span>
                              </div>
                          </div>
                      </div>
                      <div class="ms_box_overlay_on">
                          <div class="ovrly_text_div">
                              <span class="ovrly_text1"><a href="{{ url('competition/details/'.encript($event->id)) }}">{{ $event->title }}</a></span>
                          </div>
                      </div>
                  </div>
              </div>
            @endforeach

          </div>
      </div>

      </div>
  @endsection
