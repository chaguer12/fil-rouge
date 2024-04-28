@include("../includes.head")
<body class="bg-[#f3f4f6]">
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
                    <li class="md:px-4 md:py-2 text-white"><a href="{{route('Speciality.index')}}">Specialities</a></li>
                    <li class="md:px-4 md:py-2 text-white"><a href="/about">Posts</a></li>
                    <li class="md:px-4 md:py-2 text-white"><a href="{{route('consultant.index')}}">Consultants</a></li>
                    
                   
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

    <div class="py-12">
        <div class="max-w-full mx-4 py-6 sm:mx-auto sm:px-6 lg:px-8">
            <div class="sm:flex sm:space-x-4">
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
                    <div class="bg-white p-5">
                        <div class="sm:flex sm:items-start">
                            <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                <h1 class="text-sm leading-6 font-medium text-gray-400">Juristes total</h1>
                                <p class="text-3xl font-bold text-black">{{$total}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
                    <div class="bg-white p-5">
                        <div class="sm:flex sm:items-start">
                            <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                <h1 class="text-sm leading-6 font-medium text-gray-400">Juristes verifié</h1>
                                <p class="text-3xl font-bold text-black">{{$verified}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
                    <div class="bg-white p-5">
                        <div class="sm:flex sm:items-start">
                            <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                <h1 class="text-sm leading-6 font-medium text-gray-400">Juristes verifié</h1>
                                <p class="text-3xl font-bold text-black">{{$unverified}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                
          </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container mx-auto">
                        <table class="min-w-full">
                            <!-- Table header -->
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">#</th>
                                    <th class="px-4 py-2">First Name</th>
                                    <th class="px-4 py-2">Last Name</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody>
                                <!-- Table rows -->
                                <!-- Replace this section with your dynamic data -->
                                @foreach($consultants as $consultant)
                                <tr>
                                    <td class="border px-4 py-2">{{ $consultant->id }}</td>
                                    <td class="border px-4 py-2">{{$consultant->Firstname}}</td>
                                    <td class="border px-4 py-2">{{$consultant->Lastname}}</td>
                                    <td class="border px-4 py-2">{{$consultant->email}}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{route('verify', $consultant->id)}}" class="bg-[#428C9E] hover:bg-[#3f9bb1] text-white font-bold py-2 px-4 rounded">
                                            Verify
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                <!-- Repeat this row for each user -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</body>