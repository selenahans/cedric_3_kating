<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Cuan Buddy</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'fade-in-up': 'fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1)',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    },
                    fontFamily: {
                        'jakarta': ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .input-field:-webkit-autofill,
        .input-field:-webkit-autofill:hover,
        .input-field:-webkit-autofill:focus,
        .input-field:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px #F8FAFC inset !important;
            -webkit-text-fill-color: #0a2d0a !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        .input-field:focus:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 30px #ffffff inset !important;
        }

        /* Styling Input Custom */
        .input-field {
            width: 100%;
            border: 1.5px solid #E2E8F0;
            border-radius: 0.75rem;
            padding: 1rem 1.25rem;
            font-size: 0.95rem;
            color: #0a2d0a;
            transition: all 0.3s ease;
            background-color: #F8FAFC;
        }

        .input-field:focus {
            outline: none;
            border-color: #34a20d;
            background-color: #ffffff;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .input-field::placeholder {
            color: gray;
        }

        .social-btn {
            position: relative;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            border: 1px solid #E2E8F0;
        }

        .social-btn:hover {
            border-color: #34d399;
            background-color: #F0FDF4;
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.15),
                0 4px 6px -2px rgba(16, 185, 129, 0.1);
        }

        .social-btn:active {
            transform: translateY(-1px);
            box-shadow: 0 5px 10px -3px rgba(16, 185, 129, 0.15);
        }
    </style>
</head>

<body class="bg-[#e6f4ea] text-slate-900 font-jakarta overflow-x-hidden">

    
<div class="min-h-screen flex items-center justify-center bg-[#e6f4ea]">
    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md text-center">

        <h2 class="text-2xl font-bold text-[#308156] mb-4">
            Verifikasi Email
        </h2>

        <p class="text-gray-600 mb-6">
            Kami telah mengirimkan link verifikasi ke email Anda.  
            Silakan cek inbox dan klik link tersebut untuk mengaktifkan akun Anda.
        </p>

        @if (session('message'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit"
                class="w-full bg-[#308156] text-white py-2 rounded-lg hover:bg-[#256b46] transition">
                Kirim Ulang Email Verifikasi
            </button>
        </form>
        <a href="{{ route('register') }}" class="text-sm mt-6 text-[#308156] hover:text-gray-900">Kembali ke halaman registrasi</a>
    </div>
</div>
</body>
</html>
