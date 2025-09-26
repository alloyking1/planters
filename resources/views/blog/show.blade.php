
<x-guest-layout>
    
    @foreach ($postDetail as $post )
    
        @if ($post->meta)
            @php
                $meta_description = $post->meta->meta_description;
                $meta_keywords = $post->meta->meta_keywords;
                $meta_robots = $post->meta->meta_robots
            @endphp
            <x-blog.seo.page-meta
                :title="$post->title"
                :description="$meta_description"
                :keywords="$meta_keywords"
                :robots="$meta_robots"
            />
        @endif

        <x-blog.pages.section color="black" textColor="white" textSize="large">
            <div class="px-42">
                <div class="text-center grid place-content-center justify-center">
                <x-blog.text.text textSize="header2" color="white" value="{{ $post->title }}" class="font-black"/>
                <x-blog.text.text textSize="medium"  color="gray" class="font-mono mt-8" value="{{ $post->excerpt }}"/>
                    <x-blog.pages.grid-1>
                        <div class="mt-4">
                            @foreach ($post->tag as $tag )
                            <x-blog.components.post-tag :text="$tag->title" :color="array_rand(['sky' => 'sky', 'green' => 'green', 'orange' => 'orange', 'blue' => 'blue'], 1)"/>
                        @endforeach
                        </div>
                    </x-blog.pages.grid-1>
                </div>
            </div>
            
        </x-blog.pages.section>
        
        <x-blog.pages.grid-1 class="mt-16 mb-32 max-w-6xl mx-auto">
            <div class="mx-8 md:mx-auto">
                <div class="max-w-4xl mx-auto">
                    @php
                        $content = str_replace("<pre>", "<p>", $post->body);
                        echo $content
                    @endphp

                    <x-blog.pages.grid-1>
                        <div class="">

                            <span class="text-gray-900">
                                Author:
                                <a
                                    href="https://twitter.com/alloyking_1"
                                    target="_blank"
                                    class="font-bold text-green-500 hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all py-20">
                                    {{ $post->user->name }}
                                </a>
                                on {{ date('d-m-Y', strtotime($post->created_at)) }}
                            </span>
                        </div>
                    </x-blog.pages.grid-1>
                </div>
            </div> 
        </x-blog.pages.grid-1>

    
    @endforeach

    <x-blog.pages.section color="gray" title="Related Posts" textColor="black" textSize="large">
        <x-blog.pages.grid-1 class="mt-16 grid md:grid-cols-5">
                @forelse ($recentPosts as $postValue)
                <x-blog.components.post-card 
                    :tagDetail="$postValue->tag" 
                    editRoute="{{ route('blog.edit', $postValue) }}" 
                    href="{{ route('blog.show', $postValue->slog)}}" 
                    :title="$postValue->title" :excerpt="$postValue->excerpt" 
                    :userName="$postValue->user->name" 
                    :date="$postValue->updated_at" 
                />
                @empty
                No post found...
                @endforelse
        </x-blog.pages.grid-1>
    </x-blog.pages.section> 

    <style>
        h2 {
            font-size:2rem;
            padding-top:.5rem;
            padding-bottom:.5rem;
        }
    </style>
</x-guest-layout>