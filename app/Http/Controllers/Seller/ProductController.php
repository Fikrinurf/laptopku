<?php

namespace App\Http\Controllers\Seller;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Processors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $products = Product::latest()->get();

            return DataTables::of($products)
                ->addIndexColumn()
                ->addColumn('button', function ($products) {
                    return '
                <div>
                        <a href="/seller/product/' . $products->id . '" class="btn btn-secondary text-white">Detail</a>
                        <a href="/seller/product/' . $products->id . '/edit" class="btn btn-primary text-white">Edit</a>
                        <a href="#" onclick="deleteProduct(this)" data-id="' . $products->id . '" class="btn btn-danger text-white">Delete</a>
                </div>';
                })
                ->addColumn('warranty', function ($products) {
                    if ($products->warranty == 'N') {
                        return '<span class="badge bg-danger">Tidak Garansi</span>';
                    } else {
                        return '<span class="badge bg-success">Garansi</span>';
                    }
                })
                ->rawColumns(['warranty', 'button'])
                ->make();
        }
        return view('seller.data-produk.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brand = Brand::get();
        $processor = Processors::get();
        return view('seller.data-produk.create', compact('brand', 'processor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $file = $request->file('img');

        $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/product', $namaFile);

        $data['img'] = $namaFile;

        Product::create($data);
        return redirect(url('/seller/product'))->with('success', 'Berhasil menambahkan produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('seller.data-produk.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::get();
        $processor = Processors::get();
        $product = Product::find($id);
        return view('seller.data-produk.edit', compact('brand', 'processor', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('img')) {
            $file = $request->file('img');

            $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/product', $namaFile);
            Storage::delete('public/product/' . $request->oldImg);
            $data['img'] = $namaFile;
        } else {
            $data['img'] = $request->oldImg;
        }

        Product::find($id)->update($data);
        return redirect(url('/seller/product'))->with('success', 'Berhasil Mengupdate Product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::find($id);
        Storage::delete('public/product/' . $data->img);
        $data->delete();

        return response()->json([
            'message' => 'data product dihapus'
        ]);
    }
}
