@extends('templates.admin')
@section('content')
<div class="content-wrapper">

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
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                {!! Form::open(['action' => 'admin\ManageEventsController@triggerEmail', 'method' => 'POST',
                              'enctype' => 'multipart/form-data', 'id' => 'institution-form']) !!}
                              {{ csrf_field() }}
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Send Invitation</h3>
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
                        <div class="card-body">
                            <div class="form-group">
                                <label>Subject*</label>
                                <input type="text"
                                    value="{{$subject}}" class="form-control" name="subject" placeholder="Enter title" required>
                            </div>

                            <div class="form-group">
                                <label>To*</label>
                                <input type="text"
                                    value="{{$send_emails_address_str}}" class="form-control" name="to" placeholder="Enter title" required>
                            </div>

                            <div class="form-group">
                                <label>Message*</label>
                                <textarea class="form-control" id="summernote" rows="10" name="body" placeholder="Enter description" required>{{$body}}</textarea>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Send</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
</div>
<script>
    $(function () {
      $('#summernote').summernote();
    });
</script>
@endsection
