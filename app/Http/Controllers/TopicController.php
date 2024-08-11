<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ROLE SUPER ADMIN
        $topics = Topic::with('users')->select('id', 'title', 'created_by', 'division', 'image', 'slug')->get();

        return view('admin.topic.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.topic.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:60',
            'division' => 'required|in:marketing,it,human capital,product,redaksi',
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Generate slug
        $slug = Str::slug($request->input('title'), '-');

        // Upload file gambar
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
        }

        // Simpan data topik
        Topic::create([
            'title' => $request->input('title'),
            'division' => $request->input('division'),
            'description' => $request->input('description'),
            'slug' => $slug,
            'created_by' => 2, // Set manually
            'image' => $imageName, // Gambar yang diupload
        ]);

        return redirect()->route('topic.index')->with('success', 'Topic created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //

        $topic = Topic::where('slug', $slug)->firstOrFail();
        return view('admin.topic.detail', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        // Temukan topic berdasarkan slug
        $topic = Topic::where('slug', $slug)->firstOrFail();

        // Kembalikan view dengan data topic
        return view('admin.topic.edit', compact('topic'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topic $topic)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'division' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update topic
        $topic->title = $validated['title'];
        $topic->division = $validated['division'];
        $topic->description = $validated['description'];

        if ($request->hasFile('image')) {
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('images', 'public');
            $topic->image = basename($imagePath);
        }

        $topic->save();

        return redirect()->route('topic.index')->with('success', 'Topic updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        // Hapus gambar terkait jika ada
        if ($topic->image) {
            // Menghapus gambar dari penyimpanan
            Storage::disk('public')->delete('images/' . $topic->image);
        }

        // Hapus topic dari database
        $topic->delete();

        // Redirect atau return response setelah menghapus
        return redirect()->route('topic.index')->with('success', 'Topic berhasil dihapus.');
    }
}
