@extends('layouts.app')

@section('content')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profil Pengguna</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-header h2 {
            margin: 0;
        }

        .profile-detail {
            margin-bottom: 15px;
        }

        .profile-detail label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <div class="profile-header">
            <h2>Profil</h2>
        </div>
        <div class="profile-detail">
            <label for="name">Nama:</label>
            <p id="name">{{ $user->nama }}</p>
        </div>
        <div class="profile-detail">
            <label for="email">Email:</label>
            <p id="email">{{ $user->email }}</p>
        </div>
        <div class="profile-detail">
            <label for="address">Alamat:</label>
            <p id="address">{{ $user->alamat}}</p>
        </div>
        <div class="profile-detail">
            <label for="phone">No. Telpon:</label>
            <p id="phone">{{ $user->telepon }}</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection
