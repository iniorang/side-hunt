@extends('layouts.admin')

@section('content')
<div class="tab-content">
    <div class="tab-pane active" id="overview">
        <div class="container">
            <h1 class="judul">Admin</h1>
            <div class="row">
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h1 class="card-title">Pengguna</h1>
                            <p class="card-text">{{ $user_count }}</p>
                            <a href="#pengguna" class="btn btn-primary">Pengguna</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h1 class="card-title">Pekerjaan</h1>
                            <p class="card-text">{{ $job_count }}</p>
                            <a href="#" class="btn btn-primary">Pekerja</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h1 class="card-title">Pelamar</h1>
                            <p class="card-text">{{ $pelamar_count }}</p>
                            <a href="#pelamars" class="btn btn-primary">Pelamar</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h1 class="card-title">Transaksi</h1>
                            <p class="card-text">{{ $transaksi_count }}</p>
                            <a href="#transaksi" class="btn btn-primary">Transaksi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane" id="pengguna">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Telpon</th>
                                        <th scope="col">Dompet</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user as $u)
                                    <tr>
                                        <td>{{ $u->id }}</td>
                                        <td>{{ $u->nama }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $u->alamat }}</td>
                                        <td>{{ $u->telpon }}</td>
                                        <td>{{ $u->dompet }}</td>
                                        <td class="text-center">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Data pengguna belum tersedia.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $user->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane" id="pelamars">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Job</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pelamar as $t)
                                    <tr>
                                        <td>{{ $t->id }}</td>
                                        <td>{{ $t->user->name }}</td>
                                        <td>{{ $t->job->title }}</td>
                                        <td>{{ $t->status }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('tim.destroy', $t->id) }}" method="POST">
                                                <a href="{{ route('tim.detail', $t->id) }}" class="btn btn-sm btn-dark">Detail</a>
                                                <a href="{{ route('tim.edit', $t->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data pelamar belum tersedia.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $pelamar->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane" id="transaksi">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transaksi as $t)
                                    <tr>
                                        <td>{{ $t->id }}</td>
                                        <td>{{ $t->user->name }}</td>
                                        <td>{{ $t->jumlah }}</td>
                                        <td>{{ $t->jenis }}</td>
                                        <td>{{ $t->status ? 'Verified' : 'Not Verified' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('transactions.verify', $t->id) }}" class="btn btn-sm btn-primary">Verifikasi</a>
                                            <a href="{{ route('transactions.cancel', $t->id) }}" class="btn btn-sm btn-danger">Batalkan</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada transaksi.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $transaksi->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Check if messageType and messageContent are defined
    if (typeof messageType !== 'undefined' && typeof messageContent !== 'undefined') {
        if (messageType === 'success') {
            toastr.success(messageContent, 'BERHASIL!');
        } else if (messageType === 'error') {
            toastr.error(messageContent, 'GAGAL!');
        }
    }
</script>

@endsection