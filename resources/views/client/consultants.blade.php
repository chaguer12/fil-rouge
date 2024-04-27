<!DOCTYPE html>
<html lang="fr">
@include('includes.head')
<body class="bg-gray-200">
@include('includes.primary-nav')

<div class="container mx-auto py-8">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Consultants</h1>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Consultant Card -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <img src="consultant-image.jpg" alt="Consultant Name" class="w-full h-56 object-cover">
            <div class="p-4">
                <h2 class="text-xl font-semibold text-gray-800">Consultant Name</h2>
                <p class="text-gray-600 mt-2">Specialization: Field of expertise</p>
                <p class="text-gray-600 mt-2">Disponibility: Years of experience</p>
                <button class="bg-blue-500 text-white rounded-full px-4 py-2 mt-4 hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Book Appointment</button>
                <button class="bg-gray-300 text-gray-700 rounded-full px-4 py-2 mt-2 hover:bg-gray-400 focus:outline-none focus:bg-gray-400">Add to Favorites</button>
            </div>
        </div>
        <!-- End of Consultant Card -->
        
        <!-- Repeat this card for each consultant -->
    </div>
</div>

</body>
</html>
