<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        return view('homepage', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataRequest = request('filter');
        if($dataRequest != ''){
            $dataFilter = Category::where('category_name', 'LIKE', "%".$dataRequest.'%')->first();
            $data = Product::where('category_id', $dataFilter['id'])->paginate(10);
        }else{
            $data = Product::paginate(10);
        }
        $dataCategory = Category::all();
        return view('dashboardpage', compact('data', 'dataCategory', 'dataRequest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'supplier_id' => 'required',
            'user_id' => 'required',
            'product_name' => 'required|unique:products,product_name',
            'price' => 'required',
            'description' => 'required|max:200',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Product::create($validatedData);
        return redirect()->to('category/create')->with('success', 'Produk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataProduct = Product::find($id);
        $data = Category::all();
        $dataSupplier = Supplier::all();
        return view('editpage', compact('data', 'dataProduct', 'dataSupplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'supplier_id' => 'required',
            'user_id' => 'required',
            'product_name' => 'required',
            'price' => 'required',
            'description' => 'required|max:200',
            'image' => 'image|file|max:1024'
        ]);


        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Product::find($id)->update($validatedData);
        return redirect()->to('category/create')->with('success', 'Produk Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        if($product->image){
            Storage::delete($product->image);
        }
        Product::destroy($product->id);
        return redirect()->to('/product/create')->with('success', 'Produk Telah Dihapus');
    }
}
