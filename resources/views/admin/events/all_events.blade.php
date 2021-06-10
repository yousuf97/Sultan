  @extends('templates.admin')
  @section('content')

      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1>Manage Events</h1>
                      </div>
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item active">Manage Events</li>
                          </ol>
                      </div>
                  </div>
              </div><!-- /.container-fluid -->
          </section>

          <section class="content">
              <div class="container-fluid">
                  <div class="row">
                      <!-- left column -->
                      <div class="col-md-12">
                          <div class="card">
                              <div class="card-header">
                                  <h3 class="card-title">All Events List</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                  <table id="event_list" class="table table-bordered table-hover">
                                      <thead>
                                          <tr>
                                              <th>Name</th>
                                              <th>Category</th>
                                              <th>Start Date</th>
                                              <th>End Date</th>
                                              <th>Age Restriction</th>
                                              <th>Accept Payment</th>
                                              <th>Is active?</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @foreach ($all_events as $event)
                                              <tr>
                                                  <td> {{ $event->title }} </td>
                                                  <td> {{ $event->category }} </td>
                                                  <td> {{ $event->start_date }} </td>
                                                  <td> {{ $event->end_date }}</td>
                                                  <td> {{ $event->age_restrictions }}</td>
                                                  <td> {{ $event->accept_payment }}</td>
                                                  <td> @if ($event->is_active == '1') Yes @else No @endif </td>
                                                  <td>
                                                    <a class="btn btn-app" href="{{ url('admin/events/edit_event/'.$event->id) }}">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a class="btn btn-app" href="{{ url('admin/events/send_invitation/'.$event->id) }}">
                                                        <i class="fas fa-envelope"></i> Send Invitation Email
                                                    </a>
                                                  </td>
                                              </tr>

                                          @endforeach


                                      </tbody>
                                      <tfoot>
                                          <tr>
                                              <th>Name</th>
                                              <th>Category</th>
                                              <th>Start Date</th>
                                              <th>End Date</th>
                                              <th>Age Restriction</th>
                                              <th>Accept Payment</th>
                                              <th>Is active?</th>
                                              <th>Actions</th>
                                          </tr>
                                      </tfoot>
                                  </table>
                              </div>
                              <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                      </div>
                  </div>
              </div>
          </section>
      </div>

      <script>
          $(function() {
              $('#event_list').DataTable({
                  "paging": true,
                  "lengthChange": false,
                  "searching": false,
                  "ordering": true,
                  "info": true,
                  "autoWidth": false,
                  "responsive": true,
              });
          });

      </script>
  @endsection
