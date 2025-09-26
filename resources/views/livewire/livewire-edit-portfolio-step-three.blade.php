<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
    <x-blog.components.card>
        <x-blog.components.flash-message message="{{ session('success') }}" class="my-2"/>
        <x-blog.components.flash-message message="{{ session('error') }}" status="error" class="my-2"/>
        <div x-data={open:false,projectOpen:false}>
            <x-blog.components.flash-message status="{{ session('success') }}"/>

            <div class="flex justify-between py-4">
                <div>
                    <h1 class="md:text-3xl text-4xl text-gray-700">Upload profile picture (3)</h1>
                    <h2 class="text-gray-600 text-sm">upload a profile picture and CV</h2>
                </div>
                <div> 
                    <div x-on:click="open =!open">
                        <x-primary-button>
                            <div>Show form</div>
                        </x-primary-button>
                    </div>
                </div>
            </div>

            <div x-show="open">
                <form>
                    <div class="mt-6">
                        <div class="grid md:flex md:justify-between gap-4">
                            <div>
                                <label for="file" class="p-3 bg-blue-900 rounded-md px-4 hover:cursor text-white text-sm font-semibold">Add profile photo</label>
                                <x-text-input id="file" placeholder="Featured image" type="file" wire:model="profile_img" class="hidden mt-1 w-full" autofocus autocomplete="logo" />
                                <x-input-error :messages="$errors->get('stepThreeForm.profile_img')" class="mt-2" /> 
                            </div>
                            <div class="justify-end">
                                <div class="mt-4">
                                    @if ($this->profile_img)
                                        <img src="{{ $this->profile_img->temporaryUrl() }}" class="rounded-full w-32">
                                    @elseif ($this->portfolio->profile_img != null)
                                        <img src="{{asset('storage/' .  $this->portfolio->profile_img) }}" class="rounded-full w-32">
                                    @else
                                        <div class="border rounded-full w-full md:w-50 md:p-10 p-24">
                                            <x-portfolio.profile-avatar/>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                
                    <div class="mt-4 flex justify-between"> 
                        <x-primary-button class="bg-green-500" wire:click.prevent="save">
                            save profile image
                        </x-primary-button>
                    </div>
                </form>
            </div>

            <div class="py-4">
                <hr>
            </div>

            <div class="flex justify-between py-4">
                <div>
                    <h1 class="md:text-3xl text-4xl text-gray-700">Upload your CV (option)</h1>
                    <h2 class="text-gray-600 text-sm">upload a profile picture and CV</h2>
                </div>
                <div> 
                    <div x-on:click="projectOpen =!projectOpen">
                        <x-primary-button>
                            <div>Show form</div>
                        </x-primary-button>
                    </div>
                </div>
            </div>
            <div x-show="projectOpen">
                <div class="py-4">
                    <form>
                        <div class="mt-6">
                            <div class="grid md:flex md:justify-between gap-4">
                                <div>
                                    <label for="cv" class="p-3 bg-blue-900 rounded-md px-4 hover:cursor text-white text-sm font-semibold">Add CV</label>
                                    <x-text-input id="cv" placeholder="Featured image" type="file" wire:model="cv" class="hidden mt-1 w-full" autofocus autocomplete="logo" />
                                    <x-input-error :messages="$errors->get('stepThreeForm.cv')" class="mt-2" /> 
                                </div>
                                <div class="justify-end">
                                    <div class="mt-4">
                                        @if ($this->cv)
                                            {{-- <embed src="{{ $this->cv->temporaryUrl() }}" width="15px" height="30px" /> --}}
                                            File uploaded. Click save to save it
                                        @else
                                            <div class="border rounded-md w-32 md:w-50 md:p-32 p-24"></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 flex justify-between"> 
                            <x-primary-button class="bg-green-500" wire:click.prevent="saveCv">
                                save CV
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <x-primary-button class="bg-green-500" wire:click.prevent="publish">
                publish
            </x-primary-button>
        </div>
    </x-blog.components.card>
</div>