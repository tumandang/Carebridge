<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>List Program</title>
</head>

<body>
    <x-headeradmin></x-headeradmin>
    <div class="flex overflow-hidden  pt-16" x-data="{ isDropdownOpen1: false }">
        <x-aside></x-aside>
        <div id="main-content" class="h-full w-full bg-gray-50  lg:ml-64">
            <main>
                @if (session('success'))
                    <script>
                        Swal.fire({
                            icon: "Success",
                            title: "Successfull",
                            text: "You do a great job!",
                            footer: 'Belia Harmoni| Wadah Gerakan'
                        });
                    </script>

                @endif
                <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-6  2xl:col-span-2">
                    <div class="flex items-center justify-between mb-4 border-b-2 border-gray-300">
                        <div class="flex-shrink-0 mb-4 ">
                            <h3 class="text-base font-normal text-gray-500">Manage Program</h3>
                            <span class="text-2xl font-batam sm:text-3xl leading-none font-bold text-gray-800 ">List Of
                                Programs</span>

                        </div>

                    </div>

                </div>
                <div class="pt-6 px-4 bg-white">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Program ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Program name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        State
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Start Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        End date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Program Type
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($programs->isEmpty())
                                    <tr>
                                        <td colspan="8" class="text-center py-4 text-gray-500">
                                            No programs found. <a href="{{ route('program.create') }}"
                                                class="text-blue-600 underline">Add one now</a>.
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($programs as $program)
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b  dark:border-gray-700 border-gray-200">
                                            <td scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $program['program_id'] }}
                                            </td>
                                            <td scope="row" class="px-6 py-4 ">
                                                {{ $program['title'] }}
                                            </td>
                                            <td class="px-6 py-4 ">
                                                {{ $program->Lokasi->state }}
                                            </td>
                                            <td class="px-6 py-4 ">
                                                {{ $program['startdate'] }}
                                            </td>
                                            <td class="px-6 py-4 ">
                                                {{ $program['enddate'] }}
                                            </td>
                                            <td class="px-6 py-4 ">
                                                {{ $program['status'] }}
                                            </td>
                                            <td class="px-6 py-4 ">

                                                {{ json_encode($program['type']) }}
                                            </td>
                                            <td class="px-6 py-4 ">
                                                <div class="flex gap-4">
                                                    <a href="{{ url('/listingapplicant', $program['program_id']) }}"
                                                        class="font-medium text-green-600 dark:text-green-500 hover:underline">View</a>
                                                    <a href="{{ route('program.edit', ['program_id' => $program->program_id]) }}"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                    <a data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                                        class="font-medium text-red-600 dark:text-red-500 cursor-pointer hover:underline">Delete</a>


                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                        
                                @endif
                            </tbody>
                        </table>
                        <div id="popup-modal" tabindex="-1"
                            class="hidden fixed inset-0 z-50  justify-center items-center bg-gray-900 bg-opacity-50">
                            <div class="relative p-4 w-full max-w-md max-h-full ">
                                <div class="relative bg-white rounded-lg shadow-sm">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="popup-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <form id="deletemodal" method="POST"
                                            action="">
                                            @csrf
                                            @method('DELETE')
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400"></h3>
                                            <button data-modal-hide="popup-modal" type="Submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="popup-modal" type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                                cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const deleteButtons = document.querySelectorAll("[data-modal-toggle='popup-modal']");
        const modal = document.getElementById("popup-modal");
        const closeButtons = document.querySelectorAll("[data-modal-hide='popup-modal']");
        const modalText = modal.querySelector("h3");
        let deleteprogram = document.getElementById("deletemodal");


        deleteButtons.forEach(button => {
            button.addEventListener("click", (event) => {

                const title = event.target.closest('tr').querySelector('td:nth-child(2)')
                    .textContent; // Nak amik Program Title
                let program_id = event.target.closest('tr').querySelector('td:nth-child(1)')
                    .textContent; // Nak amik Program ID

                modal.classList.remove("hidden");
                modal.classList.add("flex");
                modalText.textContent =
                `Are you sure you want to delete this Program ${title}?`;
                let url = `/programs/delete/${program_id}`;
                deleteprogram.setAttribute("action", url);

            });
        });

        closeButtons.forEach(button => {
            button.addEventListener("click", () => {
                modal.classList.add("hidden");
                modal.classList.remove("flex");
            });
        });
    });
</script>

</html>
