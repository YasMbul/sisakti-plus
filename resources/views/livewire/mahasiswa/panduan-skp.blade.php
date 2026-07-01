@extends('layouts.user-layout')

@section('title', 'Panduan SKP')

@section('content')
<div>
    {{-- Header --}}
    <div class="py-6 pl-11 pr-7 flex justify-between items-center bg-white">
        <div>
            <h1 class="text-2xl font-bold text-judul">Panduan SKP</h1>
            <p class="text-sm text-subtext-dark-grey">Mahasiswa Universitas Udayana</p>
        </div>
    </div>

    {{-- Main Content Container --}}
    <div class="py-7 pl-11 pr-7 bg-[#E8E4DC] min-h-[calc(100vh-170px)]">
        <div class="bg-white rounded-[19px] p-8 shadow-sm ring-1 ring-slate-200/80 max-w-7xl">
            {{-- PDF Viewer --}}
            <iframe
                src="{{ asset('assets/file/panduan-skp-udayana2021.pdf') }}#toolbar=1&navpanes=0&scrollbar=1&view=FitH"
                class="w-full rounded-xl border border-slate-200"
                style="height: calc(100vh - 280px); min-height: 600px;"
                frameborder="0"
                allowfullscreen
            >
                <p class="text-sm text-slate-500 text-center py-8">
                    Browser Anda tidak mendukung tampilan PDF secara langsung.
                    <a href="{{ asset('assets/file/panduan-skp-udayana2021.pdf') }}" class="text-[#1B4D3E] underline font-semibold" target="_blank">
                        Klik di sini untuk membuka file PDF.
                    </a>
                </p>
            </iframe>
        </div>
    </div>
{{-- Footer Dashboard --}}
<x-footer/>
@endsection