@extends('admin.includes.layout')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{Route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
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
              <form id="quickForm" action="{{ $action }}" method="post" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name arabic</label>
                    <input type="input" name="name[ar]" value="{{ @$product->name['ar'] }}" class="form-control" placeholder="Enter Name arabic">
                    @error('name.ar')
                    <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name English</label>
                    <input type="input" name="name[en]" value="{{ @$product->name['en'] }}" class="form-control" placeholder="Enter Name English">
                    @error('name.en')
                    <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">description</label>
                    <input type="input" name="description" 
                    value="{{ $product->description }}" class="form-control" 
                     placeholder="Enter description">

                    @error('description')
                      <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="input" name="price" 
                    value="{{ $product->price }}" class="form-control" 
                     placeholder="Enter price">

                    @error('price')
                      <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectBorder">Category</label>
                    <select class="custom-select form-control-border" name="category_id" id="exampleSelectBorder">
                      <option></option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                    @error('category_id')
                      <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                  </div>
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