@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 w-full">
        <!-- Contact Information Section -->
        <section class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl shadow-lg p-8">
            <h2 class="text-3xl font-bold text-blue-800 mb-8 text-center">Get In Touch</h2>
            
            <div class="space-y-6">
                <!-- Phone Numbers -->
                <div class="flex items-start space-x-4 p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-blue-800 text-lg mb-2">Phone Numbers</h3>
                        <div class="space-y-1">
                            <p class="text-blue-900 font-semibold">+1 (555) 123-4567</p>
                            <p class="text-blue-900 font-semibold">+1 (555) 987-6543</p>
                            <p class="text-blue-600 text-sm">Mon-Fri: 9AM-6PM EST</p>
                        </div>
                    </div>
                </div>

                <!-- Email Address -->
                <div class="flex items-start space-x-4 p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-blue-800 text-lg mb-2">Email Address</h3>
                        <a href="mailto:info@example.com" class="text-blue-900 font-semibold hover:text-blue-700 transition-colors">
                            info@example.com
                        </a>
                        <p class="text-blue-600 text-sm mt-1">We'll respond within 24 hours</p>
                    </div>
                </div>

                <!-- Location -->
                <div class="flex items-start space-x-4 p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-blue-800 text-lg mb-2">Our Location</h3>
                        <p class="text-blue-900 font-semibold">123 Business Avenue</p>
                        <p class="text-blue-900 font-semibold">Suite 100</p>
                        <p class="text-blue-900 font-semibold">New York, NY 10001</p>
                        <p class="text-blue-600 text-sm mt-1">Visit our office</p>
                    </div>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="mt-8 p-6 bg-blue-800 text-white rounded-xl">
                <h3 class="font-bold text-lg mb-3">Why Choose Us?</h3>
                <ul class="space-y-2 text-blue-100">
                    <li class="flex items-center space-x-2">
                        <span class="w-2 h-2 bg-white rounded-full"></span>
                        <span>24/7 Customer Support</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <span class="w-2 h-2 bg-white rounded-full"></span>
                        <span>Quick Response Time</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <span class="w-2 h-2 bg-white rounded-full"></span>
                        <span>Professional & Friendly Staff</span>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Contact Form Section -->
        <section class="bg-white rounded-2xl shadow-lg p-8">
            <h2 class="text-3xl font-bold text-blue-800 mb-2 text-center">Send Us a Message</h2>
            <p class="text-blue-600 text-center mb-8">Fill out the form below and we'll get back to you soon</p>
            
            <form class="space-y-6">
                <div>
                    <label class="block mb-2 font-semibold text-blue-700" for="name">Full Name</label>
                    <input class="w-full border border-blue-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition" 
                           type="text" id="name" name="name" placeholder="Enter your full name" required>
                </div>
                <div>
                    <label class="block mb-2 font-semibold text-blue-700" for="email">Email Address</label>
                    <input class="w-full border border-blue-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition" 
                           type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div>
                    <label class="block mb-2 font-semibold text-blue-700" for="subject">Subject</label>
                    <input class="w-full border border-blue-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition" 
                           type="text" id="subject" name="subject" placeholder="What is this regarding?" required>
                </div>
                <div>
                    <label class="block mb-2 font-semibold text-blue-700" for="message">Message</label>
                    <textarea class="w-full border border-blue-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition" 
                              id="message" name="message" rows="5" placeholder="Tell us how we can help you..." required></textarea>
                </div>
                <button type="submit" class="w-full bg-gradient-to-r from-blue-700 to-blue-600 text-white px-6 py-4 rounded-xl font-semibold shadow-lg hover:from-blue-800 hover:to-blue-700 transition-all transform hover:-translate-y-1">
                    Send Message
                </button>
            </form>
        </section>
    </div>
@endsection