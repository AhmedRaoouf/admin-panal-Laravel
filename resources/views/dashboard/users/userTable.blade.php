<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>img</th>
            <th colspan="2" style="text-align:center">Controls</th>
        </tr>
    </thead>
    <tbody>
    {{--  "SELECT * FROM users" --}}
    @foreach ($users as $user)

        <tr>

            <td>00{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role}}</td>
            <td><img src="{{asset("uploads/$user->img")}}" alt="" style="width: 100px;height:80px"></td>
                <td><a class="btn btn-primary" href="{{url("users/edit/$user->id ")}} ">Edit</a></td>
                <td>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#a{{$user->id}}">
                    Delete
                </button>



                <!-- Modal -->
                <div class="modal fade" id="a{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Ready for delete?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure to delete Product : <span class="text-danger font-weight-bold">{{$user->name}}</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a class="btn btn-danger" href="{{url("users/delete/$user->id")}}">Delete</a>
                    </div>
                    </div>
                </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{$users->links()}}


