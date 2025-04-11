<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - ZinWear</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #6C63FF;  /* Violet moderne */
            --secondary: #FF6584; /* Rose vif */
            --dark: #2D3748;     /* Noir bleuté */
            --light: #F8FAFC;    /* Blanc très clair */
            --text: #4A5568;     /* Gris foncé */
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
        }

        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 20px;
        }

        .about-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .about-header h1 {
            font-size: 3rem;
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
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
            margin-bottom: 80px;
        }

        .about-text p {
            margin-bottom: 20px;
            font-size: 1.1rem;
        }

        .about-image {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .about-image img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.5s ease;
        }

        .about-image:hover img {
            transform: scale(1.03);
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
        }

        .newsletter-section h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .newsletter-form {
            display: flex;
            max-width: 500px;
            margin: 0 auto;
        }

        .newsletter-input {
            flex: 1;
            padding: 15px 20px;
            border: none;
            border-radius: 50px 0 0 50px;
            font-size: 1rem;
            outline: none;
        }

        .newsletter-btn {
            background: var(--dark);
            color: white;
            border: none;
            padding: 0 30px;
            border-radius: 0 50px 50px 0;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .newsletter-btn:hover {
            background: #1A202C;
        }

        /* Contact Section */
        .contact-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }

        .help-section, .contact-info {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        .section-title {
            font-size: 1.5rem;
            color: var(--primary);
            margin-bottom: 20px;
            font-weight: 600;
        }

        .contact-list {
            list-style: none;
        }

        .contact-list li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
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
        }

        /* Social Media */
        .social-media {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
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
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(108, 99, 255, 0.3);
        }

        .social-icon:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(108, 99, 255, 0.4);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .about-content, .contact-section {
                grid-template-columns: 1fr;
            }
            
            .about-header h1 {
                font-size: 2.2rem;
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
                <p>At ZinWear, we believe fashion is more than just clothing—it's a statement of individuality and culture. Founded in Agadir, Morocco, our brand blends contemporary style with traditional craftsmanship to create unique, high-quality apparel for men and women.</p>
                <p>Every piece in our collection is carefully curated to ensure comfort, durability, and timeless elegance. Whether you're looking for casual wear, elegant outfits, or statement pieces, ZinWear brings you fashion that inspires confidence and celebrates Moroccan heritage.</p>
            </div>
            
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1469334031218-e382a71b716b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="ZinWear Fashion">
            </div>
        </div>

        <div class="newsletter-section">
            <h2>Newsletter</h2>
            <p>Subscribe to get updates on new collections and exclusive offers</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Enter your email" class="newsletter-input" required>
                <button type="submit" class="newsletter-btn">SUBSCRIBE</button>
            </form>
        </div>

        <div class="contact-section">
            <div class="help-section">
                <h3 class="section-title">NEED HELP</h3>
                <p>Our dedicated customer support team is here to assist you with any questions about sizing, orders, or styling advice. Reach out to us via email at support@zinwear.com or call +212 456837363. We're committed to making your ZinWear experience seamless and enjoyable.</p>
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
            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-whatsapp"></i></a>
        </div>
    </div>
</body>
</html>
