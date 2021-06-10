  @extends('templates.admin')
  @section('content')

      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1>Add New Institution</h1>
                      </div>
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item active">Add New Institution</li>
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
                          <!-- general form elements -->
                          <div class="card card-primary">
                              <div class="card-header">
                                  <h3 class="card-title">Form for Institution</h3>
                              </div>
                              @if ($errors->any())
                                  <div class="alert alert-danger">
                                      <ul>
                                          @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>
                                  </div>
                              @endif
                              {!! Form::open(['action' => 'admin\MasterDataController@save_institution', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'institution-form']) !!}
                              {{ csrf_field() }}
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-md-6">

                                              <div class="form-group">
                                                <label>Title*</label>
                                                <input type="text"
                                                    value="@isset($institution){{ $institution[0]->title }}@endisset"
                                                        class="form-control" name="title" placeholder="Enter title" required>
                                              </div>

                                              <div class="form-group">
                                                  <label>Description*</label>
                                                  <textarea class="form-control" rows="3" name="description"
                                                      placeholder="Enter description"
                                                      required>@isset($institution) {{ $institution[0]->description }} @endisset</textarea>
                                              </div>

                                              <div class="form-group">
                                                  <label>Category*</label>
                                                  <select class="select2" multiple="multiple"
                                                      data-placeholder="Select a category" name="category[]"
                                                      style="width: 100%;" required>
                                                      @isset($institution)
                                                          @php
                                                              $cat_array = explode(' #', $institution[0]->category);
                                                          @endphp
                                                      @endisset
                                                      @foreach ($event_categories as $category)
                                                          <option value="{{ $category->value }}" @isset($institution) @if (in_array($category->value, $cat_array)) selected @endif @endisset>
                                                              {{ $category->name }}
                                                          </option>
                                                      @endforeach
                                                  </select>

                                              </div>

                                              <div class="form-group">
                                                  <label>Address*</label>
                                                  <textarea class="form-control" rows="3" name="address"
                                                      placeholder="Enter address"
                                                      required>@isset($institution) {{ $institution[0]->address }} @endisset</textarea>
                                              </div>

                                              <div class="form-group">
                                                  <label>Email*</label>
                                                  <input type="text" class="form-control" placeholder="Enter email" name="email"
                                                      value="@isset($institution){{ $institution[0]->email }}@endisset"
                                                          required>
                                                  </div>

                                                  <div class="form-group">
                                                      <label>Phone*</label>
                                                      <input type="text" class="form-control" placeholder="Enter phone" name="phone"
                                                          value="@isset($institution){{ $institution[0]->phone }}@endisset"
                                                              required>
                                                      </div>
                                                      <div class="form-group">
                                                          <div class="form-check-inline">
                                                              <label class="form-check-label">
                                                                  <input type="radio" class="form-check-input" value="1" required
                                                                      name="is_active" @isset($institution) @if ($institution[0]->is_active == '1') checked @endif @endisset>Active
                                                              </label>
                                                          </div>
                                                          <div class="form-check-inline">
                                                              <label class="form-check-label">
                                                                  <input type="radio" class="form-check-input" value="0" required
                                                                      name="is_active" @isset($institution) @if ($institution[0]->is_active == '0') checked @endif @endisset>Inactive
                                                              </label>
                                                          </div>
                                                      </div>
                                                  </div>

                                                  <div class="col-md-6">

                                                      <div class="form-group">
                                                          <label>Land Line</label>
                                                          <input type="text" class="form-control" placeholder="Enter land line"
                                                              value="@isset($institution){{ $institution[0]->land_line }}@endisset"
                                                                  name="land_line">
                                                          </div>

                                                          <div class="form-group">
                                                              <label>Country*</label>
                                                              <select class="form-control select2" style="width: 100%;" name="country"
                                                                  required>
                                                                  @foreach ($countries as $country)
                                                                      <option value="{{ $country->code }}" @isset($institution) @if ($country->code == $institution[0]->country) selected @endif @endisset>
                                                                          {{ $country->name }}
                                                                      </option>
                                                                  @endforeach
                                                              </select>
                                                          </div>

                                                          <div class="form-group">
                                                              <label>Web Url*</label>
                                                              <input type="text" class="form-control" placeholder="Enter web url"
                                                                  value="@isset($institution){{ $institution[0]->web_url }}@endisset"
                                                                      name="web_url" required>
                                                              </div>

                                                              <div class="form-group">
                                                                  <label>Social media URL (If any)</label>
                                                                  <input type="text" class="form-control" placeholder="Enter social media URL"
                                                                      value="@isset($institution){{ $institution[0]->social_url }}@endisset"
                                                                          name="social_url">
                                                                  </div>

                                                                  <div class="form-group">
                                                                      <label>Upload Institution logo*</label>
                                                                      <div class="input-group">
                                                                          <div class="custom-file">
                                                                              <input type="file" class="custom-file-input" name="file">
                                                                              <label class="custom-file-label" for="exampleInputFile">Choose
                                                                                  file (.jpg, .jpeg, .png & Maximum size is 5Mb)</label>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  @isset($institution)
                                                                      <img src="{{ asset('storage/' . $institution[0]->file) }}" alt="user-avatar"
                                                                          class=" img-fluid">
                                                                  @endisset
                                                              </div>

                                                          </div>
                                                      </div>

                                                      <div class="card-footer">
                                                          @if ($update_id == null)
                                                              <button type="submit" class="btn btn-primary float-right">Save</button>
                                                          @else
                                                              <input type="hidden" value="{{ $update_id }}" name="update_id">
                                                              <button type="submit" class="btn btn-primary float-right">Update</button>
                                                          @endif

                                                      </div>
                                                      {!! Form::close() !!}
                                                  </div>
                                              </div>
                                          </div>
                                  </section>

                              </div>
                              <script>
                                  $('#institution-form').validate({
                                      rules: {
                                          title: {
                                              required: true
                                          },
                                          description: {
                                              required: true,
                                              maxlength: 499
                                          },
                                          category: {
                                              required: true
                                          },
                                          address: {
                                              required: true,
                                              maxlength: 499
                                          },
                                          phone: {
                                              required: true,
                                              maxlength: 25
                                          },
                                          is_active: {
                                              required: true
                                          },
                                          email: {
                                              required: true,
                                              email: true,
                                          },
                                          country: {
                                              required: true
                                          },
                                          web_url: {
                                              required: true
                                          },
                                          //   file: {
                                          //       required: true
                                          //   }
                                      },
                                      messages: {
                                          title: "Please enter institution title",
                                          description: {
                                              required: "Please enter brief description",
                                              maxlength: "Maximum limit of characters exeeded"
                                          },
                                          category: "Please select institution category",
                                          address: {
                                              required: "Please enter institution address",
                                              maxlength: "Maximum limit of characters exeeded"
                                          },
                                          phone: {
                                              required: "Please enter institution phone",
                                              maxlength: "Maximum limit of characters exeeded"
                                          },
                                          is_active: "Please choose the institution is active or not?",
                                          email: {
                                              required: "Please enter a email address",
                                              email: "Please enter a vaild email address"
                                          },
                                          country: "Please select Institution country",
                                          web_url: "Please enter Webstite URL",
                                          //   file: "Please upload file",
                                      },
                                      errorElement: 'span',
                                      errorPlacement: function(error, element) {
                                          error.addClass('invalid-feedback');
                                          element.closest('.form-group').append(error);
                                      },
                                      highlight: function(element, errorClass, validClass) {
                                          $(element).addClass('is-invalid');
                                      },
                                      unhighlight: function(element, errorClass, validClass) {
                                          $(element).removeClass('is-invalid');
                                      }
                                  });

                              </script>
                          @endsection
