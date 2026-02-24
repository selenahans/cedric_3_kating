<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <input type="email" name="email" placeholder="Email" required>

    <input type="password" name="password" placeholder="Password Baru" required>

    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>

    <button type="submit">
        Reset Password
    </button>
</form>
