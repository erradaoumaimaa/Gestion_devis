<div class="flex h-screen bg-[#E5E5E5]">
    <!-- sidebar -->
  @include('master.sidebar')
    <!-- Main content -->
    <div class="flex flex-col flex-1 overflow-y-auto ml-8 bg-[#E5E5E5] ">

        <div class="p-4 mt-8">

                <h1 class="text-4xl font-bold pb-8  text-[#000E9C]">Les services</h1>

        </div>

<!-- Search button -->
<form  action="{{ route('Services') }}" method="GET" class="flex flex-col md:flex-row gap-3">
<div class="flex">
    <input type="text" placeholder="Search for the tool you like" name="q"
        class="w-full md:w-80 px-3 h-10 rounded-l border-2 border-[#000E9C] bg-white focus:outline-none focus:border-[#000E9C]">
    <button type="submit" class="bg-[#000E9C] text-white rounded-r px-2 md:px-3 py-0 md:py-1">Search</button>
</div>

<form action="{{ route('Services') }}" method="GET" class="flex items-center ml-4">
    <select id="category" name="category"
        class="w-[11%] h-10 border-2 border-[#000E9C] focus:outline-none focus:border-[#000E9C] text-[#000E9C] bg-white rounded-md px-2 md:px-3 py-0 md:py-1 tracking-wider">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit" class="bg-[#000E9C] text-white rounded px-2 md:px-3 py-0 md:py-1 ml-2">Filtrer</button>
</form>


<div class="ml-auto flex items-center">
                    <a href="{{ route('service.create') }}" class="mt-[-80] mr-8 transition-all flex items-center h-10 border-2 border-[#000E9C] focus:outline-none focus:border-[#000E9C] bg-white text-[#000E9C] hover:text-white hover:bg-[#000E9C] hover:text-white rounded-md px-2 md:px-3 py-0 md:py-1 tracking-wider">
                        <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"/>
                            <circle cx="12" cy="12" r="9" />
                            <line x1="9" y1="12" x2="15" y2="12" />
                            <line x1="12" y1="9" x2="12" y2="15" />
                        </svg>
                        <span class="">Ajouter Service</span>
                    </a>
                </div>
    </form>




<!-- card service -->
<section class="text-[#000E9C] body-font">
    <div class="container px-5 py-5 mx-auto mt-4 ml-2">
        <div class="flex flex-wrap m-4">
            @foreach($services as $service)
            <!--start here-->
            <div class="p-4 md:w-1/3">
                <div class="h-full border-2 border-[#000E9C] bg-white rounded overflow-hidden">
                    <div class="w-full">
                        <div class="w-full flex p-2">
                            <div class="p-2">
                                <img src="https://smartsoluce.com/wp-content/uploads/2021/09/logo.png"
                                    alt="author" class="w-10 h-10 rounded-full overflow-hidden" />
                            </div>
                            <div class="pl-2 pt-2">
                                @auth
                                <p class="font-bold">{{ auth()->user()->name }}</p>
                                @endauth
                                <p class="text-xs">{{$service->created_at->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>


                    <img class="lg:h-48 md:h-36 w-full object-cover object-center"
                        src="{{ asset('storage/' . $service->image) }}" alt="blog cover" />

                    <div class="p-4">

                        <h2 class="tracking-widest text-xs title-font font-bold text-[#000E9C] mb-1 uppercase text-center ">{{ $service->category->name }}</h2>


                        <h1 class="text-lg text-gray-600 mb-3"> {{ $service->name}}</h1>
                        <div class="flex items-center flex-wrap">
    <p class="text-[#000E9C] font-bold md:mb-2 lg:mb-0 inline-flex items-center"> {{ $service->price }} DH</p>

    <span class="inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm py-1 mr-4">
        <a href="{{ route('services.edit', $service->id) }}" class="flex items-center">
            <svg class="w-6 h-6 mr-1 text-[#03A84E]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" fill="currentColor">
                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
            </svg>
        </a>
    </span>

    <span class="inline-flex items-center leading-none text-sm mr-4">
        <svg class="w-6 h-6 mr-1 text-[#000E9C]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
        </svg>
    </span>

        <form action="{{ route('services.delete', $service) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-[#D00000] focus:outline-none">
                <svg class="w-6 h-6 mr-1 mt-4 text-[#D00000]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </button>
        </form>

</div>



                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

    </div>
</div>

