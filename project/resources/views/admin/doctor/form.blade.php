@extends('admin.includes.layout')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Doctor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{Route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Doctor</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
              <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @if($doctor->id==null)
                    @method('post')
                  @else 
                    @method('PUT')
                  @endif
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="input" name="name" value="{{ $doctor->name }}" class="form-control" placeholder="Enter Name">
                    @error('name')
                    <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Job</label>
                    <input type="input" name="job" value="{{ $doctor->job }}" class="form-control" placeholder="Enter job">
                    @error('job')
                    <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">details</label>
                    <input type="input" name="details" value="{{ $doctor->details }}" class="form-control" placeholder="Enter details">
                    @error('details')
                    <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">facebook</label>
                    <input type="input" name="facebook" value="{{ $doctor->facebook }}" class="form-control" placeholder="Enter facebook">
                    @error('facebook')
                    <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">linkedin</label>
                    <input type="input" name="linkedin" value="{{ $doctor->linkedin }}" class="form-control" placeholder="Enter linkedin">
                    @error('linkedin')
                    <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">twitter</label>
                    <input type="input" name="twitter" value="{{ $doctor->twitter }}" class="form-control" placeholder="Enter twitter">
                    @error('twitter')
                    <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">instagram</label>
                    <input type="input" name="instagram" value="{{ $doctor->instagram }}" class="form-control" placeholder="Enter instagram">
                    @error('instagram')
                    <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                  </div>
                  @if($doctor->image!=null)
                  <img src="{{asset('uploads/doctor/'.$doctor->image)}}" height="50px" class="my-5">
                  @endif
                  <div class="form-group mb-3">    
                    <label>image</label>
                    <input type="file" name="image" class="form-control-file">
                    @error('image')
                    <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection