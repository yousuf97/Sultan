  @extends('templates.admin')
  @section('content')

     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h2 class="text-center display-4">All Media Uploads</h2>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            {{-- <form action="enhanced-results.html">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Result Type:</label>
                                    <select class="select2" multiple="multiple" data-placeholder="Any" style="width: 100%;">
                                        <option>Text only</option>
                                        <option>Images</option>
                                        <option>Video</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Sort Order:</label>
                                    <select class="select2" style="width: 100%;">
                                        <option selected>ASC</option>
                                        <option>DESC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Order By:</label>
                                    <select class="select2" style="width: 100%;">
                                        <option selected>Title</option>
                                        <option>Date</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" value="">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form> --}}


            <div class="row mt-3">
                <div class="col-md-10 offset-md-1">
                    <div class="list-group">
                        @foreach ($uploads as $entry)
                        <div class="list-group-item">
                            <div class="row">
                                <img src="{{ asset('storage/' . $entry->mThumbnail) }}" width="200" alt="...">
                                <div class="col px-4">
                                    <div>
                                        <div class="float-right">Uploaded on:{{$entry->mCreatedAt}}</div>
                                        <h3>{{$entry->mTitle}} <span style="font-size: 12px;"> {{$entry->uName}} </span> </h3>
                                        <p class="mb-0"> {{$entry->mDescription}}</p>
                                    </div>
                                    <br>
                                      @php
                                          $function = "open_review_model('".$entry->fUrl."','".$entry->mType."','".$entry->mimeType."')";
                                      @endphp
                                      <button type="button" class="btn btn-info" onclick="{{$function}}">
                                        Review Media
                                       </button>
                                </div>

                                <div>
                                    <label>Mark as Publish & give Comments</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <input type="checkbox" name="status" id="c_status_{{$entry->media_entry_id}}" @if ($entry->mStatus == 'published') checked @endif>
                                            </span>
                                          </div>

                                        <input type="text" value="{{$entry->mStatusComment}}" id="c_comments_{{$entry->media_entry_id}}" name="comments" class="form-control" placeholder="Enter comments">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-danger" onclick="update_media_entry({{$entry->media_entry_id}})">Update</button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="card-footer">
                        <nav aria-label="Contacts Page Navigation">
                             {{ $uploads->links('pagination::bootstrap-4') }}
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </section>
  </div>

  <div class="modal fade" id="mediaReviewModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Extra Large Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" align="center">

            <img id="media_image" src="" style="display: none;width:100%;" >

            <video id="media_video" controls style="display: none; width:100%;">
                <source id="media_video_src" src="" type="">
            </video>

            <audio id="media_audio" controls style="display: none;">
                <source id="media_audio_src" src="" type="">
            </audio>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <script>
    function update_media_entry(media_entry_id){
        var c_status = document.getElementById("c_status_"+media_entry_id);
        if (c_status.checked == true){
            c_status = "published";
        } else {
            c_status = "unpublished";
        }
        var post = {
          'status' : c_status,
          'comments' : $('#c_comments_'+media_entry_id).val(),
          'media_entry_id': media_entry_id
        }
        var url = window.location.origin + '/admin/uploads/media_publish_unpublish';
      $.ajax({
          beforeSend: function(request) {
          request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
          },
          type: "POST",
          dataType: "json",
          url: url,
          data: post,
          success: function (data) {
              if (data.status == 1) {
                  toastr.success(data.messages.messageText);
              } else {
                  toastr.error(data.messages.messageText);
              }
          }
      });
    }

    function open_review_model(file_url, type, mime){
        type = type.trim();
        var origin = window.location.origin+'/storage/';
        var video = document.getElementById('media_video');
        var audio = document.getElementById('media_audio');
        $('#mediaReviewModal').modal('show');
        if(type == 'image'){
            var image = document.getElementById('media_image');
            image.src = origin + file_url;
            image.style.display = "block";
        }else if(type == 'video'){
            var source = document.getElementById('media_video_src');
            source.setAttribute('src', origin + file_url);
            source.setAttribute('type', mime);
            video.load();
            video.style.display = "block";
        }else if(type == 'audio'){
            var source = document.getElementById('media_audio_src');
            source.setAttribute('src', origin + file_url);
            source.setAttribute('type', mime);
            audio.load();
            audio.style.display = "block";
        }else{
            alert('Failed to process media');
        }

        $('#mediaReviewModal').on('hidden.bs.modal', function () {
            if(type == 'video'){
                video.pause();
            }else if(type == 'audio'){
                audio.pause();
            }else{
                console.log('nothing to do');
            }
        });
    }
</script>

  @endsection
