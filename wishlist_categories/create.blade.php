@extends('layouts.app')

@section('content')
<div class="background-container">
    <div class="content-wrapper">
        <h1 class="main-title">Tambah Kategori Wishlist</h1>

        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('wishlist-categories.store') }}" class="form-wrapper">
            @csrf
            <div class="form-group">
                <label for="name">Nama Kategori:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <button type="submit" class="btn-primary">Simpan</button>
        </form>

        <div class="footer-links">
            <a href="{{ route('wishlist-categories.index') }}" class="link">Kembali</a>
        </div>
    </div>
</div>

<style>
body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(270deg, #ffe4e6, #fff0f5);
    background-size: 400% 400%;
    animation: backgroundMove 15s ease infinite;
}

@keyframes backgroundMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.background-container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 20px;
}

.content-wrapper {
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(10px);
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 600px;
    text-align: center;
}

.main-title {
    font-size: 32px;
    color: #d6336c;
    margin-bottom: 30px;
    animation: fadeIn 1s ease forwards;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}

.alert-error {
    background: #f8d7da;
    color: #721c24;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 20px;
    text-align: left;
}

.form-wrapper {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-group {
    text-align: left;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 8px;
}

.btn-primary {
    background-color: #f472b6;
    color: white;
    padding: 10px 20px;
    border-radius: 30px;
    text-decoration: none;
    transition: background-color 0.3s, box-shadow 0.3s;
    border: none;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #ec4899;
    box-shadow: 0 4px 12px rgba(236, 72, 153, 0.5);
}

.footer-links {
    margin-top: 20px;
}

.link {
    color: #ec4899;
    text-decoration: none;
    transition: color 0.3s;
}

.link:hover {
    color: #db2777;
}
</style>
@endsection
