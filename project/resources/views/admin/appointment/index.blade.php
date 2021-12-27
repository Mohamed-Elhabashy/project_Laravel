@extends('admin.includes.layout')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All appointment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{Route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">appointment</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
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
                    <th>phone</th>
                    <th>doctor name</th>
                    <th>date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($appointments as $appointment)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        {{$appointment->user->name}}
                    </td>
                    <td>
                      {{$appointment->phone}}
                    </td>
                    <td>
                      {{$appointment->doctor->name}}
                    </td>
                    <td>
                      {{$appointment->date}}
                    </td>
                    <td>
                      <form id="delete_appointment" action="{{route('admin.appointment.destroy',$appointment)}}" method="POST">
                        @csrf
                        @method('DELETE')
                      </form>
                      <a class="btn btn-sm btn-danger"  onclick="DeleteAppointment()" href="">Delete</a>
                    </td>
                  </tr>
                @endforeach
                  
                </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>phone</th>
                    <th>doctor name</th>
                    <th>date</th>
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
  <!-- /.content-wrapper -->
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
  </div>
  
@endsection

<script>
  function DeleteAppointment() {
      if(confirm('Are you sure?')==true){ 
      let form = document.getElementById("delete_appointment");
      form.submit();
      }
  }
</script>