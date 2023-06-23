
        <!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="card shadow my-4">

                    <div class="card-body">

                    <!-- Page Heading -->
                    <h1 class="h3 my-3 text-gray-800 ">New Product</h1>
                    @include('errors')

                    <form method="post" action="{{url("products/store")}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name"  class="form-control"   autofocus>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="text" name="price"  class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Discount</label>
                            <input  name="discount"  class="form-control"   >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description </label>
                            <input type="text" name="desc"  class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">img </label>
                            <input type="file" name="img[]"  class="form-control" multiple>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1"> Category</label>
                        <select name="cat" class="form-control">

                            @foreach ($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach

                        </select>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{url('products')}}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

