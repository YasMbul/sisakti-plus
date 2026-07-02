@props([
'mt' => 'mt-0'
])


<footer @class (['bg-[#E8E4DC] border-t border-stone-300',$mt])>
    <div class="px-10 py-5 flex flex-col md:flex-row justify-between items-center gap-3">
        
        <p class="text-sm text-slate-500">
            © 2026 <span class="font-semibold text-[#1B4D3E]">SISAKTI+</span>. All rights reserved.
        </p>

        <div class="flex items-center gap-6">
            <a href="#"
               class="text-sm text-[#1B4D3E] hover:text-[#153a2d] transition-colors">
                Kebijakan Privasi
            </a>

            <a href="#"
               class="text-sm text-[#1B4D3E] hover:text-[#153a2d] transition-colors">
                Panduan Pengguna
            </a>
        </div>

    </div>
</footer>