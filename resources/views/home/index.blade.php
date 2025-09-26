<x-guest-layout>
    <x-blog.seo.page-meta
      title="Laravel Tutorials & Best Practices | Learn PHP & Laravel Development | LaravelDev.pro"
      description="Learn Laravel development through comprehensive tutorials, books, courses, best practices, and expert tips. Join our community of PHP/Laravel developers to enhance your skills and stay updated with the latest Laravel trends."
      keywords="laravel tutorials, laravel development, php development, laravel best practices, laravel tips, laravel learning, web development, php framework, laravel documentation, laravel community"
      robots="laravel,tutorials,books,courses,best practices,expert tips,php,laravel development,web development,php framework,laravel documentation,laravel community"
    />

    <x-blog.pages.section color="black" textColor="white" textSize="large" class="">
        <div class="">
          <div class="text-center grid place-content-center justify-center">
            <div class="max-w-4xl">
                <x-blog.text.text textSize="header2" color="white" value="A Free Developer Community, Built by Developers" class="font-black"/>
            </div>
    
            <div class="max-w-2xl mx-auto mt-4">
              <x-blog.text.text textSize="medium"
              color="white"
              class="font-thin"
              value="Learn, build, and grow with roadmaps, open source projects, and mentorship."/>
            
                <x-blog.pages.grid-1 class="mt-8">
                    <div class="md:flex grid gap-4 mx-auto">
                        <a href="" class="border rounded-full p-2 text-white px-4 hover:bg-blue-500">
                            <button>Start Learning</button>
                        </a>
                        <a
                            href="#"
                            class="inline-flex items-center gap-1 bg-white text-gray-600 border border-gray-200 hover:shadow-sm focus:shadow-outline px-2 py-1.5 h-9 rounded-full font-medium transition-shadow duration-150"
                            aria-label="Join us on Slack"
                            >
                            <svg width="30px" height="25px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g fill-rule="evenodd" clip-rule="evenodd"> <path fill="#E01E5A" d="M2.471 11.318a1.474 1.474 0 001.47-1.471v-1.47h-1.47A1.474 1.474 0 001 9.846c.001.811.659 1.469 1.47 1.47zm3.682-2.942a1.474 1.474 0 00-1.47 1.471v3.683c.002.811.66 1.468 1.47 1.47a1.474 1.474 0 001.47-1.47V9.846a1.474 1.474 0 00-1.47-1.47z"></path> <path fill="#36C5F0" d="M4.683 2.471c.001.811.659 1.469 1.47 1.47h1.47v-1.47A1.474 1.474 0 006.154 1a1.474 1.474 0 00-1.47 1.47zm2.94 3.682a1.474 1.474 0 00-1.47-1.47H2.47A1.474 1.474 0 001 6.153c.002.812.66 1.469 1.47 1.47h3.684a1.474 1.474 0 001.47-1.47z"></path> <path fill="#2EB67D" d="M9.847 7.624a1.474 1.474 0 001.47-1.47V2.47A1.474 1.474 0 009.848 1a1.474 1.474 0 00-1.47 1.47v3.684c.002.81.659 1.468 1.47 1.47zm3.682-2.941a1.474 1.474 0 00-1.47 1.47v1.47h1.47A1.474 1.474 0 0015 6.154a1.474 1.474 0 00-1.47-1.47z"></path> <path fill="#ECB22E" d="M8.377 9.847c.002.811.659 1.469 1.47 1.47h3.683A1.474 1.474 0 0015 9.848a1.474 1.474 0 00-1.47-1.47H9.847a1.474 1.474 0 00-1.47 1.47zm2.94 3.682a1.474 1.474 0 00-1.47-1.47h-1.47v1.47c.002.812.659 1.469 1.47 1.47a1.474 1.474 0 001.47-1.47z"></path> </g> </g></svg>
                            <span>Join us on Slack</span>
                        </a>
                    </div>
                    {{-- <x-blog.text.text color="white" class="" textSize="medium" value="Join our community of Laravel professionals for expert insights and advanced tutorials"/>
                    <div class="">
                        <x-blog.components.email-list/>
                    </div> --}}
                </x-blog.pages.grid-1>
            </div>
          </div>
        </div>
    </x-blog.pages.section>


    <x-blog.pages.section color="black" textColor="white" textSize="large" class="relative">
        <div class="shadow-lg border border-gray-500 md:p-16 pb-24 rounded-2xl">
            <x-blog.pages.grid-2 class="pt-8">

                <div class="text-center grid place-content-center justify-center md:mr-6">
                    <x-blog.text.text textSize="header2" color="gray" value="Weekly Dose of Developer Stories & Insights" class="font-black"/>
            
                    <div class="max-w-xl mx-auto mt-4">
                        <x-blog.text.text textSize="small"
                        color="white"
                        class="font-thin"
                        value="
                        Conversations, tips, and stories from developers worldwide.
                        "/>
                    </div>
                </div>
                
                <x-blog.pages.grid-1 class="md:mt-4 p-2">
                    @forelse ($agencies as $agency)
                        <a href="{{ route('agency.show', $agency) }}" target="_blank" class="text-black">
                            <x-blog.components.agency-card :agency="$agency"/>
                        </a>
                    @empty
                        <x-blog.components.card-long>
                            <x-blog.text.text textSize="xx-small" color="gray" value="Silence is golden!" class=""/>
                        </x-blog.components.card-long>
                    @endforelse
                </x-blog.pages.grid-1>
                
            </x-blog.pages.grid-2>
            <div class="flex justify-end">
                <a href="{{ route('agency.all') }}" class="border rounded-sm p-1 text-xs mt-2">
                    <div class="text-white">See more >></div>
                </a>
            </div>
        </div>
    </x-blog.pages.section>
</x-guest-layout>