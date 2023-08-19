<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response{
        return response()->view('pegawai.index', ['pegawais' => Pegawai::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $validateData = $request->validate([
            'nip'           => 'required|max:20|unique:pegawais',
            'nama'          => 'required|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'alamat'        => 'nullable',
            'agama'         => 'required',
            'no_telp'       => 'required|max:20',
            'email'         => 'required|email',
            'bidang'        => 'nullable',
            'jabatan'       => 'nullable',
            'golongan'      => 'nullable',
            'eselon'        => 'nullable',
            'pendidikan'    => 'required',
            'gelar_d'       => 'nullable',
            'gelar_b'       => 'nullable',
            'unit_kerja'    => 'nullable',
            'foto'          => 'nullable|file|image|max:1000',
            'sk_cpns'       => 'nullable|file|mimes:pdf,jpg,png|max:1000',
            'sk_pns'        => 'nullable|file|mimes:pdf,jpg,png|max:1000',
            'sk_pelantikan' => 'nullable|file|mimes:pdf,jpg,png|max:1000',
            'sk_penempatan' => 'nullable|file|mimes:pdf,jpg,png|max:1000',
            'sk_jabatan'    => 'nullable|file|mimes:pdf,jpg,png|max:1000',
            'npwp'          => 'nullable|file|mimes:pdf,jpg,png|max:1000',
            'kgb'           => 'nullable|file|mimes:pdf,jpg,png|max:1000',
            'kp'            => 'nullable|file|mimes:pdf,jpg,png|max:1000',
            'bpjs'          => 'nullable|file|mimes:pdf,jpg,png|max:1000',
            'kk'            => 'nullable|file|mimes:pdf,jpg,png|max:1000',
            'skp'           => 'nullable|file|mimes:pdf,jpg,png|max:1000',
            'ijazah'        => 'nullable|file|mimes:pdf,jpg,png|max:1000',
            'dpl'           => 'nullable|file|mimes:pdf,jpg,png|max:1000',
        ]);

        $pegawai = Pegawai::create([
            'nip'           => $validateData['nip'],
            'nama'          => $validateData['nama'],
            'jenis_kelamin' => $validateData['jenis_kelamin'],
            'alamat'        => $validateData['alamat'],
            'agama'         => $validateData['agama'],
            'no_telp'       => $validateData['no_telp'],
            'email'         => $validateData['email'],
            'bidang'        => $validateData['bidang'],
            'jabatan'       => $validateData['jabatan'],
            'golongan'      => $validateData['golongan'],
            'eselon'        => $validateData['eselon'],
            'pendidikan'    => $validateData['pendidikan'],
            'gelar_d'       => $validateData['gelar_d'],
            'gelar_b'       => $validateData['gelar_b'],
            'unit_kerja'    => $validateData['unit_kerja'],
            'foto'          => $validateData['foto'] ?? null,
            'sk_cpns'       => $validateData['sk_cpns'] ?? null,
            'sk_pns'        => $validateData['sk_pns'] ?? null,
            'sk_pelantikan' => $validateData['sk_pelantikan'] ?? null,
            'sk_penempatan' => $validateData['sk_penempatan'] ?? null,
            'sk_jabatan'    => $validateData['sk_jabatan'] ?? null,
            'npwp'          => $validateData['npwp'] ?? null,
            'kgb'           => $validateData['kgb'] ?? null,
            'kp'            => $validateData['kp'] ?? null,
            'bpjs'          => $validateData['bpjs'] ?? null,
            'kk'            => $validateData['kk'] ?? null,
            'skp'           => $validateData['skp'] ?? null,
            'ijazah'        => $validateData['ijazah'] ?? null,
            'dpl'           => $validateData['dpl'] ?? null,
        ]);


        $this->uploadFile($request, 'foto', $pegawai, 'foto');
        $this->uploadFile($request, 'sk_cpns', $pegawai, 'sk_cpns');
        $this->uploadFile($request, 'sk_pns', $pegawai, 'sk_pns');
        $this->uploadFile($request, 'sk_pelantikan', $pegawai, 'sk_pelantikan');
        $this->uploadFile($request, 'sk_penempatan', $pegawai, 'sk_penempatan');
        $this->uploadFile($request, 'sk_jabatan', $pegawai, 'sk_jabatan');
        $this->uploadFile($request, 'npwp', $pegawai, 'npwp');
        $this->uploadFile($request, 'kgb', $pegawai, 'kgb');
        $this->uploadFile($request, 'kp', $pegawai, 'kp');
        $this->uploadFile($request, 'bpjs', $pegawai, 'bpjs');
        $this->uploadFile($request, 'kk', $pegawai, 'kk');
        $this->uploadFile($request, 'skp', $pegawai, 'skp');
        $this->uploadFile($request, 'ijazah', $pegawai, 'ijazah');
        $this->uploadFile($request, 'dpl', $pegawai, 'dpl');

        return redirect()->route('pegawai.index')->with('success', "Data pegawai $request->gelar_d $request->nama $request->gelar_b berhasil disimpan");

    }

    /**
     * Display the specified resource.
     */
    public function show($pegawai)
    {
        $result = Pegawai::findOrFail($pegawai);
        // dd($result->sk_cpns);
        return view('pegawai.show', ['pegawai' => $result]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($pegawai)
    {
        $result = Pegawai::findOrFail($pegawai);
        return view('pegawai.edit',['pegawai' => $result]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $pegawai)
    {
        $result = Pegawai::findOrFail($pegawai);
        $validateData = $request->validate([
            'nip'           => 'required|max:20|unique:pegawais,nip,'.$result->id,
            'nama'          => 'required|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'alamat'        => 'nullable',
            'agama'         => 'required',
            'no_telp'       => 'required|max:20',
            'email'         => 'required|email',
            'bidang'        => 'nullable',
            'jabatan'       => 'nullable',
            'golongan'      => 'nullable',
            'eselon'        => 'nullable',
            'pendidikan'    => 'nullable',
            'gelar_d'       => 'nullable',
            'gelar_b'       => 'nullable',
            'unit_kerja'    => 'nullable',
            'foto'          => 'nullable|file|image|max:1000',
            'sk_cpns'       => 'nullable|file|mimes:jpg,png|max:1000',
            'sk_pns'        => 'nullable|file|mimes:jpg,png|max:1000',
            'sk_pelantikan' => 'nullable|file|mimes:jpg,png|max:1000',
            'sk_penempatan' => 'nullable|file|mimes:jpg,png|max:1000',
            'sk_jabatan'    => 'nullable|file|mimes:jpg,png|max:1000',
            'npwp'          => 'nullable|file|mimes:jpg,png|max:1000',
            'kgb'           => 'nullable|file|mimes:jpg,png|max:1000',
            'kp'            => 'nullable|file|mimes:jpg,png|max:1000',
            'bpjs'          => 'nullable|file|mimes:jpg,png|max:1000',
            'kk'            => 'nullable|file|mimes:jpg,png|max:1000',
            'skp'           => 'nullable|file|mimes:jpg,png|max:1000',
            'ijazah'        => 'nullable|file|mimes:jpg,png|max:1000',
            'dpl'           => 'nullable|file|mimes:jpg,png|max:1000',
        ]);

        $result->update($validateData);

        $this->uploadFile($request, 'foto', $result, 'foto');
        $this->uploadFile($request, 'sk_cpns', $result, 'sk_cpns');
        $this->uploadFile($request, 'sk_pns', $result, 'sk_pns');
        $this->uploadFile($request, 'sk_pelantikan', $result, 'sk_pelantikan');
        $this->uploadFile($request, 'sk_penempatan', $result, 'sk_penempatan');
        $this->uploadFile($request, 'sk_jabatan', $result, 'sk_jabatan');
        $this->uploadFile($request, 'npwp', $result, 'npwp');
        $this->uploadFile($request, 'kgb', $result, 'kgb');
        $this->uploadFile($request, 'kp', $result, 'kp');
        $this->uploadFile($request, 'bpjs', $result, 'bpjs');
        $this->uploadFile($request, 'kk', $result, 'kk');
        $this->uploadFile($request, 'skp', $result, 'skp');
        $this->uploadFile($request, 'ijazah', $result, 'ijazah');
        $this->uploadFile($request, 'dpl', $result, 'dpl');

        // dd($result);
        return redirect()->route('pegawai.index')->with('success', "Data {$validateData['gelar_d']} {$validateData['nama']} {$validateData['gelar_b']} berhasil di update");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($pegawai)
    {
        $result = Pegawai::findOrFail($pegawai);
        $this->deleteFile($result);

        return redirect()->route('pegawai.index')->with('success', "Data $result->gelar_d $result->nama $result->gelar_b berhasil dihapus");
    }


    private function deleteFile($pegawai){
        $storagePath = storage_path('app/public/' . $pegawai->id);

        if (file_exists($storagePath)) {
            \File::deleteDirectory($storagePath);

            // Hapus record pegawai dari database
            $pegawai->delete();
        }
    }

    private function uploadFile($request, $inputName, $pegawai, $fieldName){
        if ($request->hasFile($inputName)) {
            $file = $request->file($inputName);

            // Get the original file name
            $fileNameInDatabase = $pegawai->$fieldName;

            // Generate a new file name
            $newFileName = $pegawai->id . '_' . $fieldName . '-' . $pegawai->nama.'.'. $file->getClientOriginalExtension();

            // Delete the old file if it exists
            if ($pegawai->$fieldName && Storage::exists('public/' . $pegawai->id . '/' . $pegawai->id . '_' . $fieldName . '-' . $pegawai->nama)) {

                $fileStorage = Storage::delete('public/' . $pegawai->id . '/' . $pegawai->$fieldName);

            }

            // Pindahkan file ke direktori storage
            $file->storeAs('public/' . $pegawai->id, $newFileName);

            // Update the field name in the model and save
            $pegawai->$fieldName = $newFileName;
            $pegawai->save();

            return $newFileName;
        }elseif (isset($pegawai->$fieldName)) {
            // Jika tidak ada file yang di-upload, tetapi field sudah ada, tidak perlu melakukan apa-apa
            return $pegawai->$fieldName;
        }
    }

    public function deleteFoto($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        if ($pegawai->foto) {
            // Hapus foto dari storage
            Storage::delete('public/' . $id . '/' . $pegawai->foto);

            // Hapus referensi foto dari model
            $pegawai->foto = null;
            $pegawai->save();
        }

        return redirect()->back()->with('success', 'Foto berhasil dihapus');
    }

    public function cariData(Request $request)
    {
        $search = $request->query('search');

        $pegawais = Pegawai::when($search, function ($query, $search) {
            $query->where('nama', 'like', "%$search%")
                ->orWhere('nip', 'like', "%$search%");
        })->get();

        return view('pegawai.index', compact('pegawais'));
    }
}
