<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Inventaris Aset Sekolah</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        body {
            background-color: #f8fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .login-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
            border: 1px solid #e2e8f0;
            width: 100%;
            max-width: 420px;
            padding: 40px;
        }

        /* Header / Logo Section */
        .brand-section {
            text-align: center;
            margin-bottom: 24px;
        }

        .brand-icon {
            width: 54px;
            height: 54px;
            background-color: #2563eb;
            color: #ffffff;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 16px;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
        }

        .brand-title {
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -0.3px;
        }

        .brand-subtitle {
            font-size: 13px;
            color: #64748b;
            margin-top: 4px;
        }

        /* Alert Error Box */
        .alert-error {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 12px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 600;
            color: #334155;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper i {
            position: absolute;
            left: 14px;
            color: #94a3b8;
            font-size: 15px;
            transition: color 0.2s;
        }

        .form-control {
            width: 100%;
            padding: 12px 14px 12px 42px;
            font-size: 14px;
            color: #1e293b;
            background-color: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            outline: none;
            transition: all 0.2s ease-in-out;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        .form-control:focus + i {
            color: #2563eb;
        }

        /* Extra Options */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            font-size: 13px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #475569;
            cursor: pointer;
        }

        .remember-me input[type="checkbox"] {
            accent-color: #2563eb;
            width: 16px;
            height: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .forgot-password {
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        /* Submit Button */
        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #2563eb;
            color: #ffffff;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-submit:hover {
            background-color: #1d4ed8;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
        }

        .btn-submit:active {
            transform: scale(0.99);
        }

        /* Footer Copyright */
        .card-footer {
            margin-top: 28px;
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <!-- Logo & Header -->
        <div class="brand-section">
            <div class="brand-icon">
                <i class="fa-solid fa-box-archive"></i>
            </div>
            <h1 class="brand-title">Inventaris Aset</h1>
            <p class="brand-subtitle">Sistem Informasi Inventaris Aset Sekolah</p>
        </div>

        <!-- Alert Jika Ada Error Login -->
        @if ($errors->any())
            <div class="alert-error">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <!-- Form Login -->
        <form id="loginForm" action="{{ route('login') }}" method="POST">
            @csrf <!-- PENTING: Mencegah 419 Page Expired -->

            <!-- Email Input -->
            <div class="form-group">
                <label for="email">Email / Username</label>
                <div class="input-wrapper">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email" value="{{ old('email') }}" required autocomplete="off" autofocus>
                    <i class="fa-regular fa-user"></i>
                </div>
            </div>

            <!-- Password Input -->
            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
                    <i class="fa-solid fa-lock"></i>
                </div>
            </div>

            <!-- Options -->
            <div class="form-options">
                <label class="remember-me">
                    <input type="checkbox" name="remember">
                    <span>Ingat Saya</span>
                </label>
                <a href="#" class="forgot-password">Lupa Kata Sandi?</a>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-submit">
                <span>MASUK</span>
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </form>

        <!-- Footer -->
        <div class="card-footer">
            &copy; 2026 Inventaris Aset Sekolah
        </div>
    </div>

</body>
</html>