@extends('layouts.app')
@section('peta')
#map{
    height: 800px;
}
@endsection

@section('content')
<div class="hero-section">
    <div class="container">
        <div class="row px-3 py-5">
            <div class="col-lg-6">
                <h1 class="hero-heading mb-3">Temukan pekerjaan yang kamu inginkan!</h1>
                <div class="d-grid gap-5  d-md-flex justify-content-md-start">
                    <form action="{{route('sidejob.cari')}}" method="GET">
                        <input class="input-search-hero" type="text" name="cari" placeholder="Cari Pekerjaan">
                        <button type="submit" class="my-button">Cari</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('List') }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Lihat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sidejob as $sidejob)
                            <tr>
                                <td>{{ $sidejob->nama }}</td>
                                <td>{{ $sidejob->alamat }}</td>
                                <td><a href="{{ route('sidejob.show', $sidejob->id) }}"
                                        class="btn btn-sm btn-dark">SHOW</a></td>
                            </tr>
                            @empty
                            <div class="alert alert-danger">
                                Data kerja sampingan tidak ada.
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div id="map">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
                <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>
                <script>
                    var map = L.map('map').setView([-2.526, 117.905], 5);
                    var lc = L.control.locate().addTo(map);
                    lc.start();

                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    }).addTo(map);
                </script>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        @endsection