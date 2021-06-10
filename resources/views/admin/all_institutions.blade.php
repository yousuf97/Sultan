  @extends('templates.admin')
  @section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1>Institutions</h1>
                          <a href="{{ url('admin/masterdata/add_institution') }}"
                              class="btn btn-sm btn-primary float-right">
                              <i class="fas fa-building"></i> Add Institution
                          </a>
                      </div>
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item active">Institutions</li>
                          </ol>
                      </div>
                  </div>
              </div><!-- /.container-fluid -->
          </section>

          <!-- Main content -->
          <section class="content">

              <!-- Default box -->
              <div class="card card-solid">
                  <div class="card-body pb-0">
                      <div class="row d-flex align-items-stretch">

                          @foreach ($institutions as $institution)
                              <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                  <div class="card bg-light">
                                      <div class="card-header text-muted border-bottom-0">
                                          {{ $institution->category }}
                                      </div>
                                      <div class="card-body pt-0">
                                          <div class="row">
                                              <div class="col-7">
                                                  <h2 class="lead"><b>{{ $institution->title }}</b></h2>
                                                  <p class="text-muted text-sm"><b>About: </b>
                                                      {{ $institution->description }} </p>
                                                  <ul class="ml-4 mb-0 fa-ul text-muted">
                                                      <li class="small"><span class="fa-li"><i
                                                                  class="fas fa-lg fa-building"></i></span> Address:
                                                          {{ $institution->address }}</li>
                                                      <li class="small"><span class="fa-li"><i
                                                                  class="fas fa-lg fa-phone"></i></span> Phone #:
                                                          {{ $institution->phone }}</li>
                                                      <li class="small"><span class="fa-li"><i
                                                                  class="far fa-lg fa-envelope"></i></span> Email:
                                                          {{ $institution->email }}</li>
                                                  </ul>
                                              </div>
                                              <div class="col-5 text-center">
                                                  <img src="{{asset('storage/'.$institution->file)}}" alt="user-avatar"
                                                      class=" img-fluid">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="card-footer">
                                          <div class="text-right">
                                              <a href="#" class="btn btn-sm bg-teal">
                                                  <i class="fas fa-envelope"></i>
                                              </a>
                                              <a href="{{ url('admin/masterdata/edit_institution/'.$institution->id) }}" class="btn btn-sm btn-primary">
                                                  <i class="fas fa-user"></i> Edit Info
                                              </a>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                          @endforeach
                      </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                      <nav aria-label="Contacts Page Navigation">
                           {{ $institutions->links('pagination::bootstrap-4') }}
                      </nav>
                  </div>
                  <!-- /.card-footer -->
              </div>
              <!-- /.card -->

          </section>
          <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
  @endsection
