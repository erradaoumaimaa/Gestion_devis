<div class="flex h-screen bg-[#E5E5E5]">
    <!-- sidebar -->
  @include('master.sidebar')

    <div class="flex flex-col flex-1 overflow-y-auto mx-8 bg-[#E5E5E5] p-6">

        <div class="mt-4 w-full flex justify-between">
            <h1 class="text-4xl font-bold pb-8 text-[#000E9C]">Les clients</h1>

            <div class="flex gap-4 h-fit">
                <form method="get" class="flex flex-col md:flex-row md:justify-between gap-3">
                    <div class="flex gap-2">
                        <div class="flex">
                            <input type="text" name="q" placeholder="Rechercher les clients"
                                class="w-full md:w-80 px-3 h-10 rounded-l border-2 border-[#000E9C] bg-white focus:outline-none focus:border-[#000E9C]">
                            <button type="submit" class="bg-[#000E9C] text-white rounded-r px-2 md:px-3 py-0 md:py-1">Search</button>
                        </div>
                    </div>
                </form>


                <div class="flex">
                    <a href="{{ route('clients.create') }}" class="transition-all flex items-center h-10 border-2 border-[#000E9C] focus:outline-none focus:border-[#000E9C] bg-white text-[#000E9C] hover:text-white hover:bg-[#000E9C] hover:text-white rounded-md px-2 md:px-3 py-0 md:py-1 tracking-wider">
                        <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"/>
                            <circle cx="12" cy="12" r="9" />
                            <line x1="9" y1="12" x2="15" y2="12" />
                            <line x1="12" y1="9" x2="12" y2="15" />
                        </svg>
                        <span class="">Ajouter Client</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="w-full mt-6">
            <table class="w-full text-start">
                <thead>
                    <tr>
                        <th class="text-start font-medium text-neutral-700 text-md py-3 w-[40%]">Details du client</th>
                        <th class="text-start font-medium text-neutral-700 text-md py-3">Ice</th>
                        <th class="text-start font-medium text-neutral-700 text-md py-3">Ville</th>
                        <th class="text-start font-medium text-neutral-700 text-md py-3">Devis</th>
                        <th class="font-medium text-neutral-700 text-md py-3">Role</th>
                        <th class="font-medium text-neutral-700 text-md py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr class="h-16 border-b-2 border-gray-200">
                            <td class="flex gap-2 py-3 pl-4 bg-white rounded-l h-full">
                                <div class="w-12 h-12  bg-cover bg-center bg-[url({{ $client->image ? asset('storage/' . $client->image) : 'https://upload.wikimedia.org/wikipedia/commons/5/59/Otto_freundlich%2C_composizione%2C_1911.jpg' }})] rounded-full"></div>
                                <div class="h-12 flex flex-col justify-evenly">
                                    <p class="text-xl font-bold">{{ $client->name }}</p>
                                    <p class="italic text-neutral-700">{{ $client->email }}</p>
                                </div>
                            </td>
                            <td class="py-3 text-lg bg-white h-full">{{ $client->ice }}</td>
                            <td class="py-3 text-lg bg-white h-full">{{ $client->ville }}</td>
                            <td class="py-3 text-lg bg-white h-full">0</td>
                            <td class="py-4 h-full text-lg bg-white">
                                <p class="w-fit h-full mx-auto px-4 py-2 font-semibold {{ $client->role == 'client' ? 'text-green-900 bg-green-100' : 'text-red-900 bg-red-100' }} rounded">{{ ucfirst($client->role) }}</p>
                            </td>
                            <td class="py-4 items-center h-full text-center bg-white rounded-r">
                                <div class="h-full w-full flex items-center justify-center">
                                    @if($client->role != 'admin')
                                        <a href="{{ route('clients.edit', $client->id) }}">
                                            <span class="inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm  py-1">
                                                <svg class="w-6 h-6 mr-1  text-[#03A84E]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" fill="currentColor">  <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>  <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                            </span>
                                        </a>

                                        <form action="{{ route('clients.destroy', $client->id) }}" method="post" class="m-0">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit">
                                                <span class="inline-flex items-center leading-none text-sm">
                                                    <svg class="w-6 h-6 mr-1 text-[#D00000]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" fill="currentColor">  <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                </span>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
