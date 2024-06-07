<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Yajra\DataTables\Facades\DataTables;

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
                        <a href="#" onclick="deleteSlider(this)" data-id="' . $products->id . '" class="btn btn-danger text-white">Delete</a>
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
