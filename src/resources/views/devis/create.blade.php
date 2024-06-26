<div class="flex h-screen bg-[#E5E5E5]">
    <!-- barre latérale -->
    @include('master.sidebar')
    <!-- Contenu principal -->
    <div class="flex flex-col flex-1 overflow-y-auto mx-8 bg-[#E5E5E5] p-6">
        @if($errors->first())
        <div class="p-2 px-4 bg-red-400 rounded w-fit mx-auto">
            @foreach ($errors->all() as $message)
                            <p class="text-md">{{ $message }}</p>
            @endforeach
        </div>
        @endif
        <div class="w-full h-full mt-6 flex items-center justify-center">
            <form class="w-fit mx-auto bg-white p-4 rounded border-2 border-[#000E9C]" action="{{route('devis.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($devis))
                    @method('PUT')
                @endif

                <div class="my-3 w-full">
                    <h1 id="create-devis-title" class="text-4xl text-center font-bold text-[#000E9C]">Créer un devis pour ______</h1>
                </div>
                <div class="flex justify-center items-start gap-12">

                    <div class="p-8 h-full bg-white rounded">
                        <label class="block w-fit text-lg font-black mb-4 border-b-2 border-[#000E9C]" for="user">Client</label>
                        <select name="user_id" id="user" class="border border-gray-400 p-2 w-full rounded-lg outline-none focus:border-[#E44A19] focus:shadow-md">
                            <!-- Options pour sélectionner l'utilisateur -->
                            <option value="">Choisissez un utilisateur</option>
                            @foreach($users as $user)
                                @php
                                    $image = $user->image ? asset('storage/' . $user->image) : 'https://upload.wikimedia.org/wikipedia/commons/7/7d/User_(17241)_-_The_Noun_Project.svg';
                                @endphp
                                <option value="{{ $user->id }}" data-image="{{ $image }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <div class="flex flex-col items-center justify-center mt-4">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/7/7d/User_(17241)_-_The_Noun_Project.svg" alt="Client" id="user-image" class="flex h-64 w-64 cursor-pointer items-center justify-center rounded-50 border-2 border-dashed border-[#000E9C] bg-gray-50">
                            <p id="user-name" class="mt-2 text-bold"></p>
                        </div>
                    </div>

                    <div class="p-8 w-[40vw] grid grid-cols-2 gap-x-8 gap-y-6 bg-white rounded">
                        <div id="services-wrapper">
                            <label class="block w-fit text-lg font-black mb-4 border-b-2 border-[#000E9C]" for="service_id">Sélectionnez les services</label>
                            <select onchange="addService(event)" id="service_id" class="border border-gray-400 p-2 w-full rounded-lg outline-none focus:border-[#000E9C] focus:shadow-md">
                                <option value="0" hidden>Sélectionnez un service</option>
                                @foreach($services as $service)
                                    <option id="option-{{ $service->id }}" data-price="{{ $service->price }}" value="{{ $service->id }}">{{ ucfirst($service->name) }}</option>
                                @endforeach
                            </select>

                            <div id="service-buttons" class="mt-2 w-full flex gap-1 flex-wrap">
                                <!-- <button class="transition-all hover:scale-[102%] text-xs text-white bg-[#000E9C] py-2 px-3 rounded-full">Service One</button> -->
                            </div>
                        </div>

                        <!-- <div>
                            <label class="block w-fit text-lg font-black mb-4 border-b-2 border-[#000E9C]" for="prix_service">Prix de Service</label>
                            <input class="border border-gray-400 p-2 w-full rounded-lg outline-none focus:border-[#000E9C] focus:shadow-md" id="prix_service" type="number" step="0.01" name="prix_service"  value="{{ isset($service) ? $service->price : '' }}" />
                        </div> -->

                        <!-- <div>
                            <label for="description" class="block w-fit text-lg font-black mb-4 border-b-2 border-[#000E9C]">Description</label>
                            <textarea rows="4" name="description" id="description"  class="w-full resize-none rounded-md border border-[#a3a3a769] bg-white px-4 py-3 text-base font-medium text-[#000] outline-none focus:border-[#000E9C] focus:shadow-md"></textarea>
                        </div> -->

                        <div>
                            <label class="block w-fit text-lg font-black mb-4 border-b-2 border-[#000E9C]" for="tva">TVA</label>
                            <input oninput="calculateTotalTTC()" class="border border-gray-400 p-2 w-full rounded-lg outline-none focus:border-[#000E9C] focus:shadow-md" id="tva" type="number" step="0.01" name="tva"  />
                        </div>
                        <div>
                            <label for="reduction" class="block w-fit text-lg font-black mb-4 border-b-2 border-[#000E9C]">Réduction</label>
                            <input oninput="calculateTotalTTC()" class="border border-gray-400 p-2 w-full rounded-lg outline-none focus:border-[#000E9C] focus:shadow-md" id="reduction" type="number" step="0.01" name="reduction"  />
                        </div>
                        <div>
                                <label class="block w-fit text-lg font-black mb-4 border-b-2 border-[#000E9C]" for="total_ht">Total HT</label>
                                <input class="border border-gray-400 p-2 w-full rounded-lg outline-none focus:border-[#000E9C] focus:shadow-md" id="total_ht" type="text" name="total_ht" readonly />
                            </div>

                        <div>
                            <label class="block w-fit text-lg font-black mb-4 border-b-2 border-[#000E9C]" for="total_ttc">Total TTC</label>
                            <input class="border border-gray-400 p-2 w-full rounded-lg outline-none focus:border-[#000E9C] focus:shadow-md" id="total_ttc" type="text" name="total_ttc" readonly />
                        </div>


                    </div>
                </div>
                <button type="submit" class="w-full mt-2 bg-[#000E9C] p-2 rounded text-2xl text-white font-bold">SUBMIT</button>
            </form>
        </div>
    </div>
