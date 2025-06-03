<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>HOME</title>
</head>

<body class="bg-[#E3F2FD]">
    <x-navbar></x-navbar>

    <div  class="  relative w-full bg-cover bg-center" style="background-image: url('{{ asset('img/backgroundfyp.png') }}');"> 
        <div class="mx-auto flex items-center justify-center gap-x-4  py-32 sm:py-30 ">

            <img class="w-56 " src="{{ asset('img/BH.png') }}" alt="Logo Belia Harmoni">

            <div class="text-center ">
                <h1 class="text-5xl text-white sm:text-6xl text-left whitespace-nowrap font-bebas ">WELCOME to
                    CareBridge, Volunteer !!!!!</h1>
                <p class=" text-lg font-medium text-pretty text-white sm:text-xl/8 text-left">A Together, we can make a
                    difference join us in creating a positive impact today!.</p>
                <div class="flex justify-center mt-8">
                    <div class="flex w-96 rounded-md  bg-white">
                        
                        

                    </div>
                </div>
            </div>
        </div>
        
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
            aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>

    </div>

    <div
        class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-1 place-items-center md:-mt-20 relative z-10">

        <div
            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

            <img class="w-16 h-16" src="{{ asset('img/enterprise.gif') }}" alt="icon branch">
            <a href="#">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $branchcount }} Branch{{ $branchcount != 1 ? 'es' : '' }}  in
                    Malaysia</h5>
            </a>
            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">We operate {{ $branchcount }} Branch{{ $branchcount != 1 ? 'es' : '' }}nationwide, connecting
                volunteers with local communities to create a meaningful impact.</p>

        </div>


        <div
            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <img class="w-16 h-16" src="{{ asset('img/mission.gif') }}" alt="mission branch">
            <a href="#">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $totalprogram }}
                    Programs</h5>
            </a>
            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Our {{ $totalprogram }} programs have helped communities through
                education, environment, and social initiatives, making a real difference.</p>

        </div>



        <div
            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <img class="w-16 h-16" src="{{ asset('img/progress.gif') }}" alt="icon ongoing">
            <a href="#">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $status }} International Programs
                </h5>
            </a>
            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Join one of our {{ $status }} active programs focused on
                health, disaster relief, and education to create lasting change</p>

        </div>

    </div>

</body>

</html>
