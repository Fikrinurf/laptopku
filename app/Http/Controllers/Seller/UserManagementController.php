<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $users = User::latest()->get();

            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('button', function ($users) {
                    return '
                <div>
                        <a href="#" onclick="deleteUserManagement(this)" data-id="' . $users->id . '" class="btn btn-danger text-white">Delete</a>
                </div>';
                })
                ->addColumn('role', function ($users) {
                    if ($users->role == 'seller') {
                        return '<span class="badge bg-danger">Seller</span>';
                    } else {
                        return '<span class="badge bg-success">Buyer</span>';
                    }
                })
                ->rawColumns(['role', 'button'])
                ->make();
        }
        return view('seller.user-management.index');
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
        $data = User::find($id);
        $data->delete();

        return response()->json([
            'message' => 'pengguna berhasil dihapus'
        ]);
    }
}
