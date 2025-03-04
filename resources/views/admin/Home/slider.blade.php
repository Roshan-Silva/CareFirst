@extends('admin.layouts.master')

@section('content')

<div class="container-fluid px-4">
<h1 class="mt-4">Slider Manager</h1>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add New Slide
</button>

<!-- Bootstrap 4 CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery and Bootstrap 4 JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Slider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="/saveSlider" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">

            <!-- Top heading -->
            <div class="form-group">
                <label for="topHeading">Top Heading</label>
                <input type="text" class="form-control" id="topHeading" name="top_heading" placeholder="Enter top heading">
            </div>

            <!-- Bottom sub heading -->
            <div class="form-group">
                <label for="bottomSubHeading">Bottom Sub Heading</label>
                <input type="text" class="form-control" id="bottomSubHeading" name="bottom_sub_heading" placeholder="Enter bottom sub heading">
            </div>

            <!-- Image upload -->
            <div class="form-group">
                <label for="imageUpload">Image Upload</label>
                <input type="file" class="form-control" id="imageUpload" name="img_link">
            </div>
            
            <!-- Get appointment link -->
            <div class="form-group">
                <label for="getAppointmentLink">Get Appointment Link</label>
                <input type="url" class="form-control" id="getAppointmentLink" name="get_appointment_link" placeholder="Enter get appointment link">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Slider</button>
        </div>
    </form>
    </div>
  </div>
</div>
<!-- End Modal -->

<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>top_heading</th>
                                            <th>bottom_sub_heading</th>
                                            <th>img_link</th>
                                            <th>get_appointment_link</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach($sliders as $slider)
                                        <tr>
                                            <td>{{$slider->top_heading}}</td>
                                            <td>{{$slider->bottom_sub_heading}}</td>
                                            <td><img width="100" src="{{asset('storage/'.$slider->img_link)}}" alt=""></td>
                                            <td>{{$slider->get_appointment_link}}</td>
                                            <td>button</td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>

@endsection