    @extends('templates.admin')
    @section('content')
        <link rel="stylesheet" href="{{ asset('admin/plugins/bs-stepper/css/bs-stepper.min.css') }}">

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Create New Uploads</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Create New Uploads</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Form for uploads</h3>
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
                                <div class="card-body p-0">
                                    <div class="bs-stepper">
                                        <div class="bs-stepper-header" role="tablist">
                                            <div class="step" data-target="#logins-part">
                                                <button type="button" class="step-trigger" role="tab"
                                                    aria-controls="logins-part" id="logins-part-trigger">
                                                    <span class="bs-stepper-circle">1</span>
                                                    <span class="bs-stepper-label">Upload info</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#upload-part">
                                                <button type="button" class="step-trigger" role="tab"
                                                    aria-controls="information-part" id="information-part-trigger">
                                                    <span class="bs-stepper-circle">2</span>
                                                    <span class="bs-stepper-label">Uploads</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#information-part">
                                                <button type="button" class="step-trigger" role="tab"
                                                    aria-controls="information-part" id="information-part-trigger">
                                                    <span class="bs-stepper-circle">3</span>
                                                    <span class="bs-stepper-label">Pbulish</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="bs-stepper-content">
                                            {!! Form::open(['action' => 'admin\UploadController@save_media_uploads', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'upload-form', 'files' => true]) !!}
                                            {{ csrf_field() }}
                                            <!-- your steps content here -->
                                            <div id="logins-part" class="content" role="tabpanel"
                                                aria-labelledby="logins-part-trigger">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Title</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter title" name="title" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea class="form-control" rows="3" name="description" id="m_description"
                                                                placeholder="Enter description" required></textarea>

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Category</label>
                                                            <select class="select2" data-placeholder="Select a category"
                                                                name="category" style="width: 100%;" required>
                                                                @foreach ($event_categories as $category)
                                                                    <option value="{{ $category->value }}">
                                                                        {{ $category->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tags</label>
                                                            <select class="select2" multiple="multiple"
                                                                data-placeholder="Select your tags" name="tags[]"
                                                                style="width: 100%;" required>
                                                                @foreach ($tags as $tag)
                                                                    <option value="{{ $tag->tag_name }}">
                                                                        {{ $tag->tag_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Playlist</label>
                                                            <select class="select2" data-placeholder="Select a category" name="play_list"
                                                                style="width: 100%;" required>
                                                                @foreach ($play_lists as $play_list)
                                                                    <option value="{{$play_list->id}}">
                                                                        {{ $play_list->title }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                          <div class="form-group">
                                                            <label>Search Keys</label>
                                                            <textarea class="form-control" rows="3" name="search_keys" id="m_search_keys"
                                                                placeholder="Enter possible search keys"></textarea>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Visibility</label>
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                        value="private" required name="visibility"
                                                                        disabled>Private
                                                                </label>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                        value="public" required name="visibility"
                                                                        checked>Public
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="text-center mt-5 mb-3 float-right">
                                                    <a class="btn btn-primary btn-sm " onclick="next()">Next</a>
                                                </div>

                                            </div>

                                            <div id="upload-part" class="content" role="tabpanel"
                                                aria-labelledby="logins-part-trigger">
                                                <div class="form-group">
                                                    <label>Media Thumbnail</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                name="media_thumbnail" required>
                                                            <label class="custom-file-label">Choose
                                                                file (240 x 240)</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Upload file</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="media_file"
                                                                required>
                                                            <label class="custom-file-label">Choose
                                                                file</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text-center mt-5 mb-3 float-right">
                                                    <a class="btn btn-primary btn-sm" onclick="previous()">Previous</a>
                                                    <a class="btn btn-primary btn-sm " onclick="next()">Next</a>
                                                </div>

                                            </div>


                                            <div id="information-part" class="content" role="tabpanel"
                                                aria-labelledby="information-part-trigger">

                                                <div class="row">
                                                    <div class="col-md-8">

                                                        <h3 class="text-primary"><i class="fas fa-paint-brush"></i><span id="m_title"></span></h3>
                                                        <p class="text-muted"  id="r_description">Description</p>
                                                        <br>
                                                        <div class="text-muted">
                                                            <p class="text-sm">Category
                                                                <b class="d-block" id="m_category"></b>
                                                            </p>
                                                            <p class="text-sm">Publish date
                                                                <b class="d-block">Tony Chicken</b>
                                                            </p>
                                                        </div>

                                                        <h5 class="mt-5 text-muted">Other details</h5>
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <a href="" class="btn-link text-secondary"><i
                                                                        class="far fa-fw fa-file-word"></i>
                                                                    Tags: </a>
                                                            </li>
                                                            <li>
                                                                <a href="" class="btn-link text-secondary"><i
                                                                        class="fas fa-fw fa-list-ul"></i> Catagory</a>
                                                            </li>
                                                            <li>
                                                                <a href="" class="btn-link text-secondary"><i
                                                                        class="fas fa-fw fa-hourglass-half"></i>
                                                                    Time Duration</a>
                                                            </li>
                                                            <li>
                                                                <a href="" class="btn-link text-secondary"><i
                                                                        class="far fa-fw fa-image "></i> Status:
                                                                    Unpublished</a>
                                                            </li>
                                                            <li>
                                                                <a href="" class="btn-link text-secondary"><i
                                                                        class="far fa-fw fa-file-word"></i>
                                                                    Availablity: Public</a>
                                                            </li>
                                                        </ul>


                                                    </div>
                                                    <div class="col-md-4">

                                                    </div>
                                                </div>

                                                <div class="text-center mt-5 mb-3 float-right">
                                                    <a class="btn btn-primary btn-sm" onclick="previous()">Previous</a>
                                                    <button type="submit" class="btn btn-primary btn-sm ">Submit</button>
                                                </div>

                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">

                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>


        </div>

        <script src="{{ asset('admin/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>

        <script>
            $('#upload-form').validate({
                rules: {
                    title: {
                        required: true
                    },
                    description: {
                        required: true
                    },
                    category: {
                        required: true
                    },
                    tags: {
                        required: true
                    },
                    play_list: {
                        required: true
                    },
                    visibility: {
                        required: true
                    },
                    media_thumbnail: {
                        required: true
                    },
                    media_file: {
                        required: true
                    }
                },
                messages: {
                    title: "Please enter the title",
                    description: {
                        required: "Please enter brief description"
                    },
                    category: "Please select category",
                    tags: {
                        required: "Please select tags"
                    },
                    play_list: {
                        required: "Please choose your play list"
                    },
                    visibility: {
                        required: "Please select visibility",
                    },
                    media_thumbnail: {
                        required: "Thumbnail is required",
                    },
                    media_file: {
                        required: "Please upload your media file",
                    }
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


            document.addEventListener('DOMContentLoaded', function() {
                window.stepper = new Stepper(document.querySelector('.bs-stepper'))
            });

            function set_value(){        
                // console.log( $('#upload-form').find('input[name="description"]').text());
                console.log( $('m_description').val());
                console.log( $('m_description').text());
                document.getElementById("m_title").innerHTML= $('#upload-form').find('input[name="title"]').val();
                document.getElementById("m_description").innerHTML= $('#upload-form').find('input[name="description"]').text();
                document.getElementById("m_category").innerHTML= $('#upload-form').find('input[name="category"]').text();                
            }

            function next() {                
                if ($("#upload-form").valid()) {
                    // set_value();
                    stepper.next();
                }
            }

            function previous() {
                if ($("#upload-form").valid()) {
                    stepper.previous();
                }
            }

        </script>
    @endsection
