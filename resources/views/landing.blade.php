<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body{
            background-color: #f8f9fa;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
            text-align: center;
        }
        .landing-container{
            max-width: 600px;
            padding: 20px;
            border-radius: 10px;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="landing-container">
        <h1 class="mb-4">Selamat Datang di To-Do List App</h1>
        <p>Ini adalah aplikasi sederhana untuk mencatat daftar tugas yang harus dikerjakan.</p>
        <a href="{{ route('register') }}" class="btn btn-primary">Daftar Sekarang</a>
        <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
    </div>
</body>