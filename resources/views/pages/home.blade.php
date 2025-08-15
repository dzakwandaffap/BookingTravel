@extends('layout.nav')

@section('content')
<!-- Hero Section with Modern Design -->
<section class="relative overflow-hidden">
    <!-- Background with overlay -->
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 via-blue-800/70 to-purple-900/80"></div>
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
         style="background-image: url('https://images.pexels.com/photos/4321501/pexels-photo-4321501.jpeg')"></div>

    <!-- Success Alert -->
    @if(session('success'))
    <div id="success-alert" class="absolute top-4 left-1/2 transform -translate-x-1/2 z-50 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transition-all duration-500 ease-in-out opacity-100">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
            <button onclick="closeAlert()" class="ml-4 text-white hover:text-gray-200">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    @endif

    <!-- Hero Content -->
    <div class="relative min-h-[790px] flex items-center justify-center px-4">
        <div class="text-center text-white max-w-4xl mx-auto">
            <!-- Animated title -->
            <h1 class="text-5xl md:text-7xl font-bold mb-6 bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-100 animate-fade-in-up">
                Welcome to <span class="text-gray-200">EasyTrip</span>
            </h1>

            <!-- Subtitle with animation -->
            <p class="text-xl md:text-2xl mb-8 text-blue-100 font-light animate-fade-in-up animation-delay-300">
                Your Adventure Awaits - Discover the World with Ease
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center animate-fade-in-up animation-delay-600">
                <a href="{{ route('booking.index') }}"
                   class="group bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-4 px-8 rounded-full text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-plane-departure mr-2"></i>
                    Start Your Journey
                    <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                </a>

                <a href="#features"
                   class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-blue-900 font-semibold py-4 px-8 rounded-full text-lg transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-info-circle mr-2"></i>
                    Learn More
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                Why Choose <span class="text-blue-600">EasyTrip</span>?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                We provide the best travel solutions tailored just for you. Our platform simplifies your travel experience with cutting-edge technology and personalized service.
            </p>
        </div>

        <!-- Stats Section -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-16">
            <div class="text-center">
                <div class="text-4xl font-bold text-blue-600 mb-2">500K+</div>
                <div class="text-gray-600">Happy Travelers</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-green-600 mb-2">1M+</div>
                <div class="text-gray-600">Bookings Made</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-purple-600 mb-2">150+</div>
                <div class="text-gray-600">Countries</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-orange-600 mb-2">24/7</div>
                <div class="text-gray-600">Support</div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 overflow-hidden">
                <div class="relative overflow-hidden">
                    <img src="https://plus.unsplash.com/premium_photo-1669748158379-b1460474807c?q=80&w=2070&auto=format&fit=crop"
                         class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                         alt="Easy Booking">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/50 to-transparent"></div>
                </div>
                <div class="p-8">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <i class="fas fa-mouse-pointer text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">Easy Booking</h3>
                    </div>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Book your flights, hotels, and activities in just a few clicks with our intuitive interface and smart recommendations.
                    </p>
                    <a href="{{ route('booking.index') }}"
                       class="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold group-hover:gap-2 transition-all duration-300">
                        Book Now
                        <i class="fas fa-arrow-right ml-1 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 overflow-hidden">
                <div class="relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?q=80&w=2070&auto=format&fit=crop"
                         class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                         alt="Best Price">
                    <div class="absolute inset-0 bg-gradient-to-t from-green-900/50 to-transparent"></div>
                </div>
                <div class="p-8">
                    <div class="flex items-center mb-4">
                        <div class="bg-green-100 p-3 rounded-full mr-4">
                            <i class="fas fa-tags text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">Best Price Guarantee</h3>
                    </div>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        We ensure you get the best prices available with our price matching guarantee. Save more, travel more!
                    </p>
                    <a href="#pricing"
                       class="inline-flex items-center text-green-600 hover:text-green-800 font-semibold group-hover:gap-2 transition-all duration-300">
                        Find Deals
                        <i class="fas fa-arrow-right ml-1 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 overflow-hidden">
                <div class="relative overflow-hidden">
                    <img src="https://plus.unsplash.com/premium_photo-1726783385210-a54e5cc47666?q=80&w=2069&auto=format&fit=crop"
                         class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                         alt="Support">
                    <div class="absolute inset-0 bg-gradient-to-t from-purple-900/50 to-transparent"></div>
                </div>
                <div class="p-8">
                    <div class="flex items-center mb-4">
                        <div class="bg-purple-100 p-3 rounded-full mr-4">
                            <i class="fas fa-headset text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">24/7 Customer Support</h3>
                    </div>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Our dedicated team is here to help you anytime, anywhere. Get instant support through chat, phone, or email.
                    </p>
                    <a href="#faq"
                       class="inline-flex items-center text-purple-600 hover:text-purple-800 font-semibold group-hover:gap-2 transition-all duration-300">
                        Get Support
                        <i class="fas fa-arrow-right ml-1 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-20 bg-gradient-to-r from-blue-500 to-blue-600 ">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8 relative z-10">
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
            Join the EasyTrip Family!
        </h2>
        <p class="text-xl text-blue-100 mb-8 leading-relaxed">
            Sign up now and be part of a community of travelers enjoying seamless trips. Get exclusive deals, travel tips, and personalized recommendations.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ route('booking.index') }}"
               class="group bg-gray-700 text-white font-bold py-4 px-10 rounded-full text-lg ">
                <i class="fas fa-rocket mr-2"></i>
                Start Booking Now
                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
            </a>

            @guest
            <a href="{{ route('pages.register') }}"
               class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-blue-900 font-semibold py-4 px-10 rounded-full text-lg transition-all duration-300 transform hover:scale-105">
                <i class="fas fa-user-plus mr-2"></i>
                Sign Up Free
            </a>
            @endguest
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section id="pricing" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                Choose Your <span class="text-blue-600">Plan</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Select the best option for your trip. Transparent pricing and flexible options make your planning easier.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Flight Plan -->
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 p-8 text-center">
                <div class="text-blue-600 text-6xl mb-4">
                    <i class="fas fa-plane-departure"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Flight</h3>
                <p class="text-gray-600 mb-6">
                    Best deals for airlines worldwide. Book your flights with ease and enjoy a hassle-free travel experience.
                </p>
                <div class="text-3xl font-bold text-gray-800 mb-4">$199</div>
                <a href="{{ route('booking.index') }}"
                   class="inline-flex items-center justify-center bg-blue-500 text-white font-semibold py-3 px-6 rounded-full hover:bg-blue-600 transition-all duration-300">
                    Book Flight
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Hotel Plan -->
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 p-8 text-center">
                <div class="text-green-600 text-6xl mb-4">
                    <i class="fas fa-hotel"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Hotel</h3>
                <p class="text-gray-600 mb-6">
                    Find and book hotels at the best prices. From budget to luxury, we have accommodations for every traveler.
                </p>
                <div class="text-3xl font-bold text-gray-800 mb-4">$99</div>
                <a href="{{ route('booking.index') }}"
                   class="inline-flex items-center justify-center bg-green-500 text-white font-semibold py-3 px-6 rounded-full hover:bg-green-600 transition-all duration-300">
                    Book Hotel
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Travel Plan -->
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 p-8 text-center">
                <div class="text-purple-600 text-6xl mb-4">
                    <i class="fas fa-route"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Travel</h3>
                <p class="text-gray-600 mb-6">
                    Explore exciting travel packages and activities. Plan your itinerary and create unforgettable memories.
                </p>
                <div class="text-3xl font-bold text-gray-800 mb-4">$299</div>
                <a href="{{ route('booking.index') }}"
                   class="inline-flex items-center justify-center bg-purple-500 text-white font-semibold py-3 px-6 rounded-full hover:bg-purple-600 transition-all duration-300">
                    Book Travel
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>


