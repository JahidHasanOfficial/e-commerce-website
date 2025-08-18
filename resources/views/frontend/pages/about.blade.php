@extends('frontend.layouts.master')

@section('title', 'Home Page')
@section('content')



    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
        }
        
        .about-section {
            padding: 80px 0;
            background-color: var(--light-color);
        }
        
        .about-header {
            margin-bottom: 60px;
            text-align: center;
        }
        
        .about-header h2 {
            font-weight: 700;
            color: var(--primary-color);
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
        }
        
        .about-header h2::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--secondary-color);
        }
        
        .about-content {
            margin-bottom: 40px;
        }
        
        .about-img {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .about-img img {
            width: 100%;
            transition: transform 0.5s;
        }
        
        .about-img:hover img {
            transform: scale(1.03);
        }
        
        .about-features {
            margin-top: 40px;
        }
        
        .feature-box {
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }
        
        .feature-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: var(--secondary-color);
            margin-bottom: 20px;
        }
        
        .team-section {
            padding: 60px 0;
            background-color: white;
        }
        
        .team-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
            margin-bottom: 30px;
        }
        
        .team-card:hover {
            transform: translateY(-10px);
        }
        
       .team-img {
    height: 300px;
    width: 100%;
    object-fit: contain;
    object-position: center;
    background-color: #f8f9fa; /* Adds a background color for empty spaces */
}
        
        .social-icons a {
            display: inline-block;
            width: 36px;
            height: 36px;
            line-height: 36px;
            text-align: center;
            background: var(--light-color);
            color: var(--dark-color);
            border-radius: 50%;
            margin: 0 5px;
            transition: all 0.3s;
        }
        
        .social-icons a:hover {
            background: var(--secondary-color);
            color: white;
        }
    </style>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center about-header">
                    <h2>Our Story</h2>
                    <p class="lead">Building a better shopping experience since 2010</p>
                </div>
            </div>
            
            <div class="row align-items-center">
                <div class="col-lg-6 about-content">
                    <h3 class="mb-4">Welcome to ShopEase</h3>
                    <p>Founded in 2010, ShopEase began as a small family business with a passion for delivering quality products at affordable prices. What started as a single store has now grown into one of the most trusted e-commerce platforms serving customers worldwide.</p>
                    <p>Our mission is simple: to make online shopping easy, secure, and enjoyable for everyone. We carefully curate our product selection to ensure we only offer items that meet our high standards of quality and value.</p>
                    <div class="d-flex align-items-center mt-4">
                        <div class="me-4">
                            <h4 class="mb-0">10M+</h4>
                            <p class="mb-0">Happy Customers</p>
                        </div>
                        <div class="me-4">
                            <h4 class="mb-0">50K+</h4>
                            <p class="mb-0">Products</p>
                        </div>
                        <div>
                            <h4 class="mb-0">100+</h4>
                            <p class="mb-0">Brand Partners</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="https://images.unsplash.com/photo-1555529669-e69e7aa0ba9a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Our Store" class="img-fluid">
                    </div>
                </div>
            </div>
            
            <!-- Features -->
            <div class="row about-features">
                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="bi bi-truck"></i>
                        </div>
                        <h4>Fast Shipping</h4>
                        <p>We deliver to your doorstep within 2-3 business days with our premium shipping partners.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="bi bi-arrow-repeat"></i>
                        </div>
                        <h4>Easy Returns</h4>
                        <p>Not satisfied? Return any item within 30 days for a full refund, no questions asked.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>Secure Payments</h4>
                        <p>Your transactions are protected with 256-bit SSL encryption for complete peace of mind.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center about-header">
                    <h2>Meet Our Team</h2>
                    <p class="lead">The passionate people behind ShopEase</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="team-card">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Team Member" class="img-fluid team-img">
                        <div class="card-body text-center">
                            <h5 class="card-title">Sarah Johnson</h5>
                            <p class="text-muted">CEO & Founder</p>
                            <div class="social-icons mt-3">
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-twitter"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-card">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Team Member" class="img-fluid team-img">
                        <div class="card-body text-center">
                            <h5 class="card-title">Michael Chen</h5>
                            <p class="text-muted">Head of Operations</p>
                            <div class="social-icons mt-3">
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-twitter"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-card">
                        <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Team Member" class="img-fluid team-img">
                        <div class="card-body text-center">
                            <h5 class="card-title">David Wilson</h5>
                            <p class="text-muted">Marketing Director</p>
                            <div class="social-icons mt-3">
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-twitter"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">


@endsection
