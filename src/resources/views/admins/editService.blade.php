<div class="flex h-screen bg-[#E5E5E5]">
    <!-- barre latérale -->
    @include('master.sidebar')
    <!-- Contenu principal -->
    <div class="flex flex-col flex-1 overflow-y-auto ml-8 bg-[#E5E5E5] ">

        <div class="lg:flex gap-8 items-start px-16 justify-center  bg-[#E5E5E5]">
            <div class="bg-white border-2 border-[#000E9C] rounded-lg px-8 py-6 w-full my-8 max-w-3xl">
                <h2 class="text-2xl font-semibold mb-4 text-[#000E9C]">Modifier le service</h2>
                <!-- Affichage des erreurs -->
                @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- Affichage du message de réussite -->
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
                @endif
                <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Champs du formulaire -->
                    <div class="mb-4">
                        <label class="block text-[#000E9C] font-medium mb-2" for="categorie_id"> Sélectionnez une catégorie </label>
                        <select id="categorie_id" name="categorie_id" class="border border-gray-400 p-2 w-full rounded-lg outline-none focus:border-[#E44A19] focus:shadow-md">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $service->categorie_id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Titre -->
                    <div class="mb-4">
                        <label class="block text-[#000E9C] font-medium mb-2" for="name"> Titre </label>
                        <input class="border border-gray-400 p-2 w-full rounded-lg outline-none focus:border-[#000E9C] focus:shadow-md" id="name" type="text" name="name" value="{{ $service->name }}" />
                    </div>
                    <!-- Prix -->
                    <div class="mb-4">
                        <label class="block text-[#000E9C] font-medium mb-2" for="price"> Prix </label>
                        <input class="border border-gray-400 p-2 w-full rounded-lg outline-none focus:border-[#000E9C] focus:shadow-md" id="price" type="number" name="price" value="{{ $service->price }}" />
                    </div>
                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-[#000E9C] font-medium mb-2"> Description </label>
                        <textarea rows="4" name="description" id="description" class="w-full resize-none rounded-md border border-[#a3a3a769] bg-white px-4 py-3 text-base font-medium text-[#000] outline-none focus:border-[#000E9C] focus:shadow-md">{{ $service->description }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-[#000E9C] font-medium mb-2" for="image"> Télécharger une nouvelle image du service </label>
                        <div class="mt-8 flex items-center justify-center px-3">
                            <label for="image" class="flex h-72 w-[400px] cursor-pointer items-center justify-center rounded-50 border-2 border-dashed border-[#000E9C] bg-gray-50" id="ServiceImageLabel">
                                <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13 5H9.32843C8.79799 5 8.28929 5.21071 7.91421 5.58579L7.08579 6.41421C6.71071 6.78929 6.20201 7 5.67157 7H4C2.89543 7 2 7.89543 2 9L2 19C2 20.1046 2.89543 21 4 21H18C19.1046 21 20 20.1046 20 19V12M17 5H23M20 8V2M11 18C13.2091 18 15 16.2091 15 14C15 11.7909 13.2091 10 11 10C8.79086 10 7 11.7909 7 14C7 16.2091 8.79086 18 11 18Z" stroke="#000E9C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </label>
                            <input id="image" class="hidden" type="file" name="image" accept="image/*" onchange="displayImage('ServiceImageLabel', 'image')" />
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-[#000E9C] font-medium mb-2"> Image actuelle du service </label>
                        <img src="{{ asset('storage/' . $service->image) }}" alt="Service Image" class="w-[300px] h-[200px] rounded-lg object-cover" />
                    </div>
                    <button type="submit" class="mt-8 rounded-md bg-[#000E9C] px-8 py-3 text-lg font-bold text-white  flex justify-center items-center mx-auto block">Mettre à jour le service</button>
                </form>
            </div>
        </div>

        <script>
            // JavaScript pour l'aperçu de l'image
            function displayImage(onlabel, inInput) {
                var input = document.getElementById(inInput);
                var label = document.getElementById(onlabel);
                var file = input.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        label.style.backgroundImage = 'url(' + e.target.result + ')';
                        label.style.backgroundSize = 'cover';
                        label.style.backgroundPosition = 'center';
                        label.style.border = 'none';
                    };
                    reader.readAsDataURL(file);
                }
            }
        </script>
    </div>
</div>
