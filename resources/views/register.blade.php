<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Create Your Account</title>
</head>
<body class="bg-gradient-to-r from-[#71cdf8] to-[#004BA9]  ">
  <img src="{{ asset('img/Tasbeh.JPG') }}" alt="banner"  class="w-full h-full object-cover absolute mix-blend-overlay opacity-10 pointer-events-none">>
    <div class="font-[sans-serif]">
        <div class="min-h-screen flex items-center justify-center py-6 px-4">
          <div class=" items-center gap-6  w-1/4  sm:w-2/3 md:w-1/2 lg:w-1/3 xl:w-1/4">
            <div class=" bg-white rounded-2xl p-6  shadow-[0_2px_22px_-4px_rgba(93,96,127,0.2)] ">
              <form action="{{ route('store.volunteer') }}" method="POST" class="space-y-4">
                @csrf
                <div class="mb-5 ">
                  <div class="flex items-center justify-center">
                    <img class="h-24 w-24" src="{{ asset('img/care.png') }}" alt="logo">
                  </div>
                    <h3 class="text-gray-900 text-2xl font-bold text-center font-alex">Sign up</h3>
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
                  <label class="text-gray-800 text-sm mb-2 block">Username</label>
                  <div class="relative flex items-center">
                    <input name="name" type="text"  class="w-full text-sm text-gray-800 border border-gray-300 pl-4 pr-10 py-3 rounded-lg outline-blue-600" placeholder="Enter username" />
                    
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                      <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                      <path d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z" data-original="#000000"></path>
                    </svg>
                  </div>
                  @error('name')
                    
                        <p class="text-red-600">{{ $message }}</p>
                      @enderror
                </div>

                <div>
                  <label class="text-gray-800 text-sm mb-2 block">Password</label>
                  <div class="relative flex items-center">
                    <input name="password" type="password" id="password"  class="w-full text-sm text-gray-800 border border-gray-300 pl-4 pr-10 py-3 rounded-lg outline-blue-600" placeholder="Enter password" />
                  
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" id="eyeicon" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4 cursor-pointer" viewBox="0 0 128 128">
                      <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
                    </svg>
                  </div>
                    @error('password')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-800 text-sm mb-2 block"> Confirm Password</label>
                    <div class="relative flex items-center">
                      <input name="password_confirmation" type="password" id="confirmpass"  class="w-full text-sm text-gray-800 border border-gray-300 pl-4 pr-10 py-3 rounded-lg outline-blue-600" placeholder="Re-Enter password" />
                     
                      <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" id="eyeicon1" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4 cursor-pointer " viewBox="0 0 128 128">
                        <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
                      </svg>
                    </div>
                     @error('password')
                        <p class="text-red-600">{{ $message }}</p>
                      @enderror
                </div>
  
  
                <div class="!mt-8">
                  <button type="submit" class="w-full shadow-xl py-2.5 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                    Create
                  </button>
                </div>
  
                <p class="text-sm !mt-8 text-center text-gray-500">Already have an account <a href="/login" class="text-blue-600 font-semibold hover:underline ml-1 whitespace-nowrap">Login Now</a></p>
              </form>
            </div>
            
          </div>
        </div>
      </div>
</body>
<script>
  let eyeicon = document.getElementById("eyeicon");
  let password = document.getElementById("password");
  let eyeicon1 = document.getElementById("eyeicon1");
  let password1 = document.getElementById("confirmpass");


  eyeicon.onclick = function(){
    if(password.type == "password" ){
      password.type = "text";
    }
    else{
      password.type = "password";
    }
  }

   eyeicon1.onclick = function(){
    if(password1.type == "password" ){
      password1.type = "text";
    }
    else{
      password1.type = "password";
    }
  }

</script>
</html>