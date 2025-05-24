<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Inbox Admin</title>
</head>

<body>
    <x-headeradmin></x-headeradmin>
    <div class="flex overflow-hidden bg-white pt-16" x-data="{ isDropdownOpen1: false }">
        <x-aside></x-aside>
        <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
        <div id="main-content" class="min-h-screen w-full bg-gray-50 flex flex-col lg:ml-64">
            <main class="p-10 flex-grow">
                <div class="flex items-center justify-between mb-4 border-b-2 border-gray-300">
                    <div class="flex-shrink-0 mb-4 ">

                        <span class="text-2xl font-batam sm:text-3xl leading-none font-bold text-gray-800 ">Inbox</span>

                    </div>

                </div>


                <ul class="rounded-xl bg-white p-5 shadow-lg">
                    @forelse ($notifications as $notification)
                        <li class="{{ $notification->read_at ? 'bg-gray-100' : 'bg-blue-100' }} p-3 mb-2 rounded">
                            <strong>{{ $notification->data['title'] }}</strong>
                            <p>{{ $notification->data['message'] }}</p>
                            <small>{{ $notification->created_at->diffForHumans() }}</small>
                            <div class="mt-2">
                                @if (is_null($notification->read_at))
                                    <form method="POST"
                                        action="{{ route('notifications.markAsRead', $notification->id) }}">
                                        @csrf
                                        <button class="text-sm text-blue-500 underline" type="submit">Mark as
                                            read</button>
                                    </form>
                                @else
                                    <span class="text-sm text-gray-500">Read</span>
                                @endif
                            </div>
                        </li>
                    @empty
                        <li class="text-gray-500">No notifications yet.</li>
                    @endforelse
                </ul>
            </main>
            <x-footer></x-footer>
        </div>
    </div>
</body>

</html>
