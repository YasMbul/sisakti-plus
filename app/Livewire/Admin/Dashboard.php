<?php

namespace App\Livewire\Admin;

use App\Models\Skp;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.user-layout')]
#[Title('Dashboard')]
class Dashboard extends Component
{
   public function acceptSkp($skpId)
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
      $user = auth()->user();
      $twoYearsAgo = now()->subYears(2)->startOfYear();

      $allSkps = Skp::with(['user', 'skpDetail', 'semester'])
         ->where('start_date', '>=', $twoYearsAgo)
         ->whereHas('user', function ($q) use ($user) {
            $q->where('faculty_id', $user->faculty_id);
         })
         ->oldest('created_at')
         ->get();

      $grouped = $allSkps->groupBy('status');

      $approvedSkps = $grouped->get('approved', collect())->count();
      $rejectedSkps = $grouped->get('rejected', collect())->count();
      $pendingSkps = $grouped->get('pending', collect());

      $totalPending = $pendingSkps->count();
      $validationQueue = $pendingSkps->take(7);
      $sisa = $totalPending - $validationQueue->count();

      $totalMahasiswa = $user->faculty->users->where('role', 'mahasiswa')->count();
      return view(
         'livewire.admin.dashboard',
         compact(
            'totalMahasiswa',
            'validationQueue',
            'sisa',
            'totalPending',
            'approvedSkps',
            'rejectedSkps',
         ),
      );
   }
}
