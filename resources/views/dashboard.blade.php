<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZinWear Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #6d28d9;
            --primary-light: #8b5cf6;
            --secondary: #ec4899;
            --dark: #1e293b;
            --dark-light: #334155;
            --light: #f8fafc;
            --card-bg: #ffffff;
            --sidebar-bg: #1e293b;
            --text: #334155;
            --text-light: #64748b;
            --text-white: #f8fafc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--light);
            color: var(--text);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background-color: var(--sidebar-bg);
            color: var(--text-white);
            padding: 2rem 0;
            height: 100vh;
            position: sticky;
            top: 0;
        }

        .brand {
            padding: 0 2rem 2rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 2rem;
        }

        .brand h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
            color: white;
        }

        .brand p {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .menu {
            padding: 0 1rem;
        }

        .menu-title {
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            color: var(--text-light);
            margin-bottom: 1rem;
            padding: 0 1rem;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            margin-bottom: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .menu-item i {
            width: 24px;
            margin-right: 1rem;
            font-size: 1rem;
        }

        .menu-item:hover {
            background-color: rgba(255,255,255,0.1);
        }

        .menu-item.active {
            background-color: var(--primary);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 2rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .page-title h2 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--dark);
        }

        .user-profile {
            display: flex;
            align-items: center;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 1rem;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-title {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }

        .stat-title i {
            margin-right: 0.5rem;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
        }

        .stat-card.clients {
            border-left: 4px solid var(--primary);
        }

        .stat-card.products {
            border-left: 4px solid var(--secondary);
        }

        .stat-card.orders {
            border-left: 4px solid #10b981;
        }

        .stat-card.delivered {
            border-left: 4px solid #3b82f6;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
                padding: 1rem 0;
            }
            
            .brand h1, .brand p, .menu-item span {
                display: none;
            }
            
            .menu-item {
                justify-content: center;
                padding: 1rem 0;
            }
            
            .menu-item i {
                margin-right: 0;
            }
            
            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="brand">
            <h1>DARKADMIN</h1>
            <p>ZinWear | MEXICO</p>
        </div>
        
        <div class="menu">
            <p class="menu-title">Meshboard</p>
            
            <div class="menu-item active">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </div>
            
            <div class="menu-item">
                <i class="fas fa-list"></i>
                <span>Category</span>
            </div>
            
            <div class="menu-item">
                <i class="fas fa-box"></i>
                <span>Manage Products</span>
            </div>
            
            <div class="menu-item">
                <i class="fas fa-shopping-bag"></i>
                <span>Orders</span>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="header">
            <div class="page-title">
                <h2>Dashboard</h2>
            </div>
            
            <div class="user-profile">
                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Admin">
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card clients">
                <div class="stat-title">
                    <i class="fas fa-users"></i>
                    TOTAL CLIENTS
                </div>
                <div class="stat-value">3</div>
            </div>
            
            <div class="stat-card products">
                <div class="stat-title">
                    <i class="fas fa-box-open"></i>
                    TOTAL PRODUCTS
                </div>
                <div class="stat-value">16</div>
            </div>
            
            <div class="stat-card orders">
                <div class="stat-title">
                    <i class="fas fa-shopping-bag"></i>
                    TOTAL ORDERS
                </div>
                <div class="stat-value">51</div>
            </div>
            
            <div class="stat-card delivered">
                <div class="stat-title">
                    <i class="fas fa-truck"></i>
                    DELIVERED ORDERS
                </div>
                <div class="stat-value">42</div>
            </div>
        </div>
        
        <!-- Additional content can be added here -->
    </main>
</body>
</html>
