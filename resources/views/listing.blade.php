<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Find Opportunities</title>
</head>

<body class="bg-[#E3F2FD]">
    <x-navbar></x-navbar>
    <div class="relative w-full bg-cover" style="background-image: url('{{ asset('img/backgroundfyp.png') }}');">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
            aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="mx-auto flex items-center justify-center gap-x-4  py-32 sm:py-30 ">



            <div class="text-center ">
                <h1 class="text-5xl text-white sm:text-6xl text-left whitespace-nowrap font-bebas ">Explore
                    opportunities to create change—search now!
                </h1>
                <form action="/postprograms" method="GET">
                    <div class="flex justify-center mt-8">
                        <div class="flex w-96 rounded-md  bg-white">
                            <input type="search" name="search" id="search" placeholder="Find Opportunities"
                                class="w-full border-none bg-transparent px-4 py-1 text-gray-900 outline-none focus:outline-none">
                            <button type="submit"
                                class="rounded-md bg-[#1A9AD6] px-4 py-2 text-white hover:bg-[#004BA9] ">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
            aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>

    </div>
    <div class="flex w-full bg-[#E3F2FD] mt-5">

        <aside class=" sticky top-0 w-1/4 p-4 h-96  flex justify-center">

            <div class=" p-4 flex justify-center  min-h-screen ">
                <div class="relative w-[320px] h-[500px] bg-cover bg-center rounded-lg shadow-lg overflow-hidden" style="background-image: url('{{ asset('img/aside.jpg') }}');">

                    <div class="absolute top-4 left-1/2 transform -translate-x-1/2 text-white text-md z-10 flex flex-row items-center">
                        <img src="{{ asset('img/BH.png') }}" alt="logo" class="w-6 h-6 ">
                       
                        <span class="flex justify-center">Belia Harmoni</span>
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>

                    <div class="absolute bottom-0 p-6 text-white z-10 flex flex-row">
                        <img src="{{ asset('img/BH.png') }}" alt="logo" class="w-28 h-28 ">
                        <h2 class="text-2xl font-bold mb-4">A new way<br>for you to<br>volunteer.</h2>
                        
                       
                    </div>

                    
                </div>
            </div>
            




        </aside>
        <div class="w-1/2 flex flex-col items-center  p-10 ">
            <div class="border-b top-0 border-gray-500 mb-6 w-full max-w-3xl ">
                <h3 class="text-3xl font-bold">Volunteer Opportunities</h3>
                <p>{{ $totalPrograms }} Results</p>

            </div>

            <div class="w-full max-w-3xl">
                @foreach ($programs as $program)
                    {{-- div untuk card --}}
                    <div
                        class="shadow-md p-8 bg-white border border-gray-300 rounded-xl  dark:bg-gray-800 dark:border-gray-700  mb-8">
                        <h1 class="font-bold text-2xl pb-5">{{ $program['title'] }}</h1>
                        <div class="flex items-center justify-between  space-x-2">
                            <div class="flex  items-center space-x-2">
                                <img class="w-8 h-8" src="{{ asset('img/maps.gif') }}" alt="maps">
                                <p>{{ $program->Lokasi->address_line }}</p>
                                <img class="w-8 h-8" src="{{ asset('img/enterprise.gif') }}" alt="maps">
                                <p>{{ $program->Cawangan->universiti }}</p>

                            </div>

                            {{-- <button class="text-white bg-[#1A9AD6]  hover:bg-[#004BA9] focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                            <a href="{{ url('/program', $program['program_id']) }}">View Opportunites --></a>
                            </button> --}}




                        </div>
                        <div class="flex justify-end mt-7 ">

                            @if (!$program->full())
                                <a href="/program/{{ $program->program_id }}"
                                    class=" text-white bg-[#1A9AD6]  hover:bg-[#004BA9] focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">View
                                    Opportunites -->
                                </a>
                            @else
                                <span class="text-red-500 font-semibold">Application Already Closed</span>
                            @endif

                            
                        </div>
                    </div>
                @endforeach
                {{-- end --}}




            </div>


        </div>
        <aside class="sticky top-0 w-1/4 p-4 h-96 " x-data="{ isDropdownOpen1: false }">
            <div class=" p-4 bg-gray-50 rounded-lg mr-5 mb-5 h-96 shadow-lg sticky top-0 items-center border ">
                <form action="/filterprograms" method="GET">
                    <h2 class="text-lg font-semibold">Search Filter</h2>

                    <select name="state"
                        class="shadow-sm mb-5 bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg  block w-full p-2.5"
                        id="state">
                        <option value="0">Select State</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->state }}">{{ $state->state }}</option>
                        @endforeach
                    </select>


                    <button @click="isDropdownOpen1 = !isDropdownOpen1" type="button"
                        class="shadow-sm text-left bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg  block w-full p-2.5">

                        <div class="flex justify-between items-center">
                            Select Program Type
                            <svg :class="{ 'rotate-180': isDropdownOpen1 }" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"
                                class=" size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>

                        </div>

                    </button>
                    <div x-show="isDropdownOpen1"
                        class="absolute bg-white w-[90%]   border border-gray-300 rounded-lg shadow-lg p-3  ">
                        <div class="space-y-2">
                            @php
                                $types = [
                                    'Community',
                                    'Education',
                                    'Children & Youth',
                                    'Faith-Based',
                                    'Environment',
                                    'Etchicity',
                                    'Health & Medecine',
                                    'Crisis Support',
                                ];
                            @endphp

                            @foreach ($types as $type)
                                <div>
                                    <input type="checkbox" name="type[]" id="$type" value="{{ $type }}"
                                        class="w-4 h-4 text-blue-700 bg-gray-100 border-gray-300 rounded-sm">
                                    <label for="$type"
                                        class="ms-2 text-sm text-gray-700">{{ $type }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <label for="startdate">From</label>
                    <input type="date" placeholder="From" name="startdate" id="startdate"
                        class="border border-gray-30 rounded-lg p-2 w-full mb-4" />
                    <label for="enddate">To</label>
                    <input type="date" placeholder="To" id="enddate" name="enddate"
                        class="border border-gray-30 rounded-lg p-2 w-full mb-4" />

                    <button type="submit"
                        class="text-white mb-4 bg-[#1A9AD6] hover:bg-[#004BA9] focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full px-5 py-2.5">
                        Apply Filter
                    </button>
                </form>

            </div>
        </aside>
    </div>

</body>
<script></script>

</html>
