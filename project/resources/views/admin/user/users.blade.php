@extends('admin.includes.layout')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Register User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{Route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if(Session::has('success'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
        @endif
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($users as $user)
                  <tr>
                    <td>
                        @if($user->profile_photo_path!=null)
                        <img src="{{asset('uploads/user/'.$user->profile_photo_path)}}" height="50px">
                        @endif
                    </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                      <a class="btn btn-sm btn btn-success" href="{{ route('admin.users.edit',$user) }}">Edit</a>
                     
                      <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('admin.users.destroy',$user) }}">Delete</a>
                    </td>
                  </tr>
                @endforeach
                  
                </tbody>
                  <tfoot>
                  <tr>
                    <th>image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
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
      
      {{$users->links('admin.includes.paginate')}}
  <!-- /.content-wrapper -->
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
  </div>
  
@endsection