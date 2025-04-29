@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Wishlist Items</h1>

    <a href="{{ route('wishlist-items.create') }}" class="btn btn-primary mb-3">Tambah Item Baru</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->wishlistCategory->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <a href="{{ route('wishlist-items.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('wishlist-items.destroy', $item) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin mau hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada wishlist item.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
