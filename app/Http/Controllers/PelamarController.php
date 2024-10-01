<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Job;
use App\Models\Applications;
use App\Models\Applicants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $applications = Applications::all(); 

    $userId = Auth::id();
    $user = User::find($userId); 
    $job = Job::all(); 
    $applicants = Applicants::where('user_id', $userId)->get();
    return view('fe.layouts.app', compact('user', 'job', 'applicants', 'applications'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $applications = Applications::all(); 
        $userId = Auth::id();
        $user = User::find(Auth::id()); 
        $job = Job::all();
        $applicants = Applicants::where('user_id', $userId)->get();
        
        
        return view('fe.data.create', compact('user', 'job', 'applicants', 'applications'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'user_id' => 'required',
                'cv' => 'required|file|mimes:pdf,jpg,png|max:2048',
                'ktp' => 'required|file|mimes:pdf,jpg,png|max:2048',
                'ijasah' => 'required|file|mimes:pdf,jpg,png|max:2048',
                'alamat' => 'required',
                'telepon' => 'required|numeric',
            ]);

            // upload cv
            $cv = $request->file('cv');
            $cv->storeAs('public/cv', $cv->hashName());

            // upload ktp
            $ktp = $request->file('ktp');
            $ktp->storeAs('public/ktp', $ktp->hashName());

            // ijasah
            $ijasah = $request->file('ijasah');
            $ijasah->storeAs('public/ijasah', $ijasah->hashName());

            Applicants::create(
                [
                    'user_id' => $request->user_id,
                    'cv' => $cv->hashName(),
                    'ktp' => $ktp->hashName(),
                    'ijasah' => $ijasah->hashName(),
                    'alamat' => $request->alamat,
                    'telepon' => $request->telepon,
                ]);
                return redirect()->route('pelamar.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $applications = Applications::all(); 
        $user = User::find(Auth::id()); 
        $applicants = Applicants::all();
        $applicants = Applicants::findOrFail($id);
        $job = Job::all();
        return view('fe.data.show', compact('applicants', 'user', 'job', 'applications'));
    }

    public function lokertersimpan()
{
    $userId = Auth::id();
    $applicants = Applicants::where('user_id', operator: $userId)->first();
    // Mendapatkan semua aplikasi
    if($applicants) {
        $applications = Job::join('applications', 'job.id', '=' , 'applications.job_id')
        ->where('applications.applicant_id', $applicants->id)
        ->select('job.judul', 'job.nama_perusahaan', 'applications.status') 
        ->get();
    } else {
        $applications = collect();
    }
    
   
    $user = User::find($userId); 
    $job = Job::all(); 
    

    // Mengirim data ke view
    return view('fe.data.lokersimpan', compact('user', 'job', 'applicants', 'applications'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
