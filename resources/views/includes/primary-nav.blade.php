<nav class="bg-[#428C9E] shadow shadow-gray-300 w-100 px-8 md:px-auto">
    <div class="md:h-16 h-28 mx-auto md:px-4 container flex items-center justify-between flex-wrap md:flex-nowrap">
        <!-- Logo -->
        <div class="text-indigo-500 md:order-1">
            <!-- Heroicon - Chip Outline -->
            <a href="/">
                <img class="h-16 py-2" src="{{URL::asset('/images/logo-no-background.png')}}" alt="Logo">
            </a>
        </div>
        <div class="text-white order-3 w-full md:w-auto md:order-2">
            <ul class="flex font-semibold justify-between">
                <!-- Active Link = text-indigo-500
    Inactive Link = hover:text-indigo-500 -->
                <li class="md:px-4 md:py-2 text-white"><a href="/">Home</a></li>
                <li class="md:px-4 md:py-2 text-white"><a href="/about">About</a></li>
                <li class="md:px-4 md:py-2 text-white"><a href="/explore">Explore</a></li>
                <li class="md:px-4 md:py-2 text-white"><a href="#">Blog</a></li>
               
            </ul>
        </div>
        @if(Auth::check()) <!-- Check if the user is authenticated -->
<div class="order-2 md:order-3">
<!-- Add your logout button -->
<form id="logout-form" method="post" action="{{ route('logout') }}" class="px-4 py-2 bg-white hover:shadow-lg rounded-xl">
@csrf
<!-- CSRF protection -->
<button type="submit" class="text-[#428C9E]">Logout</button>
</form>
</div>
@else
<div class="flex gap-2 order-2 md:order-3">
<!-- Add your login and register buttons -->
<a href="{{ route('login-form') }}" class="px-4 py-2 bg-white hover:shadow-lg rounded-xl">
<span class="text-[#428C9E]">Login</span>
</a>
<a href="{{ route('register-form') }}" class="px-4 py-2 bg-white hover:shadow-lg rounded-xl">
<span class="text-[#428C9E]">Register</span>
</a>
</div>
@endif

    </div>
</nav>