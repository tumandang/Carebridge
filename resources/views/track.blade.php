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

<body class="bg-[#E3F2FD]">
    <x-navbar></x-navbar>
    <div class="mb-10 font-kanit flex items-center justify-center gap-x-4   py-32 sm:py-44 bg-gradient-to-b h-full from-[#004BA9] to-[#0C81B8] relative w-full">
 
        <img src="{{ asset('img/Tasbeh.JPG') }}" alt="banner" class="w-full h-full object-cover absolute mix-blend-overlay opacity-10">


        <div class="text-center">
            <h1 class="text-5xl text-white sm:text-6xl text-left whitespace-nowrap font-bebas "> TRACK YOUR APPLICATION
            </h1>
        </div>
    </div>
    <div class="flex  flex-row w-full h-screen" x-data="{ isOpen: true, isDropdownOpen1: false, isDropdownOpen2: false }">

        <div class="flex felx-none flex-row flex-auto  gap-3 rounded-tl-xl   shadow">

            <div class="flex flex-col w-3/5  shadow rounded-lg m-4  bg-white p-4">
                <div class="flex-none h-16 gap-3 items-center bg-white p-4 flex flex-row">


                    <h1 class="text-xl font-bold">Application Status</h1>
                </div>
                <div class="flex-auto overflow-y-auto ">

                    @foreach ($application as $mohon)
                        {{-- <div class="border-l-2 h-32 p-2 border-blue-600 hover:bg-gray-100" >
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
                                

                            </div> --}}

                        <div class="border-l-2 h-32 p-2 border-blue-600 hover:bg-gray-100">


                            <strong> Program: {{ $mohon->program->title ?? 'Unknown Program' }} </strong> <br>

                            Status: {{ ucfirst($mohon->status) }} <br>

                            <a href="{{ route('track.view', $mohon->id) }}" class="text-blue-500 underline">View
                                Status
                            </a>

                        </div>
                    @endforeach

                </div>
            </div>
            <div class="w-2/5  border-l  bg-white shadow rounded-lg  flex flex-col m-4 ml-0 p-4 ">
                <div class="flex flex-row justify-between gap-3 border-b-2 pb-4 bg-white">
                    <div>
                        <STRONG>Belia Harmoni</STRONG>
                    </div>

                </div>
                <div class="flex-auto overflow-y-auto relative  flex justify-center items-center">
                    <img class="absolute w-full h-full object-cover" src="{{ asset('img/bgchat.png') }}"
                        alt="background email">

                    <div class="absolute  mt-6 grow sm:mt-8 lg:mt-0 flex justify-center items-center ">
                        <div
                            class="space-y-6 rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <h3 class="text-xl font-semibold text-gray-900 ">
                                {{ $selectedApplication->program->title ?? 'No Program Selected' }}</h3>
                            @php
                                $status = strtolower($selectedApplication->status ?? '');
                            @endphp

                            <ol class="relative ms-5 border-s-2 border-gray-200 dark:border-gray-700 ">
                                @if ($status === 'pending' || $status === 'accepted' )
                                    <li class="mb-10 ms-6">
                                        <span class="timeline-icon">📨</span>
                                        <h4 class="text-base font-semibold">Pending (Application Submitted)</h4>
                                        <p class="text-sm text-gray-500">Your application has been submitted and is
                                            awaiting review.</p>
                                    </li>
                                @endif

                                @if ($status === 'accepted')
                                    <li class="mb-10 ms-6">
                                        <span class="timeline-icon">✅</span>
                                        <h4 class="text-base font-semibold">Approved</h4>
                                        <p class="text-sm text-gray-500">Congratulations! Your application has been
                                            approved.</p>
                                    </li>
                                @endif

                                @if ($status === 'reject')
                                    <li class="mb-10 ms-6">
                                        <span class="timeline-icon">❌</span>
                                        <h4 class="text-base font-semibold">Rejected</h4>
                                        <p class="text-sm text-gray-500">Unfortunately, your application was not
                                            approved.</p>
                                    </li>
                                @endif
                            </ol>

                           
                        </div>
                    </div>



                </div>
            </div>


        </div>

    </div>
    <x-footer></x-footer>
</body>

</html>
