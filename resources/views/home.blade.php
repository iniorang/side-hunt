@extends('layouts.app')

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
            {{-- <div class="col-10 col-sm-8 col-lg-6">
                <img src="bootstrap-themes.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
                    height="500" loading="lazy">
            </div> --}}
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
                                <td><a href="{{ route('sidejob.show', $sidejob->id) }}" class="btn btn-sm btn-dark">SHOW</a></td>
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
    </div>
</div>
@endsection