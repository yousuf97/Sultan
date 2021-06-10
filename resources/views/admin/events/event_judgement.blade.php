@extends('templates.admin')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Title: {{$event->title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Timeline</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            @if ($participants_entry->count() <= 0)

                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-info"></i> No records found!</h5>
                    No more participation found for the competetion <b> {{$event->title}} </b>
                  </div>
            @endif
            <div class="timeline">
              <!-- timeline time label -->

              @foreach ($participants_entry as $entry)


              <div class="time-label">
                <span class="bg-red">{{formatDate($entry->registrationTime, 1)}}</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-user bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i>&nbsp;{{formatDate($entry->registrationTime, 1)}}</span>
                  <h3 class="timeline-header"><a href="#">{{$entry->uName}}</a> {{$entry->mTitle}}</h3>

                  <div class="timeline-body">
                    {{$entry->mDescription}}
                  </div>

                  <div class="timeline-body">
                    @if ($entry->mType =='image')
                        <img src="{{ asset('storage/' . $entry->fUrl) }}" width="300" alt="...">
                    @endif

                    @if ($entry->mType =='video')
                        <video width="320" height="240" controls>
                            <source src="{{ asset('storage/' . $entry->fUrl) }}" type="{{ $entry->mimeType }}">
                        </video>
                    @endif

                    @if ($entry->mType =='audio')
                        <audio controls>
                            <source src="{{ asset('storage/' . $entry->fUrl) }}" type="{{ $entry->mimeType }}">
                        </audio>
                    @endif
                  </div>

                  <div class="timeline-footer">

                    <div style="width:30%;">
                        <label>Mark as Publish & give score (Score can be 0 - 10)</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <input type="checkbox" name="status" id="c_status_{{$entry->rId}}" @if ($entry->mStatus == 'published') checked @endif>
                                </span>
                              </div>
                            <input type="text" value="{{$entry->cScore}}" name="score" id="c_score_{{$entry->rId}}" class="form-control" placeholder="Enter score out of 10">
                            <input type="text" value="{{$entry->cComments}}" name="comments" id="c_comments_{{$entry->rId}}" class="form-control" placeholder="Enter comments">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-danger" onclick="update_media_entry({{$entry->rId}}, {{$entry->media_entry_id}})">Update</button>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              @endforeach


            </div>
          </div>
        <div class="row">
        <div class="col-md-12">
            <nav aria-label="Contacts Page Navigation">
                {{ $participants_entry->links('pagination::bootstrap-4') }}
           </nav>
        </div>
        </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
    function update_media_entry(competetion_entry_id, media_entry_id){
        var c_status = document.getElementById("c_status_"+competetion_entry_id);
        if (c_status.checked == true){
            c_status = "published";
        } else {
            c_status = "unpublished";
        }
        var post = {
          'status' : c_status,
          'score' : $('#c_score_'+competetion_entry_id).val(),
          'comments' : $('#c_comments_'+competetion_entry_id).val(),
          'competetion_entry_id': competetion_entry_id,
          'media_entry_id': media_entry_id
        }
        var url = window.location.origin + '/admin/events/updatescore';
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
</script>

  @endsection
