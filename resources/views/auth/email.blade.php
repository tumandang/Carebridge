<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Reset Your Password</title>
</head>
<body class="bg-gradient-to-r from-[#71cdf8] to-[#004BA9] flex items-center justify-center min-h-screen">
    
    <div class="bg-white rounded-2xl p-6 max-w-md shadow-[0_2px_22px_-4px_rgba(93,96,127,0.2)] mx-auto">
        <form action="{{ route('password.email') }}" method="POST" class="space-y-4">
            @csrf
            <div class="mb-5">
                <div class="flex items-center justify-center">
                    <img class="h-32 w-32" src="{{ asset('img/care.png') }}" alt="logo">
                </div>
                <h3 class="text-gray-900 text-2xl font-bold text-center font-alex">Reset Password</h3>
            </div>

            <div>
                    
                    <label class="text-gray-800 text-sm mb-2 block">Email</label>
                    <div class="relative flex items-center">
                      <input name="email" type="email"  class="w-full text-sm text-gray-800 border border-gray-300 pl-4 pr-10 py-3 rounded-lg outline-blue-600" placeholder="Enter email" />
                      <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                      </svg>
                    </div>
                    @error('email')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror


                    @if (@session('status'))
                     <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        {{ session('status') }}
                     </div>
                  
                        
                    @endif
            </div>
            <div class="!mt-8">
                <button type="submit" class="w-full shadow-xl py-2.5 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                    Submit
                </button>
            </div>

            
        </form>
    </div>

</body>
</html>
