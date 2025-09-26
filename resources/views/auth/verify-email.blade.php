<x-guest-layout>
    <div class="max-w-4xl mx-auto py-16 rounded-md px-4">
        <x-blog.pages.section color="white" title="Email Verification" textColor="black" textSize="large">
        
            <div class="mb-4 text-md text-gray-600">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>
        
            @if (session('status') == 'verification-link-sent')
                <div class="my-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif
        
            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
        
                    <div>
                        <x-primary-button>
                            {{ __('Resend Verification Email') }}
                        </x-primary-button>
                    </div>
                </form>
        
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
        
                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </x-blog.pages.section>
    </div>
</x-guest-layout>
