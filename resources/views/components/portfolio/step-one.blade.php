<div>
    {{-- <x-portfolio.steps/> --}}
    <form wire:submit="save">
        <div class="mt-4 grid grid-cols-5 -gap-2">
            <div class="mt-1">
                <x-text-input disabled placeholder="{{'https://'. env('APP_NAME').'/' }}" class="block mt-1 w-full rounded-r-none" type="text" autofocus autocomplete="form.company_name" />
            </div>
            <div class="mt-1 col-span-4">
                <div class="flex w-full">
                    <x-portfolio.available-name-check />
                    </div>
                    <x-input-error :messages="$errors->get('form.url')" class="mt-2" />
            </div>                 
        </div>

        <div class="mt-1 grid gap-2">
            <div class="mt-1">
                <x-text-input wire:model="form.greeting" placeholder="Greeting" class="block mt-1 w-full" type="text" autofocus autocomplete="form.greeting" />
                <x-input-error :messages="$errors->get('form.greeting')" class="mt-2" />
            </div>
        </div>

        <div class="mt-4">
            <textarea placeholder="About you" wire:model="form.about_you" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="6" cols="80" type="text">
                
            </textarea>
            <x-input-error :messages="$errors->get('form.about_you')" class="mt-2" />
        </div>


        <div class="mt-2 grid grid-cols-3 gap-2">
            <div class="mt-1">
                <x-text-input wire:model="form.linkedin" placeholder="LinkedIn" class="block mt-1 w-full" type="text" autofocus />
                <x-input-error :messages="$errors->get('form.linkedin')" class="mt-2" />
            </div>
            <div class="mt-1">
                <x-text-input wire:model="form.twitter" placeholder="Twitter" class="block mt-1 w-full" type="text" autofocus />
                <x-input-error :messages="$errors->get('form.twitter')" class="mt-2" />
            </div>
            <div class="mt-1">
                <x-text-input wire:model="form.github" placeholder="Github" class="block mt-1 w-full" type="text" autofocus/>
                <x-input-error :messages="$errors->get('form.github')" class="mt-2" />
            </div>
        </div>

        <div class="mt-2 grid grid-cols-1 gap-2">
            <div class="mt-1">
                <x-text-input wire:model="form.skills" placeholder="Enter skills (PHP,Laravel)" class="block mt-1 w-full" type="text" autofocus />
                <x-input-error :messages="$errors->get('form.skills')" class="mt-2" />
                <div>
                    <p class="text-xs text-gray-400">You can enter more than one skill separated with ","</p>
                </div>
            </div>
        </div>
        

        <div class="mt-4 flex justify-between"> 
            <x-primary-button class="bg-green-500" wire:click="$commit">
                Continue
            </x-primary-button>
        </div>
    </form>
    <div class="py-4">
        <hr>
    </div>
</div>