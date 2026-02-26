<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - Cuan Buddy</title>
</head>
<body style="margin:0;padding:0;background-color:#f4fdf8;font-family:'Plus Jakarta Sans', Arial, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 20px;">
    <tr>
        <td align="center">

            <table width="100%" max-width="520" cellpadding="0" cellspacing="0"
                   style="background:#ffffff;border-radius:16px;padding:40px 30px;box-shadow:0 10px 30px rgba(0,0,0,0.05);">

                <!-- Logo -->
                <tr>
                    <td align="center" style="padding-bottom:20px;">
                        <img src="{{ url('images/logo_cuan_buddy.webp') }}" alt="Cuan Buddy" width="60">
                        <h2 style="margin:10px 0 0 0;font-size:22px;font-weight:700;color:#308156;">
                            cuan<span style="color:#2F3130;">buddy</span>
                        </h2>
                    </td>
                </tr>

                <!-- Title -->
                <tr>
                    <td style="text-align:center;padding-bottom:20px;">
                        <h1 style="margin:0;font-size:24px;font-weight:800;color:#1e293b;">
                            Reset Password
                        </h1>
                    </td>
                </tr>

                <!-- Greeting -->
                <tr>
                    <td style="font-size:15px;color:#334155;line-height:1.6;padding-bottom:25px;">
                        Halo <strong>{{ $user->name }}</strong>,<br><br>
                        Kami menerima permintaan untuk mereset password akun kamu.
                        Klik tombol di bawah ini untuk membuat password baru.
                    </td>
                </tr>

                <!-- Button -->
                <tr>
                    <td align="center" style="padding-bottom:30px;">
                        <a href="{{ $url }}"
                           style="display:inline-block;background-color:#308156;color:#ffffff;
                                  padding:14px 28px;border-radius:12px;font-weight:700;
                                  text-decoration:none;font-size:14px;
                                  box-shadow:0 8px 20px rgba(48,129,86,0.25);">
                            Reset Password
                        </a>
                    </td>
                </tr>

                <!-- Expiration Notice -->
                <tr>
                    <td style="font-size:13px;color:#64748b;line-height:1.6;padding-bottom:15px;text-align:center;">
                        Link ini akan kedaluwarsa dalam 60 menit.
                    </td>
                </tr>

                <!-- Manual Link
                <tr>
                    <td style="font-size:12px;color:#94a3b8;line-height:1.5;text-align:center;word-break:break-all;">
                        Jika tombol tidak bekerja, salin link berikut ke browser:<br>
                        <a href="{{ $url }}" style="color:#308156;">{{ $url }}</a>
                    </td>
                </tr> -->

            </table>

            <!-- Footer -->
            <table width="100%" cellpadding="0" cellspacing="0" style="margin-top:20px;">
                <tr>
                    <td align="center" style="font-size:12px;color:#94a3b8;">
                        Jika kamu tidak meminta reset password, abaikan email ini.
                        <br><br>
                        © {{ date('Y') }} Cuan Buddy. All rights reserved.
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>

</body>
</html>
