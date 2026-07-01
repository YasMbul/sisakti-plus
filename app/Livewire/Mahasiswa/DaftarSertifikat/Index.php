<?php

namespace App\Livewire\Mahasiswa\DaftarSertifikat;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.user-layout')]
#[Title('Daftar Sertifikat')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.mahasiswa.daftar-sertifikat.index');
    }
}
