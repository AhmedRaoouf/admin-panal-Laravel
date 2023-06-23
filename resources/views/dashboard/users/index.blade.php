
  <!-- Header + Nav -->
  @include('dashboard.layout.header')
  <!-- /.Header + Nav -->
  <!-- Main Sidebar Container -->
  @include('dashboard.layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @if (request()->is('users'))
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 font-weight-bold">Users</h1>
                <a class="btn btn-primary"  href="{{url('users/create')}}">Add User</a>
                <a class="btn btn-success"  href="{{url('users/latest')}}">Latest</a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>

                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    @endif
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
        @if (request()->is('users'))
            @include('dashboard.users.userTable')

        @endif

        @if (request()->is('users/create'))
            @include('dashboard.users.create')
        @endif

        @isset($id)
            @if (request()->is("users/edit/$id"))
                @include('dashboard.users.edit')
            @endif
        @endisset

        @if (request()->is("users/search"))
            @include('dashboard.users.search')
        @endif

        @if (request()->is("users/latest"))
            @include('dashboard.users.latest')
        @endif

        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@extends('dashboard.layout.footer')

