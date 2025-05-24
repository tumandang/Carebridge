<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Email Verification</title>
</head>
<body class="bg-gradient-to-r from-[#71cdf8] to-[#004BA9] flex items-center justify-center min-h-screen">
    
    <div class="text-center mt-10 bg-white p-10 rounded-lg">
        <h2 class="text-2xl font-bold">Verify Your Email Address</h2>
        <p class="mt-4">We’ve sent an email to your inbox. Please check and click the verification link.</p>

        @if (session('resent'))
            <p class="text-green-500 mt-4">A fresh verification link has been sent to your email address.</p>
        @endif

        <form method="POST" action="{{ route('verification.resend') }}" class="mt-6">
            @csrf
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">
                Resend Verification Email
            </button>
        </form>
    </div>

</body>
</html>
