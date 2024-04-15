<!DOCTYPE html>
@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            {{-- <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('/storage/products/'.$sidejob->image) }}" class="rounded" style="width: 100%">
                    </div>
                </div>
            </div> --}}
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $sidejob->nama }}</h3>
                        <hr/>
                        <code>
                            <p>{!! $sidejob->deskripsi !!}</p>
                        </code>
                        <hr/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection