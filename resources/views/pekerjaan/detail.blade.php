
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
                        {{-- <h4>Pembuat</h4> --}}
                        {{-- <p>{{ $sidejob->pembuat->name}}</p> --}}
                        @if(auth()->check())
                        @php
                        $userApplied = app('App\Models\Pelamar')->where('job_id', $sidejob->id)->where('user_id', auth()->id())->exists();
                        @endphp
                        @if($sidejob->pembuat == auth()->id())
                            <a href="{{ route('sidejob.edit', $sidejob) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('sidejob.destroy', $sidejob) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <h4>Daftar Pelamar:</h4>
                            <ul>
                                @foreach($pelamar as $pelamar)
                                    <li>
                                        <p>{{ $pelamar->user->nama }}</p>
                                        @if($pelamar->status == 'tunda')
                                            <form action="{{ route('pelamar.terima', $pelamar) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success">Terima</button>
                                            </form>
                                            <form action="{{ route('pelamar.tolak', $pelamar) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-danger">Tolak</button>
                                            </form>
                                        @else
                                            Status: {{ $pelamar->status }}
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @elseif(!$userApplied)
                            <form action="{{ route('sidejob.buatPermintaan', $sidejob) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Daftar Pekerjaan</button>
                            </form>
                        @else
                            <p>Anda sudah melamar, tunggu pembuat membuat pilihan untuk terima atau tolak.</p>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Login untuk Melamar</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection