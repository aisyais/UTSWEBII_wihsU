@extends('layouts.app')

@section('content')
<style>
    body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: linear-gradient(-45deg, #ffd1dc, #ffe4e1, #ffc0cb, #ffe4e1);
        background-size: 400% 400%;
        animation: gradientBG 15s ease infinite;
        font-family: 'Poppins', sans-serif;
    }

    @keyframes gradientBG {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        animation: fadeIn 1.2s ease;
        height: auto;
        max-height: 90vh; /* Maximum height to ensure it doesn’t stretch too much */
        overflow-y: auto; /* Make the container scrollable if the content exceeds the height */
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    h1 {
        text-align: center;
        margin-bottom: 15px; /* Smaller margin */
        color: #d63384;
        font-size: 24px; /* Compact font size for the header */
    }

    .form-label {
        font-weight: bold;
        color: #555;
    }

    .form-control {
        width: 100%;
        padding: 10px 12px;
        margin-top: 5px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-sizing: border-box;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: #ff7eb9;
        outline: none;
        box-shadow: 0 0 5px #ffb6c1;
    }

    .btn-primary {
        background-color: #ff7eb9;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
        width: 100%;
        font-size: 16px;
    }

    .btn-primary:hover {
        background-color: #ff5ea5;
        transform: scale(1.03);
    }
</style>

<div class="container">
    <h1>Tambah Wishlist Item</h1>

    <form action="{{ route('wishlist-items.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="wishlist_category_id" class="form-label">Kategori</label>
            <select name="wishlist_category_id" id="wishlist_category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn-primary">Simpan</button>
    </form>
</div>
@endsection
