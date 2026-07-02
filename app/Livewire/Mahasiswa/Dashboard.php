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
        $skpQuery = Skp::where('user_id', $user->id)->with('skpDetail.unsur');
        $skps = $skpQuery->get();
 
        $approvedSkp = 0;
        $pendingSkp = 0;
        $totalUploaded = $skps->count();
 
        // Value approved per bidang (hardcode nama sesuai unsur.name di database)
        $valuePenalaranIlmiah = 0;
        $valueMinatdanBakat = 0;
        $valueOrganisasidanKepanitiaan = 0;
        $valuePengabdianpadaMasyarakat = 0;
 
        foreach ($skps as $skp) {
            if ($skp->skpDetail) {
                if ($skp->status === 'approved') {
                    $approvedSkp += $skp->skpDetail->bobot;
 
                    $unsurName = $skp->skpDetail->unsur->name ?? '';
 
                    if ($unsurName === 'Kegiatan Bidang Penalaran/Ilmiah') {
                        $valuePenalaranIlmiah += $skp->skpDetail->bobot;
                    } elseif ($unsurName === 'Kegiatan Bidang Minat dan Bakat') {
                        $valueMinatdanBakat += $skp->skpDetail->bobot;
                    } elseif ($unsurName === 'Kegiatan Bidang Organisasi dan Kepanitiaan') {
                        $valueOrganisasidanKepanitiaan += $skp->skpDetail->bobot;
                    } elseif ($unsurName === 'Kegiatan Bidang Pengabdian pada Masyarakat') {
                        $valuePengabdianpadaMasyarakat += $skp->skpDetail->bobot;
                    }
                } elseif ($skp->status === 'pending') {
                    $pendingSkp += 1;
                }
            }
        }
 
        $rejectedCount = Skp::where('user_id', $user->id)
        ->where('status', 'rejected')
        ->count();
        $approvedCount = Skp::where('user_id', $user->id)
        ->where('status', 'approved')
        ->count();
 
        // Target SKP for graduation
        $BidangPenalaranIlmiah = 25;
        $BidangMinatdanBakat = 25;
        $BidangOrganisasidanKepanitiaan = 25;
        $BidangPengabdianpadaMasyarakat = 25;
        $targetSkp = $BidangPenalaranIlmiah + $BidangMinatdanBakat + $BidangOrganisasidanKepanitiaan + $BidangPengabdianpadaMasyarakat;
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
            'rejectedCount' => $rejectedCount,
            'approvedCount' => $approvedCount,
            'recentSkps' => $recentSkps,
            'BidangPenalaranIlmiah' => $BidangPenalaranIlmiah,
            'BidangMinatdanBakat' => $BidangMinatdanBakat,
            'BidangOrganisasidanKepanitiaan' => $BidangOrganisasidanKepanitiaan,
            'BidangPengabdianpadaMasyarakat' => $BidangPengabdianpadaMasyarakat,
            'valuePenalaranIlmiah' => $valuePenalaranIlmiah,
            'valueMinatdanBakat' => $valueMinatdanBakat,
            'valueOrganisasidanKepanitiaan' => $valueOrganisasidanKepanitiaan,
            'valuePengabdianpadaMasyarakat' => $valuePengabdianpadaMasyarakat,
            'user' => $user->load(['major', 'faculty']),
        ]);
    }
}