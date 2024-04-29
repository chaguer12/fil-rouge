@include('../includes.head')
<body class="bg-[#f3f4f6]">
    @include('includes.primary-nav')
    @if(session()->has('success'))
    <div class="bg-white opacity-50">
        <h1 class="mt-16 text-center text-green-500 text-lg alert alert-success">
            {{ session()->get('success') }}
        </h1>
    </div>
@endif

@if(session()->has('error'))
    <div class="bg-white opacity-50">
        <h1 class="mt-16 text-center text-red-500 text-lg alert alert-danger">
            {{ session()->get('error') }}
        </h1>
    </div>
@endif
<!-- User profile content -->
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <!-- Profile information -->
           <!-- Profile information -->
<div class="max-w-3xl mx-auto">
    <h1 class="text-2xl font-semibold mb-4">User Profile</h1>
    <!-- Profile picture and image upload form -->
    <div class=" grid grid-cols-1 md:grid-cols-2 gap-4">
        
        <!-- Profile picture -->
          
        <div class="w-32 h-32">
            <img src="../../../pulic/storage/images/" alt="" class="rounded-full h-16  mx-auto md:mx-0">
        </div>
        <!-- Image upload form -->
        <div>
            <form action="{{route('image',$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <label for="profile-image" class="block text-lg font-semibold mb-2">Upload Profile Picture:</label>
                <input type="file" id="profile-image" name="image" class="block border-gray-300 focus:border-[#428C9E] focus:ring-[#428C9E] rounded-md shadow-sm">
                <button type="submit" class="bg-[#428C9E] text-white font-bold py-2 px-4 mt-4 rounded">Upload</button>
            </form>
        </div>
    </div>
    <!-- Profile details form -->
    <div class="mt-8">
        
        <form action="{{route('consultant.update',['consultant' => $user->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <label for="first-name" class="block text-lg font-semibold mb-2">First Name:</label>
            <input type="text" id="first-name" name="Firstname" class="block w-full border border-gray-500 focus:border-[#428C9E] focus:ring-[#428C9E] rounded-md shadow-sm mb-4" value="{{$user->Firstname}}">
            <label for="last-name" class="block text-lg font-semibold mb-2">Last Name:</label>
            <input type="text" id="last-name" name="Lastname" class="block w-full border border-gray-500 focus:border-[#428C9E] focus:ring-[#428C9E] rounded-md shadow-sm mb-4" value="{{$user->Lastname}}">
            <label for="email" class="block text-lg font-semibold mb-2">Email:</label>
            <input type="email" id="email" name="email" class="block w-full border border-gray-500 focus:border-[#428C9E] focus:ring-[#428C9E] rounded-md shadow-sm mb-4" value="{{$user->email}}">
            <!-- Additional profile details -->
            <label for="specialty" class="block text-lg font-semibold mb-2">Specialty:</label>
        <select id="specialty" name="speciality" class="block w-full border border-gray-500 focus:border-[#428C9E] focus:ring-[#428C9E] rounded-md shadow-sm mb-4">
            <option selected value=""></option>
            @foreach ($specialities as $speciality)
            <option value="{{$speciality->id}}">{{$speciality->speciality_name}}</option>
                
            @endforeach
            <!-- Add more options as needed -->
        </select>
            <label for="description" class="block text-lg font-semibold mb-2">Description:</label>
            <textarea id="description" name="description" class="block w-full border border-gray-500 focus:border-[#428C9E] focus:ring-[#428C9E] rounded-md shadow-sm mb-4" value="">{{$user->description}}</textarea>
            <button type="submit" class="bg-[#428C9E] text-white font-bold py-2 px-4 rounded">Save Changes</button>
        </form>
    </div>
    <p class="text-sm text-center text-gray-500 mt-4">Compléter votre profil augmente vos chances d’être classé parmi les autres utilisateurs.</p>
</div>

        </div>
    </div>
</div>
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <!-- Profile information -->
           <!-- Profile information -->
<div class="max-w-3xl mx-auto">
    <h1 class="text-2xl font-semibold mb-4">Partages tes pensées</h1>
    <!-- Profile picture and image upload form -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Profile picture -->
          
        <div class="w-32 h-32">
            <img src="../../../pulic/storage/images" alt="" class="rounded-full h-16  mx-auto md:mx-0">
        </div>
        <!-- Image upload form -->
        <div>
            <form action="{{route('image',$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <label for="profile-image" class="block text-lg font-semibold mb-2">Upload Profile Picture:</label>
                <input type="file" id="profile-image" name="image" class="block border-gray-300 focus:border-[#428C9E] focus:ring-[#428C9E] rounded-md shadow-sm">
                <button type="submit" class="bg-[#428C9E] text-white font-bold py-2 px-4 mt-4 rounded">Upload</button>
            </form>
        </div>
    </div>
    <!-- Profile details form -->
    <div class="mt-8">
        
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="article-title" class="block text-lg font-semibold mb-2">Titre de l'article:</label>
            <input type="text" id="article-title" name="title" class="block w-full border border-gray-500 focus:border-[#428C9E] focus:ring-[#428C9E] rounded-md shadow-sm mb-4">

            <label for="article-text" class="block text-lg font-semibold mb-2">Texte de l'article:</label>
            <textarea id="article-text" name="text" class="block w-full border border-gray-500 focus:border-[#428C9E] focus:ring-[#428C9E] rounded-md shadow-sm mb-4"></textarea>

            <button type="submit" class="bg-[#428C9E] text-white font-bold py-2 px-4 rounded">Ajouter l'article</button>
        </form>
    </div>
    <p class="text-sm text-center text-gray-500 mt-4">Cette section vous permets de partages vos idées avec des clients potentiels.</p>
</div>

        </div>
    </div>
</div>


    
</body>