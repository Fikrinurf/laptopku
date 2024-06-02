<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Yajra\DataTables\Facades\DataTables;

class DataBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $brand = Brand::latest()->get();

            return DataTables::of($brand)
                ->addIndexColumn()
                ->addColumn('button', function ($brand) {
                    return '
                <div>
                        <a href="/seller/data-brand/' . $brand->id . '/edit" class="btn btn-primary text-white">Edit</a>
                        <a href="#" onclick="deleteDataProcessor(this)" data-id="' . $brand->id . '" class="btn btn-danger text-white">Delete</a>
                </div>';
                })
                ->rawColumns(['button'])
                ->make();
        }
        return view('seller.data-brand-laptop.index');
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
