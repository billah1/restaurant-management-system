<x-app-layout>
  @include('admin.css')

  <div class="container-scroller">
      @include('admin.navbar')

      <div class="container-fluid page-body-wrapper">
          <div class="main-panel">
              <div class="content-wrapper">

                  <!-- Create Food Form -->
                  <div class="row mb-5">
                      <div class="col-12 grid-margin stretch-card">
                          <div class="card">
                              <div class="card-body">
                                  <h4 class="card-title">Create Food Form</h4>

                                  <form action="{{ url('/storefood') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                                      @csrf
                                      <div class="form-group">
                                          <label for="title">Title</label>
                                          <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                                      </div>

                                      <div class="form-group">
                                          <label for="price">Price</label>
                                          <input type="number" class="form-control" id="price" name="price" placeholder="Price">
                                      </div>

                                      <div class="form-group">
                                          <label for="image">Image</label>
                                          <input type="file" name="image" id="image" class="form-control-file">
                                      </div>

                                      <div class="form-group">
                                          <label for="description">Description</label>
                                          <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter food description..."></textarea>
                                      </div>

                                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                                      <button type="reset" class="btn btn-secondary">Cancel</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>

                  <!-- Food Table -->
                  <div class="row">
                      <div class="col-12 grid-margin stretch-card">
                          <div class="card">
                              <div class="card-body">
                                  <h4 class="card-title">Food Table</h4>

                                  <div class="table-responsive">
                                      <table class="table table-hover">
                                          <thead>
                                              <tr>
                                                  <th>#</th>
                                                  <th>Food Name</th>
                                                  <th>Price</th>
                                                  <th>Image</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              @foreach($foods as $food)
                                                  <tr>
                                                      <td>{{ $loop->iteration }}</td>
                                                      <td>{{ $food->title }}</td>
                                                      <td>${{ number_format($food->price, 2) }}</td>
                                                      <td>
                                                          <img src="{{ asset('uploads/food/' . $food->image) }}" alt="{{ $food->title }}" height="40" width="60" class="rounded">
                                                      </td>
                                                      <td>
                                                          <a href="{{ url('/deletefood', $food->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                                      </td>
                                                  </tr>
                                              @endforeach
                                          </tbody>
                                      </table>
                                  </div>

                              </div>
                          </div>
                      </div>
                  </div>

              </div> <!-- content-wrapper -->
          </div> <!-- main-panel -->
      </div> <!-- page-body-wrapper -->
  </div> <!-- container-scroller -->

  @include('admin.script')
</x-app-layout>

  
  