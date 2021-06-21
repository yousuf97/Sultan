  @extends('templates.admin')
  @section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>

          <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>{{$count_published_media}}</h3>

                          <p>Published Media Files</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ url('admin/uploads/list_uploads') }}" class="small-box-footer">List all media files<i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>

                    <div class="col-lg-3 col-6">
                    <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                            <h3>{{$under_review_cnt}}</h3>
                            <p>Media files are in Under review status</p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ url('admin/uploads/list_uploads') }}" class="small-box-footer">List all media files<i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-success">
                        <div class="inner">
                          <h3>{{$participants_cnt}}</h3>

                          <p>Total artists registration</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>

                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-danger">
                        <div class="inner">
                          <h3>{{$active_competition_cnt}}</h3>

                          <p>Active Competetions Registered </p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ url('admin/events/manage_events') }}" class="small-box-footer">View all Competetions <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                  </div>

                  <div class="row">
                      <div class="col-md-6">
                          <!-- PRODUCT LIST -->
                        <div class="card">
                            <div class="card-header">
                            <h3 class="card-title">Recently Uploaded files</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                            <ul class="products-list product-list-in-card pl-2 pr-2">

                                @foreach ($latest_uploads as $upload)


                                <li class="item">
                                <div class="product-img">
                                    <img width="150" src="{{ asset('storage/' . $upload->mThumbnail) }}" alt="Product Image" class="img-size-50">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">{{$upload->mTitle}}
                                    <span class="badge badge-warning float-right">{{$upload->mStatus}}</span>
                                    <span class="badge badge-primary float-right">{{gmdate("H:i:s", $upload->mFileDuration)}}</span></a>
                                    <span class="product-description">
                                    Category : {{$upload->mCategory}}
                                    </span>
                                </div>
                                </li>
                                @endforeach

                                <!-- /.item -->
                            </ul>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">View All Products</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                      </div>

                      <div class="col-md-6">
                        <!-- USERS LIST -->
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">Latest Members</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body p-0">
                            <ul class="users-list clearfix">

                             @foreach ($latest_registrations as $user)
                              <li>
                                @if ($user->uProfilepic === "-")
                                <img width="150" src="{{ asset('upload/profile_pic/default.png') }}" alt="User Image">
                                @else
                                <img width="150" src='{{ asset($user->uProfilepic) }}' alt="User Image">
                                @endif
                                <a class="users-list-name" href="#">{{$user->uName}}</a>
                                <span class="users-list-date">{{formatDate($user->uCreatedat)}}</span>
                              </li>
                              @endforeach

                            </ul>
                            <!-- /.users-list -->
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer text-center">
                            <a href="javascript:">View All Users</a>
                          </div>
                          <!-- /.card-footer -->
                        </div>
                        <!--/.card -->
                      </div>
                  </div>
            </div>
          </section>
      </div>
      <!-- /.content-wrapper -->
  @endsection
