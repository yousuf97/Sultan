@extends('templates.admin')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Competition Participants</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Competition</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Competition</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                        Competition Name
                      </th>
                      <th style="width: 30%">
                          Participants
                      </th>
                      <th>
                         % of Registration
                      </th>
                      <th style="width: 8%" class="text-center">
                        Status
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>

                @foreach ($all_events as $event)

                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                             {{$event->title}}
                          </a>
                          <br/>
                          <small>
                            {{$event->start_date}} - {{$event->end_date}}
                          </small>
                      </td>
                      <td>
                          @php
                              $participants = get_all_participants($event->id);

                          @endphp
                          <ul class="list-inline">
                              @foreach ($participants as $participant)
                              <li class="list-inline-item">
                                @if ($participant->profile_pic != '-')
                                    <img alt="Avatar" width="215" class="table-avatar" src="{{ asset($participant->profile_pic)}} ">
                                @endif
                            </li>
                              @endforeach
                          </ul>
                      </td>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: {{count($participants)}}%">
                              </div>
                          </div>
                          <small>
                              {{count($participants)}} Registration
                          </small>
                      </td>
                      <td class="project-state">
                          @if ($event->is_active == '1')
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-warning">In Active</span>
                          @endif

                      </td>
                      <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="{{ url('admin/events/judgement/'.$event->id) }}">
                            <i class="fas fa-gavel">
                            </i>
                            Judgement
                        </a>
                          <a class="btn btn-info btn-sm" href="{{ url('admin/events/edit_event/'.$event->id) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              View
                          </a>
                      </td>
                  </tr>

                  @endforeach





              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
