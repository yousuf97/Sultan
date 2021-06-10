  @extends('templates.admin')
  @section('content')
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1>Manage Users</h1>
                      </div>
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item active">Manage Users</li>
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
                                  <h3 class="card-title">Create Users</h3>
                              </div>
                              {!! Form::open(['action' => 'admin\UserController@create_user', 'method' => 'POST', 'id' => 'permission-form']) !!}
                              {{ csrf_field() }}
                              <div class="card-body">

                                  <div class="row">

                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label>Full Name*</label>
                                              <input type="text" class="form-control" name="name"
                                                  placeholder="Enter full name" required>
                                          </div>

                                          <div class="form-group">
                                              <label>Email Address*</label>
                                              <input type="text" class="form-control" name="email"
                                                  placeholder="Enter email adress" required>
                                          </div>
                                         

                                      </div>
                                      <div class="col-md-6">
                                          
                                          <div class="form-group">
                                              <label>Password*</label>
                                              <input type="text" class="form-control" name="password"
                                                  placeholder="Enter password" required>
                                          </div>
                                          <div class="form-group">
                                              <label>Assigned to Role</label>
                                              <select class="select2" data-placeholder="Select role"
                                                  name="role" style="width: 100%;">
                                                  @foreach ($roles as $role)
                                                      <option value="{{ $role->id }}">
                                                          {{ $role->display_name }}
                                                      </option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="card-footer">
                                  <button type="submit" class="btn btn-primary float-right">Save</button>
                              </div>
                              {!! Form::close() !!}
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <!-- left column -->
                      <div class="col-md-12">
                          <div class="card">
                              <div class="card-header">
                                  <h3 class="card-title">Permissions</h3>
                              </div>

                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-md-12">



                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>
          </section>


      </div>
  @endsection
