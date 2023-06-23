
<h1>Latest Products</h1>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Discount</th>
            <th>description</th>
            <th>img</th>
            <th>category</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
    {{--  "SELECT * FROM products" --}}

    @foreach ($latest as $pro)

        <tr>

            <td>{{$c++ }}</td>
            <td>{{$pro->name}}</td>
            <td>{{$pro->price}}$</td>
            <td>{{$pro->discount_price}}$</td>
            <td>{{$pro->desc}}</td>
            <td>
                @foreach ( explode(',' ,$pro->img) as $img)
                <img src="{{asset("uploads/$img")}}" alt="" style="width: 100px;height:80px">
                @endforeach
            </td>
            <td>{{$cats[ $pro->cat_id -1 ]->name}}</td>
            <td>{{$pro->created_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<a class="btn btn-primary" href="{{url("products/ ")}} ">Back to all</a>
