@include('master.header')
   <!-- sidebar -->
   <div class="hidden md:flex flex-col w-64 bg-[#E5E5E5]">
        <div class="flex items-center justify-center h-25 p-4 bg-white">
            <!-- <span class="text-[#000E9C] font-bold uppercase">Smart Solice</span> -->
            <img class="w-52" src="https://smartsoluce.com/wp-content/uploads/2021/09/logo.png" alt="" srcset="" />
        </div>
        <div class="flex flex-col flex-1 overflow-y-auto">
            <nav class="flex-1 px-2 py-4 bg-white">
            <a href="{{ route('admins.index') }}" class="flex items-center px-4 py-2 text-[#000E9C] hover:bg-[#FCA311] {{ Route::currentRouteName() === 'admins.index' ? 'bg-[#FCA311] text-[#000E9C]' : '' }}">
                <svg class="w-6 h-6 mr-2 {{ Route::currentRouteName() === 'admins.index' ? 'text-[#000E9C]' : '' }}"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>

                <span class="{{ Route::currentRouteName() === 'admins.index' ? 'text-[#000E9C]' : '' }}">Dashboard</span>
            </a>

        <a href="{{ route('clients.create') }}" class="flex items-center px-4 py-2 text-[#000E9C] hover:bg-[#FCA311] {{ Route::currentRouteName() === 'clients.create' ? 'bg-[#FCA311] text-[#000E9C]' : '' }}">
        <svg class="w-6 h-6 mr-2 {{ Route::currentRouteName() === 'clients.create' ? 'text-[#000E9C]' : '' }}" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
            <circle cx="8.5" cy="7" r="4" />
            <line x1="20" y1="8" x2="20" y2="14" />
            <line x1="23" y1="11" x2="17" y2="11" />
        </svg>
        Ajouter client
    </a>

    <a href="{{ route('clients') }}" class="flex items-center px-4 py-2 mt-2 text-[#000E9C] hover:bg-[#FCA311] {{ Route::currentRouteName() === 'clients' ? 'bg-[#FCA311] text-[#000E9C]' : '' }}">
        <svg class="w-6 h-6 mr-2 {{ Route::currentRouteName() === 'clients' ? 'text-[#000E9C]' : '' }}" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
        </svg>
        Les clients
    </a>

                <a
              href="{{route('devis.create')}}"
              class="flex items-center px-4 py-2 mt-2 text-[#000E9C] hover:bg-[#FCA311] {{ Route::currentRouteName() === 'devis.create' ? 'bg-[#FCA311] text-[#000E9C]' : '' }}">
            <svg class="w-6 h-6 mr-2 {{ Route::currentRouteName() === 'devis.create' ? 'text-[#000E9C]' : '' }}""
            xmlns="http://www.w3.org/2000/svg" width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />  <polyline points="14 2 14 8 20 8" />  <line x1="16" y1="13" x2="8" y2="13" />  <line x1="16" y1="17" x2="8" y2="17" />  <polyline points="10 9 9 9 8 9" /></svg>

             Créer devis
            </a>
            <a href="{{ route('devis.all') }}" class="flex items-center px-4 py-2 mt-2 text-[#000E9C] hover:bg-[#FCA311] {{ Route::currentRouteName() === 'devis.all' ? 'bg-[#FCA311] text-[#000E9C]' : '' }}">
                <svg class="w-6 h-6 mr-2 {{ Route::currentRouteName() === 'devis.all' ? 'text-[#000E9C]' : '' }}" fill="#000E9C" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32.001 32.001" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M9.26,6.904h14.687v1.753h1.973V6.346c0-0.781-0.633-1.415-1.415-1.415H8.702c-0.781,0-1.415,0.633-1.415,1.415V27.15 c0,0.681,0.552,1.231,1.232,1.231h3.7V26.41H9.26V6.904z"></path> <path d="M10.938,10.412c0,0.539,0.438,0.984,0.979,0.984h0.303v-1.97h-0.303C11.375,9.426,10.938,9.871,10.938,10.412z"></path> <path d="M10.938,14.521c0,0.539,0.438,0.93,0.979,0.93h0.303V13.59h-0.303C11.375,13.59,10.938,13.98,10.938,14.521z"></path> <path d="M10.938,18.631c0,0.539,0.438,0.986,0.979,0.986h0.303v-1.973h-0.303C11.375,17.645,10.938,18.09,10.938,18.631z"></path> <path d="M10.938,22.686c0,0.539,0.438,0.986,0.979,0.986h0.303v-1.973h-0.303C11.375,21.699,10.938,22.145,10.938,22.686z"></path> <path d="M2.904,1.973h14.685v1.753h1.973V1.415C19.562,0.633,18.927,0,18.146,0H2.163c-0.68,0-1.232,0.552-1.232,1.232v20.987 c0,0.682,0.552,1.232,1.232,1.232h3.701v-1.973h-2.96V1.973z"></path> <path d="M4.583,5.48c0,0.539,0.438,0.986,0.978,0.986h0.304V4.494H5.56C5.021,4.494,4.583,4.939,4.583,5.48z"></path> <path d="M4.583,9.59c0,0.539,0.438,0.932,0.978,0.932h0.304V8.658H5.56C5.021,8.658,4.583,9.049,4.583,9.59z"></path> <path d="M4.583,13.699c0,0.539,0.438,0.986,0.978,0.986h0.304v-1.973H5.56C5.021,12.713,4.583,13.158,4.583,13.699z"></path> <path d="M4.583,17.754c0,0.539,0.438,0.986,0.978,0.986h0.304v-1.973H5.56C5.021,16.768,4.583,17.213,4.583,17.754z"></path> <path d="M26.507,11.279c-0.625-0.626-1.473-0.978-2.357-0.978h-8.873c-0.781,0-1.415,0.633-1.415,1.415v18.87 c0,0.781,0.633,1.415,1.415,1.415h14.376c0.781,0,1.416-0.634,1.416-1.415V17.229c0-0.884-0.351-1.73-0.975-2.354L26.507,11.279z M26.246,13.773v0.006l1.271,1.258l-1.271-0.002V13.773z M29.096,16.992v13.035h-13.26V12.273h8.478l-0.012,3.333 c-0.001,0.366,0.145,0.717,0.4,0.976c0.259,0.259,0.609,0.405,0.976,0.406L29.096,16.992z"></path> <path d="M18.174,16.438h2.711c0.54,0,0.978-0.445,0.978-0.986c0-0.539-0.438-0.984-0.978-0.984h-2.711 c-0.54,0-0.978,0.445-0.978,0.984C17.197,15.992,17.634,16.438,18.174,16.438z"></path> <path d="M26.814,18.191h-8.64c-0.54,0-0.978,0.447-0.978,0.985c0,0.541,0.438,0.986,0.978,0.986h8.64 c0.541,0,0.979-0.445,0.979-0.986C27.792,18.639,27.355,18.191,26.814,18.191z"></path> <path d="M26.814,21.918h-8.64c-0.54,0-0.978,0.447-0.978,0.986s0.438,0.986,0.978,0.986h8.64c0.541,0,0.979-0.447,0.979-0.986 S27.355,21.918,26.814,21.918z"></path> <path d="M26.814,25.645h-8.64c-0.54,0-0.978,0.445-0.978,0.986c0,0.539,0.438,0.984,0.978,0.984h8.64 c0.541,0,0.979-0.445,0.979-0.984C27.792,26.09,27.355,25.645,26.814,25.645z"></path> </g> </g> </g></svg>
                Les devis
            </a>
            <a href="{{ route('service.create') }}" class="flex items-center px-4 py-2 mt-2 text-[#000E9C] hover:bg-[#FCA311] {{ Route::currentRouteName() === 'service.create' ? 'bg-[#FCA311] text-[#000E9C]' : '' }}">
                <svg class="w-6 h-6 mr-2 {{ Route::currentRouteName() === 'service.create' ? 'text-[#000E9C]' : '' }}" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z"/>
                    <circle cx="12" cy="12" r="9" />
                    <line x1="9" y1="12" x2="15" y2="12" />
                    <line x1="12" y1="9" x2="12" y2="15" />
                </svg>
                <span class="{{ Route::currentRouteName() === 'service.create' ? 'text-[#000E9C]' : '' }}">Ajouter service</span>
            </a>
            <a href="{{ route('Services') }}" class="flex items-center px-4 py-2 mt-2 text-[#000E9C] hover:bg-[#FCA311] {{ Route::currentRouteName() === 'Services' ? 'bg-[#FCA311] text-[#000E9C]' : '' }}">
            <svg class="w-6 h-6 mr-2 {{ Route::currentRouteName() === 'Services' ? 'text-[#000E9C]' : '' }}" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>
                <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
            </svg>
            Les services
        </a>

            <a
            href="{{route('logout')}}"
              class="flex items-center px-4 py-2 mt-2 text-[#000E9C]  hover:bg-[#FCA311] hover:text-[#000E9C]"
            >
            <svg class="w-6-6 mr-2"
            xmlns="http://www.w3.org/2000/svg" width="24"  height="24"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />  <path d="M7 12h14l-3 -3m0 6l3 -3" /></svg>
              Se déconnecter
            </a>


            </nav>
        </div>
    </div>
