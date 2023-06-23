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
            @if (request()->session()->get('role') == 'admin')
            <th colspan="2" style="text-align:center">Controls</th>
            @endif
        </tr>
    </thead>
    <tbody>
    {{--  "SELECT * FROM products" --}}
    @foreach ($products as $pro)

        <tr>

            <td>00{{$pro->id}}</td>
            <td>{{$pro->name}}</td>
            <td>{{$pro->price}}$</td>
            <td>{{$pro->discount_price}}$</td>
            <td>{{$pro->desc}}</td>
            <td>
                @foreach ( explode(',' ,$pro->img) as $img)
                <img src="{{asset("uploads/$img")}}" alt="" style="width: 100px;height:80px">
                @endforeach
            </td>
            <td>
                {{$cats[ $pro->cat_id -1 ]->name}}
            @if (request()->session()->get('role') == 'admin')
            </td>


                <td><a class="btn btn-primary" href="{{url("products/edit/$pro->id ")}} ">Edit</a></td>
                <td>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#a{{$pro->id}}">
                    Delete
                </button>



                <!-- Modal -->
                <div class="modal fade" id="a{{$pro->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Ready for delete?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure to delete Product : <span class="text-danger font-weight-bold">{{$pro->name}}</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a class="btn btn-danger" href="{{url("products/delete/$pro->id")}}">Delete</a>
                    </div>
                    </div>
                </div>
                </div>
            </td>
            @endif

        </tr>
    @endforeach
    </tbody>
</table>

{{$products->links()}}


