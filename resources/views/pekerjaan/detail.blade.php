<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h1 class="display-2">{{ $sidejob->nama }}</h1>
                    <h3 class="display-4">Rp{{$sidejob->gaji}}</h1>
                    <hr>
                    <h4>Deskripsi</h4>
                    <p>{{ $sidejob->deskripsi }}</p>
                    <h4>Lokasi Pekerjaan</h4>
                    <p>{{ $sidejob->alamat}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection