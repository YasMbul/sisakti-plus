<?php

namespace App\Livewire\Mahasiswa;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Skp;
use App\Models\Semester;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

#[Layout('layouts.user-layout')]
#[Title('Daftar Sertifikat')]
class Daftar extends Component
{
   use WithPagination;

   public $search = '';
   public $statusFilter = '';
   public $semesterFilter = '';

   public function delete($id)
   {
      $skp = Skp::where('user_id', auth()->id())->findOrFail($id);

      if ($skp->status === 'approved') {
         session()->flash('error', 'Sertifikat yang sudah disetujui tidak dapat dihapus.');
         return;
      }

      // Delete file from storage
      if ($skp->sertificate) {
         Storage::disk('public')->delete($skp->sertificate);
      }

      $skp->delete();

      session()->flash('success', 'Sertifikat berhasil dihapus!');
   }

   public function render()
   {
      $query = Skp::where('user_id', auth()->id())->with([
         'semester',
         'skpDetail',
         'skpDetail.tingkat',
         'skpDetail.partisipasi',
      ]);

      if (!empty($this->search)) {
         $query->where('name', 'like', '%' . $this->search . '%');
      }

      if (!empty($this->statusFilter)) {
         $query->where('status', $this->statusFilter);
      }

      if (!empty($this->semesterFilter)) {
         $query->where('semester_id', $this->semesterFilter);
      }

      $skps = $query->orderBy('created_at', 'desc')->paginate(7);

      return view('livewire.mahasiswa.daftar', [
         'skps' => $skps,
         'semesters' => Semester::orderBy('name', 'desc')->get(),
      ]);
   }
}
