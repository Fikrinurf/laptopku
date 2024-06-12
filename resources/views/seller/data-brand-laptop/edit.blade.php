@extends('layout.seller.app')
@section('title', 'Seller - Edit Data Brand Laptop')
@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Edit Data Brand Laptop </h1>
                </div>
            </div><!--//row-->
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form action="{{ url('/seller/data-brand/' . $brand->id) }}" method="post">

                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Nama Brand</label>
                            <input type="text" class="form-control" id="setting-input-1" name="brand_name"
                                value="{{ old('brand_name', $brand->brand_name) }}">
                            @error('brand_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Negara Asal</label>
                            <input type="text" class="form-control" id="setting-input-1" name="country"
                                value="{{ old('country', $brand->country) }}">
                            @error('country')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Penemu</label>
                            <input type="text" class="form-control" id="setting-input-1" name="founder"
                                value="{{ old('founder', $brand->founder) }}">
                            @error('founder')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Tempat Ditemukan</label>
                            <input type="text" class="form-control" id="setting-input-1" name="founded_place"
                                value="{{ old('founded_place', $brand->founded_place) }}">
                            @error('founded_place')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="release" class="form-label">Tanggal Ditemukan</label>
                            <input type="date" class="form-control" id="release" name="founded_date"
                                value="{{ old('founded_date', $brand->founded_date) }}">
                            @error('founded_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn app-btn-primary">Update Data</button>
                    </form>
                </div><!--//app-card-body-->

            </div>


        </div><!--//container-fluid-->
    </div><!--//app-content-->
@endsection

@push('js')
    <script src="{{ asset('assets/seller/jquery-3.5.1.js') }}"></script>
@endpush
