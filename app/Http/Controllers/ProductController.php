<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $cats = Cat::all();
        $products = Product::paginate(3);
        return view('dashboard.products.index',[
            'cats' =>$cats,
            'products' =>$products,
        ]);
    }
    // GET Request
    public function create()
    {
        $cats = Cat::all();
        return view('dashboard.products.index',[
            'cats' =>$cats,
        ]);
    }
    //POST Request
    public function store(Request $request)
    {
        $request ->validate([
            'name'=>['required', 'string', 'max:50'],
            'desc'=>['required', 'string'],
            'price'=>['required', 'integer'],
            'discount_price'=>['nullable', 'integer'],
            'img.*' => ['required','image','max:2048','mimes:jpg,jpeg,png'],
        ]);
        $images = $request->file('img');
        $imagePaths = [];
        foreach ($images as $image) {
            $imagePath = Storage::putFile('products', $image, 'public');
            $imagePaths[] = $imagePath;
        }
        //convert to string
        $imagePathString = implode(',', $imagePaths);
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'discount_price' => $request->discount,
            'desc' => $request->desc,
            'img' => $imagePathString,
            'cat_id' => $request->cat,
        ]);

        return redirect( url('products'));
    }

    public function edit($id)
    {
        $pro = Product::findOrFail($id);
        $cats = Cat::select('id','name')->get();
        return view('dashboard.products.index',[
            'pro' =>$pro,
            'cats' =>$cats,
            'id' =>$id,
        ]);
    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'name'=>['required','string','max:50'],
            'price' => "required|numeric|max:999999.99",
            'discount_price' => "decimal:2|nullable",
            'desc' => "required|string",
            'img.*' => "image|mimes:jpg,jpeg,png|nullable|max:5000",
            'cat_id' => "exists:products,id",
        ]);

        $pro = Product::findOrFail($id);
        $imagePaths = $pro->img;
        if ($request ->hasFile('img') && $imagePaths) {
            foreach($imagePaths as $img){
                Storage::delete($img);
                $imagePath = Storage::putFile('products', $img, 'public');
                $imagePaths[] = $imagePath;
            }
        }
        $pro->update([
            'name' => $request->name,
            'price' => $request->price,
            'discount_price' => $request->discount,
            'desc' => $request->desc,
            'img' => $imagePaths,
            'cat_id' => $request->cat,
        ]);
        return redirect( url('products') );

    }

    public function delete($id)
    {
        $pro = Product::findOrFail($id);
        $imagePaths = $pro->img;
        foreach(explode(',',$imagePaths) as $img){
            Storage::delete($img);
        }
        $pro->delete();
        return redirect( url('products') );
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $result = Product::where('name','like',"%$keyword%")->get();
        $cats = Cat::all();
        return view('dashboard.products.index',[
            "result"=>$result,
            "keyword"=>$keyword,
            'c'=>$c = 1,
            'cats'=>$cats
        ]);
    }

    public function latest()
    {
        $latest = Product::orderBy('id','DESC')->take(5)->get();
        $cats = Cat::all();
        return view('dashboard.products.index',[
            'latest'=>$latest,
            'c'=>$c=1,
            'cats'=>$cats

        ]);
    }

}
