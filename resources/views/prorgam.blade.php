<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Program</title>
</head>

<body class="bg-[#E3F2FD]">
    <x-navbar></x-navbar>
    <div class="bg-gradient-to-b from-[#004BA9] to-[#0C81B8] relative isolate px-6  lg:px-8  z-0">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
            aria-hidden="true">

        </div>
        <div class="mx-auto flex items-center justify-center gap-x-4  py-32 sm:py-30 ">



            <div class="text-center ">
                <h1 class="text-5xl text-white sm:text-6xl text-left whitespace-nowrap font-bebas ">Explore
                    opportunities to create change—search now!
                </h1>


            </div>
        </div>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
            aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>

    </div>
    <div class="flex w-full">
        <aside class="w-1/4 p-10  flex justify-center">
            <div class="flex flex-col gap-4 p-4 bg-white rounded-lg shadow-md">
                @php
                    $address = urlencode($details->Lokasi->address_line);
                @endphp
                <div class="w-full h-64 rounded-md overflow-hidden border border-gray-300">
                    <iframe width="100%" height="100%" frameborder="0" style="border:0;"
                        src="https://www.google.com/maps?q={{ $address }}&output=embed" allowfullscreen>
                    </iframe>

                </div>
                <p class="text-sm flex justify-center">ADDRESS</p>
                @if ($details->poster)
                    <img src="{{ asset('storage/' . $details->poster) }}" alt=""
                        class="w-full h-auto object-cover rounded-md border border-gray-300">
                @else
                    <img class="w-full h-64 object-cover rounded-md border border-gray-300 "
                        src="{{ asset('img/dummyprogram.png') }}" alt="poster">
                @endif
                <p class="text-sm flex justify-center">Poster Program</p>

            </div>


        </aside>
        <div class="w-3/4 p-10">
            @if (session('error'))
                <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div
                class=" w-full p-6 bg-white border border-black rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-700 space-y-4 mb-8">
                <h1 class="font-bold text-2xl pb-5">{{ $details['title'] }}</h1>
                <div class=" flex items-center justify-between space-x-2">
                    <div class="flex  items-center space-x-2">
                        <img class="w-8 h-8" src="{{ asset('img/maps.gif') }}" alt="maps">
                        <p>{{ $details->Lokasi->address_line }}</p>
                        <img class="w-8 h-8" src="{{ asset('img/enterprise.gif') }}" alt="maps">
                        <p>{{ $details->Cawangan->branch }}</p>

                    </div>

                    @php
                        $isIncomplete = !$vol || !$vol->Fullname || !$vol->Notel || !$vol->Age || !$vol->Gender;
                    @endphp

                    @if ($isIncomplete)
                        <button data-modal-toggle="popup-modal" type="button"
                            class="text-white bg-[#1A9AD6] hover:bg-[#004BA9] focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">

                            Apply Now!
                        </button>
                    @elseif($details->status == 'International')
                        <button data-modal-show="applyModal" type="button"
                            class="text-white bg-[#1A9AD6] hover:bg-[#004BA9] focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                            Apply Now
                        </button>
                    @else
                        <form action="{{ route('program.apply', ['program' => $details->program_id]) }}"
                            method="POST">
                            @csrf
                            <button type="submit"
                                class="text-white bg-[#1A9AD6] hover:bg-[#004BA9] focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Apply
                                Now</button>
                        </form>
                    @endif





                </div>

            </div>


            <div
                class=" w-full p-6 bg-white border border-black rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-700 space-y-4 mb-8">
                <h1 class="font-bold text-l pb-5">MAKLUMAT PROGRAM</h1>
                <div class=" flex items-center justify-between space-x-2">
                    <div class="flex  items-center space-x-2">
                        <div>
                            <div class="flex items-center">
                                <img class="w-8 h-8 m-2" src="{{ asset('img/speedometer.gif') }}" alt="maps">
                                <p>Start Date: {{ $details['startdate'] }}</p>

                                <img class="w-8 h-8 m-2 ml-12" src="{{ asset('img/guidelines.gif') }}" alt="maps">
                                <p>Status Program: {{ $details['status'] }}</p>
                            </div>
                            <div class="flex items-center">
                                <img class="w-8 h-8 m-2" src="{{ asset('img/speedometer.gif') }}" alt="maps">
                                <p>End Date: {{ $details['enddate'] }}</p>

                                <img class="w-8 h-8 m-2 ml-14" src="{{ asset('img/guidelines.gif') }}" alt="maps">
                                <p>Program Type: {{ json_encode($details['type']) }}</p>

                            </div>
                        </div>



                    </div>




                </div>
                <h1 class="font-bold text-l">Description</h1>
                <p class="text-justify">
                    {{ $details['description'] }}
                </p>
            </div>


            <div id="popup-modal" tabindex="-1"
                class="hidden fixed inset-0 z-50  justify-center items-center bg-gray-900 bg-opacity-50">
                <div class="relative p-4 w-full max-w-md max-h-full ">
                    <div class="relative bg-white rounded-lg shadow-sm">
                        <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="popup-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="#0C81B8" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <form id="account" method="GET" action="{{ route('profile.index') }}">
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Your profile is
                                    incomplete!</h3>
                                <p class="mb-4 text-sm text-gray-600">Please complete your volunteer profile before
                                    applying to a program.</p>
                                <button data-modal-hide="popup-modal" type="Submit"
                                    class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Complete My Profile
                                </button>
                                <button data-modal-hide="popup-modal" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                    cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>






            <div id="applyModal" tabindex="-1"
                class="hidden fixed inset-0 z-50  justify-center items-center bg-gray-900 bg-opacity-50">
                <div class="relative p-4 w-full max-w-md max-h-full ">
                    <div class="relative bg-white rounded-lg shadow-sm">
                        <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="applyModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="#0C81B8" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <form action="{{ route('program.apply', ['program' => $details->program_id]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                

                                <div class="modal-body">
                                    <p>Please upload your CGPA result (PDF or Image).</p>

                                   
                                    <div class="form-group">
                                        <label for="cgpa_file">CGPA File (PDF/Image):</label>
                                        <input type="file" name="cgpa_file" accept=".pdf,.jpg,.jpeg,.png"
                                             class=" mt-4 inline-block uppercase text-white shadow-md cursor-pointer bg-blue-500 text-center pt-2 pb-2 pr-4 pl-4  text-xs font-medium rounded-lg" required>
                                    </div>

                            
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="mr-4 py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                        data-modal-hide="applyModal">Close</button>
                                    <button type="submit" class="mt-10 text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">Submit Application</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const applyButton = document.querySelector("[data-modal-toggle='popup-modal']");
        const modal = document.getElementById("popup-modal");
        const closeButtons = document.querySelectorAll("[data-modal-hide='popup-modal']");
        const modalText = modal.querySelector("h3");
        const deleteForm = document.getElementById("account");

        if (applyButton) {
            applyButton.addEventListener("click", function(event) {
                event.preventDefault();
                modal.classList.remove("hidden");
                modal.classList.add("flex");
                modalText.textContent = "Your profile is incomplete!";

            });
        }

        closeButtons.forEach(button => {
            button.addEventListener("click", () => {
                modal.classList.add("hidden");
                modal.classList.remove("flex");
            });
        });
    });





    document.addEventListener('DOMContentLoaded', function() {
        // Show modal
        document.querySelectorAll('[data-modal-show="applyModal"]').forEach(button => {
            button.addEventListener('click', () => {
                const modal = document.getElementById('applyModal');
                if (modal) {
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                }
            });
        });

        // Hide modal
        document.querySelectorAll('[data-modal-hide="applyModal"]').forEach(button => {
            button.addEventListener('click', () => {
                const modal = document.getElementById('applyModal');
                if (modal) {
                    modal.classList.remove('flex');
                    modal.classList.add('hidden');
                }
            });
        });
    });
</script>

</html>
