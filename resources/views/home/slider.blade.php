<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZinWear - Fashion Shop</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #6C63FF;
            --secondary: #FF6584;
            --dark: #2D3748;
            --light: #F7FAFC;
            --text: #4A5568;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--light);
            color: var(--text);
            line-height: 1.6;
        }

        .hero-section {
            display: flex;
            align-items: center;
            min-height: 80vh;
            padding: 0 5%;
            background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), 
                        url('https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
        }

        .hero-content {
            max-width: 600px;
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            color: var(--dark);
        }

        .hero-title span {
            color: var(--primary);
        }

        .hero-text {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            color: var(--text);
        }

        .cta-button {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(108, 99, 255, 0.3);
            transition: all 0.3s ease;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(108, 99, 255, 0.4);
        }

        .products-section {
            padding: 80px 5%;
            text-align: center;
            background-color: white;
        }

        .section-title {
            font-size: 2rem;
            color: var(--dark);
            margin-bottom: 2rem;
            font-weight: 700;
            position: relative;
            display: inline-block;
        }

        .section-title:after {
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

        .products-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 60px;
        }

        .product-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            background: white;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.12);
        }

        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        .product-info {
            padding: 20px;
            text-align: left;
        }

        .product-name {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .product-price {
            color: var(--primary);
            font-weight: 700;
            font-size: 1.1rem;
        }

        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--secondary);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .view-more {
            margin-top: 50px;
        }

        @media (max-width: 768px) {
            .hero-section {
                flex-direction: column;
                text-align: center;
                padding-top: 100px;
            }
            
            .products-gallery {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
            }
        }
    </style>
</head>
<body>
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Welcome To Our <br><span>ZinWear</span> Shop</h1>
            <p class="hero-text">Step into a world where style meets confidence. At ZinWear, we bring you trendy, comfortable, and high-quality fashion designed to make you stand out. Whether you're looking for everyday essentials or bold statement pieces, we've got you covered.</p>
            <a href="#" class="cta-button">Shop Now</a>
        </div>
    </section>

    <section class="products-section">
        <h2 class="section-title">Our Products</h2>
        
        <div class="products-gallery">
            <!-- Product 1 -->
            <div class="product-card">
                <span class="product-badge">New</span>
                <img src="https://images.unsplash.com/photo-1529374255404-311a2a4f1fd9?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Casual Outfit" class="product-image">
                <div class="product-info">
                    <h3 class="product-name">Casual Summer Dress</h3>
                    <p class="product-price">$59.99</p>
                </div>
            </div>
            
            <!-- Product 2 -->
            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1542272604-787c3835535d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Elegant Suit" class="product-image">
                <div class="product-info">
                    <h3 class="product-name">Premium Blazer</h3>
                    <p class="product-price">$129.99</p>
                </div>
            </div>
            
            <!-- Product 3 -->
            <div class="product-card">
                <span class="product-badge">Bestseller</span>
                <img src="https://images.unsplash.com/photo-1527719327859-c6ce80353573?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Streetwear" class="product-image">
                <div class="product-info">
                    <h3 class="product-name">Urban Streetwear Set</h3>
                    <p class="product-price">$89.99</p>
                </div>
            </div>
            
            <!-- Product 4 - Nouvelle image remplaçant le kaftan -->
            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Elegant Evening Dress" class="product-image">
                <div class="product-info">
                    <h3 class="product-name">Elegant Evening Dress</h3>
                    <p class="product-price">$149.99</p>
                </div>
            </div>
            
            <!-- Product 5 -->
            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1551232864-3f0890e580d9?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Denim Jacket" class="product-image">
                <div class="product-info">
                    <h3 class="product-name">Classic Denim Jacket</h3>
                    <p class="product-price">$79.99</p>
                </div>
            </div>
            
            <!-- Product 6 -->
            <div class="product-card">
                <span class="product-badge">Sale</span>
                <img src="https://images.unsplash.com/photo-1556905055-8f358a7a47b2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Sportswear" class="product-image">
                <div class="product-info">
                    <h3 class="product-name">Athleisure Set</h3>
                    <p class="product-price">$69.99 <span style="text-decoration: line-through; color: var(--text); opacity: 0.6; margin-left: 5px;">$89.99</span></p>
                </div>
            </div>
        </div>
        
        <div class="view-more">
            <a href="#" class="cta-button">View More Products</a>
        </div>
    </section>
</body>
</html>