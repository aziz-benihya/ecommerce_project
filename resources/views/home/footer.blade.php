<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover ZinWear - Moroccan fashion brand blending contemporary style with traditional craftsmanship. About our story, values and team.">
    <title>About Us - ZinWear | Moroccan Fashion Brand</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #6C63FF;  /* Violet moderne */
            --primary-light: #8b85ff;
            --secondary: #FF6584; /* Rose vif */
            --secondary-light: #ff8da1;
            --dark: #2D3748;     /* Noir bleuté */
            --dark-light: #4a5568;
            --light: #F8FAFC;    /* Blanc très clair */
            --lighter: #ffffff;
            --text: #4A5568;     /* Gris foncé */
            --text-light: #718096;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light);
            color: var(--text);
            line-height: 1.7;
            scroll-behavior: smooth;
        }

        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 20px;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .about-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .about-header h1 {
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .about-header h1:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
        }

        .about-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 50px;
            align-items: center;
            margin-bottom: 80px;
        }

        .about-text p {
            margin-bottom: 20px;
            font-size: 1.1rem;
            color: var(--text-light);
        }

        .highlight {
            color: var(--primary);
            font-weight: 600;
        }

        .about-image {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            position: relative;
        }

        .about-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(108, 99, 255, 0.1), rgba(255, 101, 132, 0.1));
            z-index: 1;
            opacity: 0;
            transition: var(--transition);
        }

        .about-image:hover::before {
            opacity: 1;
        }

        .about-image img {
            width: 100%;
            height: auto;
            display: block;
            transition: var(--transition);
            transform-origin: center;
        }

        .about-image:hover img {
            transform: scale(1.05);
        }

        /* Newsletter Section */
        .newsletter-section {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            padding: 60px;
            border-radius: 15px;
            color: white;
            text-align: center;
            margin-bottom: 80px;
            box-shadow: 0 15px 30px rgba(108, 99, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .newsletter-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            animation: pulse 8s infinite linear;
            z-index: 0;
        }

        @keyframes pulse {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .newsletter-content {
            position: relative;
            z-index: 1;
        }

        .newsletter-section h2 {
            font-size: clamp(1.8rem, 3vw, 2.5rem);
            margin-bottom: 20px;
        }

        .newsletter-form {
            display: flex;
            max-width: 500px;
            margin: 0 auto;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border-radius: 50px;
        }

        .newsletter-input {
            flex: 1;
            padding: 15px 25px;
            border: none;
            border-radius: 50px 0 0 50px;
            font-size: 1rem;
            outline: none;
            transition: var(--transition);
        }

        .newsletter-input:focus {
            box-shadow: inset 0 0 0 2px var(--primary);
        }

        .newsletter-btn {
            background: var(--dark);
            color: white;
            border: none;
            padding: 0 30px;
            border-radius: 0 50px 50px 0;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .newsletter-btn:hover {
            background: var(--primary);
            transform: translateX(5px);
        }

        /* Contact Section */
        .contact-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .help-section, .contact-info {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: var(--transition);
        }

        .help-section:hover, .contact-info:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }

        .section-title {
            font-size: 1.5rem;
            color: var(--primary);
            margin-bottom: 20px;
            font-weight: 600;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--secondary);
            border-radius: 2px;
        }

        .contact-list {
            list-style: none;
        }

        .contact-list li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            transition: var(--transition);
        }

        .contact-list li:hover {
            transform: translateX(5px);
        }

        .contact-list i {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1rem;
            flex-shrink: 0;
            transition: var(--transition);
        }

        .contact-list li:hover i {
            transform: scale(1.1);
        }

        /* Social Media */
        .social-media {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .social-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            transition: var(--transition);
            box-shadow: 0 5px 15px rgba(108, 99, 255, 0.3);
            position: relative;
            overflow: hidden;
        }

        .social-icon::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: var(--transition);
        }

        .social-icon:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 8px 25px rgba(108, 99, 255, 0.5);
        }

        .social-icon:hover::before {
            left: 100%;
        }

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            box-shadow: 0 5px 20px rgba(108, 99, 255, 0.3);
            z-index: 99;
        }

        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(108, 99, 255, 0.5);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .about-container {
                padding: 50px 15px;
            }
            
            .about-content, .contact-section {
                gap: 30px;
            }
            
            .newsletter-section {
                padding: 40px 20px;
            }
            
            .newsletter-form {
                flex-direction: column;
            }
            
            .newsletter-input, .newsletter-btn {
                border-radius: 50px;
                width: 100%;
            }
            
            .newsletter-btn {
                margin-top: 15px;
                padding: 15px;
                justify-content: center;
            }

            .help-section, .contact-info {
                padding: 30px 20px;
            }
        }

        @media (max-width: 480px) {
            .about-header h1:after {
                width: 60px;
                bottom: -8px;
            }
        }
    </style>
</head>
<body>
    <div class="about-container">
        <div class="about-header">
            <h1>ABOUT US</h1>
        </div>

        <div class="about-content">
            <div class="about-text">
                <p>At <span class="highlight">ZinWear</span>, we believe fashion is more than just clothing—it's a statement of individuality and culture. Founded in Agadir, Morocco, our brand blends contemporary style with traditional craftsmanship to create unique, high-quality apparel for men and women.</p>
                <p>Every piece in our collection is carefully curated to ensure comfort, durability, and timeless elegance. Whether you're looking for casual wear, elegant outfits, or statement pieces, ZinWear brings you fashion that inspires confidence and celebrates Moroccan heritage.</p>
            </div>
            
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="ZinWear creative team working on fashion designs" loading="lazy">
            </div>
        </div>

        <div class="newsletter-section">
            <div class="newsletter-content">
                <h2>Join Our Fashion Journey</h2>
                <p>Subscribe to get updates on new collections, exclusive offers and style inspiration</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Enter your email" class="newsletter-input" required>
                    <button type="submit" class="newsletter-btn">
                        <span>SUBSCRIBE</span>
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="contact-section">
            <div class="help-section">
                <h3 class="section-title">NEED HELP</h3>
                <p>Our dedicated customer support team is here to assist you with any questions about sizing, orders, or styling advice. Reach out to us via email at <span class="highlight">support@zinwear.com</span> or call <span class="highlight">+212 456837363</span>. We're committed to making your ZinWear experience seamless and enjoyable.</p>
            </div>
            
            <div class="contact-info">
                <h3 class="section-title">CONTACT US</h3>
                <ul class="contact-list">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Hay Salama, Agadir, Morocco</span>
                    </li>
                    <li>
                        <i class="fas fa-phone-alt"></i>
                        <span>+212 783635374</span>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <span>ZinWear@gmail.com</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="social-media">
            <a href="#" class="social-icon" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-icon" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-icon" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
            <a href="#" class="social-icon" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        </div>
    </div>

    <a href="#" class="back-to-top" aria-label="Back to top"><i class="fas fa-arrow-up"></i></a>

    <script>
        // Back to top button
        const backToTopButton = document.querySelector('.back-to-top');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.add('visible');
            } else {
                backToTopButton.classList.remove('visible');
            }
        });
        
        backToTopButton.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Smooth scroll for all links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Animation on scroll
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.about-content, .newsletter-section, .contact-section');
            
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.3;
                
                if (elementPosition < screenPosition) {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }
            });
        };

        // Set initial state for animation
        document.querySelectorAll('.about-content, .newsletter-section, .contact-section').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
        });

        window.addEventListener('load', animateOnScroll);
        window.addEventListener('scroll', animateOnScroll);
    </script>
</body>
</html>