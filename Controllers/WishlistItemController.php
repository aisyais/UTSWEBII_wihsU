<?php

namespace App\Http\Controllers;

use App\Models\WishlistItem;
use App\Models\WishlistCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistItemController extends Controller
{
    public function index()
    {
       
        $items = WishlistItem::where('user_id', Auth::id())->with('wishlistCategory')->get();
        return view('wishlist_items.index', compact('items'));
    }

    public function create()
    {
       
        $categories = WishlistCategory::where('user_id', Auth::id())->get();
        return view('wishlist_items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'wishlist_category_id' => 'required|exists:wishlist_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        WishlistItem::create([
            'user_id' => Auth::id(),
            'wishlist_category_id' => $request->wishlist_category_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('wishlist-items.index')->with('success', 'Wishlist item berhasil dibuat!');
    }

    public function show(WishlistItem $wishlistItem)
    {
        // (opsional) tampilkan detail 1 item
        return view('wishlist_items.show', compact('wishlistItem'));
    }

    public function edit(WishlistItem $wishlistItem)
    {
        if ($wishlistItem->user_id !== Auth::id()) {
            abort(403);
        }

        $categories = WishlistCategory::where('user_id', Auth::id())->get();
        return view('wishlist_items.edit', compact('wishlistItem', 'categories'));
    }

    public function update(Request $request, WishlistItem $wishlistItem)
    {
        if ($wishlistItem->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'wishlist_category_id' => 'required|exists:wishlist_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $wishlistItem->update([
            'wishlist_category_id' => $request->wishlist_category_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('wishlist-items.index')->with('success', 'Wishlist item berhasil diupdate!');
    }

    public function destroy(WishlistItem $wishlistItem)
    {
        if ($wishlistItem->user_id !== Auth::id()) {
            abort(403);
        }

        $wishlistItem->delete();

        return redirect()->route('wishlist-items.index')->with('success', 'Wishlist item berhasil dihapus!');
    }
}
