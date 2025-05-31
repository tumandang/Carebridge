<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Login to Your Account</title>
</head>
<body class="bg-gradient-to-r from-[#71cdf8] to-[#004BA9]  ">
    <div class="font-[sans-serif]">
        <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4">
          <div class="grid md:grid-cols-2 items-center gap-6 max-w-6xl w-full">
            <div class=" bg-white rounded-2xl p-6 max-w-md shadow-[0_2px_22px_-4px_rgba(93,96,127,0.2)] max-md:mx-auto">
              <form action="{{ route('logmasuk.volunteer') }}" method="POST" class="space-y-4">
                @csrf
                <div class="mb-5 ">
                  <div class="flex items-center justify-center">
                    <img class="h-32 w-32" src="{{ asset('img/care.png') }}" alt="logo">
                  </div>
                    <h3 class="text-gray-900 text-2xl font-bold text-center font-alex">Sign in</h3>
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
                  </div>


                <div>
                  <label class="text-gray-800 text-sm mb-2 block">Password</label>
                  <div class="relative flex items-center">
                    <input name="password" type="password" id="password"  class="w-full text-sm text-gray-800 border border-gray-300 pl-4 pr-10 py-3 rounded-lg outline-blue-600" placeholder="Enter password" />
                    <svg xmlns="http://www.w3.org/2000/svg" id="eyeicon" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4 cursor-pointer" viewBox="0 0 128 128">
                      <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
                    </svg>
                  </div>
                  @error('password')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                  <div class="flex flex-row-reverse mt-2">
               
                  <a href="{{ route('password.request') }}" >Forgot Pasword?</a>
                </div>
                </div>
                
        
  
  
                <div class="!mt-8">
                  <button type="submit" class="w-full shadow-xl py-2.5 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                    Sign in
                  </button>
                </div>
  
                <p class="text-sm !mt-8 text-center text-gray-500">Doesn't have an account <a href="/register" class="text-blue-600 font-semibold hover:underline ml-1 whitespace-nowrap">Register Now</a></p>
              </form>
              @if (session('gagal'))
                  <p class="text-red-600 text-center " >{{ session('gagal') }}</p>
              @endif
            </div>
            <div class="max-md:mt-8">
              <img src="{{  asset('img/reg.png') }}"  alt="Dining Experience" />
            </div>
          </div>
        </div>
      </div>
</body>

<script>
  let eyeicon = document.getElementById("eyeicon");
  let password = document.getElementById("password");

  eyeicon.onclick = function(){
    if(password.type == "password" ){
      password.type = "text";
    }
    else{
      password.type = "password";
    }
  }

</script>
</html>