<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 'super_admin') {
            // If the user is a super admin, they can see all topics
            $topics = Topic::with('users')
                ->select('id', 'title', 'created_by', 'division', 'image', 'slug')
                ->get();
        } elseif ($user->role == 'admin') {
            // If the user is an admin, they can only see the topics they created
            $topics = Topic::with('users')
                ->where('created_by', $user->id)
                ->select('id', 'title', 'created_by', 'division', 'image', 'slug')
                ->get();
        }

        return view('admin.topic.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Generate slug
        $slug = Str::slug($request->input('title'), '-');

        // Upload file gambar
        $imagePath = $request->file('image')->store('topics', 'public');

        // Simpan data topik
        Topic::create([
            'title' => $request->input('title'),
            'division' => $request->input('division'),
            'description' => $request->input('description'),
            'slug' => $slug,
            'created_by' => Auth::user()->id, // Set manually
            'image' => basename($imagePath), // Gambar yang diupload
        ]);

        return redirect()->route('topic.index')->with('success', 'Topic berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $topic = Topic::where('slug', $slug)->firstOrFail();
        return view('admin.topic.detail', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $topic = Topic::where('slug', $slug)->firstOrFail();
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update topic fields
        $topic->title = $validated['title'];
        $topic->division = $validated['division'];
        $topic->description = $validated['description'];

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($topic->image && Storage::disk('public')->exists('topics/' . $topic->image)) {
                Storage::disk('public')->delete('topics/' . $topic->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('topics', 'public');
            $topic->image = basename($imagePath);
        }

        // Simpan perubahan ke database
        $topic->save();

        return redirect()->route('topic.index')->with('success', 'Topic berhasil di-update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        // Hapus gambar terkait jika ada
        if ($topic->image && Storage::disk('public')->exists('topics/' . $topic->image)) {
            Storage::disk('public')->delete('topics/' . $topic->image);
        }

        // Hapus topic dari database
        $topic->delete();

        // Redirect atau return response setelah menghapus
        return redirect()->route('topic.index')->with('success', 'Topic berhasil dihapus.');
    }
}
