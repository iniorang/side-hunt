@extends('layouts.app')

@section('content')

<div class="container-fluid py-5 mt-2 justify-content-center w-50">
    @csrf
    <h1 class="text-center display-5 fw-bold mb-5">Registrasi</h1>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('sidejob.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                        value="{{ old('nama') }}" placeholder="Masukkan Nama Pekerjaan Sampingan">

                    <!-- error message untuk title -->
                    @error('title')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5"
                        placeholder="Masukkan Deskripsi Pekerjaan">{{ old('deskripsi') }}</textarea>

                    <!-- error message untuk description -->
                    @error('deskripsi')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="my-button me-3 align-item-center">Tambahkan</button>
            </form>
        </div>
    </div>
</div>


{{--
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('deskripsi');
</script> --}}
@endsection