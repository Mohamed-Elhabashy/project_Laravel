@extends('admin.includes.layout')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{Route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{route('admin.users.update',$user)}}" method="post">
                  @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input  type="input" name="name" value="{{$user->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                    @error('name')
                    <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input  type="email" name="email" value="{{$user->email}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    @error('email')
                    <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input  type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    @error('password')
                    <span class="badge bg-danger mt-2">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                  <label for="exampleSelectBorder">Role</label>
                  <select  class="custom-select form-control-border" name="role_id" id="exampleSelectBorder">
                    <option></option>
                    <option value="1" 
                    @if ($user->role_id==1)
                      selected
                    @endif
                    >admin</option>
                    <option value="2"
                    @if ($user->role_id==2)
                    selected
                    @endif
                    >user</option>
                  </select>
                  @error('role_id')
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