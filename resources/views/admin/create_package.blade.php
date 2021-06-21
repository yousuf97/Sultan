  @extends('templates.admin')
  @section('content')
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                          Create Package
                      </div>

                      <?php if (isset($package_info)) {
                        $action = 'admin\ManagePackageController@update_package';
                        $action_array = [$action, $id];
                      } else {
                        $action = 'admin\ManagePackageController@save_package';
                        $action_array = [$action];
                      } ?>

                      <div class="card-body">
                          {!! Form::open(['action' => $action_array, 'method' => 'POST',
                          'class' => 'tm-appointment-form']) !!}
                          {{ csrf_field() }}
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Package Title</label>
                                      <input type="text" name="title" class="form-control" aria-describedby="packageTitle"
                                          placeholder="Enter package title"
                                          value="@isset($package_info) {{ $package_info[0]->title }} @endisset ">
                                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                          anyone else.</small>
                                  </div>

                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Package Description</label>
                                      <textarea class="form-control" rows="3" name="package_description"
                                          placeholder="Enter package description">@isset($package_info) {{ $package_info[0]->description }} @endisset</textarea>
                                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                          anyone else.</small>
                                  </div>

                                  <div class="form-row">
                                      <div class="form-group col-md-6">
                                          <label for="inputCity">Actual Price</label>
                                          <input type="text" class="form-control" name="actual_price"
                                              placeholder="Actual Price"
                                              value="@isset($package_info) {{ $package_info[0]->actual_price }} @endisset ">
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label for="inputState">Discount Price</label>
                                          <input type="text" class="form-control" name="discount_price"
                                              placeholder="Discount Price"
                                              value="@isset($package_info) {{ $package_info[0]->discount_price }} @endisset ">
                                      </div>
                                  </div>

                                   <div class="form-group">
                                      <label for="exampleInputEmail1">Features</label>
                                      <textarea class="form-control" rows="3" name="package_feature"
                                          placeholder="Separate features by #">@isset($package_info) {{ $package_info[0]->package_feature }} @endisset</textarea>
                                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                          anyone else.</small>
                                  </div>
                              </div>
                              <div class="col-md-6">

                                  <div class="form-group" id="dynamic_form">
                                      <div class="row">
                                          <div class="col-md-4">
                                              <input type="text" name="g_name" id="g_name" placeholder="Group Name"
                                                  class="form-control">
                                          </div>
                                          <div class="col-md-6">
                                              <textarea class="form-control" rows="1" name="tests"
                                                  placeholder="Enter Test names separated by # " id="tests"></textarea>
                                          </div>
                                          <div class="button-group">
                                              <a href="javascript:void(0)" class="btn btn-primary" id="plus5">+</a>
                                              <a href="javascript:void(0)" class="btn btn-danger" id="minus5">-</a>
                                          </div>
                                      </div>
                                  </div>
                                  <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                          </div>
                          {!! Form::close() !!}

                      </div>
                  </div>
              </div>
          </div>
      </main>
      <script>
          $(document).ready(function() {
              var dynamic_form = $("#dynamic_form").dynamicForm("#dynamic_form", "#plus5", "#minus5", {
                  limit: 25,
                  formPrefix: "dynamic_form",
                  normalizeFullForm: false
              });

              @isset($package_test_info)
                dynamic_form.inject(  {!! json_encode($package_test_info) !!});
              @endisset

              $("#dynamic_form #minus5").on('click', function() {
                  var initDynamicId = $(this).closest('#dynamic_form').parent().find("[id^='dynamic_form']")
                      .length;
                  if (initDynamicId === 2) {
                      $(this).closest('#dynamic_form').next().find('#minus5').hide();
                  }
                  $(this).closest('#dynamic_form').remove();
              });

              // $('form').on('submit', function(event){
              // 	var values = {};
              // 	$.each($('form').serializeArray(), function(i, field) {
              // 	    values[field.name] = field.value;
              // 	});
              // 	console.log(values)
              // 	event.preventDefault();
              // })
          });

      </script>

  @endsection
