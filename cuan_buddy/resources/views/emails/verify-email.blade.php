<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Email</title>
</head>
<body style="background:#e6f4ea; font-family: Arial, sans-serif; padding:40px;">
    
    <div style="max-width:500px; margin:auto; background:white; padding:30px; border-radius:10px;">
        
        <h2 style="color:#308156; text-align:center;">
            Verifikasi Email Anda
        </h2>

        <p>Halo {{ $user->name }},</p>

        <p>
            Terima kasih telah mendaftar.  
            Silakan klik tombol di bawah ini untuk memverifikasi email Anda:
        </p>

        <div style="text-align:center; margin:30px 0;">
            <a href="{{ $url }}"
               style="background:#308156; color:white; padding:12px 25px; text-decoration:none; border-radius:6px; display:inline-block;">
                Verifikasi Sekarang
            </a>
        </div>

        <p style="font-size:14px; color:#6b7280;">
            Jika Anda tidak membuat akun, abaikan email ini.
        </p>

        <hr style="margin:30px 0;">

        <p style="font-size:12px; color:#9ca3af; text-align:center;">
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </p>

    </div>

</body>
</html>
