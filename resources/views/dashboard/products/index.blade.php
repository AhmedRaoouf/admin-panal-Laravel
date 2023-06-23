
  <!-- Header + Nav -->
  @include('dashboard.layout.header')
  <!-- /.Header + Nav -->
  <!-- Main Sidebar Container -->
  @include('dashboard.layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @if (request()->is('products'))
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 font-weight-bold">Products</h1>
                @if (request()->session()->get('role') == 'admin')
                <a class="btn btn-primary"  href="{{url('products/create')}}">Add Product</a>
                @endif
                <a class="btn btn-success"  href="{{url('products/latest')}}">Latest</a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
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
            @if (request()->is('products'))
                @include('dashboard.products.proTable')
            @elseif (request()->is('products/create'))
                @include('dashboard.products.create')
            @elseif (isset($id) && request()->is("products/edit/$id"))
                @include('dashboard.products.edit')
            @elseif (request()->is("products/search"))
                @include('dashboard.products.search')
            @elseif (request()->is("products/latest"))
                @include('dashboard.products.latest')
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

