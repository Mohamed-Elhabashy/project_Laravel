@extends('admin.includes.layout')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{Route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>action</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($Categories as $category)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        {{$category->name}}
                    </td>
                    <td>
                      <a class="btn btn-sm btn-success" href="{{route('admin.category.edit',$category)}}">Edit</a>
                      <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" href="{{route('admin.category.destroy',$category)}}">Delete</a>
                    </td>
                  </tr>
                @endforeach
                  
                </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
  <!-- /.content-wrapper -->
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
  </div>
  
@endsection