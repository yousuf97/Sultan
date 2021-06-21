  @extends('templates.admin')
  @section('content')
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1>Manage Permissions</h1>
                      </div>
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item active">Manage Permissions</li>
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
                                  <h3 class="card-title">Create Permissions</h3>
                              </div>
                              {!! Form::open(['action' => 'admin\UserController@create_permission', 'method' => 'POST', 'id' => 'permission-form']) !!}
                              {{ csrf_field() }}
                              <div class="card-body">

                                  <div class="row">

                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label>Permission*</label>
                                              <input type="text" class="form-control" name="permission"
                                                  placeholder="Enter permission name" required>
                                          </div>

                                          <div class="form-group">
                                              <label>Display Name*</label>
                                              <input type="text" class="form-control" name="display_name"
                                                  placeholder="Enter Display name" required>

                                          </div>

                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label>Description</label>
                                              <textarea class="form-control" rows="2" name="description"
                                                  placeholder="Enter address"></textarea>
                                          </div>
                                          <div class="form-group">
                                              <label>Assigned to Role*</label>
                                              <select class="select2" multiple="multiple" data-placeholder="Select role"
                                                  name="roles[]" style="width: 100%;" required>
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
