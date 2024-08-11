<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class HomeController extends Controller
{
    //

    public function index()
    {

        return view('user.home');
    }

    public function course(Request $request)
    {
        // Ambil nilai filter dan pencarian dari request
        $category = $request->input('category');
        $search = $request->input('search');

        $topics = Topic::query()
            ->select('id', 'image', 'title', 'description', 'division', 'created_by')
            ->with('users');

        // Terapkan filter kategori jika ada
        if ($category) {
            $topics->where('division', $category);
        }

        // Terapkan pencarian jika ada
        if ($search) {
            $topics->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Ambil data yang sudah difilter dan dicari
        $topics = $topics->get();

        return view('user.course', compact('topics'));
    }


    public function myCourse()
    {
        // Ambil pengguna yang sedang login
        $user = FacadesAuth::user();

        // Ambil data request yang terkait dengan pengguna tersebut
        $courses = $user->request; // Ini mengasumsikan bahwa relasi request sudah diatur dengan benar di model User

        // Kirim data ke view
        return view('user.mycourse', compact('courses'));
    }

    public function courseShow($id)
    {
        $topic = Topic::with('users')->findOrFail($id);
        return view('user.course-detail', compact('topic'));
    }

    public function requestCourse($id)
    {
        $user = FacadesAuth::user();
        $topic = Topic::findOrFail($id);

        // Cek apakah pengguna sudah mengajukan permintaan untuk kursus ini
        $hasRequested = ModelsRequest::where('user_id', $user->id)
            ->where('topic_id', $id)
            ->exists();

        if ($hasRequested) {
            return redirect()->back()->with('status', 'Anda sudah mengajukan permintaan untuk kursus ini.');
        }

        // Simpan permintaan
        ModelsRequest::create([
            'user_id' => $user->id,
            'topic_id' => $id,
            'status' => 'pending' // Atau status default lainnya
        ]);

        // Redirect ke halaman My Courses atau halaman yang sesuai
        return redirect()->route('mycourse')->with('status', 'Permintaan kursus berhasil.');
    }
}
