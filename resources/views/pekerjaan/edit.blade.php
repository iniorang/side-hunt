@extends('layouts.app')

@section('content')
<div class="container-fluid py-5 mt-2 justify-content-center w-50">
    <h1 class="text-center display-5 fw-bold mb-5">Edit</h1>
    <div class="row">

        <form action="{{ route('sidejob.update',$sidejob->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            {{-- <div class="form-group mb-3">
                <label class="font-weight-bold">IMAGE</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                <!-- error message untuk image -->
                @error('image')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div> --}}
            <div class="form-group mb-3">
                <label class="font-weight-bold">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                    value="{{ old('nama',$sidejob->nama) }}" placeholder="Masukkan Nama Pekerjaan Sampingan">

                <!-- error message untuk title -->
                @error('title')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="font-weight-bold">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                    value="{{ old('alamat',$sidejob->alamat) }}" placeholder="Masukkan alamat pekerjaan yang akan diadakan">
                    
                @error('alamat')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <div class="container-flex">
                    <div class="row">
                        <div class="col">
                            <label class="font-weight-bold">Minimal Gaji</label>
                            <input type="number" class="form-control @error('min_gaji') is-invalid @enderror" name="min_gaji"
                                value="{{ old('min_gaji',$sidejob->min_gaji) }}" placeholder="Masukkan minimal gaji pekerjaan">
                                
                            @error('min_gaji')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="font-weight-bold">Gaji Maksimal</label>
                            <input type="number" class="form-control @error('max_gaji') is-invalid @enderror" name="max_gaji"
                                value="{{ old('max_gaji',$sidejob->max_gaji) }}" placeholder="Masukkan maksimal gaji pekerjaan">
                                
                            @error('max_gaji')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="font-weight-bold">Pekerja yang Bisa Diterima</label>
                <input type="number" class="form-control @error('max_pekerja') is-invalid @enderror" name="max_pekerja"
                    value="{{ old('max_pekerja',$sidejob->max_pekerja) }}" placeholder="Masukkan jumlah pekerja yang bisa diterima">
                @error('max_pekerja')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="font-weight-bold">Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5"
                    placeholder="Masukkan Deskripsi Pekerjaan">{{ old('deskripsi',$sidejob->deskripsi) }}</textarea>

                <!-- error message untuk description -->
                @error('deskripsi')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
            <button type="reset" class="btn btn-md btn-warning">RESET</button>
        </form>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection