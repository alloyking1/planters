
<!-- ====== Navbar Section Start -->
<header class="bg-[linear-gradient(to_right,_#040519,_#040416,_#030313,_#030310,_#02020c,_#02020d,_#02030f,_#020310,_#030416,_#04051b,_#040720,_#030825)]">
  <div class="max-w-7xl mx-auto">
    <div class="relative flex items-center justify-between">
        <div class="max-w-full px-4">
          <a href="{{ route('lander') }}" class="block w-full py-5">
              <p class="md:text-2xl text-xl font-bold text-white ml-4 mb-2">Laraveldev.pro</p>
          </a>
        </div>

        <div class="p-2">
            <a href="{{ route('portfolio.list') }}">
            <x-primary-button class="">Get portfolio</x-primary-button>
            </a>
        </div>

    </div>
  </div>
  
</header>
<!-- ====== Navbar Section End -->