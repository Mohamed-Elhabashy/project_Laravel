@extends('admin.includes.layout')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All doctors</h1>
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
                    <th>image</th>
                    <th>Name</th>
                    <th>Job</th>
                    <th>details</th>
                    <th>facebook</th>
                    <th>linkedin</th>
                    <th>twitter</th>
                    <th>instagram</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($doctors as $doctor)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                      <img src="{{asset('uploads/doctor/'.$doctor->image)}}" height="50px">
                    </td>
                    <td>
                        {{$doctor->name}}
                    </td>
                    <td>{{ $doctor->job }}</td>
                    <td>{{ $doctor->details }}</td>
                    <td>{{ $doctor->facebook }}</td>
                    <td>{{ $doctor->linkedin }}</td>
                    <td>{{ $doctor->twitter }}</td>
                    <td>{{ $doctor->instagram }}</td>
                    <td>
                      <a class="btn btn-sm btn-success" href="{{route('admin.doctor.edit',$doctor)}}">Edit</a>
                      <form id="delete_doctor" action="{{route('admin.doctor.destroy',$doctor)}}" method="POST">
                        @csrf
                        @method('DELETE')
                      </form>
                      <a class="btn btn-sm btn-danger"  onclick="DeleteDoctor()" href="#">Delete</a>
                    </td>
                  </tr>
                @endforeach
                  
                </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>image</th>
                    <th>Name</th>
                    <th>Job</th>
                    <th>details</th>
                    <th>facebook</th>
                    <th>linkedin</th>
                    <th>twitter</th>
                    <th>instagram</th>
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
  function DeleteDoctor() {
      if(confirm('Are you sure?')==true){ 
      let form = document.getElementById("delete_doctor");
      form.submit();
      }
  }
</script>