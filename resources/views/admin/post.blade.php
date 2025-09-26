<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- remove lazy loading --}}
            <x-blog.btn.btn-primary href="{{ route('blog.create') }}"/>
            <x-blog.components.layout>
                @foreach (Auth::user()->posts as $post)
                    <x-blog.components.post-card 
                        editRoute="{{ route('blog.edit', $post) }}" 
                        href="{{ route('blog.show', $post->slog)}}" 
                        :userId="$post->user_id" 
                        :title="$post->title" 
                        :excerpt="$post->excerpt" 
                        :userName="$post->user->name" 
                        :date="$post->updated_at" 
                        :postId="$post->id"
                        :tagDetail="$post->tag"
                    />
                @endforeach
            </x-blog.components.layout>
        </div>
    </div>
</x-app-layout>