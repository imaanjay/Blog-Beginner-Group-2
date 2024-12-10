<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::latest();

        if (request('search')) {
            $tags->where('name', 'like', '%' . request('search') . '%');
        }

        $tags = $tags->paginate(10);

        return view('tags.index', compact('tags'));
    }

    public function show(Tag $tag)
    {
        // Ambil semua artikel yang terkait dengan tag  
        $articles = $tag->articles()->with('category')->paginate(10);

        return view('tags.show', compact('articles', 'tag'));
    }

    public function getTag()
    {
        return response()->json(Tag::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|regex:/^[a-zA-Z0-9]+$/',
        ], [
            'name' => 'Input harus berupa satu kata yang terdiri dari huruf dan angka tanpa spasi, maksimal 100 karakter.',
        ]);

        $Tag = Tag::create([
            'name' => $request->name,
        ]);

        return redirect()->route('tags')->with('create', 'Tag successfully created!');
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:100|regex:/^[a-zA-Z0-9]+$/',
        ], [
            'name' => 'Input harus berupa satu kata yang terdiri dari huruf dan angka tanpa spasi, maksimal 100 karakter.',
        ]);

        // Check if the name has changed  
        if ($request->name != $tag->name) {
            $tag->name = $request->name;
            $tag->slug = null;
        }

        $tag->save();

        return redirect()->route('tags')->with('edit', 'Tag successfully updated!');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags')->with('delete', 'Tag successfully deleted!');
    }
}
