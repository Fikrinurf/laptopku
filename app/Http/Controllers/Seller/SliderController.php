<?php

namespace App\Http\Controllers\Seller;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditSliderReqs;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $sliders = Slider::latest()->get();

            return DataTables::of($sliders)
                ->addIndexColumn()
                ->addColumn('button', function ($sliders) {
                    return '
                <div>
                        <a href="/seller/slider/' . $sliders->id . '" class="btn btn-secondary text-white">Detail</a>
                        <a href="/seller/slider/' . $sliders->id . '/edit" class="btn btn-primary text-white">Edit</a>
                        <a href="#" onclick="deleteSlider(this)" data-id="' . $sliders->id . '" class="btn btn-danger text-white">Delete</a>
                </div>';
                })
                ->rawColumns(['button'])
                ->make();
        }
        return view('seller.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('seller.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        $data = $request->validated();
        $file = $request->file('img');

        $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/slider', $namaFile);

        $data['img'] = $namaFile;

        Slider::create($data);
        return redirect(url('/seller/slider'))->with('success', 'Berhasil menambahkan Slider');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sliders = Slider::find($id);
        return view('seller.slider.detail', compact('sliders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sliders = Slider::find($id);
        return view('seller.slider.edit', compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditSliderReqs $request, string $id)

    {
        $data = $request->validated();

        if ($request->hasFile('img')) {
            $file = $request->file('img');

            $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/slider', $namaFile);
            Storage::delete('public/slider/' . $request->oldImg);
            $data['img'] = $namaFile;
        } else {
            $data['img'] = $request->oldImg;
        }

        Slider::find($id)->update($data);
        return redirect(url('/seller/slider'))->with('success', 'Berhasil Mengupdate Slider');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Slider::find($id);
        Storage::delete('public/slider/' . $data->img);
        $data->delete();

        return response()->json([
            'message' => 'data slider dihapus'
        ]);
    }
}
