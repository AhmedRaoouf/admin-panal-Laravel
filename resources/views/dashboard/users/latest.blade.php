
<h1>Latest User</h1>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>img</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
    {{--  "SELECT * FROM products" --}}

    @foreach ($latest as $user)
        <tr>

            <td>{{$c++ }}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role}}</td>
            <td><img src="{{asset("uploads/$user->img")}}" alt="" style="width: 100px;height:80px"></td>
            <td>{{$user->created_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<a class="btn btn-primary" href="{{url("users")}} ">Back to all</a>
