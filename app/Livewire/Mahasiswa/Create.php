<?php

namespace App\Livewire\Mahasiswa;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Skp;
use App\Models\Semester;
use App\Models\Partisipasi;
use App\Models\SkpDetail;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.user-layout')]
#[Title('Upload Sertifikat')]
class Create extends Component
{
    use WithFileUploads;

    public $skpId;
    public $nama_kegiatan;
    public $kategori_skp; // sub_unsur_id
    public $tempat_kegiatan;
    public $semester; // semester_id
    public $tgl_mulai;
    public $tgl_selesai;
    public $sertifikat; // uploaded file
    public $existing_sertifikat; // existing file path

    public $isEdit = false;

    public function mount($id = null)
    {
        if ($id) {
            $skp = Skp::where('user_id', auth()->id())->findOrFail($id);
            
            if ($skp->status === 'approved') {
                session()->flash('error', 'Sertifikat yang sudah disetujui tidak dapat diubah.');
                return redirect()->route('mahasiswa.daftar');
            }

            $this->skpId = $skp->id;
            $this->nama_kegiatan = $skp->name;
            $this->tempat_kegiatan = $skp->location;
            $this->tgl_mulai = $skp->start_date;
            $this->tgl_selesai = $skp->end_date;
            $this->semester = $skp->semester_id;
            
            if ($skp->skpDetail) {
                $this->kategori_skp = $skp->skpDetail->sub_unsur_id;
            }
                        
            $this->existing_sertifikat = $skp->sertificate;
            $this->isEdit = true;
        }
    }

    public function saveCertificate()
    {
        $rules = [
            'nama_kegiatan' => 'required|string|max:255',
            'kategori_skp' => 'required|exists:sub_unsurs,id',
            'tempat_kegiatan' => 'required|string|max:255',
            'semester' => 'required|exists:semesters,id',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
        ];

        if ($this->isEdit) {
            $rules['sertifikat'] = 'nullable|file|mimes:pdf|max:5120';
        } else {
            $rules['sertifikat'] = 'required|file|mimes:pdf|max:5120';
        }

        $this->validate($rules);

        // Find the matching skp_detail_id
        $pesertaPartisipasi = Partisipasi::where('name', 'Peserta')->first();
        $partisipasiId = $pesertaPartisipasi ? $pesertaPartisipasi->id : 1;

        $skpDetail = SkpDetail::where('sub_unsur_id', $this->kategori_skp)
            ->where('partisipasi_id', $partisipasiId)
            ->first();

        if (!$skpDetail) {
            $skpDetail = SkpDetail::where('sub_unsur_id', $this->kategori_skp)
                ->first();
        }

        // Fallback 2: first detail matching sub_unsur
        if (!$skpDetail) {
            $skpDetail = SkpDetail::where('sub_unsur_id', $this->kategori_skp)->first();
        }

        if (!$skpDetail) {
            session()->flash('error', 'Kombinasi detail SKP tidak ditemukan di database.');
            return;
        }

        $sertificatePath = $this->existing_sertifikat;

        if ($this->sertifikat) {
            if ($this->isEdit && $this->existing_sertifikat) {
                Storage::disk('public')->delete($this->existing_sertifikat);
            }
            $sertificatePath = $this->sertifikat->store('certificates', 'public');
        }

        if ($this->isEdit) {
            $skp = Skp::where('user_id', auth()->id())->findOrFail($this->skpId);
        } else {
            $skp = new Skp();
            $skp->user_id = auth()->id();
            $skp->status = 'pending';
        }

        $skp->name = $this->nama_kegiatan;
        $skp->location = $this->tempat_kegiatan;
        $skp->start_date = $this->tgl_mulai;
        $skp->end_date = $this->tgl_selesai;
        $skp->sertificate = $sertificatePath;
        $skp->semester_id = $this->semester;
        $skp->skp_detail_id = $skpDetail->id;
        $skp->save();

        session()->flash('success', $this->isEdit ? 'Sertifikat berhasil diperbarui!' : 'Sertifikat berhasil diunggah!');

        return redirect()->route('mahasiswa.daftar');
    }

    public function render()
    {
        return view('livewire.mahasiswa.create', [
            'detail' => SkpDetail::with('unsur')->get(),
            'semesters' => Semester::orderBy('name', 'desc')->get(),
        ]);
    }
}
