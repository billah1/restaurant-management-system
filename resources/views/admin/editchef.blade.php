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
                                    <h4 class="card-title">Edit Chef Form</h4>
  
                                    <form action="{{ url('/updatechef',$chef->id) }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $chef->name }}" placeholder="Name">
                                        </div>
  
                                        <div class="form-group">
                                            <label for="speciality">Speciality</label>
                                            <input type="text" class="form-control" id="speciality" name="speciality" value="{{ $chef->speciality }}"  placeholder="Speciality">
                                        </div>
  
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="image" class="form-control-file">
                                            <img src="{{ asset('chefimages/' . $chef->image) }}" alt="Food Image" style="max-width: 100px; max-height: 100px;">
                                        </div>
  
                                        <button type="submit" class="btn btn-primary me-2">Update</button>
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </form>
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