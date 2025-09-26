<x-app-layout>
    
    <div class="w-4/5 mx-auto pb-32">

        <div class="m-auto pt-20">
            <div class="pb-8">
                @if ($errors->any())
                    <div class="bg-red-500 text-white font-bold rounded-t px-4">
                        Something went wrong...
                    </div>
                    <ul class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-4 text-red-700">
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            
            <div class="pb-8">
                <x-blog.components.flash-message status="success" message="message"/>
                <x-blog.components.flash-message status="error" message="dbError"/>
            </div>

            <x-blog.components.card title="Create Tag" subtitle="Use the form below to create a tag..">
            <form action="{{ route('tag.save', ['id' => $tag ? $tag->id : null] ) }}" method="POST">
                @csrf
                <div class="mt-4">
                    <x-text-input id="title" placeholder="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $tag->title ?? '')" required autofocus autocomplete="title" />
                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <textarea placeholder="Enter Excerpt" :value="old('description', $tag->description ?? '')" name="description" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="6" cols="30" type="text">
                    {{ $tag->description ?? '' }}
                    </textarea>
                    <x-input-error :messages="$errors->get('excerpt')" class="mt-2" />
                </div>

                <div class="mt-4 flex justify-between">
                <button
                    type="submit"
                    class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-2xl">
                    Save tag
                </button>
                </div>
            </form>
            </x-blog-components.card>
    </div>

</x-app-layout>