<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3);
        // return collection of data
        return ProductResource::collection($products);
    }

    public function show($id){
        $pro = Product::find($id);
        if ($pro == null) {
            return response()->json([
                'msg'=>"404 not found"
            ],404);
        }
        //return single element
        return new ProductResource($pro);
    }

    public function store(Request $request)
    {
        $obj = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:50'],
            'desc' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'discount_price' => ['nullable', 'integer'],
            'img' => ['required', 'image', 'max:5000', 'mimes:jpg,jpeg,png'],
            'cat_id' => "required|exists:cats,id",
        ]);

        if ($obj->fails()) {
            return response()->json([
                'errors' => $obj->errors(),
            ]);
        };

        $catId = $request->input('cat_id');
        $img = $request->img;
        $imagePath = Storage::putFile('products', $img, 'public');
        $pro = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'discount_price' => $request->input('discount_price'),
            'desc' => $request->input('desc'),
            'img' => $imagePath ,
            'cat_id' => $catId,
        ]);

        return response()->json([
            'msg' => 'Create Successfully',
            'pro' => new ProductResource($pro),
        ], 201);
    }


    public function update(Request $request,$id)
    {
        $editObj = Validator::make($request->all(),[
            'name'=>['required','string','max:50'],
            'price' => "required|integer",
            'discount_price' => "integer|nullable",
            'desc' => "required|string",
            'img' => ['nullable','image','max:5000','mimes:jpg,jpeg,png'],
            'cat_id' => "required|exists:cats,id",
        ]);
        if ($editObj->fails()) {
            return response()->json([
                'errors'=>$editObj->errors(),
            ]);
        }
        $pro = Product::find($id);
        if ($pro == null) {
            return response()->json([
                'msg'=> '404 Not Found'
            ],404);
        }
        $imagePath = $pro->img;
        if ($request->hasFile('img')) {
            $img = $pro->img;
            Storage::delete($img);
            $imagePath = Storage::putFile('products', $img, 'public');
        }

        $pro->update([
            'name' => $request->name,
            'price' => $request->price,
            'discount_price' => $request->discount,
            'desc' => $request->desc,
            'img' =>$imagePath,
            'cat_id' => $request->cat_id,
        ]);

        return response()->json([
            'msg'=>'updated successfully',
        ],200);
    }

    public function delete($id)
    {
        $pro = Product::find($id);
        if ($pro == null) {
            return response()->json([
                'msg'=> '404 Not Found'
            ],404);
        }
        $imagePaths = $pro->img;
        foreach(explode(',',$imagePaths) as $img){
            Storage::delete($img);
        }
        $pro->delete();
        return response()->json([
            'msg'=>'Deleted Successfully',
        ],200);

    }
}
