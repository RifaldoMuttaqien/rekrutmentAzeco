<?php

namespace App\Http\Controllers;
use App\Models\Applications;
use App\Models\Applicants;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PelamarController;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $job = Job::all();
        return view('admin.job.index', compact('job'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        $user = User::all();
        return view('admin.job.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
                'judul' => 'required',
                'deskripsi' => 'required',
                'syarat' => 'required',
                'nama_perusahaan' => 'required',
                'lokasi' => 'required',
                'gaji' => 'required|numeric',
                'status' => 'required',
                'diposting_oleh' => 'required'
            ]);

            $foto = $request->file('foto');
            $foto->storeAs('public/job', $foto->hashName());

            Job::create(
                [
                    'foto' => $foto->hashName(),
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi,
                    'syarat' => $request->syarat,
                    'nama_perusahaan' => $request->nama_perusahaan,
                    'lokasi' => $request->lokasi,
                    'gaji' => $request->gaji,
                    'status' => $request->status,
                    'diposting_oleh' => $request->diposting_oleh,
                ]);
                return redirect()->route('job.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $job = Job::findOrFail($id);
        return view('admin.job.show', compact('job'));
    }

    public function daftarPelamar(){

        $applicants = User::join('applicants', 'users.id', '=', 'applicants.user_id')
                        ->select('users.name', 'users.email', 'users.role', 'applicants.cv', 'applicants.ktp', 'applicants.ijasah', 'applicants.alamat', 'applicants.telepon')
                        ->get();
        $user = User::all();
        return view('admin.job.daftarpelamar', compact('user', 'applicants'));
    }

    public function jumlahApply()
    {
        
        $applications = Job::leftJoin('applications', 'job.id', '=', 'applications.job_id')
                            ->leftJoin('applicants', 'applications.applicant_id', '=', 'applicants.id')
                            ->leftJoin('users', 'applicants.user_id', '=', 'users.id')
                            ->select('job.judul', 'job.nama_perusahaan', 'job.foto', 
                                     DB::raw('COUNT(applicants.id) as totalPelamar'), // Hitung total pelamar
                                     DB::raw('GROUP_CONCAT(DISTINCT users.name) as pelamar'), // Gabungkan nama pelamar
                                     'applications.status')
                            ->groupBy('job.id', 'job.judul', 'job.nama_perusahaan', 'job.foto', 'applications.status') // Grup berdasarkan ID pekerjaan
                            ->get();
                            
        return view('admin.job.jumlahapply', compact('applications'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function lamarJob(Request $request, $job_id) {
        // Ambil ID user yang sedang login
        $applicant_id = Auth::id();
    
     
        $cekmelamar = Applications::where('job_id', $job_id)
                                   ->where('applicant_id', $applicant_id)
                                   ->first();
    
       
        if($cekmelamar){
            return redirect()->route('pelamar.index')->with('error', 'Anda sudah melamar pada posisi ini!');
        }
    
    
        $applicants = Applicants::where('user_id', $applicant_id)->firstOrFail();
    
      
        Applications::create([
            'job_id' => $job_id,
            'applicant_id' => $applicants->id,
            'status' => 'pending'
        ]);
    
        // Kembalikan pesan sukses
        return redirect()->route('pelamar.index')->with('success', 'Lamaran Anda berhasil dikirim!');
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
