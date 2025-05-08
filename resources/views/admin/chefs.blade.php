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
                                    <h4 class="card-title">Create Chefs Form</h4>
  
                                    <form action="{{ url('/storechef') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                        </div>
  
                                        <div class="form-group">
                                            <label for="speciality">Speciality</label>
                                            <input type="text" class="form-control" id="speciality" name="speciality" placeholder="Speciality">
                                        </div>
  
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="image" class="form-control-file">
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
                                                    <th>Name</th>
                                                    <th>Speciality</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($chefs as $chef)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $chef->name }}</td>
                                                        <td>{{ $chef->speciality }}</td>
                                                        <td>
                                                            <img src="{{ asset('chefimages/' . $chef->image) }}" alt="{{ $chef->title }}" height="40" width="60" class="rounded">
                                                        </td>
                                                        <td>
                                                          <a href="{{ url('/editchef', $chef->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                            <a href="{{ url('/deletechef', $chef->id) }}" class="btn btn-sm btn-danger">Delete</a>
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
  