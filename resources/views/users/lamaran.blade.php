@extends('layouts.app')

@section('content')
<div class="container">
    <h1>History Lamaran</h1>
    <ul>
        @foreach($lamaran as $lamaranitem)
        @if($lamaranitem->sidejob)
        <li>{{ $lamaranitem->sidejob->nama }}</li>
        Status: {{ $lamaranitem->status }}
        @else
        <li>Side job not found - Status: {{ $lamaranitem->status }}</li>
        @endif
        @endforeach
    </ul>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
