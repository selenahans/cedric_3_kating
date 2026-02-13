<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Keuangan - Cuan Buddy</title>

    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'blob': 'blob 7s infinite',
                        'fade-in-up': 'fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1)',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        blob: {
                            "0%": { transform: "translate(0px, 0px) scale(1)" },
                            "33%": { transform: "translate(30px, -50px) scale(1.1)" },
                            "66%": { transform: "translate(-20px, 20px) scale(0.9)" },
                            "100%": { transform: "translate(0px, 0px) scale(1)" },
                        },
                    },
                    colors: {
                        primary: '#308156',
                        primaryHover: '#2a6a47',
                        darkText: '#2F3130',
                    },
                    fontFamily: {
                        'jakarta': ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        .blur-super { filter: blur(80px); }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }

        .input-field {
            width: 100%;
            border: 1.5px solid #E2E8F0;
            border-radius: 1rem;
            padding: 1rem 1rem 1rem 3.5rem;
            font-size: 1rem;
            color: #0a2d0a;
            transition: all 0.3s ease;
            background-color: #F8FAFC; 
            font-weight: 600;
        }
        
        .input-field:focus {
            outline: none;
            border-color: #308156;
            background-color: #ffffff;
            box-shadow: 0 0 0 4px rgba(48, 129, 86, 0.1);
        }

        .input-field::placeholder { color: #94A3B8; font-weight: 400; }

        /* --- DATE SELECTOR GRID STYLE --- */
        .date-option {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: 600;
            color: #475569;
            cursor: pointer;
            transition: all 0.2s ease;
            border: 1px solid transparent;
        }

        .date-option:hover {
            background-color: #dcfce7; /* Emerald 100 */
            color: #166534;
        }

        /* State ketika dipilih */
        .date-option.selected {
            background-color: #308156;
            color: white;
            box-shadow: 0 4px 6px -1px rgba(48, 129, 86, 0.3);
            transform: scale(1.1);
            font-weight: 800;
        }
        
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>

<body class="text-slate-900 font-jakarta overflow-x-hidden relative min-h-screen flex items-center justify-center">

    <div class="fixed inset-0 -z-50 overflow-hidden pointer-events-none bg-slate-50">
        <div class="absolute top-0 left-[-10%] w-[500px] h-[500px] bg-yellow-200/60 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 animate-blob"></div>
        <div class="absolute top-[-10%] right-[-10%] w-[500px] h-[500px] bg-purple-200/60 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 animate-blob" style="animation-delay: 2s"></div>
        <div class="absolute bottom-[-20%] left-[20%] w-[600px] h-[600px] bg-emerald-200/60 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 animate-blob" style="animation-delay: 4s"></div>
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
    </div>

    <div class="w-full max-w-3xl px-6 py-8 relative z-10 animate-fade-in-up">
        
        <a href="{{ url('/onboarding/pet-selection') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-primary transition mb-6 font-semibold group">
            <div class="w-10 h-10 rounded-full bg-white/60 border border-slate-200 flex items-center justify-center group-hover:border-primary group-hover:bg-white transition shadow-sm backdrop-blur-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </div>
            <span class="text-lg">Kembali</span>
        </a>

        <div class="bg-white/70 backdrop-blur-xl border border-white/60 shadow-2xl rounded-[2rem] p-6 lg:p-10">
            
            <div class="text-center mb-8">
                <h1 class="text-3xl lg:text-4xl font-extrabold text-primary mb-3">Profil Keuanganmu</h1>
                <p class="text-darkText leading-relaxed text-lg">
                    Bantu Cuan Buddy memahami kondisi finansialmu.
                </p>
            </div>

            <form action="#" method="POST">
                @csrf 
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    
                    <div class="col-span-1">
                        <label for="salary" class="block text-sm font-bold text-slate-700 mb-2 ml-1">💵 Gaji Bulanan</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-slate-500 font-bold">Rp</span>
                            </div>
                            <input type="text" name="salary" id="salary" placeholder="0" class="input-field format-currency" required>
                        </div>
                    </div>

                    <div class="col-span-1">
                        <label for="expense" class="block text-sm font-bold text-slate-700 mb-2 ml-1">🏠 Pengeluaran Rutin</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-slate-500 font-bold">Rp</span>
                            </div>
                            <input type="text" name="expense" id="expense" placeholder="0" class="input-field format-currency" required>
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label for="savings_target" class="block text-sm font-bold text-primary mb-2 ml-1">🎯 Target Tabungan</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-emerald-600 font-bold">Rp</span>
                            </div>
                            <input type="text" name="savings_target" id="savings_target" placeholder="Contoh: 10.000.000" class="input-field format-currency ring-emerald-500/20" required>
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-3 ml-1">🗓️ Pilih Tanggal Gajian</label>
                        
                        <div class="bg-white/50 border border-slate-200 rounded-2xl p-4">
                            <input type="hidden" name="payday_date" id="payday_date_input" required>
                            
                            <div class="grid grid-cols-7 gap-y-2 justify-items-center mb-4">
                                @for ($i = 1; $i <= 31; $i++)
                                    <div class="date-option" onclick="selectDate(this, '{{ $i }}')">
                                        {{ $i }}
                                    </div>
                                @endfor
                            </div>

                            <div class="border-t border-slate-200 pt-3 flex justify-center">
                                <button type="button" 
                                    class="text-sm font-semibold text-slate-500 hover:text-primary transition py-1 px-3 rounded-lg hover:bg-emerald-50 date-option-text"
                                    onclick="selectDate(this, 'end_of_month')">
                                    📅 Akhir Bulan
                                </button>
                            </div>
                        </div>
                        <p id="selected-text" class="text-sm text-primary font-bold mt-2 ml-1 text-center h-5 opacity-0 transition-opacity">
                            </p>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-primary text-white font-bold py-4 rounded-xl hover:bg-primaryHover transition transform hover:scale-[1.01] shadow-xl shadow-[#a3d18a] flex items-center justify-center gap-2 group text-lg">
                    Selesai & Mulai
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 group-hover:translate-x-1 transition">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>

            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            // 1. FORMAT MATA UANG
            const currencyInputs = document.querySelectorAll('.format-currency');
            currencyInputs.forEach(input => {
                input.addEventListener('input', function(e) {
                    let value = this.value.replace(/[^0-9]/g, '');
                    if (value) {
                        value = parseInt(value).toLocaleString('id-ID');
                    }
                    this.value = value;
                });
            });
        });

        // 2. LOGIKA PILIH TANGGAL (CUSTOM GRID)
        function selectDate(element, value) {
            // Reset semua seleksi
            document.querySelectorAll('.date-option').forEach(el => el.classList.remove('selected'));
            document.querySelectorAll('.date-option-text').forEach(el => {
                el.classList.remove('text-primary', 'font-bold', 'bg-emerald-50');
                el.classList.add('text-slate-500');
            });

            // Set value ke hidden input
            document.getElementById('payday_date_input').value = value;

            // Highlight elemen yang dipilih
            if (value === 'end_of_month') {
                element.classList.remove('text-slate-500');
                element.classList.add('text-primary', 'font-bold', 'bg-emerald-50');
                updateFeedback("Gajian di Akhir Bulan");
            } else {
                element.classList.add('selected');
                updateFeedback("Gajian setiap tanggal " + value);
            }
        }

        function updateFeedback(text) {
            const feedbackEl = document.getElementById('selected-text');
            feedbackEl.textContent = text;
            feedbackEl.classList.remove('opacity-0');
        }
    </script>
</body>
</html>