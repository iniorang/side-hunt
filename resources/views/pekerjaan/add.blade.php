@extends('layouts.app')

@section('peta')
#map{
height: 400px;
width: 100%;
margin: 0;
padding: 0;
}
@endsection
@section('content')

<div class="container-fluid py-5 mt-2 justify-content-center w-50">
    @csrf
    <h1 class="text-center display-5 fw-bold mb-5">Tambah Pekerjaan</h1>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('sidejob.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Nama :</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        value="{{ old('nama') }}" placeholder="Masukkan Nama Pekerjaan">

                    @error('title')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Alamat Penyedia :</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamatInput"
                        name="alamat" value="{{ old('alamat') }}"
                        placeholder="Masukkan alamat pekerjaan yang tersedia">
                    @error('alamat')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="mt-3" id="map"></div>
                </div>

                <link rel="stylesheet"
                    href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
                <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js"
                    charset="utf-8"></script>
                <!-- Load Esri Leaflet from CDN -->
                <script src="https://unpkg.com/esri-leaflet@3.0.12/dist/esri-leaflet.js"></script>
                <!-- Load Esri Leaflet Geocoder from CDN -->
                <link rel="stylesheet"
                    href="https://unpkg.com/esri-leaflet-geocoder@3.1.4/dist/esri-leaflet-geocoder.css"
                    crossorigin="" />
                <script src="https://unpkg.com/esri-leaflet-geocoder@3.1.4/dist/esri-leaflet-geocoder.js"
                    crossorigin=""></script>
                <script>
                    var map = L.map('map').setView([-2.526, 117.905], 5);
                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    }).addTo(map);
                    
                </script>

                <div class="form-group mb-3">
                    <div class="container-flex">
                        <div class="row">
                            <div class="col">
                                <label class="font-weight-bold">Minimal Gaji :</label>
                                <input type="number" class="form-control @error('min_gaji') is-invalid @enderror"
                                    name="min_gaji" value="{{ old('min_gaji') }}"
                                    placeholder="Minimal gaji pekerjaan">

                                @error('min_gaji')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="font-weight-bold">Gaji Maksimal :</label>
                                <input type="number" class="form-control @error('max_gaji') is-invalid @enderror"
                                    name="max_gaji" value="{{ old('max_gaji') }}"
                                    placeholder="Maksimal gaji pekerjaan">

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
                    <label class="font-weight-bold">Pekerja diterima :</label>
                    <input type="number" class="form-control @error('max_pekerja') is-invalid @enderror"
                        name="max_pekerja" value="{{ old('max_pekerja') }}"
                        placeholder="Jumlah pekerja yang bisa diterima">
                    @error('max_pekerja')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Deskripsi Pekerjaan</label>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
{{--
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('deskripsi');
</script> --}}
@endsection