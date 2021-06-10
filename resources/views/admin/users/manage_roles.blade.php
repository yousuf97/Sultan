  @extends('templates.admin')
  @section('content')
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1>Manage Roles</h1>
                      </div>
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item active">Manage Roles</li>
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
                              {!! Form::open(['action' => 'admin\UserController@create_role', 'method' => 'POST', 'id' => 'role-form']) !!}
                              {{ csrf_field() }}
                              <div class="card-header">
                                  <h3 class="card-title">Create Roles</h3>
                              </div>

                              <div class="card-body">

                                  <div class="row">

                                      <div class="col-md-5">
                                          <div class="form-group">
                                              <label>Role*</label>
                                              <input type="text" class="form-control" name="role"
                                                  placeholder="Enter Role name" required>

                                          </div>

                                          <div class="form-group">
                                              <label>Display Name*</label>
                                              <input type="text" class="form-control" name="display_name"
                                                  placeholder="Enter Display name" required>
                                          </div>

                                          <div class="form-group">
                                              <label>Description</label>
                                              <textarea class="form-control" rows="2" name="description"
                                                  placeholder="Enter address"></textarea>
                                          </div>

                                      </div>
                                      <div class="col-md-7">

                                          <label>Assign Permissions</label>
                                          <div class="row">

                                              @foreach ($permissions as $permission)
                                                  <div class="col-sm-4">
                                                      <label class="custom-control custom-checkbox">
                                                          <input type="checkbox" class="custom-control-input"
                                                              id="item_checkbox" name="permissions[]" value="{{$permission->id}}">
                                                          <span class="custom-control-label">
                                                              {{$permission->display_name}}
                                                          </span>
                                                      </label>
                                                  </div>
                                              @endforeach

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
                                  <h3 class="card-title">Roles</h3>
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
