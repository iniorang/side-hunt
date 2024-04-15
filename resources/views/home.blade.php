@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sidejob as $sidejob)
                                <tr>
                                    <td>{{ $sidejob->nama }}</td>
                                    <td>{{ $sidejob->deskripsi }}</td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data kerja sampingan belum Tersedia.
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