<!-- FAQ Section -->
<section  id="faq" class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                Frequently Asked <span class="text-blue-600">Questions</span>
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                Get answers to the most common questions about EasyTrip and our services.
            </p>
        </div>

        <div class="space-y-4">
            <!-- FAQ Item 1 -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <button class="faq-toggle w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition-colors duration-200"
                        onclick="toggleFaq(1)">
                    <span class="text-lg font-semibold text-gray-800">How do I book a trip with EasyTrip?</span>
                    <i id="faq-icon-1" class="fas fa-chevron-down text-blue-600 transform transition-transform duration-300"></i>
                </button>
                <div id="faq-content-1" class="faq-content hidden px-6 pb-5">
                    <p class="text-gray-600 leading-relaxed">
                        Booking with EasyTrip is simple! Just select your destination, choose your travel dates, pick from our recommended flights and hotels, and complete your booking in just a few clicks. Our smart recommendation system will help you find the best deals tailored to your preferences.
                    </p>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <button class="faq-toggle w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition-colors duration-200"
                        onclick="toggleFaq(2)">
                    <span class="text-lg font-semibold text-gray-800">What payment methods do you accept?</span>
                    <i id="faq-icon-2" class="fas fa-chevron-down text-blue-600 transform transition-transform duration-300"></i>
                </button>
                <div id="faq-content-2" class="faq-content hidden px-6 pb-5">
                    <p class="text-gray-600 leading-relaxed">
                        We accept all major credit cards (Visa, MasterCard, American Express), debit cards, PayPal, and various digital payment methods. All transactions are secured with industry-standard encryption to protect your financial information.
                    </p>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <button class="faq-toggle w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition-colors duration-200"
                        onclick="toggleFaq(3)">
                    <span class="text-lg font-semibold text-gray-800">Can I cancel or modify my booking?</span>
                    <i id="faq-icon-3" class="fas fa-chevron-down text-blue-600 transform transition-transform duration-300"></i>
                </button>
                <div id="faq-content-3" class="faq-content hidden px-6 pb-5">
                    <p class="text-gray-600 leading-relaxed">
                        Yes, you can cancel or modify most bookings depending on the terms and conditions of your selected flights and hotels. Free cancellation policies vary by provider. You can manage your bookings through your account dashboard or contact our 24/7 support team for assistance.
                    </p>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <button class="faq-toggle w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition-colors duration-200"
                        onclick="toggleFaq(4)">
                    <span class="text-lg font-semibold text-gray-800">How does your Best Price Guarantee work?</span>
                    <i id="faq-icon-4" class="fas fa-chevron-down text-blue-600 transform transition-transform duration-300"></i>
                </button>
                <div id="faq-content-4" class="faq-content hidden px-6 pb-5">
                    <p class="text-gray-600 leading-relaxed">
                        If you find a lower price for the same trip within 24 hours of booking, we'll match it and give you an additional 10% discount. Simply contact our customer service team with proof of the lower price, and we'll take care of the rest. Terms and conditions apply.
                    </p>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <button class="faq-toggle w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition-colors duration-200"
                        onclick="toggleFaq(5)">
                    <span class="text-lg font-semibold text-gray-800">Is my personal information secure?</span>
                    <i id="faq-icon-5" class="fas fa-chevron-down text-blue-600 transform transition-transform duration-300"></i>
                </button>
                <div id="faq-content-5" class="faq-content hidden px-6 pb-5">
                    <p class="text-gray-600 leading-relaxed">
                        Absolutely! We use advanced SSL encryption and comply with international data protection standards. Your personal and payment information is stored securely and never shared with unauthorized parties. We're committed to protecting your privacy and maintaining your trust.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Custom animations */
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

