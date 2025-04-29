<?php

namespace App\Http\Controllers;

use App\Models\WishlistCategory;
use Illuminate\Http\Request;

class WishlistCategoryController extends Controller
{
    public function index()
    {
        $categories = WishlistCategory::where('user_id', auth()->id())->get();
        return view('wishlist_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('wishlist_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        WishlistCategory::create([
            'name' => $request->name,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('wishlist-categories.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit(WishlistCategory $wishlistCategory)
    {
        $this->authorize('update', $wishlistCategory);

        return view('wishlist_categories.edit', compact('wishlistCategory'));
    }

    public function update(Request $request, WishlistCategory $wishlistCategory)
    {
        $this->authorize('update', $wishlistCategory);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $wishlistCategory->update([
            'name' => $request->name,
        ]);

        return redirect()->route('wishlist-categories.index')->with('success', 'Kategori berhasil diupdate!');
    }

    public function destroy(WishlistCategory $wishlistCategory)
    {
        $this->authorize('delete', $wishlistCategory);

        $wishlistCategory->delete();

        return redirect()->route('wishlist-categories.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
