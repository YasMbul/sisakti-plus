<div
   class="{{ $containerClass }} border-primary flex w-1/2 flex-col gap-3 overflow-hidden rounded-lg border bg-white"
   wire:click.outside="closeChat"
>
   <div class="bg-primary px-4 py-2 text-white">
      <h1>Kirim/Balas Pesan Reject</h1>
   </div>
   {{-- Bubble messages --}}
   <div class="flex {{ $bubbleClass }} flex-col gap-3 overflow-y-auto p-4">
      @foreach ($comments as $comment)
         @php $isMe = $comment->user_id === auth()->id(); @endphp
         <div class="flex items-end gap-2 {{ $isMe ? 'flex-row-reverse' : '' }}">
            <div
               class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-medium flex-shrink-0
                    {{ $isMe ? 'bg-blue-100 text-primary/80' : 'bg-gray-100 text-gray-600' }}"
            >
               {{
                  strtoupper(
                     substr($comment->user->name, 0, 2),
                  )
               }}
            </div>

            <div class="flex flex-col {{ $isMe ? 'items-end' : '' }} max-w-[72%]">
               @if (!$isMe)
                  <span class="mb-1 text-xs text-gray-400">{{ $comment->user->name }}</span>
               @endif

               <div
                  class="px-4 py-2 rounded-2xl text-sm whitespace-pre-wrap leading-relaxed
                        {{ $isMe
                            ? 'bg-blue-500 text-white rounded-br-sm'
                            : 'bg-gray-100 text-gray-800 rounded-bl-sm' }}"
               >{{ trim($comment->body) }}</div>

               <div class="mt-1 flex items-center gap-2">
                  <span class="text-xs text-gray-400">{{
                     $comment->created_at->format(
                        'H:i',
                     )
                  }}</span>
                  <button
                     wire:click="setReply({{ $comment->id }})"
                     class="text-primary/80 hover:text-primary/80 text-xs"
                  >
                     Balas
                  </button>
               </div>
            </div>
         </div>
         {{-- Replies --}}
         @foreach ($comment->replies as $reply)
            @php $isMeReply = $reply->user_id === auth()->id(); @endphp
            <div class="flex items-end gap-2 {{ $isMeReply ? 'flex-row-reverse' : '' }} pl-10">
               <div
                  class="w-7 h-7 rounded-full flex items-center justify-center text-xs font-medium flex-shrink-0
                        {{ $isMeReply ? 'bg-blue-100 text-primary/80' : 'bg-gray-100 text-gray-600' }}"
               >
                  {{
                     strtoupper(
                        substr($reply->user->name, 0, 2),
                     )
                  }}
               </div>

               <div class="flex flex-col {{ $isMeReply ? 'items-end' : '' }} max-w-[65%]">
                  <div
                     class="px-4 py-2 rounded-2xl text-sm whitespace-pre-wrap leading-relaxed
                            {{ $isMeReply
                                ? 'bg-blue-500 text-white rounded-br-sm'
                                : 'bg-gray-100 text-gray-800 rounded-bl-sm' }}"
                  >{{ trim($reply->body) }}</div>
                  <span
                     class="mt-1 text-xs text-gray-400"
                     >{{ $reply->created_at->format('H:i') }}</span
                  >
               </div>
            </div>
         @endforeach
      @endforeach
   </div>

   {{-- Reply indicator --}}
   @if ($replyToId)
      <div
         class="mx-4 flex items-center justify-between rounded border-l-4 border-blue-400 bg-blue-50 px-4 py-2"
      >
         <span class="text-primary/80 text-xs">Membalas komentar...</span>
         <button wire:click="cancelReply" class="text-xs text-gray-400 hover:text-gray-600">
            Batal
         </button>
      </div>
   @endif

   {{-- Input --}}
   <div class="flex items-center gap-2 px-4 py-4">
      <textarea
         wire:model="message"
         x-data
         x-on:keydown.enter="
            if (!$event.shiftKey) {
               $event.preventDefault();
               $wire.sendMessage();
            }
         "
         placeholder="Tulis pesan..."
         rows="3"
         class="focus:border-primary flex-1 rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm focus:outline-none"
      ></textarea>
      <button
         wire:click="sendMessage"
         class="bg-primary hover:bg-primary/40 flex h-9 w-9 items-center justify-center rounded-full text-white"
      >
         <x-icons.paper-plane class="size-4!" />
      </button>
   </div>
</div>
