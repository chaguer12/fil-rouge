<!DOCTYPE html>
<html lang="fr">
@include('includes.head')
<body class="bg-gray-200">
@include('includes.primary-nav')

<div class="container mx-auto py-8">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Consultants</h1>
    @foreach ($consultants as $consultant)
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Consultant Card -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <img src="../../../storage/app/public/images/{{$consultant->image->path}}" alt="Consultant Name" class="w-full h-8 object-cover">
            <div class="p-4">
                <div class="flex gap-2">
                    <h2 class="text-xl font-semibold text-gray-800">{{$consultant->user->Firstname}}</h2>
                    <h2 class="text-xl font-semibold text-gray-800">{{$consultant->user->Lastname}}</h2>
                </div>
                <p class="text-gray-600 mt-2">Specialization: {{$consultant->speciality->speciality_name}}</p>
                <p class="text-gray-600 mt-2">Description: {{$consultant->description}}</p>
                <p class="text-gray-600 text-sm mt-2">{{$consultant->user->email}}</p>
                <button class="bg-blue-500 text-white rounded-full px-4 py-2 mt-4 hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Book Appointment</button>
                <button class="bg-gray-300 text-gray-700 rounded-full px-4 py-2 mt-2 hover:bg-gray-400 focus:outline-none focus:bg-gray-400">Add to Favorites</button>
            </div>
        </div>
        <!-- End of Consultant Card -->
        
        <!-- Repeat this card for each consultant -->
    </div>
    @endforeach
</div>

</body>
</html>
