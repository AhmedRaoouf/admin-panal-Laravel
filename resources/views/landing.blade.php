<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CR Delivery - اطلب وصل لحد بابك</title>
    <meta name="description" content="تطبيق CR Delivery - اطلب من أفضل المطاعم واستمتع بتوصيل سريع وآمن">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --gold: #FCD34D;
            --gold-dark: #F59E0B;
            --bg-dark: #0F0F0F;
            --bg-card: #1F1F1F;
            --text-primary: #FFFFFF;
            --text-secondary: #D1D5DB;
        }

        html, body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", system-ui, sans-serif;
            background: var(--bg-dark);
            color: var(--text-primary);
            overflow-x: hidden;
        }

        /* ===== HERO SECTION ===== */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #000 0%, #1a1a1a 100%);
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            animation: slideRight 3s ease-in-out infinite;
        }

        @keyframes slideRight {
            0%, 100% { transform: translateX(-100%); }
            50% { transform: translateX(100%); }
        }

        .hero__content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            max-width: 1400px;
            width: 100%;
            z-index: 1;
        }

        @media (max-width: 768px) {
            .hero__content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        .hero__text {
            animation: fadeInUp 0.8s ease-out;
        }

        .logo-box {
            display: inline-flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            padding: 1rem 1.5rem;
            background: rgba(252, 211, 77, 0.1);
            border: 1px solid rgba(252, 211, 77, 0.3);
            border-radius: 12px;
            backdrop-filter: blur(10px);
            animation: slideInLeft 0.6s ease-out;
        }

        .logo-box span {
            font-size: 28px;
        }

        .logo-text {
            font-weight: 800;
            font-size: 18px;
            background: linear-gradient(135deg, var(--gold), #FF9500);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        h1 {
            font-size: 4rem;
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--text-primary), var(--gold));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: slideInDown 0.8s ease-out;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }
        }

        .subtitle {
            font-size: 1.25rem;
            color: var(--text-secondary);
            line-height: 1.8;
            margin-bottom: 2rem;
            max-width: 500px;
            animation: slideInUp 0.8s ease-out 0.2s both;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2.5rem;
            animation: slideInUp 0.8s ease-out 0.4s both;
        }

        .btn {
            padding: 1rem 2rem;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--gold);
            color: var(--bg-dark);
        }

        .btn-primary:hover {
            background: var(--gold-dark);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(252, 211, 77, 0.3);
        }

        .btn-secondary {
            background: rgba(252, 211, 77, 0.1);
            color: var(--gold);
            border: 1px solid var(--gold);
        }

        .btn-secondary:hover {
            background: var(--gold);
            color: var(--bg-dark);
        }

        /* ===== HERO IMAGES ===== */
        .hero__images {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            perspective: 1000px;
            animation: fadeInRight 0.8s ease-out;
        }

        .phone-mockup {
            width: 280px;
            height: 580px;
            background: linear-gradient(135deg, var(--gold), #FF9500);
            border-radius: 40px;
            padding: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .phone-mockup:hover {
            transform: rotateY(-10deg) rotateX(5deg) translateY(-10px);
            box-shadow: 0 30px 80px rgba(252, 211, 77, 0.2);
        }

        .phone-mockup::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            width: 40%;
            height: 28px;
            background: #000;
            border-radius: 0 0 25px 25px;
            z-index: 10;
            transform: translateX(-50%);
        }

        .phone-screen {
            width: 100%;
            height: 100%;
            background: #000;
            border-radius: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            font-weight: bold;
            font-size: 12px;
            text-align: center;
            padding: 1rem;
        }

        .phone-mockup:nth-child(1) { animation: float 3s ease-in-out infinite; }
        .phone-mockup:nth-child(2) { animation: float 3s ease-in-out 0.5s infinite; display: none; }
        .phone-mockup:nth-child(3) { animation: float 3s ease-in-out 1s infinite; display: none; }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @media (max-width: 768px) {
            .phone-mockup:nth-child(2),
            .phone-mockup:nth-child(3) {
                display: none !important;
            }
        }

        /* ===== QR CODES SECTION ===== */
        .qr-section {
            background: linear-gradient(180deg, #1a1a1a 0%, var(--bg-dark) 100%);
            padding: 6rem 2rem;
            position: relative;
            border-top: 1px solid rgba(252, 211, 77, 0.1);
        }

        .qr-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(252, 211, 77, 0.1), transparent);
            transform: translateX(-50%);
            filter: blur(60px);
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
            animation: fadeInDown 0.8s ease-out;
        }

        .section-header h2 {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--text-primary), var(--gold));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-header p {
            font-size: 1.1rem;
            color: var(--text-secondary);
        }

        .qr-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            max-width: 1000px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .qr-grid {
                grid-template-columns: 1fr;
            }
        }

        .qr-card {
            background: linear-gradient(135deg, rgba(252, 211, 77, 0.05), rgba(255, 149, 0, 0.02));
            border: 1px solid rgba(252, 211, 77, 0.2);
            border-radius: 24px;
            padding: 3rem 2rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.8s ease-out both;
        }

        .qr-card:nth-child(1) { animation-delay: 0.2s; }
        .qr-card:nth-child(2) { animation-delay: 0.4s; }

        .qr-card::before {
            content: '';
            position: absolute;
            top: -1px;
            left: -1px;
            right: -1px;
            bottom: -1px;
            background: linear-gradient(135deg, var(--gold), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
            border-radius: 24px;
        }

        .qr-card:hover {
            border-color: var(--gold);
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(252, 211, 77, 0.15);
        }

        .qr-card:hover::before {
            opacity: 0.1;
        }

        .qr-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            animation: pulse 2s ease-in-out infinite;
        }

        .qr-card:hover .qr-icon {
            animation: bounce 0.6s ease-in-out;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .qr-card h3 {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            color: var(--gold);
        }

        .qr-card p {
            color: var(--text-secondary);
            margin-bottom: 2rem;
            font-size: 0.95rem;
        }

        .qr-container-inner {
            background: var(--text-primary);
            padding: 1.5rem;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }

        .qr-card:hover .qr-container-inner {
            transform: scale(1.05);
        }

        canvas {
            max-width: 100%;
            display: block;
        }

        .qr-download {
            display: inline-block;
            padding: 1rem 2rem;
            background: var(--gold);
            color: var(--bg-dark);
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
        }

        .qr-download:hover {
            background: var(--gold-dark);
            transform: scale(1.05);
        }

        /* ===== FEATURES SECTION ===== */
        .features {
            padding: 6rem 2rem;
            background: var(--bg-dark);
            border-top: 1px solid rgba(252, 211, 77, 0.1);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            background: linear-gradient(135deg, rgba(31, 31, 31, 0.8), rgba(31, 31, 31, 0.4));
            border: 1px solid rgba(252, 211, 77, 0.1);
            padding: 2rem;
            border-radius: 16px;
            transition: all 0.3s ease;
            animation: fadeInUp 0.8s ease-out both;
        }

        .feature-card:hover {
            border-color: var(--gold);
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(252, 211, 77, 0.1);
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .feature-card h4 {
            color: var(--gold);
            margin-bottom: 0.8rem;
            font-size: 1.2rem;
        }

        .feature-card p {
            color: var(--text-secondary);
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* ===== FOOTER ===== */
        .footer {
            border-top: 1px solid rgba(252, 211, 77, 0.1);
            padding: 3rem 2rem;
            text-align: center;
            color: var(--text-secondary);
            background: linear-gradient(180deg, transparent, rgba(0, 0, 0, 0.5));
        }

        .footer a {
            color: var(--gold);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: var(--gold-dark);
        }

        /* ===== ANIMATIONS ===== */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body>
    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero__content">
            <div class="hero__text">
                <div class="logo-box">
                    <span>🚀</span>
                    <div class="logo-text">CR DELIVERY</div>
                </div>
                <h1>اطلب وصل لحد بابك</h1>
                <p class="subtitle">اطلب من أفضل المطاعم والمقاهي واستمتع بتوصيل سريع وآمن مع تطبيق CR Delivery</p>
                <div class="cta-buttons">
                    <a href="#qr-codes" class="btn btn-primary">حمل الآن</a>
                    <a href="#features" class="btn btn-secondary">اعرف المزيد</a>
                </div>
            </div>
            <div class="hero__images">
                <div class="phone-mockup">
                    <div class="phone-screen">لقطة التطبيق</div>
                </div>
                <div class="phone-mockup">
                    <div class="phone-screen">لقطة التطبيق</div>
                </div>
                <div class="phone-mockup">
                    <div class="phone-screen">لقطة التطبيق</div>
                </div>
            </div>
        </div>
    </section>

    <!-- QR CODES SECTION -->
    <section class="qr-section" id="qr-codes">
        <div class="section-header">
            <h2>حمل التطبيق الآن</h2>
            <p>اختر المتجر المفضل لديك وابدأ الطلب فوراً</p>
        </div>

        <div class="qr-grid">
            <!-- Google Play -->
            <div class="qr-card">
                <div class="qr-icon">🔵</div>
                <h3>Google Play</h3>
                <p>متجر جوجل بلاي</p>
                <div class="qr-container-inner">
                    <canvas id="qr-google" style="width: 220px; height: 220px;"></canvas>
                </div>
                <a href="https://play.google.com/store/apps/details?id=com.cr7delivery.cr7_delivery" target="_blank" class="qr-download">
                    تحميل الآن
                </a>
            </div>

            <!-- Apple App Store -->
            <div class="qr-card">
                <div class="qr-icon">🍎</div>
                <h3>App Store</h3>
                <p>متجر آبل أب ستور</p>
                <div class="qr-container-inner">
                    <canvas id="qr-apple" style="width: 220px; height: 220px;"></canvas>
                </div>
                <a href="https://apps.apple.com/ae/app/cr-delivery/id6815852436" target="_blank" class="qr-download">
                    تحميل الآن
                </a>
            </div>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section class="features" id="features">
        <div class="section-header">
            <h2>لماذا CR Delivery؟</h2>
        </div>

        <div class="features-grid">
            <div class="feature-card reveal">
                <div class="feature-icon">⚡</div>
                <h4>توصيل سريع</h4>
                <p>وصول طعامك الساخن والطازج لحد باب منزلك في أسرع وقت</p>
            </div>
            <div class="feature-card reveal">
                <div class="feature-icon">🎯</div>
                <h4>مطاعم متنوعة</h4>
                <p>اختر من آلاف المطاعم والمقاهي والتجار المفضل لديك</p>
            </div>
            <div class="feature-card reveal">
                <div class="feature-icon">💰</div>
                <h4>عروض وخصومات</h4>
                <p>استمتع بأفضل العروض والخصومات الحصرية على التطبيق</p>
            </div>
            <div class="feature-card reveal">
                <div class="feature-icon">🔒</div>
                <h4>آمن وموثوق</h4>
                <p>تتبع طلبك في الوقت الفعلي مع خدمة عملاء على مدار الساعة</p>
            </div>
            <div class="feature-card reveal">
                <div class="feature-icon">🚴</div>
                <h4>متوصلينا محترفون</h4>
                <p>توصيل آمن وسريع من قبل عاملين مدربين وملتزمين</p>
            </div>
            <div class="feature-card reveal">
                <div class="feature-icon">📱</div>
                <h4>تطبيق سهل</h4>
                <p>واجهة بسيطة وسهلة تجعل الطلب والدفع أكثر راحة</p>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <p>&copy; 2026 CR Delivery. جميع الحقوق محفوظة.</p>
        <p style="margin-top: 1.5rem; font-size: 0.9rem;">
            <a href="#">سياسة الخصوصية</a> •
            <a href="#">شروط الاستخدام</a> •
            <a href="#">اتصل بنا</a>
        </p>
    </footer>

    <!-- QR Code Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <script>
        // Generate QR Codes
        const googlePlayUrl = 'https://play.google.com/store/apps/details?id=com.cr7delivery.cr7_delivery';
        const appStoreUrl = 'https://apps.apple.com/ae/app/cr-delivery/id6815852436';

        new QRCode(document.getElementById('qr-google'), {
            text: googlePlayUrl,
            width: 200,
            height: 200,
            colorDark: '#0F0F0F',
            colorLight: '#FFFFFF',
            correctLevel: QRCode.CorrectLevel.H
        });

        new QRCode(document.getElementById('qr-apple'), {
            text: appStoreUrl,
            width: 200,
            height: 200,
            colorDark: '#0F0F0F',
            colorLight: '#FFFFFF',
            correctLevel: QRCode.CorrectLevel.H
        });

        // Scroll Reveal Animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

        // Smooth Scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</body>
</html>