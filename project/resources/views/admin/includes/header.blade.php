<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('admin/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('uploads/user/'.auth()->user()->profile_photo_path)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
            <a href="{{Route('admin.index')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{Route('admin.users.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('admin.users.admins')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admins</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('admin.users.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Social Media
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.social-media.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Social Media</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.social-media.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Social Media</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.category.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{Route('admin.appointment.index')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Appointment
                <i class="right fas fa-angle"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Doctor
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.doctor.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Doctor List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.doctor.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Doctor</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @foreach ($Categories as $category)
              <li class="nav-item">
                <a href="{{ route('admin.product.index',$category) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $category->name }}</p>
                </a>
              </li>
              @endforeach
              
              <li class="nav-item">
                <a href="{{ route('admin.product.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Mailing
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.subscribe.mail.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Mails</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.subscribe.mail.trashed') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trashed Email</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.subscribe.mail.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Email</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.subscribe.mail.send.email.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Send Email</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{Route('admin.website-information.edit')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Setting
                <i class="right fas fa-angle"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{Route('admin.message.index')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Messages Contact us
                <i class="right fas fa-angle"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{Route('front.home.index')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Go To Website
                <i class="right fas fa-angle"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <form id="form__submit" action="{{route('logout')}}" method="POST">
              @csrf
              @method('')
              <a href="#" onclick="submitForm()" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Logout
                    <i class="right fas fa-angle"></i>
                  </p>
                </a>
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>




<script>
    function submitForm() {
        let form = document.getElementById("form__submit");
        form.submit();
    }
</script>