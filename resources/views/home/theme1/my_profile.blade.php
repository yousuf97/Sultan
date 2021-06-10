    @extends('templates.theme1')
    @section('content')
    <style>
        .select2-selection__rendered {
            line-height: 34px !important;
        }
        .select2-container .select2-selection--single {
            height: 37px !important;
        }
        .select2-selection__arrow {
            height: 37px !important;
        }
        </style>
        <div class="ms_profile_wrapper">

            {{-- <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div> --}}

            <h1>Edit Profile</h1>
            {!! Form::open(['action' => 'home\HomeController@save_profile_details', 'method' => 'POST',
            'enctype' => 'multipart/form-data', 'id' => 'upload-form', 'class' => ""]) !!}
            {{ csrf_field() }}
            <div class="ms_profile_box">
                {{-- <div class="ms_pro_img">
                    <input type="file" name="image" class="image">
                    <img src="{{ asset('home/theme1/images/pro_img.jpg') }}" alt="" class="img-fluid">
                    <div class="pro_img_overlay">
                        <i class="fa_icon edit_icon"></i>
                    </div>
                </div> --}}



                <div class="ms_pro_img profile-img-container img-circle">
                    <input type="file" name="image" class="profile-image"/>
                    <img src="{{ asset($profile_pic) }}" id="profile_pic_img" class="img-thumbnail img-circle img-responsive" />
                    <div class="icon-wrapper">
                      <i class="fa fa-edit fa-1x"></i>
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
                </div>

                <div class="ms_pro_form">
                    <div class="form-group">
                        <label>Your Name *</label>
                        <input type="text" placeholder="Enter your name" name="name" value="{{ auth()->user()->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Your Email *</label>
                        <input type="text" placeholder="Enter your email address" name="email" value="{{ auth()->user()->email }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">

                        <label>Select Country</label>
                        <select class="form-control select2" name="country" required >
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}" @if ($country->id == $user_detail->country_id) selected @endif>{{ $country->name }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phone Number *</label>
                        <input type="number" placeholder="Enter Phone number" name="phone_number" value="{{ $user_detail->phone_number }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Select Institution*</label>
                        <select class="form-control select2" name="institution" required>
                            <option value="">Select Institution</option>
                            @foreach ($all_institutes as $institute)
                                <option value="{{ $institute->id }}" @if ($institute->id == $user_detail->institution_id) selected @endif>{{ $institute->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Address *</label>
                        <input type="text" placeholder="Enter your address" name="address" value="{{$user_detail->address}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Passport / National Id: (Accepts: jpg, jpeg & png. Size) &lt; 2Mb *</label>
                        <input type="file" name="idProof" class="form-control">
                    </div>

                    @if ($user_detail->address_proof != '-')
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="font-size: 15px;">
                                            View Uploaded Id Proof
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <img src="{{ asset('storage/' . $user_detail->address_proof) }}" alt="user-avatar"
                                        class=" img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="pro-form-btn text-center marger_top15">
                        <input type="submit" class="ms_btn ms_btn_custom" value="Update data">
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        <script>
            $('.select2').select2();
        </script>
    @endsection
