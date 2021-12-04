@extends('admin.includes.layout')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Message</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{Route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Messages</li>
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
                    <th>User Name</th>
                    <th>Email</th>
                    <th>subject</th>
                    <th>Message</th>
                    <th>action</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($messages as $message)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        {{$message->user->name}}
                    </td>
                    <td>{{$message->user->email}}</td>
                    <td>{{$message->subject}}</td>
                    <td>{{$message->message}}</td>
                    <td>
                      <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" href="{{route('admin.message.delete',$message)}}">Delete</a>
                    </td>
                  </tr>
                @endforeach
                  
                </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>subject</th>
                    <th>Message</th>
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
      
      {{$messages->links('admin.includes.paginate')}}
  <!-- /.content-wrapper -->
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
  </div>
  
@endsection