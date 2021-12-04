@extends('admin.includes.layout')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Social Media</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{Route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Social Media</li>
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
              @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
              <form id="quickForm" action="{{ $action }}" method="post">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name arabic</label>
                    <input type="input" name="name[ar]" value="{{ @$socialMedia->name['ar'] }}" class="form-control" placeholder="Enter Name arabic">
                    @error('name.ar')
                    <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name English</label>
                    <input type="input" name="name[en]" value="{{ @$socialMedia->name['en'] }}" class="form-control" placeholder="Enter Name English">
                    @error('name.en')
                    <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Link</label>
                    <input type="input" name="link" 
                    value="{{ $socialMedia->link }}" class="form-control" 
                     placeholder="Enter Link">

                    @error('link')
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