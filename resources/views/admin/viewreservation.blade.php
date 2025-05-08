<x-app-layout>
    @include('admin.css')
  
    <div class="container-scroller">
        @include('admin.navbar')
  
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- Food Table -->
                  <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Reservation Table</h4>
  
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Guest</th>
                                                    <th>Time</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($reservations as $reservation)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $reservation->name }}</td>
                                                        <td>{{ $reservation->email }}</td>
                                                        <td>{{ $reservation->phone }}</td>
                                                        <td>{{ $reservation->guest }}</td>
                                                        <td>{{ $reservation->date }}</td>
                                                        <td>{{ $reservation->time }}</td>
                                                       
                                                        {{-- <td>
                                                          <a href="{{ url('/editfood', $food->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                            <a href="{{ url('/deletefood', $food->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                                        </td> --}}
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
  