@extends('frontend.layouts.master')

@section('title', 'FAQs')
@section('content')


<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #e74c3c;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }
        
        .faq-header {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1555529669-e69e7aa0ba9a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-bottom: 60px;
        }
        
        .faq-section {
            padding: 80px 0;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 50px;
            padding-bottom: 15px;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 60px;
            height: 3px;
            background-color: var(--secondary-color);
        }
        
        .accordion-button:not(.collapsed) {
            background-color: rgba(231, 76, 60, 0.1);
            color: var(--secondary-color);
            box-shadow: none;
        }
        
        .accordion-button:focus {
            box-shadow: none;
            border-color: rgba(0,0,0,.125);
        }
        
        .contact-card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
            height: 100%;
            border: none;
        }
        
        .contact-card:hover {
            transform: translateY(-5px);
        }
        
        .contact-icon {
            font-size: 2rem;
            color: var(--secondary-color);
            margin-bottom: 15px;
        }
        
        .search-box {
            position: relative;
            margin-bottom: 40px;
        }
        
        .search-box input {
            padding-left: 45px;
            border-radius: 30px;
            height: 50px;
        }
        
        .search-box i {
            position: absolute;
            left: 20px;
            top: 15px;
            color: #6c757d;
        }
    </style>

    <!-- FAQ Header -->
    <header class="faq-header text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Frequently Asked Questions</h1>
            <p class="lead">Find quick answers to your questions about orders, shipping, returns and more</p>
        </div>
    </header>

    <!-- FAQ Content -->
    <section class="faq-section">
        <div class="container">
            <!-- Search Box -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="text" class="form-control" placeholder="Search FAQs...">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="section-title">General Questions</h2>
                    
                    <div class="accordion" id="generalAccordion">
                        <!-- Question 1 -->
                        <div class="accordion-item mb-3 border">
                            <h3 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    How do I place an order?
                                </button>
                            </h3>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#generalAccordion">
                                <div class="accordion-body">
                                    <p>Placing an order is simple:</p>
                                    <ol>
                                        <li>Browse our products and add items to your cart</li>
                                        <li>Proceed to checkout when ready</li>
                                        <li>Enter your shipping and payment details</li>
                                        <li>Review your order and confirm</li>
                                    </ol>
                                    <p>You'll receive an order confirmation email with all the details.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Question 2 -->
                        <div class="accordion-item mb-3 border">
                            <h3 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    What payment methods do you accept?
                                </button>
                            </h3>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#generalAccordion">
                                <div class="accordion-body">
                                    We accept all major payment methods including:
                                    <ul>
                                        <li>Credit/Debit Cards (Visa, MasterCard, American Express)</li>
                                        <li>PayPal</li>
                                        <li>Apple Pay</li>
                                        <li>Google Pay</li>
                                        <li>Bank Transfers</li>
                                    </ul>
                                    All payments are processed securely through our encrypted payment gateway.
                                </div>
                            </div>
                        </div>
                        
                        <!-- Question 3 -->
                        <div class="accordion-item mb-3 border">
                            <h3 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    Can I modify or cancel my order?
                                </button>
                            </h3>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#generalAccordion">
                                <div class="accordion-body">
                                    <p>You can modify or cancel your order within 1 hour of placing it by contacting our customer service at <a href="mailto:support@example.com">support@example.com</a> or calling +1 (555) 123-4567.</p>
                                    <p>After 1 hour, we begin processing your order and changes may not be possible. In this case, you can return items after receiving them following our return policy.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h2 class="section-title mt-5">Shipping & Delivery</h2>
                    
                    <div class="accordion" id="shippingAccordion">
                        <!-- Question 4 -->
                        <div class="accordion-item mb-3 border">
                            <h3 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                    How long does shipping take?
                                </button>
                            </h3>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#shippingAccordion">
                                <div class="accordion-body">
                                    <p>Shipping times vary depending on your location:</p>
                                    <ul>
                                        <li><strong>Standard Shipping:</strong> 3-5 business days</li>
                                        <li><strong>Express Shipping:</strong> 1-2 business days</li>
                                        <li><strong>International Shipping:</strong> 7-14 business days</li>
                                    </ul>
                                    <p>Processing time is 1-2 business days for all orders. You'll receive a tracking number once your order ships.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Question 5 -->
                        <div class="accordion-item mb-3 border">
                            <h3 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                                    Do you ship internationally?
                                </button>
                            </h3>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#shippingAccordion">
                                <div class="accordion-body">
                                    <p>Yes, we ship to over 100 countries worldwide. International shipping rates are calculated at checkout based on your location and the weight of your order.</p>
                                    <p>Please note that customers are responsible for any customs duties, taxes, or fees imposed by their country.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h2 class="section-title mt-5">Returns & Refunds</h2>
                    
                    <div class="accordion" id="returnsAccordion">
                        <!-- Question 6 -->
                        <div class="accordion-item mb-3 border">
                            <h3 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix">
                                    What is your return policy?
                                </button>
                            </h3>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#returnsAccordion">
                                <div class="accordion-body">
                                    <p>We offer a 30-day return policy for most items:</p>
                                    <ul>
                                        <li>Items must be unused, in original packaging with tags attached</li>
                                        <li>Return shipping is free for defective or incorrect items</li>
                                        <li>Refunds are processed within 5 business days after we receive your return</li>
                                        <li>Some items (like personalized products) are final sale and cannot be returned</li>
                                    </ul>
                                    <p>To initiate a return, please visit our <a href="#">Returns Center</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Card -->
                <div class="col-lg-4">
                    <div class="card contact-card">
                        <div class="card-body p-4 text-center">
                            <div class="contact-icon">
                                <i class="bi bi-headset"></i>
                            </div>
                            <h3 class="h4">Still need help?</h3>
                            <p class="text-muted mb-4">Our customer service team is available to assist you with any questions.</p>
                            
                            <div class="d-grid gap-3">
                                <a href="tel:+15551234567" class="btn btn-outline-primary">
                                    <i class="bi bi-telephone me-2"></i> Call Us
                                </a>
                                <a href="mailto:support@example.com" class="btn btn-outline-secondary">
                                    <i class="bi bi-envelope me-2"></i> Email Us
                                </a>
                                <a href="#" class="btn btn-outline-dark">
                                    <i class="bi bi-chat-dots me-2"></i> Live Chat
                                </a>
                            </div>
                            
                            <hr class="my-4">
                            
                            <h4 class="h5 mb-3">Business Hours</h4>
                            <p class="mb-1"><strong>Monday-Friday:</strong> 9am-6pm EST</p>
                            <p class="mb-0"><strong>Saturday-Sunday:</strong> 10am-4pm EST</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


@endsection
