
<!-- ====== Navbar Section Start -->
<header class="bg-[linear-gradient(to_right,_#040519,_#040416,_#030313,_#030310,_#02020c,_#02020d,_#02030f,_#020310,_#030416,_#04051b,_#040720,_#030825)]"
    x-data="
    {
    navbarOpen: false
    }
    "
  >
  <div class="max-w-6xl mx-auto">
    <div class="relative flex items-center justify-between">
        <div class="max-w-full px-4 w-60">
          <a href="{{ route('lander') }}" class="block w-full py-5">
              <p class="text-2xl font-bold text-white ml-4 mb-2">{{ env('APP_NAME') }}</p>
          </a>
        </div>
        <div class="flex items-center justify-between w-full px-4">
          <div>
              <button
                @click="navbarOpen = !navbarOpen"
                :class="navbarOpen && 'navbarTogglerActive' "
                id="navbarToggler"
                class="border-teal-400 absolute right-4 top-1/2 block -translate-y-1/2 rounded-lg px-3 py-[6px] ring-primary focus:ring-2 lg:hidden"
                >
              <span
                class="relative my-[6px] block h-[2px] w-[30px] bg-body-color bg-white"
                ></span>
              <span
                class="relative my-[6px] block h-[2px] w-[30px] bg-body-color bg-white"
                ></span>
              <span
                class="relative my-[6px] block h-[2px] w-[30px] bg-body-color bg-white"
                ></span>
              </button>

              <nav
                id="navbarCollapse"
                class="hidden lg:block absolute right-4 top-full w-full max-w-[250px] rounded-lg py-5 px-6 shadow lg:static lg:w-full lg:max-w-full lg:shadow-none dark:bg-dark-2 lg:dark:bg-transparent"
                >
                <ul class="block lg:flex z-10">
                    {{-- <li>
                      <x-nav-link :href="route('jobs.all')" :active="request()->routeIs('jobs.all')" class="-mt-2 font-bold mr-4" wire:navigate>
                        <x-blog.text.text color="white" textSize="x-small" value="Jobs"/>
                      </x-nav-link>
                    </li>
                    <li>
                      <x-nav-link :href="route('agency.all')" :active="request()->routeIs('agency.all')" class="-mt-2 font-bold mr-4" wire:navigate>
                        <x-blog.text.text color="white" textSize="x-small" value="Consultants"/>
                      </x-nav-link>
                    </li>
                    <li>
                      <x-nav-link :href="route('portfolio')" :active="request()->routeIs('portfolio')" class="-mt-2 font-bold mr-4" wire:navigate>
                        <x-blog.text.text color="white" textSize="x-small" value="Portfolio"/>
                      </x-nav-link>
                    </li>
                    <li>
                      <x-nav-link :href="route('roadmap')" :active="request()->routeIs('roadmap')" class="-mt-2 font-bold mr-4" wire:navigate>
                        <x-blog.text.text color="white" textSize="x-small" value="Roadmap"/>
                      </x-nav-link>
                    </li>
                    <li>
                      <x-nav-link :href="route('blog-home')" :active="request()->routeIs('blog-home')" class="-mt-2 font-bold mr-4" wire:navigate>
                        <x-blog.text.text color="white" textSize="x-small" value="Blog"/>
                      </x-nav-link>
                    </li> --}}
                </ul>
              </nav>
          </div>

          <div class="justify-end hidden pr-16 sm:flex lg:pr-0">
            <li class="">
              <x-nav-link :href="route('roadmap')" :active="request()->routeIs('roadmap')" class="-mt-2 font-bold mr-4" wire:navigate>
                <x-blog.text.text color="white" textSize="x-small" value="Learn"/>
              </x-nav-link>
            </li>
            <li>
              <x-nav-link :href="route('roadmap')" :active="request()->routeIs('roadmap')" class="-mt-2 font-bold mr-4" wire:navigate>
                <x-blog.text.text color="white" textSize="x-small" value="Mentorship"/>
              </x-nav-link>
            </li>
            <li>
              <x-nav-link href="#" class="-mt-2 font-bold mr-4" wire:navigate>
                <x-blog.text.text color="white" textSize="x-small" value="Podcast"/>
              </x-nav-link>
            </li>
            <li>
              <x-nav-link :href="route('blog-home')" :active="request()->routeIs('blog-home')" class="-mt-2 font-bold mr-4" wire:navigate>
                <x-blog.text.text color="white" textSize="x-small" value="Blog"/>
              </x-nav-link>
            </li>
              {{-- <a
                href="{{ route('login') }}"
                class="py-3 text-base font-medium px-7 text-dark dark:text-white hover:text-primary -mr-4"
                >
              <x-danger-button>Login</x-danger-button>
              </a>
              <a
                href="{{ route('register') }}"
                class="py-3 text-base font-medium text-white rounded-md bg-primary px-7 hover:bg-primary/90 -ml-6"
                >
                <x-primary-button>Register</x-primary-button>
              </a> --}}
          </div>

        </div>
    </div>
  </div>

  {{-- small screen --}}

  <div class="text-white h-auto flex justify-end p-6 shadow-2xl lg:hidden" x-show="navbarOpen" x-cloak x-transition.scale.origin.top>
    <nav
      id="navbarCollapse">
        <div class="px-4 pb-4 pt-1 bg-gray-500 -mt-12 -mr-6">
          <ul class="block lg:flex z-10">
            
            <li>
              <a href="{{ route('blog-home') }}" class="block mt-4 lg:inline-block lg:mt-0 font-bold text-gray-400 hover:text-teal-200 mr-4 hover:cursor-pointer" wire:navigate>
                <x-blog.text.text color="white" textSize="small" value="Blog"/>
              </a>
            </li>
            <li>
              <a href="#" class="block mt-4 lg:inline-block lg:mt-0 font-bold text-gray-400 hover:text-teal-200 mr-4 hover:cursor-pointer" wire:navigate>
                <x-blog.text.text color="white" textSize="small" value="Books"/>
              </a>
            </li>
            <li>
              <a href="#" class="block mt-4 lg:inline-block lg:mt-0 font-bold text-gray-400 hover:text-teal-200 mr-4 hover:cursor-pointer" wire:navigate>
                <x-blog.text.text color="white" textSize="small" value="Courses"/>
              </a>
            </li>
            <li>
              <a href="{{ route('roadmap') }}" class="block mt-4 lg:inline-block lg:mt-0 font-bold text-gray-400 hover:text-teal-200 mr-4 hover:cursor-pointer"  wire:navigate>
                <x-blog.text.text color="white" textSize="small" value="Road-map"/>
              </a>
            </li>
              {{-- <li class="mt-4 md:hidden">
                <a
                    href="{{ route('login') }}"
                    class=""
                    >
                  <x-danger-button>Login</x-danger-button>
                  </a>
              </li>
              <li class="mt-2 md:hidden">
                <a
                  href="{{ route('register') }}"
                  class=""
                  >
                  <x-primary-button>Register</x-primary-button>
                </a>
              </li> --}}
          </ul>
      </div>
    </nav>
  </div>
  
  
</header>
<!-- ====== Navbar Section End -->