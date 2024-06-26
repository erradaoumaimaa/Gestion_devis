@include('master.header')
<!-- component -->
<link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.15.1/css/pro.min.css" />

<div class="min-h-screen flex flex-col items-center justify-center bg-no-repeat bg-cover relative items-center bg-[url('{{asset('image/back.jpg')}}')]">
  <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full max-w-md">
    <div class="font-medium self-center text-xl sm:text-2xl uppercase text-[#000E9C]">Connectez-vous</div>
    <div><svg  class="w-16 h-16 m-auto mt-2" height="200px" width="200px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#687F82;" d="M282.524,7.887C205.947,8.327,144.559,71.61,144.559,148.188v36.322h42.053v-36.615 c0-53.25,42.52-97.436,95.768-97.952c53.769-0.52,97.677,43.068,97.677,96.719v75.193c0,11.402,8.866,21.112,20.26,21.517 c11.962,0.425,21.793-9.146,21.793-21.013v-75.696C422.111,69.87,359.417,7.446,282.524,7.887z"></path> <path style="fill:#4ACFD9;" d="M464.164,504.115H102.505V253.897c0-17.419,14.12-31.54,31.54-31.54h298.579 c17.419,0,31.54,14.122,31.54,31.54V504.115z"></path> <g> <path style="fill:#FFD1A9;" d="M359.031,432.624c0-41.805-33.891-75.696-75.696-75.696s-75.696,33.891-75.696,75.696v42.053 h151.392V432.624z"></path> <circle style="fill:#FFD1A9;" cx="283.335" cy="298.053" r="46.259"></circle> </g> <path style="fill:#0295AA;" d="M134.045,222.357c-17.42,0-31.54,14.12-31.54,31.54v250.218h180.83V222.357H134.045z"></path> <g> <path style="fill:#FF8C29;" d="M207.639,432.624v42.053h75.696v-117.75C241.528,356.928,207.639,390.819,207.639,432.624z"></path> <path style="fill:#FF8C29;" d="M237.076,298.053c0,25.548,20.71,46.259,46.259,46.259v-92.517 C257.786,251.795,237.076,272.505,237.076,298.053z"></path> </g> <g> <path style="fill:#FFFFFF;" d="M422.111,390.045c-4.355,0-7.885-3.53-7.885-7.885V277.027c0-4.355,3.53-7.885,7.885-7.885 c4.355,0,7.885,3.53,7.885,7.885V382.16C429.996,386.515,426.466,390.045,422.111,390.045z"></path> <path style="fill:#FFFFFF;" d="M422.111,461.536c-4.355,0-7.885-3.53-7.885-7.885v-42.053c0-4.355,3.53-7.885,7.885-7.885 c4.355,0,7.885,3.53,7.885,7.885v42.053C429.996,458.006,426.466,461.536,422.111,461.536z"></path> </g> <g> <path style="fill:#F0353D;" d="M80.546,191.075h-32.71c-4.355,0-7.885-3.53-7.885-7.885s3.53-7.885,7.885-7.885h32.71 c4.355,0,7.885,3.53,7.885,7.885S84.901,191.075,80.546,191.075z"></path> <path style="fill:#F0353D;" d="M89.678,164.312c-2.018,0-4.036-0.77-5.575-2.31l-20.815-20.815c-3.079-3.079-3.079-8.072,0-11.152 s8.072-3.079,11.15,0l20.815,20.815c3.079,3.079,3.079,8.072,0,11.152C93.714,163.542,91.695,164.312,89.678,164.312z"></path> <path style="fill:#F0353D;" d="M68.651,238.653c-2.018,0-4.036-0.77-5.575-2.31c-3.079-3.079-3.079-8.072,0-11.15l20.815-20.815 c3.079-3.079,8.072-3.079,11.15,0c3.079,3.079,3.079,8.072,0,11.15l-20.815,20.815C72.687,237.883,70.669,238.653,68.651,238.653z"></path> </g> <path d="M432.624,214.472h-2.628v-67.811c0-39.275-15.378-76.194-43.302-103.959C358.977,15.144,322.305,0,283.343,0 c-0.287,0-0.576,0.001-0.864,0.002C202.081,0.464,136.674,66.94,136.674,148.188v36.322c0,4.355,3.53,7.885,7.885,7.885h42.053 c4.355,0,7.885-3.53,7.885-7.885v-36.615c0-49.193,39.459-89.597,87.96-90.067c23.882-0.187,46.361,8.91,63.356,25.741 c16.998,16.835,26.36,39.241,26.36,63.093v67.811H134.045c-21.74,0-39.425,17.686-39.425,39.425v250.218 c0,4.355,3.53,7.885,7.885,7.885h361.659c4.355,0,7.885-3.53,7.885-7.885V253.897C472.049,232.158,454.364,214.472,432.624,214.472z M356.909,72.363c-20.009-19.816-46.504-30.609-74.605-30.305c-57.113,0.554-103.577,48.031-103.577,105.836v28.73h-26.283v-28.437 c0-72.602,58.374-132.003,130.126-132.416c0.259-0.001,0.512-0.002,0.771-0.002c34.765,0,67.497,13.519,92.235,38.115 c24.924,24.782,38.651,57.731,38.651,92.776v67.811h-26.283v-67.811C387.943,118.568,376.921,92.182,356.909,72.363z M456.279,496.23H110.39V253.897c0-13.044,10.611-23.655,23.655-23.655h246.037h42.029h10.513c13.044,0,23.655,10.611,23.655,23.655 V496.23z"></path> <path d="M297.578,350.283c22.964-6.271,39.9-27.304,39.9-52.229c0-29.855-24.289-54.144-54.144-54.144 c-29.855,0-54.144,24.289-54.144,54.144c0,24.925,16.936,45.958,39.9,52.229c-39.322,6.783-69.338,41.112-69.338,82.342v42.053 c0,4.355,3.53,7.885,7.885,7.885h151.392c4.355,0,7.885-3.53,7.885-7.885v-42.053C366.916,391.395,336.9,357.066,297.578,350.283z M244.961,298.053c0-21.159,17.215-38.374,38.374-38.374s38.374,17.215,38.374,38.374c0,21.159-17.215,38.374-38.374,38.374 S244.961,319.213,244.961,298.053z M351.146,466.793H215.524v-34.168c0-37.391,30.42-67.811,67.811-67.811 s67.811,30.42,67.811,67.811V466.793z"></path> </g></svg></div>
    <div class="mt-10">
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="flex flex-col mb-6">
        <label class="block text-[#000E9C] dark:text-[#000E9C] text-sm font-bold mb-2" for="email">
                    Email <span class="text-red-500">*</span>
                </label>
          <div class="relative">
            <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
              <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
              </svg>
            </div>

            <input id="email" type="email" name="email" class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-700 w-full py-2 focus:outline-none focus:border-[#000E9C] " placeholder="E-Mail Address" required autofocus />
          </div>
        </div>
        <div class="flex flex-col mb-6">
        <label class="block text-[#000E9C] dark:text-[#000E9C] text-sm font-bold mb-2" for="password">
                    Password <span class="text-red-500">*</span>
                </label>
          <div class="relative">
            <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
              <span>
                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
              </span>
            </div>

            <input id="password" type="password" name="password" class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-700 w-full py-2 focus:outline-none focus:border-[#000E9C] " placeholder="Password" required />
          </div>
        </div>

        <div class="flex items-center mb-6 -mt-4">
          <div class="flex ml-auto">
            <a href="#" class="inline-flex text-xs sm:text-sm text-[#000E9C] font-bold hover:text-[#000E9C]">Mot de passe oublié ?</a>
          </div>
        </div>

        <div class="flex w-full">
          <button type="submit" class="flex items-center justify-center focus:outline-none text-black font-bold text-sm sm:text-base bg-[#000E9C] hover:bg-[#000E9C] rounded py-2 w-full transition duration-150 ease-in">
            <span class="mr-2 uppercase text-white">Se connecter</span>
            <span>
              <svg class="h-6 w-6 text-white" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </span>
          </button>
        </div>
      </form>
    </div>

  </div>
</div>
