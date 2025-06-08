<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Lisitng Of Applicant</title>
</head>

<body>
    <x-headeradmin></x-headeradmin>
    <div class="flex overflow-hidden bg-white pt-16" x-data="{ isDropdownOpen1: false }">
        <x-aside></x-aside>
        <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
        <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
            <main>
                <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-6  2xl:col-span-2">
                    <div class="flex items-center justify-between mb-4 border-b-2 border-gray-300">
                        <div class="flex-shrink-0 mb-4 ">
                            <h3 class="text-base font-normal text-gray-500">Manage Program</h3>
                            <span class="text-2xl font-batam sm:text-3xl leading-none font-bold text-gray-800 ">List Of
                                Applicant</span>

                        </div>

                    </div>
                    <div class="h-auto p-6 mb-4 bg-white border border-gray-300 rounded-3xl shadow-lg">
                        <h1 class="text-xl font-semibold">Program Details</h1>

                        <p><strong>Program Name:</strong> {{ $applicant->title }}</p>
                        <p><strong>Program ID:</strong> {{ $applicant['program_id'] }}</p>
                        <p><strong>Location:</strong> {{ $applicant->Lokasi->address_line }}</p>

                    </div>
                    @foreach ($applicants as $apply)
                        <div class="h-auto p-6 mb-4 bg-white border border-gray-300 rounded-3xl shadow-lg">

                            <div class="flex justify-between  pb-5 ">
                                <div class="gap-4 flex flex-row ">
                                    <img class=" rounded-lg w-16 h-16" src="{{ asset('storage/' . $apply->volunteer->Profile) }}" alt="avatar">
                                    <div class="flex flex-col">
                                        <h1 class="font-bold text-xl">{{ $apply->volunteer->Fullname }}
                                            ({{ $apply->volunteer->Age }})
                                        </h1>
                                        <h3 class="text-gray-500">{{ $apply->volunteer->user->email }}</h3>
                                    </div>
                                </div>


                            </div>
                            <hr class="my-4">
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div class="flex items-center space-x-2">
                                    <span class="text-gray-600">📞</span>

                                    <span class="font-medium">{{ $apply->volunteer->Notel }}</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="text-gray-600">♂️</span>
                                    <span class="font-medium">{{ $apply->volunteer->Gender }}</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="text-gray-600">🎓</span>
                                    <span class="font-medium">Media</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="text-gray-600">📂</span>
                                    @if ($apply->volunteer->cgpa_file)
                                        <a href="{{ asset('storage/' . $apply->volunteer->cgpa_file) }}"
                                            class="text-blue-500 font-medium hover:underline" target="_blank">CGPA
                                            RESULT</a>
                                    @else
                                        <p class="text-gray-500 italic">This program does not need a CGPA FILE</p>
                                    @endif
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="text-sm flex justify-between">
                                <div class="flex flex-col ">
                                    <p class="font-medium text-gray-700 mb-2">📌 Applied for: <span
                                            class="text-gray-800">{{ $applicant['title'] }}</span></p>

                                    <p class="font-medium text-gray-700">🟡 Status: <span
                                            class="{{ $apply->status == 'Accepted' ? 'text-green-600' : ($apply->status == 'Rejected' ? 'text-red-600' : 'text-yellow-600') }}">
                                            {{ $apply->status }}</span></p>
                                </div>

                                <div class="flex gap-4 items-center">
                                    <form action="{{ route('application.accept', $apply->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="text-black bg-transparent hover:text-white hover:bg-green-600 rounded-xl px-4 py-2 border border-gray-500 h-10">Accept
                                            Volunteer</button>
                                    </form>

                                    <form action="" method="POST">
                                        @csrf
                                        <button type="button"
                                          onclick="openRejectModal({{ $apply->id }})"
                                            class="text-black bg-transparent hover:text-white hover:bg-red-600 rounded-xl px-4 py-2 border border-gray-500 h-10">Reject
                                            Volunteer</button>
                                    </form>

                                    <div id="rejectModal-{{ $apply->id }}"
                                        class="fixed inset-0 z-50 items-center flex justify-center bg-black bg-opacity-50 hidden">
                                        <div class="bg-white rounded-xl p-6 w-96">
                                            <h2 class="text-lg font-semibold mb-4">Rejection Remark</h2>
                                            <form id="rejectForm-{{ $apply->id }}"
                                                action="{{ route('application.reject', $apply->id) }}" method="POST">
                                                @csrf
                                                <textarea name="remark" required placeholder="Enter your reason..." class="w-full border rounded p-2 mb-4">
                                                    
                                                </textarea>
                                                <div class="flex justify-end space-x-2">
                                                    <button type="button"
                                                        onclick="closeRejectModal({{ $apply->id }})"
                                                        class="text-gray-500">Cancel</button>
                                                    <button type="submit"
                                                        class="bg-red-600 text-white px-4 py-2 rounded">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>
            </main>
        </div>
    </div>

</body>

<script>
    function openRejectModal(id) {
        document.getElementById(`rejectModal-${id}`).classList.remove('hidden');
    }

    function closeRejectModal(id) {
        document.getElementById(`rejectModal-${id}`).classList.add('hidden');
    }
</script>

</html>
