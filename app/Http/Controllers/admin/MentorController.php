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
        $mentors = Mentor::orderBy('id', 'DESC')->get();
        return view('admin.mentors.index', ['mentors' => $mentors]);
    }

    public function get_by_api(Request $request)
    {
        $mentors = Mentor::all();
        // generate options html
        $html = "";
        foreach($mentors as $mentor){
            $html .= '<option value="'.$mentor->id.'">'.$mentor->name.'</option>';
        }
        return response()->json([
            'success' => true,
            'data' => $html
        ]);
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
        $mentor = Mentor::with('user')->findOrFail($id);
        $type_form = 'create';
        $form_action = route('admin.mentor.store_user', $id);
        if($mentor->user){
            $type_form = 'edit';
            $form_action = route('admin.mentor.update_user', $mentor->user->id);
        }

        return view('admin.mentors.create_user', ['mentor' => $mentor, 'type_form' => $type_form, 'form_action' => $form_action]);
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
                'biography' => 'nullable|string',
                'profession' => 'nullable|string',
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                // tambahkan validasi untuk atribut lainnya
            ]);
            if($request->ajax()){
                return 'ajax';
                $mentor = Mentor::create($validatedData);
                $mentors = Mentor::all();
                $html = '';
                foreach($mentors as $mentor){
                    $html .= '<option value="'.$mentor->id.'">'.$mentor->name.'</option>';
                }
                return response()->json([
                    'success' => true,
                    'message' => 'Mentor berhasil ditambahkan',
                    'data' => $html
                ]);
            }

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

    public function store_in_course(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'nullable|email|unique:mentors,email',
                'phone' => 'nullable|string',
                'profession' => 'nullable|string',
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'type_form' => 'required|string'
                // tambahkan validasi untuk atribut lainnya
            ]);
            if($request->post('type_form') == 'edit'){
                $mentor = Mentor::findOrFail($request->post('id'));
                $mentor->email = $request->post('email');
                $mentor->password = Hash::make($request->post('password'));
                $mentor->update();
            }else if($request->post('type_form') == 'create'){
                $mentor = Mentor::create($validatedData);
            }
            return redirect()->route('admin.kursus.add')->with('success', 'Data mentor berhasil ditambahkan');
        } catch (\Throwable $th) {
             return redirect()->route('admin.kursus.add')->with('error', 'Data mentor Gagal ditambahkan karena ' . $th->getMessage());
        }
    }

    public function store_user(Request $request, string $member_id)
    {
        $credentialMentor = $request->validate([
            'password' => 'required|confirmed',
            'email' => 'required|string|email|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $mentor = Mentor::findOrFail($member_id);
        // dd($mentor);
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
            $mentor->save();
            if($request->get('next')){
                return redirect($request->get('next'))->with('success', 'Berhasil buatkan user pada mentor');
            }
            return redirect()->route('admin.mentor')->with('success', 'Berhasil buatkan user pada mentor');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal buatkan user pada mentor karena ' . $th->getMessage())->withInput();
        }
    }

    public function update_user_mentor(Request $request, string $id)
    {
        $credentialMentor = $request->validate([
            'password' => 'required|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = User::findOrFail($id);
        $user->password = Hash::make($credentialMentor['password']);
        if($request->hasFile('avatar')){
            if($user->avatar != null){
                Storage::delete($user->avatar);
            }
            $pathStoring = $request->file('avatar')->store('/assets/img/avatar', 'public');
            $user->avatar = $pathStoring;
        }
        $user->save();
        return redirect()->route('admin.mentor')->with('success', 'Berhasil update user pada mentor');
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
        $type_form = 'create';
        if($mentor->user){
            $type_form = 'edit';
        }
        return view('admin.mentors.edit', ['mentor' => $mentor, 'type_form' => $type_form]);
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
