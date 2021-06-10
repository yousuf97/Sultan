@extends('templates.admin')
@section('content')
<div class="content-wrapper">
    <section class="content">

          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Website Settings</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Website Settings</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <div class="row">
            <div class="col-md-12">

                <div class="card card-primary card-outline">
                    <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Manage Website
                    </h3>
                    </div>
                    <div class="card-body">
                    <h4>Left Sided</h4>
                    <div class="row">

                        <div class="col-5 col-sm-3">
                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="home-page-banner-tab" data-toggle="pill" href="#home-page-banner" role="tab" aria-controls="home-page-banner" aria-selected="true">Home Page Banner</a>
                            <a class="nav-link" id="logo-icon-settings-tab" data-toggle="pill" href="#logo-icon-settings" role="tab" aria-controls="logo-icon-settings" aria-selected="false">Logo & Icons</a>
                            <a class="nav-link" id="contacts-settingss-tab" data-toggle="pill" href="#contacts-settingss" role="tab" aria-controls="contacts-settingss" aria-selected="false">Footer Settings </a>
                            <a class="nav-link" id="ads_setting-tab" data-toggle="pill" href="#ads_setting" role="tab" aria-controls="ads_setting" aria-selected="false">Ads Settings</a>
                            <a class="nav-link" id="api-other-varibales-tab" data-toggle="pill" href="#api-other-varibales" role="tab" aria-controls="api-other-varibales" aria-selected="false">Winer Of the Month</a>

                        </div>
                        </div>
                        <div class="col-7 col-sm-9">
                        <div class="tab-content" id="vert-tabs-tabContent">
                            <div class="tab-pane text-left fade show active" id="home-page-banner" role="tabpanel" aria-labelledby="home-page-banner-tab">

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="card card-primary">

                                    <div class="card-header">
                                        <h3 class="card-title">Form for Web Banner Settings</h3>
                                    </div>

                                    {!! Form::open(['action' => 'admin\SettingsController@save_banner', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'institution-form']) !!}
                                    {{ csrf_field() }}

                                    <div class="card-body">
                                            <div class="row">
                                                @php
                                                    $banner_data = get_all_settings_meta_by_term_id(1);

                                                    // var_dump($banner_data);
                                                    // echo $banner_data[0]->meta_value;
                                                @endphp
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Title1*</label>
                                                        <input type="text"
                                                            value="{{get_settings_meta_by_termid_metaKey(1,'title1')}}"
                                                                class="form-control" name="title1" placeholder="Enter title" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Title2*</label>
                                                        <input type="text"
                                                            value="{{get_settings_meta_by_termid_metaKey(1,'title2')}}"
                                                                class="form-control" name="title2" placeholder="Enter title" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description*</label>
                                                        <input type="text"
                                                            value="{{get_settings_meta_by_termid_metaKey(1,'description')}}"
                                                                class="form-control" name="description" placeholder="Enter description" required>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Button 1 Label*</label>
                                                                <input type="text"
                                                                    value="{{get_settings_meta_by_termid_metaKey(1,'btn_1_label')}}"
                                                                        class="form-control" name="btn_1_label" placeholder="Enter Button 1 Label" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Button 1 URL*</label>
                                                                <input type="text"
                                                                    value="{{get_settings_meta_by_termid_metaKey(1,'btn_1_link')}}"
                                                                        class="form-control" name="btn_1_link" placeholder="Enter Button 1 URL" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Button 2 Label*</label>
                                                                <input type="text"
                                                                    value="{{get_settings_meta_by_termid_metaKey(1,'btn_2_label')}}"
                                                                        class="form-control" name="btn_2_label" placeholder="Enter Button 2 Label" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Button 2 URL*</label>
                                                                <input type="text"
                                                                    value="{{get_settings_meta_by_termid_metaKey(1,'btn_2_link')}}"
                                                                        class="form-control" name="btn_2_link" placeholder="Enter Button 2 URL" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Upload Banner Image (511 x 539 Px)*</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="file">
                                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                                    file (.jpg, .jpeg, .png & Maximum size is 5Mb)</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                        <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(1,'banner_img_file')) }}" alt="user-avatar"
                                                            class=" img-fluid">
                                                </div>

                                            </div>

                                    </div>


                                    <div class="card-footer">
                                            <button type="submit" class="btn btn-primary float-right">Save</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>


                            </div>
                            <div class="tab-pane fade" id="logo-icon-settings" role="tabpanel" aria-labelledby="logo-icon-settings-tab">

                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Form for Web Logo & Fav icons</h3>
                                    </div>
                                    {!! Form::open(['action' => 'admin\SettingsController@save_web_icons', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'institution-form']) !!}
                                    {{ csrf_field() }}

                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(2,'open_logo')) }}" alt="user-avatar"
                                            class=" img-fluid">
                                                <div class="form-group">
                                                    <label>Upload Open Logo (150 x 110 Px)</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="open_logo">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                                file (.jpg, .jpeg, .png & Maximum size is 5Mb)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="col-md-4">
                                            <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(2,'close_logo')) }}" alt="user-avatar"
                                            class=" img-fluid">
                                                <div class="form-group">
                                                    <label>Upload Closed Logo (100 x 100 Px)</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="close_logo">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                                file (.jpg, .jpeg, .png & Maximum size is 5Mb)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="col-md-4">
                                            <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(2,'fav_icon')) }}" alt="user-avatar"
                                            class=" img-fluid">
                                            <div class="form-group">
                                                <label>Upload fav Icon (32 x 32 Px)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="fav_icon">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file (.fav size is 100Kb)</label>
                                                    </div>
                                                </div>
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
                            <div class="tab-pane fade" id="contacts-settingss" role="tabpanel" aria-labelledby="contacts-settingss-tab">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Form for Web Footer section</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                {!! Form::open(['action' => 'admin\SettingsController@save_footer_info', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'institution-form']) !!}
                                                {{ csrf_field() }}
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Footer Section - 1</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Title*</label>
                                                            <input type="text" class="form-control" name="footer_sec_1_head" value="{{get_settings_meta_by_termid_metaKey(3,'footer_sec_1_head')}}" placeholder="Enter title" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description*</label>
                                                            <input type="text" class="form-control" name="footer_sec_1_desc" value="{{get_settings_meta_by_termid_metaKey(3,'footer_sec_1_desc')}}" placeholder="Enter Description" required>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary float-right">Save</button>
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}

                                            </div>
                                            <div class="col-md-6">
                                                {!! Form::open(['action' => 'admin\SettingsController@save_footer_info', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'institution-form']) !!}
                                                {{ csrf_field() }}
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Footer Section - 3</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Title*</label>
                                                            <input type="text" class="form-control" name="footer_sec_3_head" value="{{get_settings_meta_by_termid_metaKey(3,'footer_sec_3_head')}}" placeholder="Enter title" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description*</label>
                                                            <input type="text" class="form-control" name="footer_sec_3_desc" value="{{get_settings_meta_by_termid_metaKey(3,'footer_sec_3_desc')}}" placeholder="Enter Description" required>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary float-right">Save</button>
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                {!! Form::open(['action' => 'admin\SettingsController@save_footer_info', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'institution-form']) !!}
                                                {{ csrf_field() }}
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Footer Section - 2</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Title*</label>
                                                            <input type="text" class="form-control" name="footer_sec_2_head" value="{{get_settings_meta_by_termid_metaKey(3,'footer_sec_2_head')}}" placeholder="Enter title" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description*</label>
                                                            <input type="text" class="form-control" name="footer_sec_2_desc" value="{{get_settings_meta_by_termid_metaKey(3,'footer_sec_2_desc')}}" placeholder="Enter Description" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Upload Playstore Icon (140 x 40 Px)</label>
                                                            <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(3,'playstore_app')) }}" alt="user-avatar" class=" img-fluid">
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" name="playstore_app">
                                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                                        file (Size is 100Kb)</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Playstore URL*</label>
                                                            <input type="text" class="form-control" name="playstore_url" value="{{get_settings_meta_by_termid_metaKey(3,'playstore_url')}}" placeholder="Enter Description" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Upload Appstore Icon (140 x 40 Px)</label>
                                                            <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(3,'appstore_app')) }}" alt="user-avatar" class=" img-fluid">
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" name="appstore_app">
                                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                                        file (Size is 100Kb)</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Appstore Link*</label>
                                                            <input type="text" class="form-control" name="appstore_url" value="{{get_settings_meta_by_termid_metaKey(3,'appstore_url')}}" placeholder="Enter Description" required>
                                                        </div>

                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary float-right">Save</button>
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}

                                                {{-- <div class="col-md-12"> --}}
                                                    {!! Form::open(['action' => 'admin\SettingsController@save_footer_info', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'institution-form']) !!}
                                                    {{ csrf_field() }}
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Winner of the Month</h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label>Title*</label>
                                                                <input type="text" class="form-control" name="winner_title" value="{{get_settings_meta_by_termid_metaKey(3,'winner_title')}}" placeholder="Enter title" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>link*</label>
                                                                <input type="text" class="form-control" name="winner_url" value="{{get_settings_meta_by_termid_metaKey(3,'winner_url')}}" placeholder="Enter Description" required>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button type="submit" class="btn btn-primary float-right">Save</button>
                                                        </div>
                                                    </div>
                                                    {!! Form::close() !!}

                                                {{-- </div> --}}

                                            </div>

                                            <div class="col-md-6">
                                                {!! Form::open(['action' => 'admin\SettingsController@save_footer_info', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'institution-form']) !!}
                                                {{ csrf_field() }}
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Footer Section - 4</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Title*</label>
                                                            <input type="text" class="form-control" name="footer_sec_4_head" value="{{get_settings_meta_by_termid_metaKey(3,'footer_sec_4_head')}}" placeholder="Enter title" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description*</label>
                                                            <input type="text" class="form-control" name="footer_sec_4_desc" value="{{get_settings_meta_by_termid_metaKey(3,'footer_sec_4_desc')}}" placeholder="Enter Description" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Phone*</label>
                                                            <input type="text" class="form-control" name="contact_phone" value="{{get_settings_meta_by_termid_metaKey(3,'contact_phone')}}" placeholder="Enter Description" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email address*</label>
                                                            <input type="text" class="form-control" name="contact_email" value="{{get_settings_meta_by_termid_metaKey(3,'contact_email')}}" placeholder="Enter Description" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Location Address*</label>
                                                            <input type="text" class="form-control" name="location_address" value="{{get_settings_meta_by_termid_metaKey(3,'location_address')}}" placeholder="Enter Description" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Location Address*</label>
                                                            <input type="text" class="form-control" name="fb_address" value="{{get_settings_meta_by_termid_metaKey(3,'fb_address')}}" placeholder="Enter Description" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Location Address*</label>
                                                            <input type="text" class="form-control" name="linkedin_address" value="{{get_settings_meta_by_termid_metaKey(3,'linkedin_address')}}" placeholder="Enter Description" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Location Address*</label>
                                                            <input type="text" class="form-control" name="twitter_address" value="{{get_settings_meta_by_termid_metaKey(3,'twitter_address')}}" placeholder="Enter Description" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Location Address*</label>
                                                            <input type="text" class="form-control" name="google_address" value="{{get_settings_meta_by_termid_metaKey(3,'google_address')}}" placeholder="Enter Description" required>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary float-right">Save</button>
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="ads_setting" role="tabpanel" aria-labelledby="ads_setting-tab">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Form for Web Ads</h3>
                                    </div>
                                    {!! Form::open(['action' => 'admin\SettingsController@save_ads_banner', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'institution-form']) !!}
                                    {{ csrf_field() }}

                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(4,'ads_banner_1')) }}" alt="user-avatar"
                                            class=" img-fluid">
                                                <div class="form-group">
                                                    <label>Upload Ads1 (728 x 90 Px)</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="ads_banner_1">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                                file (.jpg, .jpeg, .png & Maximum size is 5Mb)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="col-md-12">
                                            <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(4,'ads_banner_2')) }}" alt="user-avatar"
                                            class=" img-fluid">
                                                <div class="form-group">
                                                    <label>Upload Ads2 (728 x 90 Px)</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="ads_banner_2">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                                file (.jpg, .jpeg, .png & Maximum size is 5Mb)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="col-md-12">
                                            <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(4,'ads_banner_3')) }}" alt="user-avatar"
                                            class=" img-fluid">
                                            <div class="form-group">
                                                <label>Upload Ads3 (728 x 90 Px)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="ads_banner_3">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file (.fav size is 100Kb)</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- ---------------------------- --}}

                                        <div class="col-md-12">
                                            <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(4,'ads_banner_510x510')) }}" alt="user-avatar"
                                            class=" img-fluid" style="max-width: 150px;">
                                            <div class="form-group">
                                                <label>Ads Group - 1 (510x510 Px)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="ads_banner_510x510">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file (.fav size is 100Kb)</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(4,'ads_banner_240x240')) }}" alt="user-avatar"
                                            class=" img-fluid" style="max-width: 150px;">
                                            <div class="form-group">
                                                <label>Ads Group - 2 (240x240 Px)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="ads_banner_240x240">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file (.fav size is 100Kb)</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(4,'ads_banner_510x240')) }}" alt="user-avatar"
                                            class=" img-fluid" style="max-width: 150px;">
                                            <div class="form-group">
                                                <label>Ads Group - 3 (510x240 Px)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="ads_banner_510x240">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file (.fav size is 100Kb)</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(4,'ads_banner_240x510')) }}" alt="user-avatar"
                                            class=" img-fluid" style="max-width: 150px;">
                                            <div class="form-group">
                                                <label>Ads Group - 4 (240x510 Px)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="ads_banner_240x510">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file (.fav size is 100Kb)</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(4,'ads_banner_240x240_1')) }}" alt="user-avatar"
                                            class=" img-fluid" style="max-width: 150px;">
                                            <div class="form-group">
                                                <label>Ads Group - 5 (240x240 Px)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="ads_banner_240x240_1">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file (.fav size is 100Kb)</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <img src="{{ asset('storage/' . get_settings_meta_by_termid_metaKey(4,'ads_banner_510x240_1')) }}" alt="user-avatar"
                                            class=" img-fluid" style="max-width: 150px;">
                                            <div class="form-group">
                                                <label>Ads Group - 6 (510x240 Px)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="ads_banner_510x240_1">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file (.fav size is 100Kb)</label>
                                                    </div>
                                                </div>
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
                            <div class="tab-pane fade" id="api-other-varibales" role="tabpanel" aria-labelledby="api-other-varibales-tab">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Setup Winner of the month</h3>
                                    </div>
                                    <div class="card-body">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary float-right">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
