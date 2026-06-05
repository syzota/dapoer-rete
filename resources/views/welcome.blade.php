<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapoer Mba ReTe</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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
            --white: #FFFFFF;
            --green: #6D9E36;
            --shadow-soft: 0 24px 70px rgba(81, 42, 18, 0.14);
            --shadow-card: 0 18px 45px rgba(81, 42, 18, 0.11);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;
            font-family: 'Outfit', sans-serif;
            color: var(--text-dark);
            background:
                linear-gradient(rgba(197, 197, 125, 0.38), rgba(255, 255, 235, 0.66)),
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140' viewBox='0 0 120 120'%3E%3Cpath d='M60,10 A50,50 0 1,0 110,60 A50,50 0 0,0 60,10 Z M60,18 A42,42 0 1,1 18,60 A42,42 0 0,1 60,18 Z' fill='%23FF6B00' fill-opacity='0.08'/%3E%3Cpath d='M60,20 L60,56 M60,64 L60,100 M20,60 L56,60 M64,60 L100,60 M31.7,31.7 L57.2,57.2 M62.8,62.8 L88.3,88.3 M31.7,88.3 L57.2,62.8 M62.8,57.2 L88.3,31.7' stroke='%23FF6B00' stroke-width='2' stroke-opacity='0.08' stroke-linecap='round'/%3E%3C/svg%3E");
            background-size: cover, 140px 140px;
            background-position: center, center;
            background-repeat: no-repeat, repeat;
            overflow-x: hidden;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .container {
            width: min(1160px, calc(100% - 40px));
            margin: 0 auto;
        }

        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: 0.7s ease;
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .navbar {
            position: sticky;
            top: 18px;
            z-index: 100;
            padding-top: 18px;
        }

        .nav-card {
            min-height: 76px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.74);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: 0 18px 45px rgba(81, 42, 18, 0.10);
            backdrop-filter: blur(12px);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 18px 12px 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 800;
            color: var(--red-dark);
            white-space: nowrap;
        }

        .brand img {
            width: 48px;
            height: 48px;
            object-fit: contain;
            filter: drop-shadow(0 6px 10px rgba(80, 20, 20, 0.10));
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 24px;
            font-size: 14px;
            font-weight: 700;
            color: rgba(68, 22, 25, 0.72);
        }

        .nav-links a {
            transition: 0.2s ease;
        }

        .nav-links a:hover {
            color: var(--orange);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .menu-toggle {
            width: 44px;
            height: 44px;
            border: none;
            border-radius: 50%;
            background: var(--yellow-soft);
            color: var(--red-dark);
            font-size: 18px;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            transition: 0.2s ease;
        }

        .menu-toggle:hover {
            background: #F6EF88;
            color: var(--orange);
        }

        .mobile-menu {
            display: none;
            margin-top: 12px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.88);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: 0 18px 45px rgba(81, 42, 18, 0.12);
            backdrop-filter: blur(14px);
            padding: 14px;
            overflow: hidden;
        }

        .mobile-menu a {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 16px;
            border-radius: 16px;
            color: var(--red-dark);
            font-size: 15px;
            font-weight: 800;
            transition: 0.2s ease;
        }

        .mobile-menu a:hover {
            background: rgba(242, 240, 168, 0.72);
            color: var(--orange);
        }

        .mobile-menu .mobile-login {
            margin-top: 8px;
            background: linear-gradient(135deg, #A60D19 0%, #F05A00 100%);
            color: white;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 12px 24px rgba(171, 45, 0, 0.20);
        }

        .mobile-menu.is-open {
            display: block;
            animation: dropdownMenu 0.25s ease;
        }

        @keyframes dropdownMenu {
            from {
                opacity: 0;
                transform: translateY(-8px) scale(0.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .btn {
            min-height: 44px;
            border: none;
            border-radius: 999px;
            padding: 0 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.22s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #A60D19 0%, #F05A00 100%);
            color: white;
            box-shadow: 0 16px 30px rgba(171, 45, 0, 0.24);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 22px 40px rgba(171, 45, 0, 0.32);
        }

        .btn-soft {
            background: var(--yellow-soft);
            color: var(--red-dark);
        }

        .btn-soft:hover {
            background: #F6EF88;
            transform: translateY(-2px);
        }

        .hero {
            position: relative;
            padding: 74px 0 60px;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 44px;
            align-items: center;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border-radius: 999px;
            background: rgba(242, 240, 168, 0.75);
            color: var(--red-dark);
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 22px;
        }

        .hero-title {
            font-size: clamp(44px, 6vw, 78px);
            line-height: 0.96;
            letter-spacing: -2px;
            color: var(--red-dark);
            margin-bottom: 22px;
        }

        .hero-title span {
            color: var(--orange);
        }

        .hero-desc {
            max-width: 560px;
            font-size: 17px;
            line-height: 1.75;
            color: rgba(68, 22, 25, 0.72);
            margin-bottom: 30px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 28px;
        }

        .hero-stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            max-width: 520px;
        }

        .stat-card {
            border-radius: 18px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.72);
            box-shadow: 0 12px 28px rgba(81, 42, 18, 0.08);
        }

        .stat-card strong {
            display: block;
            color: var(--red-dark);
            font-size: 18px;
            margin-bottom: 4px;
        }

        .stat-card span {
            color: rgba(68, 22, 25, 0.62);
            font-size: 12px;
            font-weight: 600;
        }

        .hero-visual {
            position: relative;
            min-height: 500px;
            display: grid;
            place-items: center;
        }

        .plate-wrap {
            width: min(430px, 88vw);
            aspect-ratio: 1 / 1;
            position: relative;
            display: grid;
            place-items: center;
            animation: floatPlate 4.8s ease-in-out infinite;
            filter: drop-shadow(0 28px 38px rgba(68, 22, 25, 0.24));
        }

        .plate-wrap::before {
            content: "";
            position: absolute;
            width: 78%;
            height: 24%;
            left: 50%;
            bottom: 6%;
            transform: translateX(-50%);
            border-radius: 50%;
            background: rgba(68, 22, 25, 0.18);
            filter: blur(18px);
            z-index: 0;
        }

        .hero-float-img {
            position: relative;
            z-index: 1;
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        .float-card {
            position: absolute;
            z-index: 5;
            background: rgba(255, 255, 255, 0.84);
            border: 1px solid rgba(255, 255, 255, 0.86);
            backdrop-filter: blur(10px);
            box-shadow: var(--shadow-card);
            border-radius: 20px;
            padding: 15px 17px;
            color: var(--red-dark);
        }

        .float-card i {
            color: var(--orange);
        }

        .float-card.one {
            top: 66px;
            right: 10px;
            animation: floatSmall 3.8s ease-in-out infinite;
        }

        .float-card.two {
            bottom: 72px;
            left: 0;
            width: 210px;
            animation: floatSmall 4.3s ease-in-out infinite;
        }

        .float-card strong {
            display: block;
            font-size: 15px;
            margin-bottom: 2px;
        }

        .float-card span {
            font-size: 12px;
            color: rgba(68, 22, 25, 0.65);
        }

        .section {
            padding: 78px 0;
        }

        .section-head {
            text-align: center;
            max-width: 720px;
            margin: 0 auto 36px;
        }

        .section-kicker {
            color: var(--orange);
            font-size: 13px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.3px;
            margin-bottom: 10px;
        }

        .section-title {
            color: var(--red-dark);
            font-size: clamp(32px, 4vw, 48px);
            line-height: 1.12;
            letter-spacing: -0.8px;
            margin-bottom: 14px;
        }

        .section-desc {
            font-size: 16px;
            line-height: 1.75;
            color: rgba(68, 22, 25, 0.70);
        }

        .about-box {
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 30px;
            align-items: center;
            border-radius: 34px;
            padding: 30px;
            background: linear-gradient(180deg, rgba(248, 247, 190, 0.78), rgba(255, 255, 255, 0.86));
            box-shadow: var(--shadow-soft);
            backdrop-filter: blur(8px);
        }

        .about-visual {
            aspect-ratio: 1 / 1;
            width: 100%;
            border-radius: 28px;
            position: relative;
            overflow: hidden;
        }

        .about-visual img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .about-visual::after {
            content: "Dapoer ReTe";
            position: absolute;
            left: 28px;
            bottom: 22px;
            color: white;
            font-size: 64px;
            font-weight: 800;
            letter-spacing: -3px;
            text-shadow: 0 12px 25px rgba(91, 21, 25, 0.637);
        }

        .about-content h3 {
            font-size: 30px;
            color: var(--red-dark);
            margin-bottom: 14px;
        }

        .about-content p {
            line-height: 1.78;
            color: rgba(68, 22, 25, 0.72);
            margin-bottom: 22px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .feature-card {
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.72);
            padding: 16px;
        }

        .feature-card i {
            color: var(--orange);
            margin-bottom: 10px;
        }

        .feature-card strong {
            display: block;
            color: var(--red-dark);
            margin-bottom: 4px;
        }

        .feature-card span {
            font-size: 13px;
            line-height: 1.45;
            color: rgba(68, 22, 25, 0.64);
        }

        .catalog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 18px;
        }

        .catalog-card {
            position: relative;
            min-height: 280px;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.82);
            box-shadow: var(--shadow-card);
            padding: 18px;
            overflow: hidden;
            transition: 0.25s ease;
        }

        .catalog-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 26px 55px rgba(81, 42, 18, 0.16);
        }

        .catalog-img {
            height: 132px;
            border-radius: 22px;
            margin-bottom: 16px;
            overflow: hidden;
            background: #F8F6D5;
        }

        .catalog-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .catalog-card h3 {
            color: var(--red-dark);
            font-size: 19px;
            margin-bottom: 8px;
        }

        .catalog-card p {
            color: rgba(68, 22, 25, 0.66);
            font-size: 14px;
            line-height: 1.55;
            margin-bottom: 16px;
        }

        .catalog-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--orange);
            font-weight: 800;
            font-size: 14px;
        }

        .center-action {
            display: flex;
            justify-content: center;
            margin-top: 34px;
        }

        .branch-box {
            border-radius: 34px;
            padding: 34px;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.84), rgba(248, 246, 213, 0.72));
            box-shadow: var(--shadow-soft);
        }

        .branch-layout {
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 28px;
            align-items: stretch;
        }

        .branch-highlight {
            border-radius: 28px;
            padding: 28px;
            background: linear-gradient(135deg, var(--red-main), var(--orange));
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 340px;
            overflow: hidden;
            position: relative;
        }

        .branch-highlight::after {
            content: "";
            position: absolute;
            width: 210px;
            height: 210px;
            right: -70px;
            bottom: -70px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.16);
        }

        .branch-highlight h3 {
            position: relative;
            z-index: 1;
            font-size: 34px;
            line-height: 1.08;
            margin-bottom: 12px;
        }

        .branch-highlight p {
            position: relative;
            z-index: 1;
            line-height: 1.65;
            color: rgba(255, 255, 255, 0.84);
        }

        .branch-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }

        .branch-item {
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.78);
            padding: 18px;
            border: 1px solid rgba(91, 21, 24, 0.08);
        }

        .branch-item i {
            color: var(--orange);
            margin-bottom: 12px;
        }

        .branch-item h4 {
            color: var(--red-dark);
            margin-bottom: 5px;
        }

        .branch-item p {
            font-size: 13px;
            line-height: 1.5;
            color: rgba(68, 22, 25, 0.62);
        }

        .order-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .order-card {
            border-radius: 26px;
            padding: 24px;
            background: rgba(255, 255, 255, 0.82);
            box-shadow: var(--shadow-card);
        }

        .order-icon {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            background: var(--yellow-soft);
            display: grid;
            place-items: center;
            color: var(--orange);
            font-size: 22px;
            margin-bottom: 16px;
        }

        .order-card h3 {
            color: var(--red-dark);
            margin-bottom: 8px;
        }

        .order-card p {
            color: rgba(68, 22, 25, 0.65);
            line-height: 1.6;
            font-size: 14px;
        }

        .contact-strip {
            margin-top: 26px;
            border-radius: 28px;
            background: linear-gradient(135deg, #A60D19 0%, #F05A00 100%);
            color: white;
            padding: 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 22px;
            box-shadow: 0 20px 44px rgba(171, 45, 0, 0.24);
        }

        .contact-strip h3 {
            font-size: 26px;
            margin-bottom: 5px;
        }

        .contact-strip p {
            color: rgba(255, 255, 255, 0.82);
        }

        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .social-links a {
            min-height: 44px;
            padding: 0 16px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.16);
            color: white;
            font-weight: 800;
        }

        .footer {
            margin-top: 70px;
            background: var(--red-dark);
            color: white;
            padding: 36px 0;
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 800;
        }

        .footer-brand img {
            width: 44px;
            height: 44px;
            object-fit: contain;
        }

        .footer-links {
            display: flex;
            gap: 18px;
            color: rgba(255, 255, 255, 0.72);
            font-size: 14px;
            font-weight: 600;
        }

        .credit-trigger {
            min-height: 40px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 999px;
            padding: 0 15px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.10);
            color: rgba(255, 255, 255, 0.82);
            font-family: inherit;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .credit-trigger:hover {
            background: rgba(255, 255, 255, 0.18);
            color: white;
            transform: translateY(-2px);
        }

        .credit-modal {
            position: fixed;
            inset: 0;
            z-index: 999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 22px;
        }

        .credit-modal.is-open {
            display: flex;
        }

        .credit-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(36, 10, 12, 0.58);
            backdrop-filter: blur(8px);
        }

        .credit-card {
            position: relative;
            z-index: 1;
            width: min(520px, 100%);
            max-height: calc(100vh - 44px);
            overflow-y: auto;
            border-radius: 30px;
            padding: 30px;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.96), rgba(248, 246, 213, 0.94));
            box-shadow: 0 30px 90px rgba(36, 10, 12, 0.30);
            color: var(--text-dark);
            animation: creditPop 0.25s ease;
        }

        .credit-close {
            position: absolute;
            top: 18px;
            right: 18px;
            width: 38px;
            height: 38px;
            border: none;
            border-radius: 50%;
            background: rgba(91, 21, 24, 0.08);
            color: var(--red-dark);
            cursor: pointer;
            transition: 0.2s ease;
        }

        .credit-close:hover {
            background: var(--red-dark);
            color: white;
        }

        .credit-icon {
            width: 58px;
            height: 58px;
            border-radius: 20px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, #A60D19 0%, #F05A00 100%);
            color: white;
            font-size: 22px;
            margin-bottom: 16px;
            box-shadow: 0 16px 30px rgba(171, 45, 0, 0.22);
        }

        .credit-kicker {
            color: var(--orange);
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            margin-bottom: 8px;
        }

        .credit-card h3 {
            color: var(--red-dark);
            font-size: 28px;
            line-height: 1.15;
            margin-bottom: 10px;
        }

        .credit-desc {
            color: rgba(68, 22, 25, 0.68);
            line-height: 1.65;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .credit-team {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }

        .credit-team div {
            border-radius: 18px;
            padding: 14px;
            background: rgba(255, 255, 255, 0.74);
            border: 1px solid rgba(91, 21, 24, 0.08);
        }

        .credit-team strong {
            display: block;
            color: var(--red-dark);
            font-size: 14px;
            margin-bottom: 4px;
        }

        .credit-team span {
            color: rgba(68, 22, 25, 0.62);
            font-size: 12px;
            font-weight: 700;
        }

        .credit-cta {
            border-radius: 22px;
            padding: 18px;
            background: linear-gradient(135deg, rgba(166, 13, 25, 0.94), rgba(240, 90, 0, 0.94));
            color: white;
        }

        .credit-cta p {
            color: rgba(255, 255, 255, 0.86);
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 14px;
        }

        .credit-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .credit-actions a {
            min-height: 42px;
            padding: 0 14px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.16);
            color: white;
            font-size: 13px;
            font-weight: 800;
            transition: 0.2s ease;
        }

        .credit-actions a:hover {
            background: rgba(255, 255, 255, 0.24);
            transform: translateY(-2px);
        }

        body.modal-open {
            overflow: hidden;
        }

        .news-preview-grid {
            width: min(980px, 100%);
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .news-preview-card {
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.86);
            box-shadow: var(--shadow-card);
            overflow: hidden;
            transition: 0.25s ease;
            border: 1px solid rgba(255, 255, 255, 0.72);
            display: grid;
            grid-template-columns: 0.95fr 1.05fr;
            min-height: 280px;
        }

        .news-preview-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 26px 55px rgba(81, 42, 18, 0.16);
        }

        .news-preview-img {
            width: 100%;
            height: 100%;
            min-height: 280px;
            background: var(--cream);
            overflow: hidden;
            display: block;
        }

        .news-preview-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .news-preview-body {
            padding: 28px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .news-preview-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 8px 14px;
            color: rgba(68, 22, 25, 0.62);
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .news-preview-meta span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .news-preview-meta i {
            color: var(--orange);
        }

        .news-preview-body h3 {
            color: var(--red-dark);
            font-size: clamp(24px, 2.4vw, 34px);
            line-height: 1.12;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }

        .news-preview-body p {
            color: rgba(68, 22, 25, 0.68);
            font-size: 15px;
            line-height: 1.75;
            margin-bottom: 18px;
        }

        .news-preview-link {
            color: var(--orange);
            font-size: 14px;
            font-weight: 800;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            width: fit-content;
        }

        .news-preview-action {
            display: flex;
            justify-content: center;
            margin-top: 44px;
        }

        .news-preview-empty {
            width: min(920px, 100%);
            margin: 0 auto;
            border-radius: 28px;
            padding: 28px;
            background: rgba(255, 255, 255, 0.82);
            box-shadow: var(--shadow-card);
            color: rgba(68, 22, 25, 0.68);
            line-height: 1.7;
        }

        @keyframes creditPop {
            from {
                opacity: 0;
                transform: translateY(14px) scale(0.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @media (max-width: 720px) {
            .credit-card {
                padding: 24px;
                border-radius: 26px;
            }

            .credit-team {
                grid-template-columns: 1fr;
            }

            .credit-actions a {
                width: 100%;
                justify-content: center;
            }

            .news-preview-grid {
                width: 100%;
            }

            .news-preview-img {
                height: 210px;
                min-height: 210px;
            }

            .news-preview-body h3 {
                font-size: 24px;
            }

            .news-preview-action {
                margin-top: 30px;
            }

            .news-preview-action .btn {
                width: 100%;
            }
        }

        @keyframes floatPlate {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-14px) rotate(1.5deg);
            }
        }

        @keyframes floatSmall {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @media (max-width: 980px) {
            .hero-grid,
            .about-box,
            .branch-layout {
                grid-template-columns: 1fr;
            }

            .hero-visual {
                min-height: 420px;
            }

            .catalog-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .order-grid {
                grid-template-columns: 1fr;
            }

            .contact-strip,
            .footer-inner {
                flex-direction: column;
                text-align: center;
            }

        }

        @media (max-width: 720px) {
            .container {
                width: min(100% - 28px, 1160px);
            }

            .navbar {
                top: 10px;
                padding-top: 10px;
                transition: transform 0.28s ease, opacity 0.28s ease;
                will-change: transform, opacity;
            }

            .nav-card {
                min-height: 68px;
                padding: 10px 12px 10px 14px;
                border-radius: 26px;
            }

            .nav-links {
                display: none;
            }

            .nav-login {
                display: none;
            }

            .menu-toggle {
                display: inline-flex;
            }

            .brand {
                gap: 8px;
                font-size: 14px;
                max-width: 230px;
            }

            .brand img {
                width: 42px;
                height: 42px;
            }

            .brand span {
                display: inline;
                white-space: normal;
                line-height: 1.15;
            }

            .hero {
                padding-top: 46px;
                padding-bottom: 40px;
            }

            .hero-grid {
                gap: 28px;
            }

            .hero-title {
                font-size: 42px;
                line-height: 1.02;
                letter-spacing: -1px;
            }

            .hero-desc {
                font-size: 15px;
                line-height: 1.65;
            }

            .hero-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .btn {
                width: 100%;
            }

            .hero-stats {
                grid-template-columns: 1fr;
            }

            .hero-visual {
                min-height: 330px;
            }

            .plate-wrap {
                width: min(310px, 86vw);
            }

            .fruit-bowl {
                border-width: 13px;
            }

            .float-card {
                display: none;
            }

            .section {
                padding: 52px 0;
            }

            .section-title {
                font-size: 31px;
            }

            .section-desc {
                font-size: 15px;
            }

            .about-box,
            .branch-box {
                padding: 22px;
                border-radius: 26px;
            }

            .about-visual {
                min-height: 250px;
                border-radius: 22px;
            }

            .about-visual::after {
                font-size: 48px;
            }

            .feature-grid,
            .catalog-grid,
            .branch-list,
            .order-grid {
                grid-template-columns: 1fr;
            }

            .catalog-card {
                min-height: auto;
            }

            .branch-highlight {
                min-height: 270px;
            }

            .branch-highlight h3 {
                font-size: 28px;
            }

            .contact-strip {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
                padding: 24px;
            }

            .social-links {
                justify-content: center;
            }

            .social-links a {
                width: 100%;
                justify-content: center;
            }

            .footer-inner {
                flex-direction: column;
                text-align: center;
            }

            .footer-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }

    @media (max-width: 980px) {
        .news-preview-grid {
            width: min(760px, 100%);
            grid-template-columns: 1fr;
        }

        .news-preview-card {
            grid-template-columns: 1fr;
            min-height: auto;
        }

        .news-preview-img {
            height: 240px;
            min-height: 240px;
        }

        .news-preview-body {
            padding: 22px;
        }
    }

    @media (max-width: 720px) {
        #berita {
        padding-top: 72px;
        scroll-margin-top: 110px;
        }

        .news-preview-grid {
            width: 100%;
            grid-template-columns: 1fr;
        }

        .news-preview-card {
            display: flex;
            flex-direction: column;
            border-radius: 24px;
            min-height: auto;
        }

        .news-preview-img {
            width: 100%;
            height: 210px;
            min-height: 210px;
        }

        .news-preview-body {
            padding: 20px;
        }

        .news-preview-meta {
            font-size: 12px;
            gap: 8px 12px;
        }

        .news-preview-body h3 {
            font-size: 24px;
            line-height: 1.18;
        }

        .news-preview-body p {
            font-size: 14px;
            line-height: 1.65;
        }

        .news-preview-link {
            width: fit-content;
        }

        .news-preview-action {
            margin-top: 30px;
        }

        .news-preview-action .btn {
            width: 100%;
        }
    }

        @media (max-width: 420px) {
            .container {
                width: min(100% - 22px, 1160px);
            }

            .brand {
                max-width: 190px;
                font-size: 13px;
            }

            .brand img {
                width: 38px;
                height: 38px;
            }

            .nav-card {
                border-radius: 22px;
            }

            .hero-title {
                font-size: 36px;
            }

            .hero-badge {
                font-size: 12px;
                padding: 9px 12px;
            }

            .section-title {
                font-size: 28px;
            }

            .about-content h3 {
                font-size: 25px;
            }

            .catalog-img {
                height: 118px;
            }

            .contact-strip h3 {
                font-size: 23px;
            }
        }

    </style>
</head>
<body>

        @php
            $previewProduk = $previewProduk ?? collect([
                [
                    'nama_produk' => 'Nasi Goreng',
                    'deskripsi' => 'Nasi goreng rumahan dengan rasa gurih, hangat, dan cocok untuk menu harian.',
                    'label' => 'Nasgor',
                    'gambar' => 'menu-nasi.png'
                ],
                [
                    'nama_produk' => 'Ayam Goreng',
                    'deskripsi' => 'Olahan ayam gurih dengan pilihan rasa pedas dan lauk yang mengenyangkan.',
                    'label' => 'Ayam',
                    'gambar' => 'menu-ayam.png'
                ],
            ]);

        $cabangs = $cabangs ?? collect([
            ['nama_cabang' => 'Loa Ipuh', 'alamat' => 'Perumahan Loa Ipuh Permai, Jl. Setia Raya, Tenggarong'],
        ]);
    @endphp

    <header class="navbar">
        <div class="container">
            <div class="nav-card">
                <a href="#home" class="brand">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Dapoer Mba ReTe">
                    <span>Dapoer Mba ReTe</span>
                </a>

                <nav class="nav-links">
                    <a href="#home">Home</a>
                    <a href="#about">Tentang</a>
                    <a href="#katalog">Katalog</a>
                    <a href="#berita">Berita</a>
                    <a href="#cabang">Cabang</a>
                    <a href="#kontak">Cara Order</a>
                </nav>

                <div class="nav-actions">
                    <a href="/login" class="btn btn-primary nav-login">
                        Login <i class="fa-solid fa-arrow-right"></i>
                    </a>

                    <button type="button" class="menu-toggle" id="menuToggle" aria-label="Buka menu">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>

            <div class="mobile-menu" id="mobileMenu">
                <a href="#home">Home</a>
                <a href="#about">Tentang</a>
                <a href="#katalog">Katalog</a>
                <a href="#berita">Berita</a>
                <a href="#cabang">Cabang</a>
                <a href="#kontak">Cara Order</a>
                <a href="/login" class="mobile-login">
                    Login <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </header>

    <main>
        <section class="hero" id="home">
            <div class="container">
                <div class="hero-grid">
                    <div class="hero-copy reveal">
                        <div class="hero-badge">
                            <i class="fa-solid fa-seedling"></i>
                            Homemade Comfort Food
                        </div>

                        <h1 class="hero-title">
                            Masakan rumahan, <span>rasanya bikin balik lagi.</span>
                        </h1>

                        <p class="hero-desc">
                            Dapoer Mba ReTe menghadirkan aneka masakan rumahan seperti ayam penyet, ayam masakan rumah ijo,
                            ayam serundeng, nasi goreng kampung, nasi goreng XO, sampai nasi goreng tom yam
                            yang cocok untuk makan siang, makan malam, atau dipesan online.
                        </p>

                        <div class="hero-actions">
                            <a href="/katalog" class="btn btn-primary">
                                Lihat Katalog <i class="fa-solid fa-arrow-right"></i>
                            </a>
                            <a href="#kontak" class="btn btn-soft">
                                Cara Order
                            </a>
                        </div>

                        <div class="hero-stats">
                            <div class="stat-card">
                                <strong>Fresh</strong>
                                <span>Bahan pilihan yang diolah hangat dan nikmat.</span>
                            </div>
                            <div class="stat-card">
                                <strong>Custom</strong>
                                <span>Pilihan ayam dan nasi goreng favorit untuk berbagai selera.</span>
                            </div>
                            <div class="stat-card">
                                <strong>Kontak</strong>
                                <span>Info kontak, dan pemesanan yang mudah diakses.</span>
                            </div>
                        </div>
                    </div>

                    <div class="hero-visual reveal">
                        <div class="plate-wrap">
                            <img src="{{ asset('assets/images/float.png') }}" alt="Dapoer Mba ReTe" class="hero-float-img">
                        </div>
                        <div class="float-card one">
                            <strong><i class="fa-solid fa-pepper-hot"></i> Menu Favorit</strong>
                            <span>Ayam, nasi goreng, dan lauk rumahan.</span>
                        </div>

                        <div class="float-card two">
                            <strong><i class="fa-solid fa-motorcycle"></i> Bisa Pesan Online</strong>
                            <span>Lihat katalog, pilih menu, lalu hubungi kontak resmi.</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="about">
            <div class="container">
                <div class="about-box reveal">
                    <div class="about-visual">
                        <img src="{{ asset('assets/images/kitchen.jpeg') }}" alt="Dapoer Mba ReTe">
                    </div>

                    <div class="about-content">
                        <div class="section-kicker">Tentang Kami</div>
                        <h3>Masakan rumahan khas yang dibuat untuk semua suasana.</h3>
                        <p>
                            Dapoer Mba ReTe menyajikan aneka menu rumahan dengan cita rasa gurih, pedas, dan hangat:
                            mulai dari olahan ayam sampai nasi goreng yang cocok untuk santapan harian.
                        </p>

                        <div class="feature-grid">
                            <div class="feature-card">
                                <i class="fa-solid fa-apple-whole"></i>
                                <strong>Bahan Segar</strong>
                                <span>Bahan dipilih dan diolah untuk menjaga rasa.</span>
                            </div>

                            <div class="feature-card">
                                <i class="fa-solid fa-pepper-hot"></i>
                                <strong>Menu Favorit</strong>
                                <span>Pilihan menu pedas, gurih, dan mengenyangkan.</span>
                            </div>

                            <div class="feature-card">
                                <i class="fa-solid fa-store"></i>
                                <strong>Kontak Aktif</strong>
                                <span>Kontak resmi yang bisa kamu hubungi sebelum pesan.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="katalog">
            <div class="container">
                <div class="section-head reveal">
                    <div class="section-kicker">Preview Katalog</div>
                    <h2 class="section-title">Pilih menu dulu, lapar kemudian.</h2>
                    <p class="section-desc">
                        Intip dulu menu Dapoer Mba ReTe sebelum pilih yang paling cocok.
                        Dari olahan ayam sampai nasi goreng, semuanya bisa kamu cek lebih lengkap di halaman katalog.
                    </p>
                </div>

                <div class="catalog-grid">
                    @foreach($previewProduk as $produk)
                        <div class="catalog-card reveal">
                            <div class="catalog-img">
                                <img src="{{ asset('assets/images/' . $produk['gambar']) }}" alt="{{ $produk['nama_produk'] }}">
                            </div>

                            <h3>{{ $produk['nama_produk'] }}</h3>
                            <p>{{ $produk['deskripsi'] }}</p>

                            <div class="catalog-meta">
                                <span>{{ $produk['label'] }}</span>
                                <i class="fa-solid fa-heart"></i>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="center-action reveal">
                    <a href="/katalog" class="btn btn-primary">
                        Buka Katalog Lengkap <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>

        <section class="section" id="berita">
            <div class="container">
                <div class="section-head reveal">
                    <div>
                        <div class="section-kicker">Kabar Terbaru</div>
                        <h2 class="section-title">Update dari Dapoer Mba ReTe</h2>
                        <p class="section-desc">
                            Lihat informasi terbaru seputar menu, promo, layanan pemesanan online,
                            dan perkembangan Dapoer Mba ReTe.
                        </p>
                    </div>
                </div>

                @if(isset($beritaTerbaru) && $beritaTerbaru->count())
                    <div class="news-preview-grid">
                        @foreach($beritaTerbaru as $item)
                            <article class="news-preview-card reveal">
                                <a href="{{ route('berita.show', $item->slug) }}" class="news-preview-img">
                                    @if($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}">
                                    @else
                                        <img src="{{ asset('assets/images/logo.png') }}" alt="{{ $item->judul }}">
                                    @endif
                                </a>

                                <div class="news-preview-body">
                                    <div class="news-preview-meta">
                                        <span>
                                            <i class="fa-solid fa-user"></i>
                                            {{ $item->author }}
                                        </span>

                                        <span>
                                            <i class="fa-solid fa-calendar-days"></i>
                                            {{ \Carbon\Carbon::parse($item->tanggal_terbit)->translatedFormat('d M Y') }}
                                        </span>
                                    </div>

                                    <h3>
                                        <a href="{{ route('berita.show', $item->slug) }}">
                                            {{ $item->judul }}
                                        </a>
                                    </h3>

                                    <p>
                                        {{ Str::limit(strip_tags($item->isi), 155) }}
                                    </p>

                                    <a href="{{ route('berita.show', $item->slug) }}" class="news-preview-link">
                                        Baca Selengkapnya
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="news-preview-action reveal">
                        <a href="/berita" class="btn btn-primary">
                            Lihat Semua Berita
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                @else
                    <div class="news-preview-empty reveal">
                        Belum ada berita yang dipublikasikan. Nanti berita terbaru Dapoer Mba ReTe akan muncul di bagian ini.
                    </div>

                    <div class="news-preview-action reveal">
                        <a href="/berita" class="btn btn-primary">
                            Lihat Semua Berita
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                @endif
            </div>
        </section>

        <section class="section" id="cabang">
            <div class="container">
                <div class="branch-box reveal">
                    <div class="branch-layout">
                        <div class="branch-highlight">
                            <div>
                                <h3>Pesan menu favoritmu di Dapoer Mba ReTe.</h3>
                                <p>
                                    Cek kontak Dapoer Mba ReTe yang bisa kamu hubungi. Lewat informasi ini,
                                    kamu bisa mengetahui cara paling mudah untuk pesan menu favoritmu.
                                </p>
                            </div>

                            <a href="#kontak" class="btn btn-soft">
                                Hubungi Kami
                            </a>
                        </div>

                        <div>
                            <div class="section-kicker">Informasi Cabang</div>
                            <h2 class="section-title">Cabang Aktif</h2>

                            <div class="branch-list">
                                @foreach($cabangs as $cabang)
                                    <div class="branch-item">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <h4>{{ $cabang['nama_cabang'] }}</h4>
                                        <p>{{ $cabang['alamat'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="kontak">
            <div class="container">
                <div class="section-head reveal">
                    <div class="section-kicker">How To Order</div>
                    <h2 class="section-title">Mau makan enak sekarang? Pilih cara yang paling gampang.</h2>
                    <p class="section-desc">
                        Pelanggan bisa melihat katalog, datang langsung ke cabang, atau menghubungi
                        kontak resmi untuk pemesanan online.
                    </p>
                </div>

                <div class="order-grid">
                    <div class="order-card reveal">
                        <div class="order-icon">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                        <h3>Lihat Katalog</h3>
                        <p>Cek menu ayam, nasi goreng, dan pilihan makanan lain yang tersedia di halaman katalog.</p>
                    </div>

                    <div class="order-card reveal">
                        <div class="order-icon">
                            <i class="fa-solid fa-store"></i>
                        </div>
                        <h3>Datang Langsung</h3>
                        <p>Datang langsung ke lokasi untuk menikmati menu favoritmu.</p>
                    </div>

                    <div class="order-card reveal">
                        <div class="order-icon">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>
                        <h3>Pesan Online</h3>
                        <p>Hubungi kontak resmi atau sosial media untuk informasi pemesanan.</p>
                    </div>
                </div>

                <div class="contact-strip reveal">
                    <div>
                        <h3>Kontak & Media Sosial</h3>
                        <p>Ikuti update menu, promo, dan informasi terbaru dari Dapoer Mba ReTe.</p>
                    </div>

                    <div class="social-links">
                        <a href="https://api.whatsapp.com/send/?phone=6281347024243&text&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer">
                            <i class="fa-brands fa-whatsapp"></i>
                            WhatsApp
                        </a>

                        <a href="https://www.instagram.com/masakan_unae/" target="_blank" rel="noopener noreferrer">
                            <i class="fa-brands fa-instagram"></i>
                            Gofood
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-inner">
                <div class="footer-brand">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Dapoer Mba ReTe">
                    <span>Dapoer Mba ReTe</span>
                </div>

                <div class="footer-links">
                    <a href="#home">Home</a>
                    <a href="#about">Tentang</a>
                    <a href="/katalog">Katalog</a>
                    <a href="#kontak">Kontak</a>
                </div>

                <button type="button" class="credit-trigger" id="creditTrigger">
                    <i class="fa-solid fa-code"></i>
                    Tim Pengembang
                </button>

                <p style="font-size: 14px; color: rgba(255,255,255,0.66);">
                    © 2026 Dapoer Mba ReTe
                </p>
            </div>
        </div>
    </footer>

    <div class="credit-modal" id="creditModal">
        <div class="credit-backdrop" id="creditBackdrop"></div>

        <div class="credit-card">
            <button type="button" class="credit-close" id="creditClose" aria-label="Tutup credit">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <div class="credit-icon">
                <i class="fa-solid fa-code"></i>
            </div>

            <p class="credit-kicker">Credit Website</p>

            <h3>Dikembangkan oleh Mahasiswa Sistem Informasi, Universitas Mulawarman.</h3>

            <p class="credit-desc">
                Website ini dirancang untuk membantu UMKM tampil lebih profesional,
                mudah dikelola, dan nyaman digunakan pelanggan.
            </p>

            <div class="credit-team">
                <div>
                    <strong>Putri</strong>
                    <span>Project Lead & Fullstack</span>
                </div>
            </div>

            <div class="credit-cta">
                <p>
                    Punya UMKM, organisasi, atau bisnis yang pengen punya website profesional juga?
                    Yuk ngobrol, siapa tahu bisa kami bantu wujudkan.
                </p>

                <div class="credit-actions">
                    <a href="https://t.me/syzota" target="_blank" rel="noopener noreferrer">
                        <i class="fa-brands fa-telegram"></i>
                        Telegram
                    </a>

                    <a href="https://github.com/syzota" target="_blank" rel="noopener noreferrer">
                        <i class="fa-brands fa-github"></i>
                        Portofolio
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        const revealElements = document.querySelectorAll('.reveal');

        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.16
        });

        revealElements.forEach((element) => {
            revealObserver.observe(element);
        });

        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');

        function closeMobileMenu() {
            if (!menuToggle || !mobileMenu) {
                return;
            }

            mobileMenu.classList.remove('is-open');

            const icon = menuToggle.querySelector('i');
            if (icon) {
                icon.classList.add('fa-bars');
                icon.classList.remove('fa-xmark');
            }
        }

        if (menuToggle && mobileMenu) {
            menuToggle.addEventListener('click', function () {
                mobileMenu.classList.toggle('is-open');

                const icon = menuToggle.querySelector('i');
                if (icon) {
                    icon.classList.toggle('fa-bars');
                    icon.classList.toggle('fa-xmark');
                }
            });

            mobileMenu.querySelectorAll('a').forEach(function (link) {
                link.addEventListener('click', function () {
                    closeMobileMenu();
                });
            });
        }

        const creditTrigger = document.getElementById('creditTrigger');
        const creditModal = document.getElementById('creditModal');
        const creditBackdrop = document.getElementById('creditBackdrop');
        const creditClose = document.getElementById('creditClose');

        function openCreditModal() {
            if (!creditModal) {
                return;
            }

            creditModal.classList.add('is-open');
            document.body.classList.add('modal-open');
            closeMobileMenu();
        }

        function closeCreditModal() {
            if (!creditModal) {
                return;
            }

            creditModal.classList.remove('is-open');
            document.body.classList.remove('modal-open');
        }

        if (creditTrigger) {
            creditTrigger.addEventListener('click', function () {
                openCreditModal();
            });
        }

        if (creditBackdrop) {
            creditBackdrop.addEventListener('click', function () {
                closeCreditModal();
            });
        }

        if (creditClose) {
            creditClose.addEventListener('click', function () {
                closeCreditModal();
            });
        }

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeCreditModal();
                closeMobileMenu();
            }
        });

        window.addEventListener('scroll', function () {
            if (window.innerWidth <= 720 && mobileMenu && mobileMenu.classList.contains('is-open')) {
                closeMobileMenu();
            }
        });

        window.addEventListener('resize', function () {
            if (window.innerWidth > 720) {
                closeMobileMenu();
            }
        });
    </script>

</body>
</html>