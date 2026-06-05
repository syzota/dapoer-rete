<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Dapoer Mba ReTe</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --red-dark: #5B1518;
            --red-main: #8F1018;
            --orange: #F05A00;
            --orange-dark: #D94700;
            --cream: #F8F6D5;
            --cream-soft: rgba(255, 255, 240, 0.78);
            --yellow-soft: #F2F0A8;
            --text-dark: #441619;
            --border-red: #7A1A20;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            font-family: 'Outfit', sans-serif;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;

            background:
                linear-gradient(rgba(197, 197, 125, 0.55), rgba(255, 255, 235, 0.55)),
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140' viewBox='0 0 120 120'%3E%3Cpath d='M60,10 A50,50 0 1,0 110,60 A50,50 0 0,0 60,10 Z M60,18 A42,42 0 1,1 18,60 A42,42 0 0,1 60,18 Z' fill='%23FF6B00' fill-opacity='0.08'/%3E%3Cpath d='M60,20 L60,56 M60,64 L60,100 M20,60 L56,60 M64,60 L100,60 M31.7,31.7 L57.2,57.2 M62.8,62.8 L88.3,88.3 M31.7,88.3 L57.2,62.8 M62.8,57.2 L88.3,31.7' stroke='%23FF6B00' stroke-width='2' stroke-opacity='0.08' stroke-linecap='round'/%3E%3C/svg%3E");

            background-size: cover, 140px 140px;
            background-position: center, center;
            background-repeat: no-repeat, repeat;

            overflow: hidden;
        }

        .back-home {
            position: fixed;
            top: 24px;
            left: 24px;
            z-index: 20;
            min-height: 44px;
            padding: 0 16px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.78);
            border: 1px solid rgba(255, 255, 255, 0.86);
            color: var(--red-dark);
            font-size: 14px;
            font-weight: 800;
            text-decoration: none;
            box-shadow: 0 14px 34px rgba(81, 42, 18, 0.12);
            backdrop-filter: blur(10px);
            transition: 0.22s ease;
        }

        .back-home:hover {
            transform: translateY(-2px);
            color: var(--orange);
            background: rgba(255, 255, 255, 0.92);
            box-shadow: 0 18px 42px rgba(81, 42, 18, 0.16);
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
        }

        .login-card {
            width: 100%;
            min-height: 640px;
            padding: 34px 44px 28px;
            border-radius: 22px;
            background: linear-gradient(
                180deg,
                rgba(248, 247, 190, 0.92) 0%,
                rgba(255, 255, 255, 0.94) 47%,
                rgba(255, 255, 255, 0.92) 100%
            );
            box-shadow: 0 24px 70px rgba(81, 42, 18, 0.16);
            text-align: center;
            position: relative;
            backdrop-filter: blur(7px);
        }

        .logo-img {
            width: 255px;
            max-width: 100%;
            display: block;
            margin: 0 auto 10px;
            filter: drop-shadow(0 8px 10px rgba(80, 20, 20, 0.10));
        }

        .tagline {
            font-size: 18px;
            line-height: 1.25;
            font-weight: 500;
            color: var(--red-dark);
            margin-bottom: 20px;
            letter-spacing: 0.2px;
        }

        .role-toggle {
            width: 100%;
            height: 42px;
            background: var(--yellow-soft);
            border-radius: 8px;
            padding: 4px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4px;
            margin-bottom: 38px;
        }

        .role-option {
            position: relative;
        }

        .role-option input {
            display: none;
        }

        .role-option label {
            height: 34px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            color: var(--red-dark);
            transition: 0.2s ease;
        }

        .role-option input:checked + label {
            background: linear-gradient(135deg, #FF7A00 0%, #E85000 100%);
            color: white;
            box-shadow: 0 8px 18px rgba(224, 80, 0, 0.22);
        }

        .form-area {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .input-group {
            position: relative;
        }

        .input-group .left-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--red-dark);
            font-size: 15px;
            opacity: 0.85;
        }

        .input-group .right-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--red-dark);
            font-size: 15px;
            opacity: 0.85;
            cursor: pointer;
        }

        .form-control {
            width: 100%;
            height: 46px;
            border-radius: 8px;
            border: 2px solid var(--border-red);
            background: rgba(255, 255, 255, 0.74);
            padding: 0 46px;
            font-family: inherit;
            font-size: 15px;
            color: var(--text-dark);
            outline: none;
            transition: 0.2s ease;
        }

        .form-control::placeholder {
            color: #5d3032;
            opacity: 0.9;
        }

        .form-control:focus {
            background: #fff;
            border-color: var(--orange);
            box-shadow: 0 0 0 4px rgba(240, 90, 0, 0.13);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 2px 0 14px;
            font-size: 14px;
            color: var(--red-dark);
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remember input {
            width: 18px;
            height: 18px;
            accent-color: var(--red-main);
            cursor: pointer;
        }

        .forgot-link {
            color: var(--red-dark);
            text-decoration: none;
            font-size: 13px;
            transition: 0.2s ease;
        }

        .forgot-link:hover {
            color: var(--orange);
        }

        .btn-submit {
            width: 100%;
            height: 58px;
            border: none;
            border-radius: 999px;
            background: linear-gradient(135deg, #A60D19 0%, #F05A00 100%);
            color: #fff;
            font-family: inherit;
            font-size: 17px;
            font-weight: 700;
            letter-spacing: 0.5px;
            cursor: pointer;
            box-shadow: 0 18px 32px rgba(171, 45, 0, 0.28);
            transition: 0.2s ease;
        }

        .btn-submit i {
            margin-left: 8px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 22px 40px rgba(171, 45, 0, 0.34);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .terminal {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            margin: 22px 0 18px;
            color: var(--red-dark);
            font-size: 15px;
            font-weight: 500;
        }

        .terminal::before,
        .terminal::after {
            content: "";
            height: 1px;
            flex: 1;
            background: rgba(91, 21, 24, 0.10);
        }

        .bottom-links {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            color: var(--red-dark);
            font-size: 13px;
            font-weight: 500;
        }

        .bottom-links a {
            color: var(--red-dark);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .bottom-links a:hover {
            color: var(--orange);
        }

        .alert-error {
            background: #FFE9E6;
            color: #9B0C0C;
            border: 1px solid rgba(155, 12, 12, 0.2);
            border-radius: 10px;
            padding: 12px 14px;
            margin-bottom: 16px;
            font-size: 14px;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .modal-backdrop {
            position: fixed;
            inset: 0;
            z-index: 50;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background: rgba(37, 12, 13, 0.56);
            backdrop-filter: blur(5px);
        }

        .modal-backdrop.is-visible {
            display: flex;
        }

        .modal-panel {
            width: min(100%, 460px);
            max-height: calc(100vh - 48px);
            overflow-y: auto;
            border-radius: 18px;
            border: 1px solid rgba(122, 26, 32, 0.16);
            background: linear-gradient(180deg, #fffef1 0%, #ffffff 100%);
            box-shadow: 0 28px 80px rgba(29, 9, 10, 0.32);
            text-align: left;
        }

        .modal-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            padding: 22px 24px 14px;
            border-bottom: 1px solid rgba(91, 21, 24, 0.10);
        }

        .modal-title {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--red-dark);
            font-size: 20px;
            font-weight: 800;
            line-height: 1.2;
        }

        .modal-title i {
            color: var(--orange);
        }

        .modal-close {
            width: 34px;
            height: 34px;
            border: 0;
            border-radius: 50%;
            background: rgba(143, 16, 24, 0.08);
            color: var(--red-dark);
            cursor: pointer;
            font-size: 16px;
            transition: 0.2s ease;
            flex: 0 0 auto;
        }

        .modal-close:hover {
            background: rgba(240, 90, 0, 0.14);
            color: var(--orange-dark);
        }

        .modal-body {
            padding: 18px 24px 24px;
            color: #542224;
            font-size: 14px;
            line-height: 1.58;
        }

        .modal-body p + p,
        .modal-body ul + p,
        .modal-body p + ul {
            margin-top: 12px;
        }

        .modal-body ul {
            padding-left: 20px;
        }

        .modal-body li + li {
            margin-top: 8px;
        }

        .policy-box,
        .wa-template {
            margin-top: 14px;
            border-radius: 12px;
            border: 1px solid rgba(122, 26, 32, 0.14);
            background: rgba(248, 246, 213, 0.56);
            padding: 14px;
        }

        .wa-template {
            font-size: 13px;
            color: #4d1c1f;
        }

        .modal-actions {
            display: flex;
            gap: 10px;
            margin-top: 18px;
        }

        .btn-modal,
        .btn-whatsapp {
            min-height: 44px;
            border: none;
            border-radius: 999px;
            padding: 0 18px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: 0.2s ease;
        }

        .btn-modal {
            background: rgba(143, 16, 24, 0.10);
            color: var(--red-dark);
        }

        .btn-modal:hover {
            background: rgba(143, 16, 24, 0.16);
        }

        .btn-whatsapp {
            flex: 1;
            background: #198754;
            color: #fff;
            box-shadow: 0 12px 22px rgba(25, 135, 84, 0.22);
        }

        .btn-whatsapp:hover {
            background: #157347;
            transform: translateY(-1px);
        }

        body.modal-open {
            overflow: hidden;
        }

        @media (max-width: 480px) {
            body {
                padding: 16px;
            }

            .login-card {
                min-height: auto;
                padding: 30px 24px 24px;
                border-radius: 20px;
            }

            .logo-img {
                width: 230px;
            }

            .tagline {
                font-size: 16px;
            }

            .form-options {
                align-items: flex-start;
                gap: 12px;
                flex-direction: column;
            }

            .modal-backdrop {
                padding: 16px;
            }

            .modal-header {
                padding: 20px 20px 12px;
            }

            .modal-body {
                padding: 16px 20px 20px;
            }

            .modal-actions {
                flex-direction: column;
            }

            .btn-modal,
            .btn-whatsapp {
                width: 100%;
            }

            .back-home {
                top: 14px;
                left: 14px;
                min-height: 40px;
                padding: 0 13px;
                font-size: 13px;
            }

        }
    </style>
</head>
<body>

    <a href="/" class="back-home">
        <i class="fa-solid fa-arrow-left"></i>
        Landing
    </a>

    <div class="login-wrapper">
        <div class="login-card">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Dapoer Mba ReTe" class="logo-img">

            <p class="tagline">
                Authentic Traditional Flavors
            </p>

            @if(session('error'))
                <div class="alert-error">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <div>{{ session('error') }}</div>
                </div>
            @endif

            <form action="/login" method="POST">
                @csrf

                <div class="role-toggle">
                    <div class="role-option">
                        <input type="radio" id="role-pegawai" name="role" value="pegawai" checked>
                        <label for="role-pegawai">
                            <i class="fa-solid fa-briefcase"></i>
                            Pegawai
                        </label>
                    </div>

                    <div class="role-option">
                        <input type="radio" id="role-owner" name="role" value="owner">
                        <label for="role-owner">
                            <i class="fa-solid fa-headset"></i>
                            Owner
                        </label>
                    </div>
                </div>

                <div class="form-area">
                    <div class="input-group">
                        <i class="fa-regular fa-user left-icon"></i>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control"
                            placeholder="Enter your ID"
                            required
                            autofocus
                            autocomplete="off"
                        >
                    </div>

                    <div class="input-group">
                        <i class="fa-solid fa-lock left-icon"></i>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control"
                            placeholder="********"
                            required
                        >
                        <i class="fa-regular fa-eye-slash right-icon" id="togglePassword"></i>
                    </div>

                    <div class="form-options">
                        <label class="remember">
                            <input type="checkbox" name="remember" checked>
                            <span>Remember me</span>
                        </label>

                        <a href="#" class="forgot-link" id="forgotPasswordLink">Forgot Password?</a>
                    </div>

                    <button type="submit" class="btn-submit">
                        MULAI COCOL <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </form>

            <div class="terminal">
                Akses hanya dibuka untuk pegawai dan owner yang terdaftar.
            </div>

            <div class="bottom-links">
                <a href="#" id="supportLink">
                    <i class="fa-regular fa-circle-question"></i>
                    Support
                </a>
            </div>
        </div>
    </div>

    <div class="modal-backdrop" id="supportModal" aria-hidden="true">
        <div class="modal-panel" role="dialog" aria-modal="true" aria-labelledby="supportTitle">
            <div class="modal-header">
                <h2 class="modal-title" id="supportTitle">
                    <i class="fa-solid fa-shield-halved"></i>
                    Support & Policy
                </h2>
                <button type="button" class="modal-close" data-close-modal aria-label="Tutup popup">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="modal-body">
                <p>
                    Website ini digunakan khusus untuk operasional internal Dapoer Mba ReTe.
                    Akses hanya diberikan kepada pegawai dan owner yang sudah terdaftar.
                </p>

                <div class="policy-box">
                    <ul>
                        <li>Jaga kerahasiaan ID dan password. Jangan membagikan akun kepada pihak lain.</li>
                        <li>Data transaksi, stok, laporan, dan pelanggan hanya boleh digunakan untuk kebutuhan operasional UMKM.</li>
                        <li>Setiap aktivitas dapat dicatat untuk menjaga keamanan dan ketertiban penggunaan sistem.</li>
                        <li>Jika ada kendala login, perubahan data, atau akses tidak sesuai, segera hubungi admin melalui menu Forgot Password.</li>
                    </ul>
                </div>

                <p>
                    Dengan masuk ke sistem, pengguna dianggap memahami dan menyetujui ketentuan penggunaan internal ini.
                </p>

                <div class="modal-actions">
                    <button type="button" class="btn-modal" data-close-modal>
                        Saya Mengerti
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-backdrop" id="forgotPasswordModal" aria-hidden="true">
        <div class="modal-panel" role="dialog" aria-modal="true" aria-labelledby="forgotPasswordTitle">
            <div class="modal-header">
                <h2 class="modal-title" id="forgotPasswordTitle">
                    <i class="fa-brands fa-whatsapp"></i>
                    Forgot Password
                </h2>
                <button type="button" class="modal-close" data-close-modal aria-label="Tutup popup">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="modal-body">
                <p>
                    Jika lupa password, hubungi admin melalui WhatsApp resmi di
                    <strong>+62 822-5573-8083</strong>. Siapkan ID/nama akun dan role yang digunakan.
                </p>

                <p>
                    Tombol WhatsApp di bawah akan otomatis membuat pesan bantuan berdasarkan ID yang kamu isi di form login.
                </p>

                <div class="wa-template" id="waTemplatePreview"></div>

                <div class="modal-actions">
                    <a href="#" class="btn-whatsapp" id="whatsappHelpLink" target="_blank" rel="noopener">
                        <i class="fa-brands fa-whatsapp"></i>
                        Hubungi Admin
                    </a>
                    <button type="button" class="btn-modal" data-close-modal>
                        Nanti Dulu
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        const nameInput = document.getElementById('name');
        const supportLink = document.getElementById('supportLink');
        const forgotPasswordLink = document.getElementById('forgotPasswordLink');
        const supportModal = document.getElementById('supportModal');
        const forgotPasswordModal = document.getElementById('forgotPasswordModal');
        const whatsappHelpLink = document.getElementById('whatsappHelpLink');
        const waTemplatePreview = document.getElementById('waTemplatePreview');
        const whatsappNumber = '6282255738083';

        togglePassword.addEventListener('click', function () {
            const isPassword = password.getAttribute('type') === 'password';

            password.setAttribute('type', isPassword ? 'text' : 'password');
            this.classList.toggle('fa-eye-slash');
            this.classList.toggle('fa-eye');
        });

        function getSelectedRole() {
            const selectedRole = document.querySelector('input[name="role"]:checked');
            return selectedRole ? selectedRole.value : 'pegawai';
        }

        function buildForgotPasswordMessage() {
            const accountName = nameInput.value.trim() || '[isi ID/nama akun]';
            const role = getSelectedRole();

            return `Permisi admin Dapoer Mba ReTe, saya ingin meminta bantuan akses akun.

Nama/ID akun: ${accountName}
Role: ${role}
Keperluan: Mohon bantu dicekkan akses akun saya. Jika diperlukan, saya ingin dibantu untuk reset atau mengganti password.

Terima kasih.`;
        }

        function updateWhatsappLink() {
            const message = buildForgotPasswordMessage();
            whatsappHelpLink.href = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;
            waTemplatePreview.textContent = message;
        }

        function openModal(modal) {
            modal.classList.add('is-visible');
            modal.setAttribute('aria-hidden', 'false');
            document.body.classList.add('modal-open');

            const closeButton = modal.querySelector('[data-close-modal]');
            if (closeButton) {
                closeButton.focus();
            }
        }

        function closeModal(modal) {
            modal.classList.remove('is-visible');
            modal.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('modal-open');
        }

        supportLink.addEventListener('click', function (event) {
            event.preventDefault();
            openModal(supportModal);
        });

        forgotPasswordLink.addEventListener('click', function (event) {
            event.preventDefault();
            updateWhatsappLink();
            openModal(forgotPasswordModal);
        });

        document.querySelectorAll('[data-close-modal]').forEach(function (button) {
            button.addEventListener('click', function () {
                closeModal(button.closest('.modal-backdrop'));
            });
        });

        document.querySelectorAll('.modal-backdrop').forEach(function (modal) {
            modal.addEventListener('click', function (event) {
                if (event.target === modal) {
                    closeModal(modal);
                }
            });
        });

        document.addEventListener('keydown', function (event) {
            if (event.key !== 'Escape') {
                return;
            }

            document.querySelectorAll('.modal-backdrop.is-visible').forEach(function (modal) {
                closeModal(modal);
            });
        });

        nameInput.addEventListener('input', updateWhatsappLink);
        document.querySelectorAll('input[name="role"]').forEach(function (roleInput) {
            roleInput.addEventListener('change', updateWhatsappLink);
        });

        updateWhatsappLink();
    </script>

</body>
</html>
