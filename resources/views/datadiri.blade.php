<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Data Diri</title>
    <!-- Import Font Modern (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #e0eafc, #cfdef3);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .card {
            background: #ffffff;
            width: 100%;
            max-width: 680px;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .profile-img {
            width: 230px;
            height: 230px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #cfdef3;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(74, 144, 226, 0.2);
        }

        .title {
            font-size: 22px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .badge {
            display: inline-block;
            background-color: #e8f0fe;
            color: #d31ae8;
            font-size: 13px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 20px;
            margin-bottom: 20px;
        }

        .info-group {
            text-align: left;
            background-color: #f8f9fa;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 15px;
        }

        .info-item {
            font-size: 14px;
            color: #4a5568;
            margin-bottom: 8px;
            display: flex;
            justify-content: space-between;
        }

        .info-item:last-child {
            margin-bottom: 0;
        }

        .info-label {
            font-weight: 600;
            color: #2d3748;
        }

        .description {
            font-size: 13px;
            color: #718096;
            line-height: 1.5;
            margin-top: 15px;
            font-style: italic;
        }
    </style>
</head>
<body>

    <div class="card">
        <!-- Foto Profil -->
        <img src="{{ asset('pillahnew.jpeg') }}" alt="Foto Profil" class="profile-img">

        <!-- Nama & Status -->
        <h1 class="title">Muhammad Fillah R</h1>
        <span class="badge">Mahasiswa</span>

        <!-- Informasi Detail -->
        <div class="info-group">
            <div class="info-item">
                <span class="info-label">Jurusan</span>
                <span>Informatika</span>
            </div>
            <div class="info-item">
                <span class="info-label">Nim</span>
                <span>2555200024</span>
            </div>
            <div class="info-item">
                <span class="info-label">Angkatan</span>
                <span>2024</span>
            </div>
            <div class="info-item">
                <span class="info-label">Semester</span>
                <span>5</span>
            </div>
            <div class="info-item">
                <span class="info-label">Email</span>
                <span>muhammadfillahr@example.com</span>
            </div>
            <div class="info-item">
                <span class="info-label">Alamat</span>
                <span>Jl.S.Parman RT.07 RW.04, Mojosari, Mojokerto, Jawa Timur, Indonesia</span>
            </div>
            <div class="info-item">
                <span class="info-label">No.Hp</span>
                <span>0878-5015-7214</span>
            </div>
        </div>

        <!-- Deskripsi Singkat -->
        <p class="text-center text-muted mt-4">
    &copy; 2026 Muhammad Fillah. All Rights Reserved.
</p>
    </div>

</body>
</html>