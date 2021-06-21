  @extends('templates.admin')
  @section('content')

      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1>Manage Competetion</h1>
                      </div>
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item active">Add New Competition</li>
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
                                  <h3 class="card-title">Form for Competetion management</h3>
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
                              {!! Form::open(['action' => 'admin\ManageEventsController@save_events', 'method' => 'POST',
                              'enctype' => 'multipart/form-data', 'id' => 'institution-form']) !!}
                              {{ csrf_field() }}
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-md-6">

                                          <div class="form-group">
                                              <label>Title*</label>
                                              <input type="text"
                                                  value="@isset($events){{ $events[0]->title }}@endisset"
                                                  class="form-control" name="title" placeholder="Enter title" required>
                                          </div>

                                          <div class="form-group">
                                              <label>Description*</label>
                                              <textarea class="form-control" id="summernote" rows="3" name="description" placeholder="Enter description" required>@isset($events) {{ $events[0]->description }} @endisset</textarea>
                                          </div>

                                          <div class="form-group">
                                              <label>Category*</label>
                                              <select class="select2" data-placeholder="Select a category" name="category"
                                                  style="width: 100%;" required>
                                                  @isset($events)
                                                      @php
                                                          $cat_array = explode(' #', $events[0]->category);
                                                      @endphp
                                                  @endisset
                                                  @foreach ($event_categories as $category)
                                                      <option value="{{ $category->value }}" @isset($events) @if (in_array($category->value, $cat_array)) selected @endif @endisset>
                                                          {{ $category->name }}
                                                      </option>
                                                  @endforeach
                                              </select>

                                          </div>

                                          <div class="form-group">
                                              <label>Start Date*</label>
                                               <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input id="startdatemask"  name="start_date" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask placeholder="yyyy/mm/dd" value="@isset($events){{ $events[0]->start_date }}@endisset" required>
                                                </div>
                                          </div>

                                           <div class="form-group">
                                              <label>End Date*</label>
                                               <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input id="enddatemask" type="text" name="end_date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask placeholder="yyyy/mm/dd" value="@isset($events){{ $events[0]->end_date }}@endisset" required>
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label>Max Limit of Entries*</label>
                                            <input type="text"
                                                value="@isset($events){{ $events[0]->max_entry_limit }}@endisset"
                                                class="form-control" name="max_entry_limit" placeholder="Enter limit to recieve entries." required>
                                        </div>

                                      </div>

                                      <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Entry acceptable formats?*</label>
                                            @isset($events)
                                                    @php
                                                        $type_array = explode(',', $events[0]->acceptable_formats);
                                                    @endphp
                                                @endisset
                                            <select class="select2" data-placeholder="Select formats" name="acceptable_formats[]" multiple="multiple"
                                                style="width: 100%;" required>
                                                @foreach ($file_formats as $format)
                                                    <option value="{{ $format->extension }}" @isset($events) @if (in_array($format->extension, $type_array)) selected @endif @endisset>
                                                        {{ $format->extension }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Acceptable file size (in MB)*</label>
                                            <input type="number"
                                                value="@isset($events){{ $events[0]->acceptable_file_size }}@endisset"
                                                class="form-control" name="acceptable_file_size" placeholder="Enter maximum size in MB" required>
                                        </div>

                                          <div class="form-group">
                                              <label>Preffered Institutions*</label>
                                                @isset($events)
                                                      @php
                                                          $institute_array = explode(',', $events[0]->preffered_institute);
                                                      @endphp
                                                  @endisset
                                              <select class="form-control select2" style="width: 100%;" data-placeholder="select institutions"  multiple="multiple" name="preffered_institute[]" multiple="multiple"
                                                  required>
                                                  @foreach ($all_institutes as $institute)
                                                      <option value="{{ $institute->id }}" @isset($events) @if (in_array($institute->id, $institute_array)) selected @endif @endisset>
                                                          {{ $institute->title }}
                                                      </option>
                                                  @endforeach
                                              </select>
                                          </div>

                                          <div class="form-group">
                                              <label>Age restrictions*</label>
                                              <input type="text" class="form-control" placeholder="Enter social media URL"
                                                  value="@isset($events){{ $events[0]->age_restrictions }}@endisset"
                                                  name="age_restrictions" required>
                                          </div>

                                           <div class="form-group">
                                               <label>Accept Payment?:</label>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" value="yes" required name="accept_payment" @isset($events) @if ($events[0]->accept_payment == 'yes') checked @endif @endisset>Yes
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" value="no" required name="accept_payment" @isset($events) @if ($events[0]->accept_payment == 'no') checked @endif @endisset>No
                                                    </label>
                                                </div>
                                            </div>

                                           <div class="form-group">
                                               <label>Active?:</label>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" value="1" required name="is_active" @isset($events) @if ($events[0]->is_active == '1') checked @endif @endisset>Active
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" value="0" required name="is_active" @isset($events) @if ($events[0]->is_active == '0') checked @endif @endisset>Inactive
                                                    </label>
                                                </div>
                                            </div>

                                          <div class="form-group">
                                              <label>Upload an Image (Best fit 800 x 465 Pixels)*</label>
                                              <div class="input-group">
                                                  <div class="custom-file">
                                                      <input type="file" class="custom-file-input" name="file">
                                                      <label class="custom-file-label" for="exampleInputFile">Choose
                                                          file (.jpg, .jpeg, .png & Maximum size is 5Mb)</label>
                                                  </div>
                                              </div>
                                          </div>

                                          @isset($events)
                                          <img src="{{asset('storage/'.$events[0]->file)}}" alt="user-avatar"
                                                      class=" img-fluid">
                                                       @endisset
                                      </div>

                                  </div>
                              </div>

                              <div class="card-footer">
                                  @if($update_id == null)
                                    <button type="submit" class="btn btn-primary float-right">Save</button>
                                  @else
                                    <input type="hidden" value="{{$update_id}}" name="update_id">
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
          $(function () {
            $('#summernote').summernote()
            $('#startdatemask').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' });
            $('#enddatemask').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' });
          });
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
                  start_date: {
                      required: true
                  },
                  end_date: {
                      required: true
                  },
                  is_active: {
                      required: true
                  },

                  preffered_institute: {
                      required: true
                  },
                  accept_payment: {
                      required: true
                  },
                //   file: {
                //       required: true
                //   }
              },
              messages: {
                  title: "Please enter event title",
                  description: {
                      required: "Please enter brief description",
                      maxlength: "Maximum limit of characters exeeded"
                  },
                  category: "Please select event category",
                  start_date: {
                      required: "Please enter event start date"
                  },
                  end_date: {
                      required: "Please enter event end date",
                  },
                  is_active: "Please choose the event is active or not?",

                  preffered_institute: "Please select Institution",
                  accept_payment: "Do you want to accept payments?",
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
