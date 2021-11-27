@extends('admin.includes.layout')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Social Media</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{Route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Social Media</li>
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
                    <th>icon</th>
                    <th>Name arabic</th>
                    <th>Name English</th>
                    <th>Link</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($socialMedias as $socialMedia)
                  <tr>
                    <td>
                        icon
                    </td>
                    <td>{{$s->name['arabic']}}</td>
                    <td>{{$u->name['english']}}</td>
                    <td>{{$u->link}}</td>
                  </tr>
                @endforeach
                  
                </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>icon</th>
                    <th>Name arabic</th>
                    <th>Name English</th>
                    <th>Link</th>
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