<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Your Inbox</title>
</head>

<body >
    <x-navbar></x-navbar>
    <div class="flex flex-row bg-gray-200 w-full h-screen" x-data="{ isOpen: true ,isDropdownOpen1: false, isDropdownOpen2: false}">
        <x-sidebar></x-sidebar>
        <div class="flex felx-none flex-row flex-auto bg-[#E3F2FD] rounded-tl-xl border  shadow">

            <div class="flex flex-col w-1/4 border-2 rounded-l-lg  m-4 mr-0 p-4 bg-white border-gray-200 ">
                <div class="flex-none h-16 gap-3 items-center p-4 flex flex-row">
                    
                    <button @click="isOpen = true" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-black">
                        <span class="sr-only">Open main menu</span>
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                      </button>
                    <h1 class="text-xl font-bold">You</h1>

                </div>
                <div class="flex-auto overflow-y-auto">
                    
                    @foreach ($messages as $pesanan)
                        <a href="#" class="block h-32 bg-white border-b ">
                            <div class="border-l-2 h-32 p-2 border-blue-600 hover:bg-gray-100" >
                                <div class="flex m-2 ml-0 gap-1 flex-row item-center">
                                    <div>
                                        <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                        
                                    </div>
                                    <strong class="flex-grow text-lg font-bold text-gray-800">{{ $pesanan['sender'] }}</strong>
                                    <span>{{ $pesanan ['time'] }}</span>
                                    
                                   
                                </div>
                                <div class="flex flex-row">
                                    
                                    <div class="">{{ Str::limit($pesanan ['message'],50) }}</div>
                                    
                                </div>
                                

                            </div>

                        </a>
                    @endforeach
                    {{-- </template> --}}
                </div>
            </div>
            <div class="w-4/5  border-2 rounded-r-lg   flex flex-col m-4 ml-0 p-4 bg-white border-gray-200">
                <div class="flex flex-row justify-between gap-3 border-b-2 pb-4 bg-white">
                    <div >
                        <STRONG>ABDUL SUMBUL</STRONG>
                    </div>
                    <div class="flex flex-row items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                      </svg>
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                      </svg>
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                      </svg>
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                      </svg> 
                    </div>
                </div>
                <div class="flex-auto overflow-y-auto relative" >
                    <img src="{{ asset('img/bgchat.png') }}" alt="background email">
                       
                    <div class="absolute top-0 left-0 p-4 w-full h-full  flex flex-col item-center justify-center">
                        <div class="bg-white shadow-lg rounded-tl-lg font-semibold border-b  w-full h-16 p-4" >
                            SORRY FOR REJECTING YOUR APPLICATION 
                        </div>
                        <div class="bg-white shadow-lg w-full h-32 flex justify-between p-4 ">
                            <div class="flex flex-row gap-3 item-center">
                                
                                <p class="text-sm text-gray-700"><strong>FROM</strong> ABDUL SUMBUL@gmail.com<br>
                                    to me
                                </p>
                            </div>
                            <div class="text-sm">
                                8.30 am | 12/2/25
                            </div>
                        </div>
                        <div class="flex bg-white shadow-lg items-center justify-center h-full">
                            <div class="rounded-lg border-2 shadow-lg border-black w-2/3 h-96">
                                <div class="bg-green-300 h-1/4"></div>
                                <div class="bg-green-500 h-1/2 flex items-center justify-center text-white font-bold text-xl">
                                    <!-- nak generate email nannti -->
                                    <div id="generated-email"></div>
                                </div>
                                <div class="bg-green-800 h-1/4"></div>
                            </div>
                        </div>
                    </div>
                    

                    
                </div>
            </div>
           

        </div>

    </div>
</body>

</html>
