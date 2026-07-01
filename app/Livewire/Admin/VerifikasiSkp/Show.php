<?php

namespace App\Livewire\Admin\VerifikasiSkp;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.user-layout')]
#[Title('Periksa Mahasiswa')]
class Show extends Component
{
    public function render()
    {
        return view('livewire.admin.verifikasi-skp.show');
    }
}
