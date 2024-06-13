@extends('layouts.app')

@section('content')
<div class="container py-5 mt-2 justify-content-center">
    <h1>Transaksi</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Pembuat</th>
                <th>Pekerja</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $t)
                <tr>
                    <td>{{ $t->kode }}</td>
                    <td>{{ $t->pembuat }}</td>
                    <td>{{ $t->pekerja }}</td>
                    <td>{{ $t->jumlah }}</td>
                    <td>{{ $t->status }}</td>
                    <td>{{ $t->dibuat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
