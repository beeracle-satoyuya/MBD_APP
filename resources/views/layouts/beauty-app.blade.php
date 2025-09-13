<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Beauty Device - あなただけの美容家電診断</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600" rel="stylesheet" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&display=swap');

        * {
            font-family: 'Noto Sans JP', 'Inter', sans-serif;
        }

        body {
            background: linear-gradient(180deg, #F0D4F8 0%, #E8F4FF 50%, #F0D4F8 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* 背景画像 */
        .bg-full {
            background-image: url('/storage/MBD_app_material/◯アプリ背景（画面FULL）.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        /* ヘッダー・フッター背景 */
        .header-footer-bg {
            background-image: url('/storage/MBD_app_material/hosizora.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* タイトル背景 */
        .title-bg {
            background-color: rgba(100, 143, 254, 0.4);
            border-radius: 20px;
            padding: 12px 24px;
        }

        /* 雲のようなボタン */
        .cloud-button {
            background: linear-gradient(145deg, #ffffff, #f0f0f0);
            border-radius: 50px;
            box-shadow:
                0 8px 32px rgba(255, 255, 255, 0.5),
                0 4px 16px rgba(0, 0, 0, 0.1),
                inset 0 2px 4px rgba(255, 255, 255, 0.8);
            border: 2px solid rgba(255, 255, 255, 0.6);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 10;
            display: inline-block !important;
            visibility: visible !important;
            opacity: 1 !important;
        }

        .cloud-button:hover {
            transform: translateY(-4px);
            box-shadow:
                0 12px 40px rgba(255, 255, 255, 0.6),
                0 8px 24px rgba(0, 0, 0, 0.15),
                inset 0 2px 6px rgba(255, 255, 255, 0.9);
        }

        .cloud-button:active {
            transform: translateY(-2px);
        }

        /* キャラクター画像のレイヤー効果 */
        .character-overlay {
            position: relative;
            z-index: 1;
            pointer-events: none;
        }

        /* リボン装飾 */
        .ribbon-bg {
            background: linear-gradient(135deg, rgba(147, 51, 234, 0.4), rgba(79, 70, 229, 0.4));
            position: relative;
            box-shadow: 0 4px 15px rgba(147, 51, 234, 0.3);
        }

        .ribbon-decoration::before {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 20px solid transparent;
            border-right: 20px solid transparent;
            border-top: 15px solid rgba(147, 51, 234, 0.4);
        }

        .ribbon-decoration::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 18px solid transparent;
            border-right: 18px solid transparent;
            border-top: 13px solid rgba(79, 70, 229, 0.4);
            margin-top: -2px;
        }

        /* BEERACLEボタンのグラデーション */
        .beeracle-button {
            background: linear-gradient(135deg, #FFB6C1, #87CEEB);
            background-size: 200% 200%;
            animation: gradientShift 3s ease infinite;
            border: none;
            color: #2D3748;
            font-weight: bold;
            text-shadow: 0 1px 2px rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 15px rgba(255, 182, 193, 0.4), 0 2px 8px rgba(135, 206, 235, 0.3);
            transition: all 0.3s ease;
        }

        .beeracle-button:hover {
            background: linear-gradient(135deg, #FFA0B4, #7BC4E8);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 182, 193, 0.6), 0 4px 12px rgba(135, 206, 235, 0.4);
            color: #1A202C;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* レスポンシブ対応のデバッグ用CSS */
        @media (min-width: 768px) {
            .md\:hidden {
                display: none !important;
            }

            .md\:flex {
                display: flex !important;
            }

            .md\:block {
                display: block !important;
            }

            .md\:w-40 {
                width: 10rem !important;
            }

            .md\:h-40 {
                height: 10rem !important;
            }

            .md\:w-48 {
                width: 12rem !important;
            }

            .md\:h-48 {
                height: 12rem !important;
            }

            .md\:w-52 {
                width: 13rem !important;
            }

            .md\:h-52 {
                height: 13rem !important;
            }

            .w-60 {
                width: 15rem !important;
            }

            .h-60 {
                height: 15rem !important;
            }

            .md\:px-8 {
                padding-left: 2rem !important;
                padding-right: 2rem !important;
            }

            .md\:px-12 {
                padding-left: 3rem !important;
                padding-right: 3rem !important;
            }

            .md\:py-3 {
                padding-top: 0.75rem !important;
                padding-bottom: 0.75rem !important;
            }

            .md\:py-4 {
                padding-top: 1rem !important;
                padding-bottom: 1rem !important;
            }

            .md\:text-xl {
                font-size: 1.25rem !important;
                line-height: 1.75rem !important;
            }

            .md\:text-2xl {
                font-size: 1.5rem !important;
                line-height: 2rem !important;
            }
        }

        @media (max-width: 767px) {
            .md\:hidden {
                display: block !important;
            }

            .md\:flex {
                display: none !important;
            }

            .md\:block {
                display: none !important;
            }
        }

        /* 診断スタートボタンの表示確保 */
        .scroll-reveal {
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
        }

        /* ふわふわアニメーション */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }

            50% {
                opacity: 1;
                transform: scale(1.05);
            }

            70% {
                transform: scale(0.9);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .bounce-in {
            animation: bounceIn 0.6s ease-out forwards;
        }

        /* 雲の吹き出し */
        .cloud-speech {
            background-color: #FFE1FB;
            border-radius: 30px;
            position: relative;
            padding: 20px;
            box-shadow: 0 8px 32px rgba(255, 225, 251, 0.4);
        }

        .cloud-speech::before {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 30px;
            width: 20px;
            height: 20px;
            background-color: #FFE1FB;
            border-radius: 50%;
        }

        .cloud-speech::after {
            content: '';
            position: absolute;
            bottom: -20px;
            left: 20px;
            width: 12px;
            height: 12px;
            background-color: #FFE1FB;
            border-radius: 50%;
        }

        /* レンタル誘導のスタイル */
        .rental-text {
            color: #FFA5F0;
            background-color: rgba(241, 213, 249, 0.8);
            border-radius: 15px;
            padding: 12px 20px;
        }

        /* 商品カードのスタイル */
        .product-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 2px solid rgba(255, 255, 255, 0.5);
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        /* ローディング・段階的表示のアニメーション */
        .stagger-animation {
            opacity: 0;
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .stagger-animation:nth-child(1) {
            animation-delay: 0.1s;
        }

        .stagger-animation:nth-child(2) {
            animation-delay: 0.2s;
        }

        .stagger-animation:nth-child(3) {
            animation-delay: 0.3s;
        }

        /* スクロールトリガーアニメーション */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease-out;
        }

        .scroll-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body class="bg-full">
    <!-- ヘッダー -->
    <header class="header-footer-bg h-24 flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-2xl font-bold text-white">My Beauty Device</h1>
        </div>
    </header>

    <!-- メインコンテンツ -->
    <main class="min-h-screen px-4 py-8">
        @yield('content')
    </main>

    <!-- フッター -->
    <footer class="header-footer-bg h-20 flex items-center justify-center">
        <div class="text-center">
            <p class="text-white font-medium">&copy; 2025 My Beauty Device. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // スクロール時のアニメーション
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.scroll-reveal').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
    @livewireScripts
    <script>
        // Livewireの初期化確認
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Livewire loaded:', typeof Livewire !== 'undefined');
        });
    </script>
</body>

</html>
