<header class="bg-gradient-to-r from-[#003A8B] to-[#004394]" x-data="{ isOpen: false, isDropdownOpen: false }">
    <div>
        <nav class="mx-auto flex items-center justify-between px-4 py-3" aria-label="Global">
            <div class="flex items-center flex-grow">
                <a href="#" class="-m-1.5 p-1.5">

                    <img class="h-24 mx-auto" src="{{ asset('img/carebridge1.png') }}" alt="logo">
                </a>
            </div>
            <div class="flex lg:hidden">
                <button @click="isOpen = !isOpen" type="button"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-white">
                    <span class="sr-only">Open main menu</span>
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="/homepage"
                    class="text-sm/6 font-semibold text-white hover:bg-[#00367C] p-2 rounded-lg">Home</a>


                <div class="relative">

                    <button type="button" @click="isOpen = !isOpen"
                        class=" hover:bg-[#00367C] p-2 rounded-lg flex items-center gap-x-1 text-sm/6 font-semibold text-white"
                        aria-expanded="false">
                        My Inbox
                        <svg class="size-5 flex-none text-white" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>


                    <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75 transform"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        class="absolute top-full -left-8 z-10 mt-3 w-screen max-w-md overflow-hidden rounded-3xl bg-white ring-1 shadow-lg ring-gray-900/5">
                        <div class="p-4">

                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-gray-50">
                                <div
                                    class="flex size-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">

                                    <svg class="size-6 text-gray-600 group-hover:text-indigo-600" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                        data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="{{ route('track') }}" class="block font-semibold text-gray-900">
                                        Application Status
                                        <span class="absolute inset-0"></span>
                                    </a>
                                    <p class="mt-1 text-gray-600">Track your Application Status</p>
                                </div>
                            </div>



                        </div>
                        <div class="grid grid-cols-2 divide-x divide-gray-900/5 bg-gray-50">
                            <a href="#"
                                class="flex items-center justify-center gap-x-2.5 p-3 text-sm/6 font-semibold text-gray-900 hover:bg-gray-100">
                                <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm6.39-2.908a.75.75 0 0 1 .766.027l3.5 2.25a.75.75 0 0 1 0 1.262l-3.5 2.25A.75.75 0 0 1 8 12.25v-4.5a.75.75 0 0 1 .39-.658Z"
                                        clip-rule="evenodd" />
                                </svg>
                                Watch demo
                            </a>
                            <a href="#"
                                class="flex items-center justify-center gap-x-2.5 p-3 text-sm/6 font-semibold text-gray-900 hover:bg-gray-100">
                                <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M2 3.5A1.5 1.5 0 0 1 3.5 2h1.148a1.5 1.5 0 0 1 1.465 1.175l.716 3.223a1.5 1.5 0 0 1-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 0 0 6.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 0 1 1.767-1.052l3.223.716A1.5 1.5 0 0 1 18 15.352V16.5a1.5 1.5 0 0 1-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 0 1 2.43 8.326 13.019 13.019 0 0 1 2 5V3.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                                Contact sales
                            </a>
                        </div>
                    </div>
                </div>
                <a href="/postprograms"
                    class="text-sm/6 font-semibold text-white hover:bg-[#00367C] p-2 rounded-lg">Find Oppurtunities</a>
                <a href="/profile" class="text-sm/6 font-semibold text-white hover:bg-[#00367C] p-2 rounded-lg">My
                    Account</a>


            </div>
            <div class="hidden lg:flex  p-6 lg:px-8 items-center">
                <button type="button"
                    class="text-white bg-[#1A9AD6] p-2 hover:bg-white hover:text-[#1A9AD6] focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <a href="/login">
                        Log Out -->
                    </a>

                </button>
            </div>
    </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div x-show="isOpen" class="lg:hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div x-show="isOpen" class="fixed inset-0 z-10"></div>
        <div
            class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="#" class="-m-1.5 p-1.5">
                    <img class="h-16 mx-auto" src="{{ asset('img/carebridge.png') }}" alt="logo">
                </a>
                <button @click="isOpen = !isOpen" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div x-show="isOpen" class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                        <div class="-mx-3">
                            <button @click="isDropdownOpen = !isDropdownOpen" type="button"
                                class="flex w-full items-center justify-between rounded-lg py-2 pr-3.5 pl-3 text-base/7 font-semibold text-gray-900 hover:bg-gray-50"
                                aria-controls="disclosure-1" aria-expanded="false">
                                My Inbox

                                <svg :class="{ 'rotate-180': isDropdownOpen }" class="size-5 flex-none"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                            <div :class="{ 'hidden': isDropdownOpen, 'block': !isDropdownOpen }" class="mt-2 space-y-2"
                                id="disclosure-1">
                                <a href="/inbox"
                                    class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">General</a>
                                <a href="/applicationstatus"
                                    class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Application
                                    Status</a>
                                <a href="#"
                                    class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Chat</a>
                                <a href="#"
                                    class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Watch
                                    demo</a>
                                <a href="#"
                                    class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-gray-900 hover:bg-gray-50">Contact
                                    sales</a>
                            </div>
                        </div>
                        <a href="/listing"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Find
                            Oppurtunites</a>
                        <a href="/profile"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">My
                            Account</a>

                    </div>
                    <div class="py-6">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="-mx-3 block w-full text-left rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