</div>
<script>

    document.getElementById('user').addEventListener('change', function() {
        var selectedUser = this.options[this.selectedIndex];
        var imageSrc = selectedUser.getAttribute('data-image');
        var userName = selectedUser.textContent;
        document.getElementById('user-image').src = imageSrc;
        document.getElementById('user-name').textContent = userName;
        document.getElementById('user-name').classList.add('text-[#403d39]');
        document.getElementById('create-devis-title').textContent = "Créer un devis pour " + userName;

    });



    const calculateTotalTTC = () => {
        var tva = parseFloat(document.getElementById('tva').value) || 0;
        var reduction = parseFloat(document.getElementById('reduction').value) || 0;

        const services = Array.from(document.querySelector('#service-buttons').children)

        let total = 0
        services.map((service) => {
            total += parseFloat(service.dataset.price);
            console.log('here', total, service.dataset.price);
        })

        let totalHT = total - (total * (reduction / 100))
        let totalTTC = totalHT + (totalHT * (tva / 100))


        document.getElementById('total_ht').value = totalHT;
        document.getElementById('total_ttc').value = totalTTC;
    }

    /** BULK ADD */

    const removeSerice = (event) => {
        const serviceID = event.target.dataset.id
        const serviceName = event.target.textContent
        const servicePrice = event.target.dataset.price
        const serviceInput = document.querySelector(`#service-${serviceID}`)

        const createSericeOption = (id, name) => {
            const option = document.createElement('option');
            option.setAttribute('id', `option-${id}`)
            option.setAttribute('value', id)
            option.dataset.price = servicePrice
            option.textContent = name;
            return option;
        }



        document.querySelector('#service_id').appendChild(createSericeOption(serviceID, serviceName))
        event.target.remove()
        serviceInput.remove()
        calculateTotalTTC()
    }

    const addService = (event) => {
        const serviceID = event.target.value
        const serviceOption = document.querySelector(`#option-${event.target.value}`)
        const serviceName = serviceOption.textContent
        const servicePrice = parseFloat(serviceOption.dataset.price)

        const createSericeButton = (id, name) => {
            const button = document.createElement('button');
            button.setAttribute('type', 'button')
            button.setAttribute('class', 'transition-all hover:scale-[102%] text-xs text-white bg-[#000E9C] py-2 px-3 rounded-full')
            button.setAttribute('onclick', 'removeSerice(event)')
            button.dataset.id = id
            button.dataset.price = servicePrice
            button.textContent = name;
            return button;
        }

        const createSericeInput = (id) => {
            const input = document.createElement('input');
            input.setAttribute('type', 'hidden')
            input.setAttribute('id', `service-${id}`)
            input.setAttribute('name', 'services[]')
            input.setAttribute('value', id)
            return input;
        }




        document.querySelector('#services-wrapper').appendChild(createSericeInput(serviceID))
        document.querySelector('#service-buttons').appendChild(createSericeButton(serviceID, serviceName))
        serviceOption.remove()
        calculateTotalTTC()

    }
</script>
