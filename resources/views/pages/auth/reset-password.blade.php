
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password - {{ config('app.name', 'Klinik') }}</title>

    @fonts

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
</head>

<body class="font-sans bg-white min-h-dvh flex items-center justify-center overflow-x-hidden">

    <div class="relative w-full max-w-[1920px] mx-auto min-h-dvh flex items-center justify-center px-4 py-8">

        <!-- Decorative line art -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-20 hidden lg:block">
            <div class="absolute"
                style="left:calc(-342/1920*100vw);top:calc(138/1024*100vh);width:calc(2822/1920*100vw);height:calc(1071/1024*100vh);transform-origin:top left;">

                <!-- Salin SVG dari halaman login -->

            </div>
        </div>

        <!-- Reset Password Card -->
        <div class="relative bg-white w-full max-w-120 rounded-[20px] border border-info p-8 flex flex-col">

            <!-- Logo -->
            <div class="flex justify-center mb-8">
                <img
                    src="{{ asset('logo-genqi.webp') }}"
                    alt="GenQi"
                    width="143"
                    height="61"
                    class="block">
            </div>

            <!-- Keterangan -->
            <div class="mb-8">
                <p class="text-[20px] font-semibold text-dark font-[Poppins] leading-6 m-0">
                    Reset Password
                </p>

                <p class="text-[16px] text-dark font-[Poppins] leading-6 mt-3">
                    Silahkan masukkan password baru anda dan
                    konfirmasi password untuk mengatur ulang
                    password akun.
                </p>
            </div>

            <!-- Form -->
            <form
                action="{{ route('password.update') }}"
                method="POST"
                id="reset-password-form">

                @csrf

                <!-- Reset Token -->
                <input
                    type="hidden"
                    name="token"
                    value="{{ $token }}">

                <!-- Email -->
                <div class="mb-8">
                    <label
                        for="email"
                        class="text-[18px] font-medium text-dark font-[Poppins] block leading-5.5">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $email ?? '') }}"
                        placeholder="Masukkan Email anda"
                        autocomplete="email"
                        required
                        class="w-full border-0 border-b border-[#CCCCCC] bg-transparent px-0 pt-3 pb-0 text-[16px] leading-5 text-dark font-[Poppins] placeholder:text-[#CCCCCC] outline-none focus:border-info focus:ring-0">

                    @error('email')
                        <span class="block text-destructive text-xs mt-1.5">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Password Baru -->
                <div class="mb-8">
                    <label
                        for="password"
                        class="text-[18px] font-medium text-dark font-[Poppins] block leading-5.5">
                        Password Baru
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan Password Baru"
                        autocomplete="new-password"
                        required
                        class="w-full border-0 border-b border-[#CCCCCC] bg-transparent px-0 pt-3 pb-0 text-[16px] leading-5 text-dark font-[Poppins] placeholder:text-[#CCCCCC] outline-none focus:border-info focus:ring-0">

                    @error('password')
                        <span class="block text-destructive text-xs mt-1.5">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <label
                        for="password_confirmation"
                        class="text-[18px] font-medium text-dark font-[Poppins] block leading-5.5">
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Konfirmasi Password Baru"
                        autocomplete="new-password"
                        required
                        class="w-full border-0 border-b border-[#CCCCCC] bg-transparent px-0 pt-3 pb-0 text-[16px] leading-5 text-dark font-[Poppins] placeholder:text-[#CCCCCC] outline-none focus:border-info focus:ring-0">

                    @error('password_confirmation')
                        <span class="block text-destructive text-xs mt-1.5">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </form>

            <!-- Submit Button -->
            <button
                type="submit"
                form="reset-password-form"
                class="button bg-primary text-primary-foreground border-primary mt-8 text-lg">
                Reset Password
            </button>

            <!-- Back to Login -->
            <div class="flex items-center justify-center gap-2 mt-8">
                <span class="text-[16px] font-medium text-dark font-[Poppins] leading-5">
                    Ingat Password?
                </span>

                <a
                    href="{{ route('login') }}"
                    class="text-[16px] font-medium font-[Poppins] leading-5 text-[#0CABDE] hover:underline no-underline">
                    Kembali ke Login
                </a>
            </div>

        </div>
    </div>

</body>
</html>
