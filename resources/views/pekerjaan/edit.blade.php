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
                <label class="font-weight-bold">Gaji</label>
                <input type="number" class="form-control @error('gaji') is-invalid @enderror" name="gaji"
                    value="{{ old('gaji',$sidejob->gaji) }}" placeholder="Masukkan gaji pekerjaan">
                    
                @error('gaji')
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
@endsection