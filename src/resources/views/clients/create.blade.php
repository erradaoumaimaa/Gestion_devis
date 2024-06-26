<div class="flex h-screen bg-[#E5E5E5]">
    <!-- sidebar -->
    @include('master.sidebar')

    <div class="flex flex-col flex-1 overflow-y-auto mx-8 bg-[#E5E5E5] p-6">

        <div class="w-full h-full mt-6 flex items-center justify-center">
            <form class="w-fit mx-auto bg-white p-4 rounded border-2 border-[#000E9C]" action="{{ isset($client) ? route('clients.update', $client->id) : route('clients.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($client))
                    @method('PUT')
                @endif

                <div class="my-3 w-full">
                    <h1 class="text-4xl text-center font-bold text-[#000E9C]">{{ isset($client) ? 'Editer un client' : 'Ajouter un client' }}</h1>
                </div>
                <div class="flex justify-center items-start gap-12">
                    <div class="p-8 h-full bg-white rounded">
                        <label class="block w-fit text-lg font-black mb-4 border-b-2 border-[#000E9C]" for="image">Image</label>
                        <div class="flex items-center justify-center">
                            <label for="image" class="flex h-64 w-64 cursor-pointer items-center justify-center rounded-50 border-2 border-dashed border-[#094839] bg-gray-50 {{ isset($client) ? 'bg-cover bg-center bg-[url(' . asset('storage/' . $client->image) . ')]' : ''}}" id="DonationImageLabel">
                                <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13 5H9.32843C8.79799 5 8.28929 5.21071 7.91421 5.58579L7.08579 6.41421C6.71071 6.78929 6.20201 7 5.67157 7H4C2.89543 7 2 7.89543 2 9L2 19C2 20.1046 2.89543 21 4 21H18C19.1046 21 20 20.1046 20 19V12M17 5H23M20 8V2M11 18C13.2091 18 15 16.2091 15 14C15 11.7909 13.2091 10 11 10C8.79086 10 7 11.7909 7 14C7 16.2091 8.79086 18 11 18Z" stroke="#000E9C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </label>
                            <input id="image" class="hidden" type="file" name="image" accept="image/*" onchange="displayImage('DonationImageLabel', 'image')" />
                        </div>
                    </div>

                    <div class="p-8 w-[40vw] grid grid-cols-2 gap-x-8 gap-y-6 bg-white rounded">
                        <div>
                            <label class="block w-fit text-lg font-black mb-4 border-b-2 border-[#000E9C]" for="name">Name</label>
                            <input value="{{ isset($client) ? $client->name : '' }}" id="name" type="text" name="name" class="w-full border-[2px] border-gray-300 rounded p-2" />
                        </div>

                        <div>
                            <label class="block w-fit text-lg font-black mb-4 border-b-2 border-[#000E9C]" for="email">Email</label>
                            <input value="{{ isset($client) ? $client->email : '' }}" id="email" type="email" name="email" class="w-full border-[2px] border-gray-300 rounded p-2" />
                        </div>

                        <div>
                            <label class="block w-fit text-lg font-black mb-4 border-b-2 border-[#000E9C]" for="password">Password</label>
                            <input id="password" type="password" name="password" class="w-full border-[2px] border-gray-300 rounded p-2" />
                        </div>

                        <div>
                            <label class="block w-fit text-lg font-black mb-4 border-b-2 border-[#000E9C]" for="password_confirmation">Confirm password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="w-full border-[2px] border-gray-300 rounded p-2" />
                        </div>

                        <div>
                            <label class="block w-fit text-lg font-black mb-4 border-b-2 border-[#000E9C]" for="ice">Ville</label>
                            <select id="city" name="ville" class="block w-full px-4 py-2 mt-2 text-black bg-white border border-gray-400 rounded-md focus:border-blue-500 focus:outline-none focus:ring">
                                <option value="{{ isset($client) ? $client->ville : '' }}" disabled selected>Choisir une Ville</option>
                            </select>
                        </div>

                        <div>
                            <label class="block w-fit text-lg font-black mb-4 border-b-2 border-[#000E9C]" for="ice">Ice</label>
                            <input  value="{{ isset($client) ? $client->ice : '' }}" id="ice" type="text" name="ice" class="w-full border-[2px] border-gray-300 rounded p-2" />
                        </div>

                    </div>
                </div>
                <button type="submit" class="w-full mt-2 bg-[#000E9C] p-2 rounded text-2xl text-white font-bold">SUBMIT</button>
            </form>
        </div>
    </div>
</div>

<script>
    fetch('{{ asset("json/villes.json") }}')
    .then(response => response.json())
    .then(data => {
        console.log(data); // Log the received JSON data
        const citySelect = document.getElementById('city');

        data.forEach(city => {
            const option = document.createElement('option');
            option.value = city.name;
            option.textContent = city.name;
            citySelect.appendChild(option);
        });
    })
    .catch(error => console.error('Erreur lors du chargement du fichier JSON :', error));

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
