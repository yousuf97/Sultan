  @extends('templates.admin')
  @section('content')
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                          Pacakge List
                      </div>

                      {{-- <h2>Pacakge List</h2> --}}
                      <div class="table-responsive">
                          <table id="packageListTable" class="table table-striped table-sm">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Package Name</th>
                                      <th>Description</th>
                                      <th>Price</th>
                                      <th>D.Price</th>
                                      <th>is Active?</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($packages as $package)
                                      <tr>
                                          <td>#</td>
                                          <td>{{ $package->title }}</td>
                                          <td>{{ $package->description }}</td>
                                          <td>{{ $package->actual_price }}</td>
                                          <td>{{ $package->discount_price }}</td>
                                          <td>{{ $package->is_active }}</td>
                                          <td> <a href="{{ url('admin/edit_package/' . $package->id) }}"> Edit </a> / <a
                                                  href="#"> Delete </a> </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                      {{ $packages->links('pagination::bootstrap-4') }}
                  </div>
              </div>
          </div>
      </main>     
  @endsection
