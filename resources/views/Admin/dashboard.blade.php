<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Dashboard</title>
</head>

<body>
    <x-headeradmin></x-headeradmin>
    <div class="flex overflow-hidden bg-white pt-16" x-data="{ isDropdownOpen1: false }">
        <x-aside></x-aside>
        <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
        <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
            <main>
                <div class="pt-6 px-4">
                    <div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
                        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  2xl:col-span-2">

                            <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Program Overview</h3>
                            <div class="block w-full overflow-x-auto">
                                <table class="items-center w-full bg-transparent border-collapse">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                                Top Program</th>
                                            <th
                                                class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                                                Volunteers</th>
                                            <th
                                                class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        @foreach ($topPrograms as $program)
                                            @php
                                                $total = $topPrograms->sum('volunteers_count');
                                                $percent =
                                                    $total > 0 ? round(($program->volunteers_count / $total) * 100) : 0;
                                            @endphp
                                            <tr class="text-gray-500">
                                                <th
                                                    class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                                                    {{ $program->title }}
                                                </th>
                                                <td
                                                    class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                                    {{ $program->volunteers_count }}
                                                </td>
                                                <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                                    <div class="flex items-center">
                                                        <span
                                                            class="mr-2 text-xs font-medium">{{ $percent }}%</span>
                                                        <div class="relative w-full">
                                                            <div class="w-full bg-gray-200 rounded-sm h-2">
                                                                <div class="bg-cyan-600 h-2 rounded-sm"
                                                                    style="width: {{ $percent }}%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                            <div class="mb-4 flex items-center justify-between">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Recent Application</h3>
                                    <span class="text-base font-normal text-gray-500">This is a list of latest
                                        application</span>
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="{{ route('program.index') }}"
                                        class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg p-2">View
                                        all</a>
                                </div>
                            </div>
                            <div class="flex flex-col mt-8">
                                <div class="overflow-x-auto rounded-lg">
                                    <div class="align-middle inline-block min-w-full">
                                        <div class="shadow overflow-hidden sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col"
                                                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Application
                                                        </th>
                                                        <th scope="col"
                                                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Date & Time
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white">
                                                    @foreach ($applications as $app)
                                                        <tr class="{{ $loop->even ? 'bg-gray-50' : '' }}">
                                                            <td
                                                                class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                                Application from <span
                                                                    class="font-semibold">{{ $app->volunteer->Fullname ?? 'N/A' }}</span>
                                                            </td>
                                                            <td
                                                                class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                                                {{ $app->created_at->format('M d, Y') }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $branchcount }}</span>
                                    <h3 class="text-base font-normal text-gray-500">Branch{{ $branchcount != 1 ? 'es' : '' }}</h3>
                                </div>
                                
                            </div>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $totalprogram }}</span>
                                    <h3 class="text-base font-normal text-gray-500">Programs</h3>
                                </div>
                               
                            </div>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $status }}</span>
                                    <h3 class="text-base font-normal text-gray-500">International Program</h3>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    
                </div>
            </main>
            <x-footer></x-footer>
        </div>
    </div>
</body>

</html>
