<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mentors = Mentor::latest()->paginate(15);
        return view('admin.mentors.index', ['mentors' => $mentors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mentors.add');
    }

    public function create_user(string $id)
    {
        $mentor = Mentor::findOrFail($id);
        return view('admin.mentors.create_user', compact('mentor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'nullable|email|unique:mentors,email',
                'phone' => 'nullable|string',
                'profession' => 'required|string',
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                // tambahkan validasi untuk atribut lainnya
            ]);

            // Upload dan simpan gambar profil jika ada
            if ($request->hasFile('profile_picture')) {
                $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
                $validatedData['profile'] = $imagePath;
            }
            // $user = User::create([
            //     'name' => $request->post('name'),
            //     'email' => $request->post('email'),
            //     'profession' => $request->post('profession'),
            //     'password' => Hash::make($request->post('password')),
            //     'role' => 'mentor'
            // ]);
            // $validatedData['user_id'] = $user->id;
            Mentor::create($validatedData);

            return redirect()->route('admin.mentor')->with('success', 'Data mentor berhasil ditambahkan');
        } catch (\Throwable $th) {
            //throw $th;
            Log::error('failed to create mentor with: ' . $th->getMessage());
            return back()->with('error', $th->getMessage())->withInput();
        }
    }

    public function store_user(Request $request, string $id)
    {
        $credentialMentor = $request->validate([
            'password' => 'required|confirmed|min:8',
            'email' => 'required|string|email|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $mentor = Mentor::findOrFail($id);
        if($mentor->email){
            if($credentialMentor['email'] != $mentor->email){
                return back()->with('error', "Email mentor tidak sesuai dengan database")->withInput();
            }
        }
        $newPassword = Hash::make($credentialMentor['password']);
        $role = 'mentor';
        $data = [
            'name' => $mentor->name,
            'email' => $credentialMentor['email'],
            'password' => $newPassword,
            'role' => $role
        ];
        if($mentor->profession){
            $data['profession'] = $mentor->profession;
        }
        if($request->hasFile('avatar')){
            $pathStoring = $request->file('avatar')->store('/assets/img/avatar', 'public');
            $data['avatar'] = $pathStoring;
        }

        try {
            $create = User::create($data);
            $mentor->user_id = $create->id;
            $mentor->email = $create->email;
            $mentor->save();
            return redirect()->route('admin.mentor')->with('success', 'Berhasil buatkan user pada mentor');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal buatkan user pada mentor')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mentor = Mentor::with(['user', 'courses'])->findOrFail($id);
        return view('admin.mentors.edit', ['mentor' => $mentor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mentor = Mentor::findOrFail($id);
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'nullable|string',
                'profession' => 'required|string',
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                // tambahkan validasi untuk atribut lainnya
            ]);

            // Upload dan simpan gambar profil jika ada
            if ($request->hasFile('profile_picture')) {
                Storage::delete($mentor->profile_picture);
                $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
                $validatedData['profile'] = $imagePath;
            }
            $mentor->update($validatedData->only(['name', 'email', 'phone', 'profession', 'profile_picture']));
            return redirect()->route('admin.mentor.edit', $id)->with('success', 'Data mentor berhasil diupdate');
        }catch (\Throwable $th){
            //throw $th;
            Log::error('failed to update mentor with: ' . $th->getMessage());
            return back()->with('error', $th->getMessage())->withInput();
        }
    }

    public function update_password(Request $request, $id)
    {
        # code...
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
