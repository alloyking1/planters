<div class="w-full flex">
    @if ($this->availableName)
        <x-text-input wire:change.blur="urlCheck" wire:model="url" placeholder="Enter URL" class="border-green-500 block mt-1 w-full rounded-r-md rounded-l-none" type="text" autofocus autocomplete="form.Enter URL" />
       
        <div class="my-auto p-1">
            <svg fill="#1db43b" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 35 35" xml:space="preserve" width="30" height="30">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                  <g>
                    <path d="M31.453,9.17c0.372-0.439,0.554-1.011,0.501-1.585c-0.055-0.574-0.338-1.102-0.785-1.466l-3.811-3.084 c-0.92-0.744-2.27-0.602-3.014,0.317L12.675,17.773l-5.536-4.667c-1.054-0.889-2.61-0.822-3.585,0.151l-2.927,2.926 c-0.421,0.421-0.647,0.999-0.626,1.594c0.022,0.596,0.291,1.152,0.742,1.542l11.108,9.565c0.432,0.373,0.994,0.558,1.562,0.513 c0.568-0.044,1.096-0.312,1.465-0.747L31.453,9.17z"></path>
                  </g>
                </g>
            </svg>
        </div>
    @elseif($this->availableName === null)
        <x-text-input wire:change.blur="urlCheck" wire:model="url" placeholder="Enter URL" class="block mt-1 w-full rounded-r-md rounded-l-none" type="text" autofocus autocomplete="form.Enter URL" />
       
    @else
        <x-text-input wire:change.blur="urlCheck" wire:model="url" placeholder="Enter URL" class="border-red-500 block mt-1 w-full rounded-r-md rounded-l-none" type="text" autofocus autocomplete="form.contract" />
       
        <div class="my-auto p-1">
            <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="#bd0f0f" stroke="#bd0f0f" width="30" height="30"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#c01b1b;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px;}</style> </defs> <title></title> <g id="cross"> <line class="cls-1" x1="7" x2="25" y1="7" y2="25"></line> <line class="cls-1" x1="7" x2="25" y1="25" y2="7"></line> </g> </g></svg>
        </div>
    @endif
</div>

