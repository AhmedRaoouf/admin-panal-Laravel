
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
                    <h1 class="h3 my-3 text-gray-800 ">Edit User</h1>
                    @include('errors')

                    <form method="post" action="{{url("users/update/$user->id")}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" value={{"$user->name"}} class="form-control" id="exampleInputEmail1"  autofocus>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">email</label>
                            <input type="text" name="email" value={{"$user->email"}} class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">password</label>
                            <input  name="password"  class="form-control" id="exampleInputEmail1"  >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Role </label>
                            <select name="role" class="form-control">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{url('users')}}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