@keyframes slideOut {
    from {
        opacity: 1;
        transform: translate(-50%, 0);
    }
    to {
        opacity: 0;
        transform: translate(-50%, -20px);
    }
}

.animate-fade-in-up {
    animation: fadeInUp 0.6s ease-out;
}

.animation-delay-300 {
    animation-delay: 0.3s;
    animation-fill-mode: both;
}

.animation-delay-600 {
    animation-delay: 0.6s;
    animation-fill-mode: both;
}

.slide-out {
    animation: slideOut 0.3s ease-out forwards;
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* Custom gradient text */
.bg-clip-text {
    -webkit-background-clip: text;
    background-clip: text;
}

/* Alert specific styles */
.alert-hidden {
    opacity: 0;
    transform: translate(-50%, -20px);
    pointer-events: none;
}
</style>

<script>
// Function to toggle FAQ items
function toggleFaq(faqNumber) {
    const content = document.getElementById(`faq-content-${faqNumber}`);
    const icon = document.getElementById(`faq-icon-${faqNumber}`);

    // Close all other FAQ items
    const allFaqContents = document.querySelectorAll('.faq-content');
    const allFaqIcons = document.querySelectorAll('[id^="faq-icon-"]');

    allFaqContents.forEach((item, index) => {
        const itemNumber = index + 1;
        if (itemNumber !== faqNumber) {
            item.classList.add('hidden');
            allFaqIcons[index].classList.remove('rotate-180');
        }
    });

    // Toggle current FAQ item
    if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        icon.classList.add('rotate-180');
    } else {
        content.classList.add('hidden');
        icon.classList.remove('rotate-180');
    }
}

// Function to close alert
function closeAlert() {
    const alert = document.getElementById('success-alert');
    if (alert) {
        alert.classList.add('slide-out');
        setTimeout(() => {
            alert.style.display = 'none';
            alert.remove(); // Completely remove from DOM
        }, 300);
    }
}

// Auto-hide alert after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const alert = document.getElementById('success-alert');
    if (alert) {
        setTimeout(() => {
            closeAlert();
        }, 5000);
    }
});

// Add smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add scroll animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-fade-in-up');
        }
    });
}, observerOptions);

// Observe all sections for scroll animations
document.addEventListener('DOMContentLoaded', () => {
    const sections = document.querySelectorAll('section');
    sections.forEach(section => {
        observer.observe(section);
    });
});
</script>
@endsection
