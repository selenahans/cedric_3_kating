<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Cuan Buddy</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#308156',
                        primaryDark: '#2a6a47',
                    },
                    fontFamily: {
                        jakarta: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                },
            },
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="min-h-screen bg-[#e6f4ea] flex items-center justify-center font-jakarta">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 animate-fade-in-up">

        <!-- Logo -->
        <div class="flex flex-col items-center mb-6">
            <img src="{{ url('images/logo_cuan_buddy.webp') }}" class="w-14 h-14 mb-3">
            <h1 class="text-2xl font-extrabold text-primary">
                Reset Password
            </h1>
            <p class="text-sm text-slate-500 text-center mt-2">
                Buat password baru untuk akun kamu
            </p>
        </div>

        <!-- Error -->
        @if ($errors->any())
            <div class="mb-4 p-4 rounded-xl bg-red-50 text-red-700 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50
                           focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition"
                >
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Password Baru</label>
                <input
                    type="password"
                    name="password"
                    required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50
                           focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition"
                >
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Konfirmasi Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    required
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50
                           focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-primary text-white font-bold py-3 rounded-xl
                       hover:bg-primaryDark transition shadow-lg shadow-emerald-200">
                Reset Password
            </button>
        </form>

        <!-- Back to login -->
        <p class="text-center text-sm text-slate-500 mt-6">
            Sudah ingat password?
            <a href="{{ route('login') }}" class="font-bold text-primary hover:underline">
                Masuk
            </a>
        </p>
    </div>

</body>
</html>
