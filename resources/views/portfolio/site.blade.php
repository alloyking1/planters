<x-portfolio.layout>
 
    <x-blog.seo.page-meta
        title="Laraveldev.pro - portfolio website for laravel developers | software developers portfolio website | free."
        description="providing laravel coding tutorials for laravel developers - laravel blog | laravel news | laravel jobs | laravel updates | laravel packages | all things laravel "
        keywords="laravel,coding,tallstack,livewire,laraveldeveloper,laravel jobs, laravel news, learn laravel, laravel LMS, laravel saas, laravel coding, laravel architect, whats new in laravel - x"
        robots="laravel,coding,tallstack,livewire,laraveldeveloper,laravel jobs, laravel news, learn laravel, laravel LMS, laravel saas, laravel coding, laravel architect, whats new in laravel - x"
      />
    @foreach($portfolio as $userPortfolio)
        <x-blog.pages.section color="gray" textColor="black" textSize="large" class="">
            <x-blog.pages.grid-2 class="">

                <div class="rounded-full">
                    <img src="{{ asset('storage/' . $userPortfolio->profile_img ) }}" class="rounded-full shadow-lg w-50 h-auto" alt="">
                </div>

                <div class="text-left grid place-content-center justify-center">
                    <x-blog.text.text textSize="header2" color="black" :value="$userPortfolio->greeting" class="font-black"/>
            
                    <div class="max-w-2xl mx-auto mt-4">
                        <x-blog.text.text textSize="x-small"
                        color="black"
                        class="font-thin"
                        :value="$userPortfolio->about"/>
                    </div>
                    <div class="w-[10px]">
                        <x-portfolio.git-stat :link="$userPortfolio->github"/>
                    </div>
                </div>

                
            </x-blog.pages.grid-2>
        </x-blog.pages.section>
        
        <x-blog.pages.section color="offWhite" title="" textColor="black" textSize="large" class="text-center">
            
            <div class="p-8 shadow-2xl rounded-2xl py-24">

                <x-blog.text.text textSize="large" color="black" value="Services" class="font-black pb-8"/>
                <div class="mt-4 md:flex justify-center overflow-scroll grid grid-cols-1 gap-2 max-w-4xl mx-auto">
                    @foreach ($userPortfolio->services as $service)
                        <x-blog.components.portfolio-services-card 
                        :name="$service->name" 
                        :description="$service->description" 
                        />
                    @endforeach
                </div>
                <div class="rounded-2xl p-4 mt-8">
                    <div class="text-center mt-4">
                        <x-blog.text.text textSize="medium" color="black" value="Skills" class="font-black pb-8"/>
                    </div>
                    <div class="justify-center max-w-2xl mx-auto">
                        @foreach ($userPortfolio->skills as $skill )
                            <x-blog.components.post-tag :text="$skill" :color="array_rand(['sky' => 'sky','black' => 'black', 'green' => 'green', 'orange' => 'orange', 'blue' => 'blue'], 1)"/>
                        @endforeach
                    </div>
                </div>
            </div>
                
        </x-blog.pages.section>

        <x-blog.pages.section color="gray" title="" textColor="black" textSize="large">
                <div class="text-center">
                    <x-blog.text.text textSize="large" color="black" value="Projects" class="font-black"/>
                </div>
                <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-2 max-w-6xl mx-auto">
                    @foreach ($userPortfolio->projects as $project)
                        <x-blog.components.portfolio-project-card 
                        :name="$project->name" 
                        :description="$project->description" 
                        :link="$project->link" 
                        :image="$project->img" 
                        />
                    @endforeach
                </div>
        </x-blog.pages.section> 

        <x-blog.pages.section color="white" title="" textColor="black" textSize="large">
            <x-blog.text.text textSize="large" color="black" value="Contact me" class="font-black"/>
            <x-blog.text.text textSize="x-small" class="text-gray-700 text-4xl mt-4" value="Other places you can find me"/>
            
            <x-blog.pages.grid-2 class="">
                <div class="">
                    <x-blog.text.text textSize="small" class="text-gray-700 text-4xl mt-4 mb-2" value="My Resume"/>
                        <div class="relative overflow-hidden pt-[56.25%]">
                            <iframe src="{{ asset('storage/' . $userPortfolio->cv) }}" class="absolute top-0 left-0 w-full h-full border-0"></iframe>
                        </div>
                        
                </div>
                <div class="grid md:justify-center">
                    <x-blog.pages.grid-1 class="">
                        <div class="flex shadow-2xl rounded-2xl p-8 my-auto">
                            <div class="">
                                <a href="{{ $userPortfolio->linkedin }}" target="_blank">
                                    <x-portfolio.icon-linkedin/>
                                </a>
                            </div>
                            <div class="">
                                <a href="{{ $userPortfolio->twitter }}" target="_blank">
                                    <x-portfolio.icon-twitter/>
                                </a>
                            </div>
                            <div class="">
                                <a href="{{ $userPortfolio->github }}" target="_blank">
                                    <x-portfolio.icon-github/>
                                </a>
                            </div>
                        </div>
                    </x-blog.pages.grid-1>
                </div>
            </x-blog.pages.grid-2>
                
        </x-blog.pages.section> 
    @endforeach

</x-portfolio.layout>

