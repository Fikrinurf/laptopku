@extends('layout.seller.app')
@section('title', 'Seller - Tambah Data Produk')
@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Tambah Data Produk </h1>
                </div>
            </div><!--//row-->
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form action="{{ url('/seller/product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="setting-input-1" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control" id="setting-input-1" name="product_name"
                                        value="{{ old('product_name') }}">
                                    @error('product_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="setting-input-1" class="form-label">Deskripsi Produk</label><br>
                                    <textarea name="desc" class="form-control" id="" cols="30" rows="10">{{ old('desc') }}</textarea>
                                    @error('desc')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="setting-input-1" class="form-label">Harga</label>
                                    <input type="text" class="form-control" id="setting-input-1" name="price"
                                        value="{{ old('price') }}">
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="setting-input-1" class="form-label">Spesifikasi</label><br>
                                    <textarea name="specification" class="form-control" id="" cols="30" rows="10">{{ old('specification') }}</textarea>
                                    @error('specification')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="brand_id" class="form-label">Merk</label>
                                    <select name="brand_id" id="brand_id" class="form-control">
                                        <option value="" hidden>-- Pilih --</option>
                                        @foreach ($brand as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('brand_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->brand_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('brand_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="processor_id" class="form-label">Processor</label>
                                    <select name="processor_id" id="processor_id" class="form-control">
                                        <option value="" hidden>-- Pilih --</option>
                                        @foreach ($processor as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('processor_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach

                                    </select>

                                    @error('processor_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="warranty" class="form-label">Garansi</label>
                            <select name="warranty" id="warranty" class="form-control">
                                <option value="" hidden>-- Pilih --</option>
                                <option value="Y" {{ old('warranty') == 'Y' ? 'selected' : '' }}>
                                    Garansi
                                </option>
                                <option value="N" {{ old('warranty') == 'N' ? 'selected' : '' }}>
                                    Tidak Garansi
                                </option>
                            </select>
                            @error('warranty')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Upload Gambar (Max 2mb)</label>
                            <input type="file" class="form-control" id="setting-input-1" name="img"
                                value="{{ old('img') }}">
                            @error('img')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="upload_date" class="form-label">Tanggal Posting</label>
                            <input type="date" class="form-control" id="upload_date" name="upload_date"
                                value="{{ old('upload_date') }}">
                            @error('upload_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn app-btn-primary">Tambah Data</button>
                    </form>
                </div><!--//app-card-body-->

            </div>


        </div><!--//container-fluid-->
    </div><!--//app-content-->
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
@endpush
