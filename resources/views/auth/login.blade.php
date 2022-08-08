<div class="login-box">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <h2>Login</h2>
    <form class="auth-form login-form" id="input" method="POST" action="{{ route('login') }}" autocomplete="off">
        @csrf <div class="user-box">
            <input type="text" id="nik" class="form-control @error('nik') is-invalid @enderror"
                value="{{ old('nik') }}" name="nik" required autocomplete="off" placeholder="NIK">
            @error('nik')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label>NIK</label>
        </div>
        <div class="user-box">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                id="passsword" required autocomplete="off" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label>Password</label>
        </div>
        <a href="#" onclick="document.getElementById('input').submit();">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Submit
        </a>
    </form>
</div>
