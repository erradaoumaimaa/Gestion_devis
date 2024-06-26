@include('master.header')
<div class="flex h-screen bg-[#E5E5E5]">
    <!-- sidebar -->
  @include('master.sidebar')

    <div class="flex flex-col flex-1 overflow-y-auto mx-8 bg-[#E5E5E5] p-6">

        <div class="mt-4 w-full flex justify-between">
            <h1 class="text-4xl font-bold pb-8 text-[#000E9C]">Les devis</h1>

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
                    <a href="{{ route('devis.create') }}" class="transition-all flex items-center h-10 border-2 border-[#000E9C] focus:outline-none focus:border-[#000E9C] bg-white text-[#000E9C] hover:text-white hover:bg-[#000E9C] hover:text-white rounded-md px-2 md:px-3 py-0 md:py-1 tracking-wider">
                        <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"/>
                            <circle cx="12" cy="12" r="9" />
                            <line x1="9" y1="12" x2="15" y2="12" />
                            <line x1="12" y1="9" x2="12" y2="15" />
                        </svg>
                        <span class="">Ajouter Devis</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="w-full mt-6">
            <table class="w-full text-start">
                <thead>
                    <tr>
                        <th class="text-start font-medium text-neutral-700 text-md py-3">Client</th>
                        <th class="text-start font-medium text-neutral-700 text-md py-3">Services</th>
                        <th class="text-start font-medium text-neutral-700 text-md py-3">Reduction</th>
                        <th class="text-start font-medium text-neutral-700 text-md py-3">Total TTC</th>
                        <th class="text-start font-medium text-neutral-700 text-md py-3">Total HT</th>
                        <th class="font-medium text-neutral-700 text-md py-3">Status</th>
                        <th class="font-medium text-neutral-700 text-md py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($devis as $item)
                        <tr class="h-16 border-b-2 border-gray-200">
                            <td class="flex gap-2 py-3 pl-4 bg-white rounded-l h-full">
                                <div class="w-12 h-12  bg-cover bg-center bg-[url({{ $item->user->image ? asset('storage/' . $item->user->image) : 'https://upload.wikimedia.org/wikipedia/commons/5/59/Otto_freundlich%2C_composizione%2C_1911.jpg' }})] rounded-full"></div>
                                <div class="h-12 flex flex-col justify-evenly">
                                    <p class="text-xl font-bold">{{ $item->user->name }}</p>
                                    <p class="italic text-neutral-700">{{ $item->user->email }}</p>
                                </div>
                            </td>
                            <td class="py-3 text-lg bg-white h-full">
                                <div class="h-full flex flex-wrap justify-start items-center gap-5">
                                    @foreach ($item->services as $service)
                                        <div class="h-full flex flex-col justify-evenly">
                                            <p class="text-md px-1 border-b-2 border-r-2 border-solid border-[#000E9C] rounded-br">{{ $service->name }}</p>
                                            <p class="text-xs italic text-neutral-700">{{ $service->price  }} MAD</p>
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                            <td class="py-3 text-lg bg-white h-full">{{ $item->reduction }}%</td>
                            <td class="py-3 text-lg bg-white h-full">{{ $item->total_ttc }} MAD</td>
                            <td class="py-3 text-lg bg-white h-full">{{ $item->total_ht }} MAD</td>
                            <td class="py-4 h-full text-lg bg-white">
                                <p class="w-fit h-full mx-auto px-4 py-2 font-semibold {{ $item->status == 'approved' ? 'text-green-900 bg-green-100' : 'text-red-900 bg-red-100' }} rounded">{{ ucfirst($item->status) }}</p>
                            </td>
                            <td class="py-4 items-center h-full text-center bg-white rounded-r">
                                <div class="h-full w-full flex items-center justify-center">
                                    <a href="{{ route('devis.show', $item->id) }}">
                                        <span class="inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm  py-1">
                                            <svg class="w-6 h-6 mr-1  text-[#03A84E]" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .linesandangles_een{fill:#111918;} </style> <path class="linesandangles_een" d="M25,9V3H7v6H4v12h3v9h18v-9h3V9H25z M9,5h14v4H9V5z M23,28H9v-9h14V28z M26,19h-1v-2H7v2H6v-8 h20V19z M8,12h2v2H8V12z M11,12h2v2h-2V12z M21,23H11v-2h10V23z M21,26H11v-2h10V26z"></path> </g></svg>
                                        </span>
                                    </a>

                                    @if($item->status != 'approved')
                                        <form action="{{ route('devis.approve', $item->id) }}" method="post" class="m-0">
                                            @csrf
                                            @method('PUT')

                                            <button type="submit">
                                                <span class="inline-flex items-center leading-none text-sm">
                                                <svg class="w-6 h-6 mr-1  text-[#03A84E]" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M866.133333 258.133333L362.666667 761.6l-204.8-204.8L98.133333 618.666667 362.666667 881.066667l563.2-563.2z" fill="#43A047"></path></g></svg>                                            </span>
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ route('facture.show', $item->facture->id) }}">
                                            <span class="inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm  py-1">
                                            <svg class="w-6 h-6 mr-1" fill="#fb8500" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M5.44 7.47h5.26v1.25H5.44zm0 2.36h5.26v1.25H5.44zm0-4.76h5.26v1.25H5.44z"></path><path d="M11.34 1 9.64.28 8.08 1 6.41.28 4.84 1 2.46 0v16l2.38-1 1.57.69L8.08 15l1.56.69 1.7-.69 2.2 1V0zm.94 13.11-.92-.41-1.69.69-1.57-.72-1.68.69-1.55-.69-1.15.47V1.86l1.15.47 1.55-.69 1.68.69 1.57-.69 1.69.69.92-.41z"></path></g></svg>                                            </span>
                                        </a>
                                    @endif

                                    <form action="{{ route('devis.destroy', $item->id) }}" method="post" class="m-0">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit">
                                            <span class="inline-flex items-center leading-none text-sm">
                                                <svg class="w-6 h-6 mr-1 text-[#D00000]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" fill="currentColor">  <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
