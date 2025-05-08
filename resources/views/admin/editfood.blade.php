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
  
                                    <form action="{{ url('/updatefood',$food->id) }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{ $food->title }}" placeholder="Title">
                                        </div>
  
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" class="form-control" id="price" name="price"  value="{{ $food->price }}"  placeholder="Price">
                                        </div>
  
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="image" class="form-control-file">
                                            <img src="{{ asset('uploads/food/' . $food->image) }}" alt="Food Image" style="max-width: 100px; max-height: 100px;">
                                        </div>
  
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter food description...">{{ $food->description }}</textarea>
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