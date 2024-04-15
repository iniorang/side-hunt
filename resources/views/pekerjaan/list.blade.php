@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Tutorial Laravel 11 untuk Pemula</h3>
                    <h5 class="text-center"><a href="https://santrikoding.com">www.santrikoding.com</a></h5>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        @auth
                        <a href="{{ route('sidejob.create') }}" class="btn btn-md btn-success mb-3">ADD PRODUCT</a>
                        @endauth
                        @guest
                        {{-- kosong --}}
                        @endguest
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Deskripsi</th>
                                    @auth
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                    @endauth
                                    @guest

                                    @endguest
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sidejob as $sidejob)
                                    <tr>
                                        <td>{{ $sidejob->nama }}</td>
                                        <td>{{ $sidejob->deskripsi }}</td>
                                        @auth
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('sidejob.destroy', $sidejob->id) }}" method="POST">
                                                <a href="{{ route('sidejob.show', $sidejob->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('sidejob.edit', $sidejob->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                        @endauth
                                        @guest
                                        {{-- kosong --}}
                                        @endguest
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data kerja sampingan belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $sidejob->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

    </script>

@endsection