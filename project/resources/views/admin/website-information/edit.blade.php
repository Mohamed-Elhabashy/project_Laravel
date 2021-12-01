@extends('admin.includes.layout')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>edit seeting</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{Route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">edit seeting</li>
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
              <form id="quickForm" action="{{ route('admin.website-information.update',$websiteInformation) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">address</label>
                    <input type="input" name="address" value="{{ $websiteInformation->address }}" class="form-control" placeholder="Enter address">
                    @error('address')
                    <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">phone</label>
                    <input type="input" name="phone" value="{{  $websiteInformation->phone }}" class="form-control" placeholder="Enter phone">
                    @error('phone')
                    <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="input" name="email" value="{{  $websiteInformation->email }}" class="form-control" placeholder="Enter Email">
                    @error('email')
                    <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                  </div>
                  <img src="{{asset('uploads/websiteInformation/'.$websiteInformation->logo)}}" height="50px" class="my-5">

                  <div class="form-group mb-3">    
                    <label>logo</label>
                    <input type="file" name="logo" class="form-control-file">
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