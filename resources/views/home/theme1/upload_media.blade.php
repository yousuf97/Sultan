       @extends('templates.theme1')
       @section('content')
           <!----Upload and Share Wrapper Start---->
           <div class="ms_upload_wrapper marger_top60">

            {!! Form::open(['action' => 'home\MediaManagerController@media_uploads', 'method' => 'POST',
            'enctype' => 'multipart/form-data', 'id' => 'upload-form', 'class' => ""]) !!}
            {{ csrf_field() }}


               <div class="ms_upload_box" id="file_upload_area">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                   <h2>Upload & Share Your Creativity With The World</h2>

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
                        <input type="file" id="file" class="uload_media_file" name="media_file">
                        <label for="file">Select file</label>
                    </div>

                   </div>
                   <span id="accept_format" style="font-size: 12px;"> Please select file type </span>
                   <p id="upload_size" style="font-size: 12px;margin-top: -5px;margin-bottom: 15px;"></p>
                   <p>Select Media Type and Upload</p>
               </div>
               <div class=" marger_top60">
                   <div class="ms_upload_box">
                       <div class="ms_heading">
                           <h1>Track Information</h1>
                       </div>
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
                                <label>Select Category *</label>
                                <select class="form-control" name="category" required>
                                    <option value="">Select Category</option>
                                    @foreach ($event_categories as $category)
                                    <option value="{{ $category->value }}">{{ $category->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Playlist *</label> <a data-toggle="modal" data-target="#playlistModal" href="javascript:void(0)" style="float: right;"> Create Play List</a>
                                <select class="form-control" name="play_list" required>
                                    <option value="">Select Playlist</option>
                                    @foreach ($play_lists as $play_list)
                                        <option value="{{$play_list->id}}">{{ $play_list->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                           <div class="form-group">
                                <label>Tags *</label>
                                <select class="select2" multiple="multiple" name="tags[]" data-placeholder="Select a tags" style="width: 100%;" required>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->tag_name }}">{{ $tag->tag_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Search Key *</label>
                                <input type="text" placeholder="Enter search key" name="search_keys" class="form-control" required>
                            </div>
                           <div class="form-group">
                               <label>Select Privacy*</label>
                               <select class="form-control" name="visibility" required>
                                   <option value="">Select Privacy</option>
                                   <option value="public">Post as Public</option>
                               </select>
                           </div>
                           <div class="form-group">
                                <label>Upload Thumbnails *</label>
                                <input type="file" name="media_thumbnail" class="form-control" required>
                                <span style="float: left;font-size: 12px;">(Type: jpg, jpeg, png, gif, ttf, in 240x240 Pixel & Size: &lt;2Mb)</span>
                            </div>
                           <div class="pro-form-btn text-center marger_top15">
                               <div class="ms_upload_btn">
                                    <input type="submit" onclick="return showLoader('upload-form')" class="ms_btn ms_btn_custom" value="Upload Now">
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               {!! Form::close() !!}
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
           <!----Main div close---->
       @endsection
