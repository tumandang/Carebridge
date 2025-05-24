<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>EditProgram</title>
</head>
<body>
    <x-headeradmin></x-headeradmin>
    <div class="flex overflow-hidden bg-white pt-16"  x-data="{isDropdownOpen1: false}">
        <x-aside></x-aside>
        <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
            <main>
                <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-6  2xl:col-span-2">
                    <div class="flex items-center justify-between mb-4 border-b-2 border-gray-300">
                        <div class="flex-shrink-0 mb-4 ">
                            <h3 class="text-base font-normal text-gray-500">Manage Program</h3>
                            <span class="text-2xl font-batam sm:text-3xl leading-none font-bold text-gray-800 ">Edit Program</span>
                            
                        </div>
                        
                    </div>
                    
                </div>
                <div class="p-6 bg-white mt-0 ">
                    <form action="{{  route('program.update',['program_id'=> $data->program_id])  }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h1 class="font-alex text-xl font-semibold mb-10">Program ID: {{ $data->program_id }}</h1>
                        <div x-data="{ step: 1 }" class="pt-5 px-8 py-7 bg-white shadow-md rounded-md">
                    
                            <div class="flex justify-between mb-6">
                                <template x-for="s in 4" :key="s">
                                    <div class="flex items-center relative">
                                        <div class="flex items-center rounded-lg p-1" :class="step === s ? 'text-white bg-[#1A9AD6]' : 'text-[#081E42] bg-white'">
                                            <div class="h-8 w-8 flex items-center justify-center rounded-full border" :class="step === s ? 'bg-white text-[#081E42]' : 'bg-[#081E42] text-white'">
                                                <span x-text="s"></span>
                                            </div>
                                            <p class="ml-2" x-text="['Program Overview', 'Schedule & Date', 'Category & Submit','Complete'][s - 1]"></p>
                                            
                                        </div>
                                        <template x-if="s !== 4">
                                            <div class="absolute top-1/2 left-full w-3/4 ml-5 h-[2px] bg-[#081E42] -translate-x-2"></div>
                                        </template>
                                    </div>
                                </template>
                            
                            </div>
                    
                            
                            <div x-show="step === 1" class="space-y-4">
                                
                                <div>
                                    <label for="programname" class="text-sm font-medium text-gray-900 block mb-2">Program
                                        Name</label>
                                    <input type="text" name="programname" id="programname" value="{{ $data->title }}"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        placeholder="Gotong Royong Surau Al Mukhsin">
                                    @error('programname')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                    
                                
                                <div>
                                    <label for="linkgp" class="text-sm font-medium text-gray-900 block mb-2">Link
                                        Group</label>
                                    <input type="text" name="linkgp" id="linkgp" value="{{ $data->linkgroup }}"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        placeholder="https:/wasap242342352/.my">
                                    @error('linkgp')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                    
                               
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="file_input">Poster Program
                                        (Poster must be in image)</label>

                                    <input value="{{ $data->poster }}"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        id="file_input" type="file" name="poster">
                                    @error('poster')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                    
                                
                                <div>
                                    <label for="details" class="text-sm font-medium text-gray-900 block mb-2">Program
                                        Details</label>
                                    <textarea id="details" name="details" rows="6" 
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-4"
                                        placeholder="Details">{{ $data->description }}</textarea>
                                    @error('details')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                    
                           
                            <div x-show="step === 2" class="space-y-4">
                                <div>
                                    <label for="State"
                                    class="text-sm font-medium text-gray-900 block mb-2">State</label>
                                    <input type="hidden" name="address_id" value="{{ $data->Lokasi->id ?? '' }}">
                                    <select name="state" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  block w-full p-2.5" id="state">
                                        <option value="0">Select State</option>
                                        @foreach ($states as $state )
                                           <option value="{{ $state->state }}"
                                            {{ ($data->Lokasi && $data->Lokasi->state == $state->state) ? 'selected' :''  }}>
                                            {{ $state->state }}
                                           </option>
                                        @endforeach
                                    </select>
                                @error('state')
                                    <p class="text-red-600">{{ $message }}</p>
                                @enderror
                                </div>
                                <div>
                                    <label for="address_line"
                                    class="text-sm font-medium text-gray-900 block mb-2">Address</label>
                                <input type="text" name="address_line" id="address_line" value="{{  $data->Lokasi->address_line  }}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  block w-full p-2.5"
                                    placeholder="Surau Al Mukhsin Jalan Selamat 2/4">
                                @error('address_line')
                                    <p class="text-red-600">{{ $message }}</p>
                                @enderror
                                </div>
                    
                                
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="startdate" class="text-sm font-medium text-gray-900 block mb-2">Start
                                            Date</label>
                                        <input type="date" name="startdate" id="startdate"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  block w-full p-2.5"
                                            placeholder="$2300">
                                        @error('startdate')
                                            <p class="text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="enddate" class="text-sm font-medium text-gray-900 block mb-2">End
                                            Date</label>
                                        <input type="date" name="enddate" id="enddate"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  block w-full p-2.5">
                                        @error('enddate')
                                            <p class="text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                    
                               
                                <div>
                                   <label for="deadline"
                                            class="text-sm font-medium text-gray-900 block mb-2">Deadline</label>
                                        <input type="date" name="deadline" id="deadline"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  block w-full p-2.5">
                                        @error('deadline')
                                            <p class="text-red-600">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                    
                            <div x-show="step === 3" class="space-y-4">
                                <!-- Max Volunteer -->
                                <div>
                                    <label for="maxvol" class="text-sm font-medium text-gray-900 block mb-2">Maximum of
                                        Volunteer</label>
                                    <input type="number" name="maxvol" id="maxvol"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  block w-full p-2.5"
                                        placeholder="123">
                                    @error('maxvol')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                    
                                
                                <div>
                                    <label for="status" class="text-sm font-medium text-gray-900 block mb-2">Status
                                        Program</label>
                                    <div class="mb-2 sm:mb-6 flex-1">
                                        <div class="flex gap-10">
                                            <div class="inline-flex items-center">
                                                <label class="relative flex items-center cursor-pointer" for="Opened">
                                                    <input name="status" type="radio" value="International"
                                                        class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-slate-300 checked:border-slate-400 transition-all"
                                                        id="Opened">
                                                    <span
                                                        class="absolute bg-slate-800 w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                                    </span>
                                                </label>
                                                <label class="ml-2 text-slate-600 cursor-pointer text-sm"
                                                    for="Opened">International</label>
                                            </div>

                                            <div class="inline-flex items-center">
                                                <label class="relative flex items-center cursor-pointer" for="Closed">
                                                    <input name="status" type="radio" value="Domestic"
                                                        class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-slate-300 checked:border-slate-400 transition-all"
                                                        id="Closed" checked="">
                                                    <span
                                                        class="absolute bg-slate-800 w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                                    </span>
                                                </label>
                                                <label class="ml-2 text-slate-600 cursor-pointer text-sm"
                                                    for="Closed">Domestic</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    
                             
                                <div class="grid grid-cols-2 gap-2">
                                    <label for="category" class="text-sm font-medium text-gray-900 block mb-2">
                                        Category
                                    </label>
                                    <br>
                                    <div class="flex flex-row gap-x-12">
                                        <div class="flex gap-5 flex-col">
                                            <div class="">
                                                <input type="checkbox"  name="type[]" class=" w-4 h-4 text-blue-700 bg-gray-100 border-gray-300 rounded-sm    focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" id="Community"
                                                value="Community">
                                                <label for="Community" class="cursor-pointer">Community</label>
                                            </div>
                                            
                                            <div class="  ">
                                                <input type="checkbox" name="type[]" class="   w-4 h-4 text-blue-700 bg-gray-100 border-gray-300 rounded-sm    focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"  id="education"
                                                            value="Education">
                                                            <label for="education" class="cursor-pointer ms-2  font-medium text-gray-900">Education</label>
                                            </div>
                                            <div class="">
                                                <input type="checkbox"  name="type[]" class=" w-4 h-4 text-blue-700 bg-gray-100 border-gray-300 rounded-sm    focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" id="child"
                                                value="Children & Youth">
                                                <label for="child" class="cursor-pointer ms-2  font-medium text-gray-900">Children & Youth</label>
                                            </div>
                                            
                                            <div class="  ">
                                                <input type="checkbox" name="type[]" class=" w-4 h-4 text-blue-700 bg-gray-100 border-gray-300 rounded-sm    focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"  id="Faith-Based"
                                                            value="Faith-Based">
                                                            <label for="Faith-Based" class="cursor-pointer ms-2  font-medium text-gray-900">Faith-Based</label>
                                            </div>
                                            
                                        </div>
                                        <div class="flex gap-5  flex-col">
                                            
                                            <div class="">
                                                <input type="checkbox" name="type[]" class=" w-4 h-4 text-blue-700 bg-gray-100 border-gray-300 rounded-sm    focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"  id="envi"
                                                            value="Environment">
                                                        <label for="envi"  class="cursor-pointer ms-2  font-medium text-gray-900 ">Environment</label>
                                            </div>
                                            <div class=" ">
                                                <input type="checkbox" name="type[]" class=" w-4 h-4 text-blue-700 bg-gray-100 border-gray-300 rounded-sm    focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"  id="Etchicity"
                                                            value="Etchicity">
                                                            <label for="Etchicity" class=" cursor-pointer ms-2  font-medium text-gray-900 ">Etchicity</label>
                                            </div>
                                            <div class="">
                                                <input type="checkbox" name="type[]" class=" w-4 h-4 text-blue-700 bg-gray-100 border-gray-300 rounded-sm    focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"  id="Health"
                                                            value="Health & Medecine">
                                                        <label for="Health"  class="cursor-pointer ms-2  font-medium text-gray-900">Health & Medecine</label>
                                            </div>
                                            <div class=" ">
                                                <input type="checkbox" name="type[]" class=" w-4 h-4 text-blue-700 bg-gray-100 border-gray-300 rounded-sm    focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"  id="Crisis"
                                                            value="Crisis Support">
                                                            <label for="Crisis" class=" cursor-pointer ms-2  font-medium text-gray-900 ">Crisis Support</label>
                                            </div>
                                        </div>
                                </div>
                                </div>
                            </div>
                            <div x-show="step === 4">
                                <p class="text-lg">You're almost done! click submit below.</p>
                                <button type="submit" class="w-full px-4 py-2 bg-green-600 text-white rounded mt-4">Submit</button>
                            </div>
                    
                            
                            <div class="mt-6 flex justify-between">
                                <button type="button" @click="step = step - 1" x-show="step > 1"
                                    class="px-4 py-2 bg-red-200 text-black rounded">Back</button>
                                <button type="button" @click="step = step + 1" x-show="step < 4"
                                    class="px-4 py-2 bg-blue-600 text-white rounded">Next</button>
                               
                            </div>
                    
                        </div>
                       
                        
                    </form>
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                </div>
            </main>
        </div>
        
    </div>
</body>
</html>