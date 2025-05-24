<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>User Profile</title>
</head>

<body class="bg-[#E3F2FD]   ">
    <x-navbar></x-navbar>
    <div
        class=" font-kanit mx-auto flex items-center justify-center gap-x-4  py-24 sm:py-30 bg-gradient-to-b from-[#004BA9] to-[#0C81B8]  ">



        <div class="text-center  ">
            <h1 class="text-5xl text-white sm:text-6xl text-left whitespace-nowrap font-bebas ">Manage Your Profile Now
                Volunteers!
            </h1>


        </div>
    </div>
    
    <div class=" font-kanit w-full  pt-20 gap-5 px-3 md:px-16 lg:px-28 md:flex-row text-[#161931]">
        <div class="flex justify-center">
        <main class="w-full min-h-screen py-1 md:w-2/3 lg:w-3/4">

            <div
                class="p-4 border mb-4 border-gray-300 bg-white rounded-xl h-20 flex justify-start items-center shadow-lg">
                <ul class="flex flex-row gap-7  text-lg text-gray-400">
                    <li class="bg-[#1D4ED8] rounded-xl p-2 text-white">
                        <a href="">Overview</a>
                    </li>
                    <li class=" rounded-xl p-2 ">
                        <a href="">Program</a>
                    </li>
                </ul>
            </div>
               <form action="{{ route('profile.update') }}"  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-row w-full mb-5">
                    <div class="bg-white w-1/2 mr-2 h-auto rounded-xl shadow-lg  p-4 flex flex-col">
                        <h2 class="mb-5 font-semibold text-xl">Profile picture</h2>
                        <div class="flex justify-between border-b border-gray-300 pb-5 ">
                            <div class="gap-4 flex flex-row ">
                                @if ($vol->Profile)
                                <img src="{{ asset('storage/'. $vol->Profile) }}" alt="" class="w-24 h-24 rounded-md border-gray-400 border-2">
                            @else
                                <img class=" h-24 w-24" src="{{ asset('img/volpic.png') }}" alt="poster">
                            @endif
                                <div class="flex flex-col">

                                    <h1 class="font-bold text-xl">{{ Auth::user()->name }}</h1>
                                    <h3 class="text-gray-500">{{ Auth::user()->email  }}</h3>
                                </div>
                            </div>


                        </div>
                        <div class="flex justify-start mt-auto pt-4">
                            <input
                            class=" hidden"
                            type="file" name="profile" id="profile">
                            <label for="profile" class="inline-block uppercase text-white shadow-md cursor-pointer bg-indigo-700 text-center pt-4 pb-4 pr-8 pl-8  text-xs font-medium rounded-lg">Upload Profile Picture</label>
                        </div>

                    </div>
                    <div class="bg-white w-1/2 h-auto rounded-xl shadow-lg p-4">


                        <div class="grid grid-cols-2 gap-6 border-b border-gray-300 pb-5">

                            <div class="space-y-4">
                                <div>
                                    <label for="full_name" class="block text-sm font-medium text-indigo-900">Full
                                        Name</label>
                                        <input type="text" id="full_name" name="fullname" value="{{ $vol->Fullname }}"
                                        class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                                        placeholder="Your full name" >
                                </div>
                                <div>
                                    <label for="age" class="block text-sm font-medium text-indigo-900">Date Of
                                        Birth</label>
                                    <input type="date" name="age" id="age" 
                                        class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                                         >
                                </div>
                            </div>


                            <div class="space-y-4">
                                <div>
                                    <label for="telephone" class="block text-sm font-medium text-indigo-900">Telephone
                                        Number</label>
                                    <input type="text" name="telephone" id="telephone" value="{{ $vol->Notel }}"
                                        class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                                        placeholder="01129234038" >
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-indigo-900 mb-3">Gender</label>
                                    <div class="flex gap-6">
                                        <div class="inline-flex items-center">
                                            <input name="gender" value="MALE" type="radio" class="peer h-5 w-5 cursor-pointer  rounded-full border border-slate-300 checked:border-slate-400 transition-all" id="male"{{ $vol->Gender === 'Male' ? 'checked':'' }}>
                                            <label class="relative flex items-center cursor-pointer" for="male">
                                                <span class="absolute bg-slate-800 w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></span>
                                                <span class="ml-2 text-slate-600 cursor-pointer text-sm">Male</span>
                                            </label>
                                        </div>
                                
                                        <div class="inline-flex items-center">
                                            <input name="gender" value="FEMALE" type="radio" class="peer h-5 w-5 cursor-pointer  rounded-full border border-slate-300 checked:border-slate-400 transition-all" id="female"{{$vol->Gender === 'Female' ? 'checked':'' }}>
                                            <label class="relative flex items-center cursor-pointer" for="female">
                                                <span class="absolute bg-slate-800 w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></span>
                                                <span class="ml-2 text-slate-600 cursor-pointer text-sm">Female</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end pt-4">
                            @error('fullname')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                            @error('age')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                            @error('telephone')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                            <button type="submit"
                                class="text-white bg-indigo-700  hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Edit</button>
                        </div>
                    </div>

                </div>
                <div class="p-4 border mb-4 border-gray-300 bg-white rounded-xl h-auto flex justify-start items-center shadow-lg">
                    <div class="flex flex-col w-full">
                            @php
                                $selectedSkills = $vol->Skill ? explode(',', $vol->Skill) : [];
                            @endphp
                            <h2 class="text-center mb-5 text-xl font-semibold">Choose Your Skill</h2>
                                <div class="flex flex-row justify-around">
                                    <div class="flex flex-col gap-10 mb-5 ">
                                        <div class="flex item-center cursor-pointer hover:text-blue-400 gap-2 ">
                                            <input type="checkbox" class="peer hidden"  id="Fundraising" value="Fundraising" name="skills[]" {{ in_array('Fundraising', $selectedSkills) ? 'checked' : '' }}>
                                            
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 peer-checked:text-orange-600 transition-colors" >
                                                <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z" clip-rule="evenodd" />
                                            </svg>
                                            
                                            
                                            <label for="Fundraising"  class=" peer-checked:text-orange-600 transition-colors">Fundraising</label>
                                        </div>
                                        <div class="flex item-center cursor-pointer hover:text-blue-400 gap-2 ">
                                            <input type="checkbox" class="peer hidden"  id="Public" value="Public Speaking" name="skills[]"
                                            {{ in_array('Public Speaking', $selectedSkills) ? 'checked' : '' }}>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 peer-checked:text-orange-600 transition-colors">
                                                <path d="M16.881 4.345A23.112 23.112 0 0 1 8.25 6H7.5a5.25 5.25 0 0 0-.88 10.427 21.593 21.593 0 0 0 1.378 3.94c.464 1.004 1.674 1.32 2.582.796l.657-.379c.88-.508 1.165-1.593.772-2.468a17.116 17.116 0 0 1-.628-1.607c1.918.258 3.76.75 5.5 1.446A21.727 21.727 0 0 0 18 11.25c0-2.414-.393-4.735-1.119-6.905ZM18.26 3.74a23.22 23.22 0 0 1 1.24 7.51 23.22 23.22 0 0 1-1.41 7.992.75.75 0 1 0 1.409.516 24.555 24.555 0 0 0 1.415-6.43 2.992 2.992 0 0 0 .836-2.078c0-.807-.319-1.54-.836-2.078a24.65 24.65 0 0 0-1.415-6.43.75.75 0 1 0-1.409.516c.059.16.116.321.17.483Z" />
                                            </svg>
                                            
                                            
                                            <label for="Public"  class=" peer-checked:text-orange-600 transition-colors"> Public Speaking</label>
                                        </div>
                                        <div class="flex items-center cursor-pointer hover:text-blue-400 gap-2">
                                            <input type="checkbox" class="peer hidden"  id="Event-Planning" value="Event Planning" name="skills[]"
                                             {{ in_array('Event Planning', $selectedSkills) ? 'checked' : '' }}>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 peer-checked:text-orange-600 transition-colors">
                                                <path fill-rule="evenodd" d="M2.25 2.25a.75.75 0 0 0 0 1.5H3v10.5a3 3 0 0 0 3 3h1.21l-1.172 3.513a.75.75 0 0 0 1.424.474l.329-.987h8.418l.33.987a.75.75 0 0 0 1.422-.474l-1.17-3.513H18a3 3 0 0 0 3-3V3.75h.75a.75.75 0 0 0 0-1.5H2.25Zm6.54 15h6.42l.5 1.5H8.29l.5-1.5Zm8.085-8.995a.75.75 0 1 0-.75-1.299 12.81 12.81 0 0 0-3.558 3.05L11.03 8.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l2.47-2.47 1.617 1.618a.75.75 0 0 0 1.146-.102 11.312 11.312 0 0 1 3.612-3.321Z" clip-rule="evenodd" />
                                            </svg>
                                            
                                            
                                            
                                            <label for="Event-Planning"  class=" peer-checked:text-orange-600 transition-colors">Event Planning</label>
                                        </div>
                                        
                                        
                                        <div class="flex item-center cursor-pointer hover:text-blue-400 gap-2">
                                            <input type="checkbox" class="peer hidden"  id="Community-Outreach" value="Community Outreach" name="skills[]"
                                             {{ in_array('Community Outreach', $selectedSkills) ? 'checked' : '' }}>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 peer-checked:text-orange-600 transition-colors">
                                                <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z" clip-rule="evenodd" />
                                                <path d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                                            </svg>
                                            
                                                                                        
                                            <label for="Community-Outreach"  class=" peer-checked:text-orange-600 transition-colors">Community Outreach</label>
                                        </div>
                                        <div class="flex item-center cursor-pointer hover:text-blue-400 gap-2">
                                            <input type="checkbox" class="peer hidden"  id="Teaching-Monitorin" value="Teaching and Monitoring" name="skills[]"
                                             {{ in_array('Teaching and Monitoring', $selectedSkills) ? 'checked' : '' }}>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 peer-checked:text-orange-600 transition-colors">
                                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                                            </svg>
                                            
                                            
                                            <label for="Teaching-Monitorin"  class=" peer-checked:text-orange-600 transition-colors">Teaching and Monitoring</label>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-10 mb-5">
                                        <div class="flex item-center cursor-pointer hover:text-blue-400 gap-2">
                                            <input type="checkbox" class="peer hidden"  id="Childcare" value="Childcare" name="skills[]"
                                             {{ in_array('Childcare', $selectedSkills) ? 'checked' : '' }}>
                                            <svg class="w-6 h-6 peer-checked:text-orange-600 transition-colors" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"  fill="currentColor" width="50" height="50" viewBox="0 0 48 48">
                                                <path d="M 37.40625 2.9472656 C 36.373668 2.8853867 35.40325 3.5540469 35.125 4.5917969 C 34.802 5.7967969 35.331688 8.6889688 35.554688 9.7929688 C 35.572688 9.8839687 35.638563 9.9583281 35.726562 9.9863281 C 35.815562 10.014328 35.911516 9.9936875 35.978516 9.9296875 C 36.838516 9.1326875 39.098828 6.9571406 39.423828 5.7441406 C 39.741828 4.5581406 39.035609 3.3375312 37.849609 3.0195312 C 37.701359 2.9797812 37.553762 2.9561055 37.40625 2.9472656 z M 23.921875 5 A 1.50015 1.50015 0 0 0 23.712891 5.0136719 C 14.023668 5.1594392 6.0153821 12.588982 5.1074219 22.193359 C 3.7914219 23.228359 3 24.813 3 26.5 C 3 28.837 4.4839063 30.893922 6.6289062 31.669922 C 9.6719062 38.577922 16.41 43 24 43 C 31.59 43 38.328094 38.577922 41.371094 31.669922 C 43.516094 30.893922 45 28.837 45 26.5 C 45 24.813 44.208578 23.228359 42.892578 22.193359 C 42.798578 21.196359 42.610141 20.230156 42.369141 19.285156 C 41.736141 17.548156 39.051141 18.056797 39.494141 20.091797 C 39.738141 21.064797 39.896125 22.072375 39.953125 23.109375 L 39.998047 23.929688 L 40.714844 24.333984 C 41.519844 24.787984 42 25.598 42 26.5 C 42 27.692 41.150469 28.723172 39.980469 28.951172 L 39.173828 29.107422 L 38.871094 29.871094 C 36.439094 36.023094 30.603 40 24 40 C 17.397 40 11.560906 36.023094 9.1289062 29.871094 L 8.8261719 29.107422 L 8.0195312 28.951172 C 6.8495313 28.723172 6 27.692 6 26.5 C 6 25.598 6.4791563 24.787984 7.2851562 24.333984 L 8.0019531 23.929688 L 8.046875 23.109375 C 8.5118987 14.654127 15.492203 8.0296844 23.947266 8.0019531 C 25.058953 8.0154036 25.921875 8.8844466 25.921875 10 C 25.921875 11.124279 25.046154 12 23.921875 12 C 23.381852 12 22.910038 11.793596 22.548828 11.453125 A 1.5004909 1.5004909 0 0 0 20.490234 13.636719 C 21.383024 14.478248 22.599898 15 23.921875 15 C 26.665596 15 28.921875 12.743721 28.921875 10 C 28.921875 9.5569526 28.844591 9.1347893 28.734375 8.7246094 C 29.571241 8.9862429 30.381191 9.3126474 31.154297 9.7011719 C 32.883297 10.568172 34.599922 8.1659219 32.294922 6.9199219 C 29.782922 5.6959219 26.97 5 24 5 C 23.986172 5 23.972806 5.0019234 23.958984 5.0019531 C 23.946472 5.0018591 23.934408 5 23.921875 5 z M 42.037109 9.0019531 C 41.254234 9.0280781 40.481297 9.3537031 39.904297 9.9707031 C 38.687297 11.271703 37.406719 15.379703 37.011719 16.720703 C 36.985719 16.808703 37.008266 16.905656 37.072266 16.972656 C 37.136266 17.038656 37.231312 17.065969 37.320312 17.042969 C 38.726312 16.679969 43.15 15.460391 44.375 14.150391 C 45.528 12.917391 45.464469 10.978219 44.230469 9.8242188 C 43.613969 9.2477188 42.819984 8.9758281 42.037109 9.0019531 z M 19.5 21 C 17.402 21 15.568536 21.224984 13.791016 22.177734 A 1.5003485 1.5003485 0 1 0 15.208984 24.822266 C 16.431464 24.167016 17.598 24 19.5 24 A 1.50015 1.50015 0 1 0 19.5 21 z M 29.5 21 A 1.50015 1.50015 0 1 0 29.5 24 C 31.402 24 32.568536 24.167016 33.791016 24.822266 A 1.5003485 1.5003485 0 0 0 35.208984 22.177734 C 33.431464 21.224984 31.598 21 29.5 21 z M 25.759766 27.003906 C 25.427516 26.973906 25.089625 27.010234 24.765625 27.115234 C 24.117625 27.326234 23.584063 27.79225 23.289062 28.40625 C 22.575328 29.892834 21.937724 31.221419 21.734375 31.644531 C 20.445716 31.234009 19.309464 30.487367 18.421875 29.498047 A 1.50015 1.50015 0 1 0 16.189453 31.501953 C 18.108294 33.640721 20.901486 35 24 35 C 27.098514 35 29.893555 33.640602 31.810547 31.5 A 1.50015 1.50015 0 0 0 30.730469 28.984375 A 1.50015 1.50015 0 0 0 29.576172 29.5 C 28.992301 30.151978 28.295107 30.691438 27.521484 31.107422 C 27.644703 30.851017 27.661004 30.818769 27.783203 30.564453 C 28.359203 29.365453 27.891703 27.925922 26.720703 27.294922 C 26.720703 27.294922 26.71875 27.292969 26.71875 27.292969 C 26.41875 27.130969 26.092016 27.033906 25.759766 27.003906 z"></path>
                                            </svg>
                                            <label for="Childcare"  class=" peer-checked:text-orange-600 transition-colors">Childcare</label>
                                        </div>
                                        <div class="flex item-center cursor-pointer hover:text-blue-400 gap-2">
                                            <input type="checkbox" class="peer hidden"  id="Photography" value="Photography" name="skills[]"
                                             {{ in_array('Photography', $selectedSkills) ? 'checked' : '' }}>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 peer-checked:text-orange-600 transition-colors">
                                                <path d="M12 9a3.75 3.75 0 1 0 0 7.5A3.75 3.75 0 0 0 12 9Z" />
                                                <path fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 0 1 5.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 0 1-3 3h-15a3 3 0 0 1-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 0 0 1.11-.71l.822-1.315a2.942 2.942 0 0 1 2.332-1.39ZM6.75 12.75a5.25 5.25 0 1 1 10.5 0 5.25 5.25 0 0 1-10.5 0Zm12-1.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                            </svg>
                                            
                                            <label for="Photography"  class=" peer-checked:text-orange-600 transition-colors">Photography</label>
                                        </div>
                                        <div class="flex item-center cursor-pointer hover:text-blue-400 gap-2">
                                            <input type="checkbox" class="peer hidden"  id="Videography" value="Videography" name="skills[]"
                                             {{ in_array('Videography', $selectedSkills) ? 'checked' : '' }}>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 peer-checked:text-orange-600 transition-colors">
                                                <path d="M4.5 4.5a3 3 0 0 0-3 3v9a3 3 0 0 0 3 3h8.25a3 3 0 0 0 3-3v-9a3 3 0 0 0-3-3H4.5ZM19.94 18.75l-2.69-2.69V7.94l2.69-2.69c.944-.945 2.56-.276 2.56 1.06v11.38c0 1.336-1.616 2.005-2.56 1.06Z" />
                                            </svg>
                                            
                                            <label for="Videography"  class=" peer-checked:text-orange-600 transition-colors">Videography</label>
                                        </div>
                                        <div class="flex item-center cursor-pointer hover:text-blue-400 gap-2">
                                            <input type="checkbox" class="peer hidden"  id="Graphic-Design" value="Graphic Design" name="skills[]"
                                             {{ in_array('Graphic Design', $selectedSkills) ? 'checked' : '' }}>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 peer-checked:text-orange-600 transition-colors">
                                                <path fill-rule="evenodd" d="M20.599 1.5c-.376 0-.743.111-1.055.32l-5.08 3.385a18.747 18.747 0 0 0-3.471 2.987 10.04 10.04 0 0 1 4.815 4.815 18.748 18.748 0 0 0 2.987-3.472l3.386-5.079A1.902 1.902 0 0 0 20.599 1.5Zm-8.3 14.025a18.76 18.76 0 0 0 1.896-1.207 8.026 8.026 0 0 0-4.513-4.513A18.75 18.75 0 0 0 8.475 11.7l-.278.5a5.26 5.26 0 0 1 3.601 3.602l.502-.278ZM6.75 13.5A3.75 3.75 0 0 0 3 17.25a1.5 1.5 0 0 1-1.601 1.497.75.75 0 0 0-.7 1.123 5.25 5.25 0 0 0 9.8-2.62 3.75 3.75 0 0 0-3.75-3.75Z" clip-rule="evenodd" />
                                            </svg>
                                            
                                            <label for="Graphic-Design"  class=" peer-checked:text-orange-600 transition-colors">Graphic Design</label>
                                        </div>
                                        <div class="flex item-center cursor-pointer hover:text-blue-400 gap-2">
                                            <input type="checkbox" class="peer hidden"  id="Medical-Healthcare" value="Medical & Healthcare" name="skills[]"
                                             {{ in_array('Medical & Healthcare', $selectedSkills) ? 'checked' : '' }}>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 peer-checked:text-orange-600 transition-colors">
                                                <path fill-rule="evenodd" d="M19.449 8.448 16.388 11a4.52 4.52 0 0 1 0 2.002l3.061 2.55a8.275 8.275 0 0 0 0-7.103ZM15.552 19.45 13 16.388a4.52 4.52 0 0 1-2.002 0l-2.55 3.061a8.275 8.275 0 0 0 7.103 0ZM4.55 15.552 7.612 13a4.52 4.52 0 0 1 0-2.002L4.551 8.45a8.275 8.275 0 0 0 0 7.103ZM8.448 4.55 11 7.612a4.52 4.52 0 0 1 2.002 0l2.55-3.061a8.275 8.275 0 0 0-7.103 0Zm8.657-.86a9.776 9.776 0 0 1 1.79 1.415 9.776 9.776 0 0 1 1.414 1.788 9.764 9.764 0 0 1 0 10.211 9.777 9.777 0 0 1-1.415 1.79 9.777 9.777 0 0 1-1.788 1.414 9.764 9.764 0 0 1-10.212 0 9.776 9.776 0 0 1-1.788-1.415 9.776 9.776 0 0 1-1.415-1.788 9.764 9.764 0 0 1 0-10.212 9.774 9.774 0 0 1 1.415-1.788A9.774 9.774 0 0 1 6.894 3.69a9.764 9.764 0 0 1 10.211 0ZM14.121 9.88a2.985 2.985 0 0 0-1.11-.704 3.015 3.015 0 0 0-2.022 0 2.985 2.985 0 0 0-1.11.704c-.326.325-.56.705-.704 1.11a3.015 3.015 0 0 0 0 2.022c.144.405.378.785.704 1.11.325.326.705.56 1.11.704.652.233 1.37.233 2.022 0a2.985 2.985 0 0 0 1.11-.704c.326-.325.56-.705.704-1.11a3.016 3.016 0 0 0 0-2.022 2.985 2.985 0 0 0-.704-1.11Z" clip-rule="evenodd" />
                                            </svg>                                                            
                                            <label for="Medical-Healthcare"  class=" peer-checked:text-orange-600 transition-colors">Medical & Healthcare</label>
                                        </div>
                                        
                                    </div>
                                    <div class="flex flex-col gap-10 mb-5">
                                        <div class="flex item-center cursor-pointer hover:text-blue-400 gap-2">
                                            <input type="checkbox" class="peer hidden"  id="Animal-Care" value="Animal Care" name="skills[]"
                                             {{ in_array('Animal Care', $selectedSkills) ? 'checked' : '' }}>
                                            <svg class="w-6 h-6 peer-checked:text-orange-600 transition-colors"  fill="currentColor" aria-hidden="true"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M12.006 2a9.847 9.847 0 0 0-6.484 2.44 10.32 10.32 0 0 0-3.393 6.17 10.48 10.48 0 0 0 1.317 6.955 10.045 10.045 0 0 0 5.4 4.418c.504.095.683-.223.683-.494 0-.245-.01-1.052-.014-1.908-2.78.62-3.366-1.21-3.366-1.21a2.711 2.711 0 0 0-1.11-1.5c-.907-.637.07-.621.07-.621.317.044.62.163.885.346.266.183.487.426.647.71.135.253.318.476.538.655a2.079 2.079 0 0 0 2.37.196c.045-.52.27-1.006.635-1.37-2.219-.259-4.554-1.138-4.554-5.07a4.022 4.022 0 0 1 1.031-2.75 3.77 3.77 0 0 1 .096-2.713s.839-.275 2.749 1.05a9.26 9.26 0 0 1 5.004 0c1.906-1.325 2.74-1.05 2.74-1.05.37.858.406 1.828.101 2.713a4.017 4.017 0 0 1 1.029 2.75c0 3.939-2.339 4.805-4.564 5.058a2.471 2.471 0 0 1 .679 1.897c0 1.372-.012 2.477-.012 2.814 0 .272.18.592.687.492a10.05 10.05 0 0 0 5.388-4.421 10.473 10.473 0 0 0 1.313-6.948 10.32 10.32 0 0 0-3.39-6.165A9.847 9.847 0 0 0 12.007 2Z" clip-rule="evenodd"/>
                                            </svg>
                                            <label for="Animal-Care"  class=" peer-checked:text-orange-600 transition-colors">Animal Care</label>
                                        </div>
                                        <div class="flex item-center cursor-pointer hover:text-blue-400 gap-2">
                                            <input type="checkbox" class="peer hidden"  id="Report-Writing" value="Report Writing" name="skills[]"
                                             {{ in_array('Report Writing', $selectedSkills) ? 'checked' : '' }}>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 peer-checked:text-orange-600 transition-colors">
                                                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                            </svg>                        
                                            <label for="Report-Writing"  class=" peer-checked:text-orange-600 transition-colors">Report Writing</label>
                                        </div>
                                        <div class="flex item-center cursor-pointer hover:text-blue-400 gap-2">
                                            <input type="checkbox" class="peer hidden"  id="Content-Writing" value="Content Writing" name="skills[]"
                                             {{ in_array('Content Writing', $selectedSkills) ? 'checked' : '' }}>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 peer-checked:text-orange-600 transition-colors">
                                                <path fill-rule="evenodd" d="M2.25 4.5A.75.75 0 0 1 3 3.75h14.25a.75.75 0 0 1 0 1.5H3a.75.75 0 0 1-.75-.75Zm14.47 3.97a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 1 1-1.06 1.06L18 10.81V21a.75.75 0 0 1-1.5 0V10.81l-2.47 2.47a.75.75 0 1 1-1.06-1.06l3.75-3.75ZM2.25 9A.75.75 0 0 1 3 8.25h9.75a.75.75 0 0 1 0 1.5H3A.75.75 0 0 1 2.25 9Zm0 4.5a.75.75 0 0 1 .75-.75h5.25a.75.75 0 0 1 0 1.5H3a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                                            </svg>
                                            
                                            <label for="Content-Writing"  class=" peer-checked:text-orange-600 transition-colors">Content Writing</label>
                                        </div>
                                        <div class="flex item-center cursor-pointer hover:text-blue-400 gap-2">
                                            <input type="checkbox" class="peer hidden"  id="Marketing" value="Marketing & Branding" name="skills[]"
                                             {{ in_array('Marketing & Branding', $selectedSkills) ? 'checked' : '' }}>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 peer-checked:text-orange-600 transition-colors">
                                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM6.262 6.072a8.25 8.25 0 1 0 10.562-.766 4.5 4.5 0 0 1-1.318 1.357L14.25 7.5l.165.33a.809.809 0 0 1-1.086 1.085l-.604-.302a1.125 1.125 0 0 0-1.298.21l-.132.131c-.439.44-.439 1.152 0 1.591l.296.296c.256.257.622.374.98.314l1.17-.195c.323-.054.654.036.905.245l1.33 1.108c.32.267.46.694.358 1.1a8.7 8.7 0 0 1-2.288 4.04l-.723.724a1.125 1.125 0 0 1-1.298.21l-.153-.076a1.125 1.125 0 0 1-.622-1.006v-1.089c0-.298-.119-.585-.33-.796l-1.347-1.347a1.125 1.125 0 0 1-.21-1.298L9.75 12l-1.64-1.64a6 6 0 0 1-1.676-3.257l-.172-1.03Z" clip-rule="evenodd" />
                                            </svg>
                                            
                                            <label for="Marketing"  class=" peer-checked:text-orange-600 transition-colors">Marketing & Branding</label>
                                        </div>
                                        <div class="flex item-center cursor-pointer hover:text-blue-400 gap-2">
                                            <input type="checkbox" class="peer hidden"  id="Media" value="Social Media Management" name="skills[]"
                                             {{ in_array('Social Media Management', $selectedSkills) ? 'checked' : '' }}>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 peer-checked:text-orange-600 transition-colors">
                                                <path d="M10.5 18.75a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z" />
                                                <path fill-rule="evenodd" d="M8.625.75A3.375 3.375 0 0 0 5.25 4.125v15.75a3.375 3.375 0 0 0 3.375 3.375h6.75a3.375 3.375 0 0 0 3.375-3.375V4.125A3.375 3.375 0 0 0 15.375.75h-6.75ZM7.5 4.125C7.5 3.504 8.004 3 8.625 3H9.75v.375c0 .621.504 1.125 1.125 1.125h2.25c.621 0 1.125-.504 1.125-1.125V3h1.125c.621 0 1.125.504 1.125 1.125v15.75c0 .621-.504 1.125-1.125 1.125h-6.75A1.125 1.125 0 0 1 7.5 19.875V4.125Z" clip-rule="evenodd" />
                                            </svg>                                        
                                            <label for="Media"  class=" peer-checked:text-orange-600 transition-colors">Social Media Management</label>
                                        </div>
                                        
                                        
                                    
                                    </div>
                                     
                                </div>
                                <button type="submit"
                                class="  text-white bg-indigo-700  hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                                Update Your Skills
                            
                            </button>
                            
                        
                    </div>
                </div>
                </form>
        
        </main>
    </div>
        <x-footer></x-footer>
        
    </div>
</body>

</html>
