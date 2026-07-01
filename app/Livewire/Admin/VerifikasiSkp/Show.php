<?php

namespace App\Livewire\Admin\VerifikasiSkp;

use App\Models\Comment;
use App\Models\Skp;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Layout('layouts.user-layout')]
#[Title('Periksa Mahasiswa')]
class Show extends Component
{
   use WithPagination;

   public int $userId;
   public bool $showRejectModal = false;
   public ?int $rejectSkpId = null;

   public function openRejectModal(int $skpId)
   {
      $this->rejectSkpId = $skpId;
      $this->showRejectModal = true;
   }

   #[On('closeChat')]
   public function closeRejectModal()
   {
      $this->showRejectModal = false;
      $this->rejectSkpId = null;
   }

   #[On('reject-data')]
   public function rejectSkp()
   {
      $skp = Skp::findOrFail($this->rejectSkpId);

      if ($skp->status !== 'pending') {
         $this->closeRejectModal();
         return;
      }

      $skp->update(['status' => 'rejected']);

      $this->closeRejectModal();
      $this->dispatch('skp-rejected');
   }

   public function mount(int $id)
   {
      $this->userId = $id;
   }

   public function acceptSkp(int $skpId)
   {
      $skp = Skp::findOrFail($skpId);

      if ($skp->status !== 'pending') {
         return redirect()->back()->with('error', 'SKP ini sudah diproses sebelumnya.');
      }

      $skp->update(['status' => 'approved']);

      return redirect()->back()->with('success', 'SKP berhasil disetujui.');
   }

   public function render()
   {
      $user = User::findOrFail($this->userId);
      $pendingSkps = $user
         ->skps()
         ->with('skpDetail.unsur')
         ->where('status', 'pending')
         ->paginate(7);
      return view('livewire.admin.verifikasi-skp.show', compact('user', 'pendingSkps'));
   }
}
