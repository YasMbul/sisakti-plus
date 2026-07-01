<?php

namespace App\Livewire\Mahasiswa;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Skp;

#[Layout('layouts.user-layout')]
#[Title('Dashboard Mahasiswa')]
class Dashboard extends Component
{
    public function render()
    {
        $user = auth()->user();

        // Calculate statistics
        $skpQuery = Skp::where('user_id', $user->id)->with('skpDetail');
        $skps = $skpQuery->get();

        $approvedSkp = 0;
        $pendingSkp = 0;
        $totalUploaded = $skps->count();

        foreach ($skps as $skp) {
            if ($skp->skpDetail) {
                if ($skp->status === 'approved') {
                    $approvedSkp += $skp->skpDetail->bobot;
                } elseif ($skp->status === 'pending') {
                    $pendingSkp += $skp->skpDetail->bobot;
                }
            }
        }

        // Target SKP for graduation
        $targetSkp = 100;
        $progressPercent = min(100, ($approvedSkp / $targetSkp) * 100);

        // Get 3 recent uploads
        $recentSkps = Skp::where('user_id', $user->id)
            ->with(['semester', 'skpDetail.subUnsur', 'skpDetail.tingkat'])
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('livewire.mahasiswa.dashboard', [
            'approvedSkp' => $approvedSkp,
            'pendingSkp' => $pendingSkp,
            'totalUploaded' => $totalUploaded,
            'targetSkp' => $targetSkp,
            'progressPercent' => $progressPercent,
            'recentSkps' => $recentSkps,
            'user' => $user->load(['major', 'faculty']),
        ]);
    }
}
