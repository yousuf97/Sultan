  @extends('templates.theme1')
  @section('content')
 <!--- blog single section start --->
 <div class="ms_blog_single_wrapper">
    <div class="row">
        <div class="col-lg-9 col-md-9">

            <div class="ms_blog_single">
                <div class="blog_single_img">
                    <img src="{{asset('storage/'.$event_details->file)}}" alt="" class="img-fluid">
                </div>
                <div class="blog_single_content">
                    <h3 class="ms_blog_title">{{$event_details->title}}</h3>
                    <div class="ms_post_meta">
                        <ul>
                            <li>From {{formatDate($event_details->start_date,2)}}  To</li>
                            <li>{{formatDate($event_details->end_date,2)}}  </li>
                        </ul>
                    </div>

                    <div style="color: #fff;">
                      {!!html_entity_decode($event_details->description)!!}
                    </div>
                </div>

                {!! Form::open(['action' => 'home\EventsController@accept_registration', 'method' => 'POST',
                'enctype' => 'multipart/form-data', 'id' => 'upload-form', 'class' => ""]) !!}
                {{ csrf_field() }}
                <input type="hidden" name="event_id" value="{{$encrypt_id}}">
                <div class="ms_heading marger_top60">
                    <h1>Participate to the competition </h1>
                </div>

                <div class="event_terms">
                    <p>Prerequisite for the participation<p>
                        <ul>
                            <li>Multiple applications for the same competetion will be regected</li>
                            <li>All the fileds marked as with <b>*</b> is mandatory.</li>
                            <li>An address proof must be updated from the <a href="{{ url('my_account/profile')}}" target="_blank">Profile Page</a> </li>
                        </ul>
                        <br>
                        @if ($total_registration > 0)
                            <div class="alert alert-primary" role="alert">
                                The maximum number of application is restricted to {{$event_details->max_entry_limit}}, already recieved {{$total_registration}} applications.
                            </div>
                        @endif
                </div>
                <div class="row ">
                    <div class="col-md-6">

                        <div class="ms_upload_box" id="file_upload_area" style="width: 100%;">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                               <h2>Upload Your Creativity With The World</h2>
                               <div class="marger_top60">
                                <input type="hidden" id="media_type" name="media_type" value="">
                                <select class="custom_type_select">
                                    <option value="video">Video</option>
                                    {{-- <option value="audio">Audio</option> --}}
                                    <option value="image">Image</option>
                                </select>
                               </div>

                               <img id="upload_icon" src="{{ asset('home/theme1/images/svg/upload.svg') }}" alt="">

                                <!-- Preview -->
                                    <img id="image" style="display: none; max-width: 500px;">
                                    <video id="video" style="display: none;max-height: 200px; margin: 15px;"></video>
                                    <audio id="audio" style="display: none;margin: 15px;" controls>
                                        <source src="" id="audioSrc" />
                                    </audio>
                                <!-- Preview -->

                               <div class="ms_upload_btn">
                                   {{-- <a href="#" class="ms_btn">Upload file</a> --}}

                                <div class="file-input" align="center">
                                    <input type="file" id="file" class="uload_media_file" name="media_file" required>
                                    <label for="file">Select file</label>
                                </div>

                               </div>
                               <span id="accept_format" style="font-size: 12px;"> Please select file type </span>
                               <p id="upload_size" style="font-size: 12px;margin-top: -5px;margin-bottom: 15px;"></p>
                               <p>Select Media Type and Upload</p>
                           </div>
                    </div>

                    <div class="col-md-6">
                        <div class="">
                            <div class="ms_upload_box" style="width: 100%;">
                                {{-- <div class="ms_heading">
                                    <h1>Track Information</h1>
                                </div> --}}
                                <div class="ms_pro_form">
                                    <div class="form-group">
                                        <label>Title *</label>
                                        <input type="text" placeholder="Enter title here" name="title" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Short Description *</label>
                                        <input type="text" placeholder="Enter description here" name="description" class="form-control" required>
                                    </div>

                                     <div class="form-group">
                                         <label>Select Playlist *</label>
                                         <select class="form-control" name="play_list" required>
                                             <option value="">Select Playlist</option>
                                             @foreach ($play_lists as $play_list)
                                                <option value="{{$play_list->id}}">{{ $play_list->title }}</option>
                                             @endforeach
                                         </select>
                                     </div>
                                     <div class="form-group">
                                         <label>Search Key *</label>
                                         <input type="text" placeholder="Enter search key" name="search_keys" class="form-control" required>
                                     </div>
                                    <div class="form-group">
                                        <label>Select Privacy *</label>
                                        <select class="form-control" name="visibility" required>
                                            <option value="">Select Privacy</option>
                                            <option value="public">Post to Public</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                         <label>Upload Thumbnails *</label>
                                         <input type="file" name="media_thumbnail" class="form-control" required>
                                         <span style="float: left;font-size: 12px;">(Type: jpg, jpeg, png, gif, ttf, in 240x240 Pixel & Size: &lt;2Mb)</span>
                                     </div>
                                    <div class="pro-form-btn text-center marger_top15">
                                        <div class="ms_upload_btn">
                                             <input type="submit" onclick="return showLoader('upload-form')" class="ms_btn ms_btn_custom" value="Apply Now">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {!! Form::close() !!}

            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <!----Sidebar Start---->
            <div class="ms_sidebar">
                <!--Categories-->
                <div class="widget widget_categories">
                    <h2 class="widget-title">Competition Categories</h2>
                    <ul>
                        @foreach ($event_categories as $category)
                        <li><a href="{{ url('competition/list_competition?category='.$category->value) }}"> {{$category->name}}</a></li>
                        @endforeach

                    </ul>
                </div>
                <!--Feature Post-->
                <div class="widget widget_recent_entries">
                    <h2 class="widget-title">Other Competition</h2>
                    <ul>

                      @foreach ($other_events as $event)
                        <li>
                            <div class="recent_cmnt_img">
                                <img src="{{asset('storage/'.$event->file)}}" alt="" width="50">
                            </div>
                            <div class="recent_cmnt_data">
                                <h4><a href="#">{{ $event->title }}</a></h4>
                                <span>{{ $event->start_date }} To {{ $event->end_date }}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!---Tags--->
                <div class="widget widget_tag_cloud">
                    <h2 class="widget-title">Tags</h2>
                    <ul>
                        @foreach ($tags as $tag)
                        <li><a href="#">{{$tag->tag_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    (function ($) {
        $('.select2').select2();


        // For Image type upload
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                $('#image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#file").change(function(event) {

            var fileInput = document.getElementById('file');
            var filePath = fileInput.value;
            var allowedImgExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            var allowedAudioExtensions = /(\.mp3|\.ogg|\.wav)$/i;
            var allowedVideoExtensions = /(\.mp4|\.mov|\.avi|\.wmv|\.flv|\.3gp)$/i;
            var image = document.getElementById("image");
            var video = document.getElementById("video");
            var audio = document.getElementById("audio");
            var upload_icon = document.getElementById("upload_icon");

            if (allowedImgExtensions.exec(filePath)) { // Condition for Image
                image.style.display = "inline-block";
                video.style.display = "none";
                audio.style.display = "none";
                upload_icon.style.display = "none";
                readURL(this);
            }
            if (allowedVideoExtensions.exec(filePath)) { // Condition for Video
                image.style.display = "none";
                video.style.display = "inline-block";
                audio.style.display = "none";
                upload_icon.style.display = "none";
                let file = event.target.files[0];
                let blobURL = URL.createObjectURL(file);
                document.querySelector("video").src = blobURL;
            }
            if (allowedAudioExtensions.exec(filePath)) { // Condition for Audio
                image.style.display = "none";
                video.style.display = "none";
                audio.style.display = "inline-block";
                upload_icon.style.display = "none";

                var files = event.target.files;
                $("#audioSrc").attr("src", URL.createObjectURL(files[0]));
                document.getElementById("audio").load();
            }

        });


        $(".custom_type_select option").unwrap().each(function() {
            var current_option = $(this).text().trim();
            var txt = '';
            if(current_option == 'Video'){
                txt = '<i class="fa fa-film m_chooser_icon" aria-hidden="true"></i>'+ current_option;
            }else if(current_option == 'Audio'){
                txt = '<i class="fa fa-headphones m_chooser_icon" aria-hidden="true"></i>'+ current_option;
            }else if(current_option == 'Image'){
                txt = '<i class="fa fa-image m_chooser_icon" aria-hidden="true"></i>'+ current_option;
            }else{
                txt = current_option;
            }
            var onclick = "fileTypeChanges('"+current_option+"')";
            var btn = $('<div onclick="'+onclick+'" class="media_chooser_btn">'+txt+'</div>');
            $(this).replaceWith(btn);
        });

        $(document).on('click', '.media_chooser_btn', function() {
            $('.media_chooser_btn').removeClass('on');
            $(this).addClass('on');
        });

    })(jQuery);

    function fileTypeChanges(selecter){
        //
            var accept_format = "Please Select File Type";
            var upload_size = "Max. Upload size: 10 Mb ";
            if(selecter == 'Video'){
                accept_format = "Accept Formats: mp4,mov,avi,wmv,flv,m3u8,3gp";
                document.getElementById("file").accept = "video/*";
                document.getElementById("accept_format").innerHTML = accept_format;
                document.getElementById("upload_size").innerHTML = upload_size;
                document.getElementById("media_type").value = selecter;
            }else if(selecter == 'Audio'){
                accept_format = "Accept Formats: mp3,ogg,wav";
                document.getElementById("file").accept = "audio/*";
                document.getElementById("accept_format").innerHTML = accept_format;
                document.getElementById("upload_size").innerHTML = upload_size;
                document.getElementById("media_type").value = selecter;
            }else if(selecter == 'Image'){
                accept_format = "Accept Formats: jpg,jpeg,png,gif,ttf";
                document.getElementById("file").accept = "image/*";
                document.getElementById("accept_format").innerHTML = accept_format;
                document.getElementById("upload_size").innerHTML = upload_size;
                document.getElementById("media_type").value = selecter;
            }else{
                document.getElementById("file").accept = "";
                document.getElementById("accept_format").innerHTML = "Please Select File Type";
                document.getElementById("upload_size").innerHTML = "Please Select File Type";
                document.getElementById("media_type").value = '';
            }
        }
    </script>
  @endsection
