<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIBA Admin — Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: #0f1117;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
        }
        .login-wrap {
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }
        .login-logo {
            display: flex; flex-direction: column; align-items: center; margin-bottom: 32px;
        }
        .login-logo-icon {
            width: 56px; height: 56px; border-radius: 16px;
            background: linear-gradient(135deg, #4f8cff, #7c5cfc);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.6rem; color: #fff; margin-bottom: 12px;
            box-shadow: 0 8px 24px #4f8cff30;
        }
        .login-title { font-size: 1.4rem; font-weight: 700; color: #fff; }
        .login-sub   { font-size: .85rem; color: #8892a4; }
        .login-card  {
            background: #1a1d27;
            border: 1px solid #2a2e3d;
            border-radius: 16px;
            padding: 28px;
        }
        .form-control {
            background: #1e2232; border: 1px solid #2a2e3d;
            color: #e2e8f0; border-radius: 9px; padding: 10px 14px;
            font-size: .875rem;
        }
        .form-control:focus {
            background: #1e2232; color: #e2e8f0;
            border-color: #4f8cff; box-shadow: 0 0 0 3px #4f8cff1a;
        }
        .form-control::placeholder { color: #8892a4; }
        .form-label { color: #e2e8f0; font-size: .84rem; font-weight: 500; margin-bottom: 5px; }
        .input-group-text {
            background: #252838; border: 1px solid #2a2e3d;
            color: #8892a4; border-radius: 9px 0 0 9px;
        }
        .input-group .form-control { border-radius: 0 9px 9px 0; border-left: none; }
        .btn-login {
            width: 100%; padding: 11px;
            background: linear-gradient(135deg, #4f8cff, #7c5cfc);
            border: none; border-radius: 9px;
            color: #fff; font-weight: 600; font-size: .9rem;
            cursor: pointer; transition: opacity .2s;
        }
        .btn-login:hover { opacity: .88; }
        .alert-danger {
            background: #ef444414; border: 1px solid #ef444440;
            color: #f87171; border-radius: 9px; font-size: .84rem; padding: 10px 14px;
        }
    </style>
</head>
<body>
    <div class="login-wrap">
        <div class="login-logo">
            <div class="login-logo-icon"><i class="bi bi-shield-lock-fill"></i></div>
            <div class="login-title">TIBA Admin</div>
            <div class="login-sub">Masuk ke panel administrasi</div>
        </div>

        <div class="login-card">
            @if($errors->any())
            <div class="alert-danger mb-3">
                <i class="bi bi-exclamation-triangle me-2"></i>{{ $errors->first() }}
            </div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" class="form-control"
                               value="{{ old('email') }}" required autofocus
                               placeholder="admin@tibasurabaya.com">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control"
                               required placeholder="••••••••">
                    </div>
                </div>

                <button type="submit" class="btn-login">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                </button>
            </form>
        </div>
    </div>
</body>
</html>
