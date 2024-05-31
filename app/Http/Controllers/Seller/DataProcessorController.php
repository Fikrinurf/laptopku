<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProcessorRequest;
use App\Models\Processors;
use Yajra\DataTables\Facades\DataTables;

class DataProcessorController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        if (request()->ajax()) {
            $processors = Processors::get();

            return DataTables::of($processors)
                ->addIndexColumn()
                ->addColumn('button', function ($processors) {
                    return '
                <div>
                        <a href="/seller/data-processor/' . $processors->id . '/edit" class="btn btn-primary text-white">Edit</a>
                        <a href="#" onclick="deleteDataProcessor(this)" data-id="' . $processors->id . '" class="btn btn-danger text-white">Delete</a>
                </div>';
                })
                ->rawColumns(['button'])
                ->make();
        }

        return view('seller.data-processors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('seller.data-processors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProcessorRequest $request)
    {
        $data = $request->validated();

        Processors::create($data);
        return redirect(url('/seller/data-processor'))->with('success', 'Berhasil menambahkan data processor');
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
        $processor = Processors::find($id);
        return view('seller.data-processors.edit', compact('processor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProcessorRequest $request, string $id)
    {
        $data = $request->validated();
        Processors::find($id)->update($data);

        return redirect(url('/seller/data-processor'))->with('success', 'Data Processor berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Processors::find($id);
        $data->delete();

        return response()->json([
            'message' => 'data processor dihapus'
        ]);
    }
}
