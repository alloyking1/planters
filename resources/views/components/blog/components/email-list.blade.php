{{-- brevo.com email list --}}
{{-- <iframe 
  width="540" 
  height="305" 
  src="https://63128172.sibforms.com/serve/MUIFAJY1gVWQ-Yr6bCWAy0hFXNQxAL68cv9Ck1zcbYZSNpRL1t0glRSa6B7TqfW3Dgj83eGUGI1Lzd4FZT2RFvH0lLRgTcsYb1iFWXXjqxrq5EyIA8UHyBXK0hvINn0U1WKSjH9oPbVV6tjxUwN-SxRzx3iRnPIek2mdwSfOG6vGf7rm_LQ_uDH1-W6AEd1Vbcf11e_iAadPjxVM" 
  frameborder="0" 
  scrolling="auto" 
  allowfullscreen 
  style="display: block;margin-left: auto;margin-right: auto;max-width: 100%;">
</iframe> --}}

<div class="text-center">
  <form action="{{ route('newsletter.subscribe') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Enter your email" class="border rounded-md p-2 md:w-64">
    <button type="submit" class="bg-blue-500 text-white p-2 rounded-md md:mt-0 mt-2">Subscribe</button>
    @error('email')
      <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    @if(session('success'))
      <p class="text-green-500 text-sm">{{ session('success') }}</p>
    @endif
  </form>
  
  {{-- <div class="mt-4">
    <img src="https://media.licdn.com/dms/image/v2/D4D03AQG1CSmVRhcomA/profile-displayphoto-shrink_400_400/profile-displayphoto-shrink_400_400/0/1728111048378?e=1744243200&v=beta&t=yS1Ec8gogsTEOkweNr7s2_91nhghLCmhqXhkxuZ8-P4" 
    alt="Author" class="w-14 h-14 rounded-full mx-auto object-cover">
  </div> --}}
</div>