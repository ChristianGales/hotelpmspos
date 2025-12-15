<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking - Find Your Perfect Stay</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hotel-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .hotel-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        
        .hotel-image {
            transition: transform 0.5s ease;
        }
        
        .hotel-card:hover .hotel-image {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-50">
    
    <!-- Navbar -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-blue-500 rounded flex items-center justify-center">
                            <span class="text-white font-bold text-xl">H</span>
                        </div>
                        <span class="ml-2 text-xl font-bold text-gray-900">Hotel</span>
                    </div>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-gray-900 font-medium">Home</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900">Hotels</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900">About</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900">Contact</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900">Support</a>
                </div>
                
                <div class="flex items-center">
                    {{--Change this guest login--}}
                    <a href="{{ route('signin') }}" class="px-6 py-2 bg-blue-500 text-white rounded-lg font-semibold hover:bg-blue-600 transition">
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative bg-cover bg-center" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1600&h=600&fit=crop');">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div class="text-white">
                    <h1 class="text-5xl font-bold mb-4">Best Place to Find<br>Comfortable<br>Hotel and Resort</h1>
                    <p class="text-lg text-gray-200">Find the best hotel for your needs with an easy search and booking process</p>
                </div>
                
                <!-- Search Card -->
                <div class="bg-white rounded-2xl shadow-2xl p-8">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Destinations</label>
                            <input type="text" placeholder="New York" 
                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Check in</label>
                                <input type="date" 
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Check out</label>
                                <input type="date" 
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Rooms</label>
                                <select class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option>1 Room</option>
                                    <option>2 Rooms</option>
                                    <option>3+ Rooms</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Guest</label>
                                <select class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option>1 Guest</option>
                                    <option>2 Guests</option>
                                    <option>3+ Guests</option>
                                </select>
                            </div>
                        </div>
                        
                        <button class="w-full px-8 py-4 bg-blue-500 text-white rounded-lg font-bold hover:bg-blue-600 transition text-lg">
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hotels of the Month Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Hotels of the month</h2>
                <a href="#" class="text-blue-500 font-semibold hover:underline">View all</a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Hotel Card 1 -->
                <div class="hotel-card bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=600&h=400&fit=crop" 
                             alt="Grand Luxury Hotel" 
                             class="hotel-image w-full h-48 object-cover">
                    </div>
                    <div class="p-5">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-bold text-gray-900 text-lg">Grand Luxury Hotel</h3>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-blue-500 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <span class="ml-1 text-sm text-gray-600">4.8</span>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm mb-3">📍 New York, USA</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-2xl font-bold text-gray-900">$250.00</span>
                                <span class="text-gray-500 text-sm">/night</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hotel Card 2 -->
                <div class="hotel-card bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=600&h=400&fit=crop" 
                             alt="Ocean View Resort" 
                             class="hotel-image w-full h-48 object-cover">
                    </div>
                    <div class="p-5">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-bold text-gray-900 text-lg">Ocean View Resort</h3>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-blue-500 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <span class="ml-1 text-sm text-gray-600">4.9</span>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm mb-3">📍 Miami, USA</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-2xl font-bold text-gray-900">$320.00</span>
                                <span class="text-gray-500 text-sm">/night</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hotel Card 3 -->
                <div class="hotel-card bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?w=600&h=400&fit=crop" 
                             alt="Paradise Hotel" 
                             class="hotel-image w-full h-48 object-cover">
                    </div>
                    <div class="p-5">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-bold text-gray-900 text-lg">Paradise Hotel</h3>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-blue-500 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <span class="ml-1 text-sm text-gray-600">4.7</span>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm mb-3">📍 Los Angeles, USA</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-2xl font-bold text-gray-900">$290.00</span>
                                <span class="text-gray-500 text-sm">/night</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Comfortable Facility Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Image Side -->
                <div class="relative">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-4">
                            <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=400&h=300&fit=crop" 
                                 alt="Hotel Lobby" 
                                 class="rounded-xl shadow-lg w-full h-64 object-cover">
                            <img src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?w=400&h=200&fit=crop" 
                                 alt="Hotel Room" 
                                 class="rounded-xl shadow-lg w-full h-48 object-cover">
                        </div>
                        <div class="pt-12">
                            <img src="https://images.unsplash.com/photo-1521783988139-89397d761dce?w=400&h=400&fit=crop" 
                                 alt="Pool" 
                                 class="rounded-xl shadow-lg w-full h-80 object-cover">
                        </div>
                    </div>
                </div>
                
                <!-- Content Side -->
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">Comfortable facility<br>around hotels</h2>
                    <p class="text-gray-600 mb-8">Experience world-class amenities and services designed for your comfort and convenience</p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-bold text-gray-900">Free Accommodation</h3>
                                <p class="text-gray-600">Complimentary stay for children under 12</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-bold text-gray-900">Privacy Guarantee</h3>
                                <p class="text-gray-600">Your privacy and security are our top priority</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-bold text-gray-900">Best Price Guarantee</h3>
                                <p class="text-gray-600">We guarantee the lowest price for your booking</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Best Offer of the Month Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Best offer of the month</h2>
                <a href="#" class="text-blue-500 font-semibold hover:underline">View all</a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Offer Card 1 -->
                <div class="hotel-card bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?w=600&h=400&fit=crop" 
                             alt="Urban Plaza Hotel" 
                             class="hotel-image w-full h-48 object-cover">
                    </div>
                    <div class="p-5">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-bold text-gray-900 text-lg">Urban Plaza Hotel</h3>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-blue-500 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <span class="ml-1 text-sm text-gray-600">4.9</span>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm mb-3">📍 Chicago, USA</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-gray-400 line-through text-sm">$350.00</span>
                                <span class="text-2xl font-bold text-gray-900 ml-2">$280.00</span>
                                <span class="text-gray-500 text-sm">/night</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Offer Card 2 -->
                <div class="hotel-card bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=600&h=400&fit=crop" 
                             alt="Skyline Tower" 
                             class="hotel-image w-full h-48 object-cover">
                    </div>
                    <div class="p-5">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-bold text-gray-900 text-lg">Skyline Tower</h3>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-blue-500 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <span class="ml-1 text-sm text-gray-600">5.0</span>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm mb-3">📍 San Francisco, USA</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-gray-400 line-through text-sm">$420.00</span>
                                <span class="text-2xl font-bold text-gray-900 ml-2">$350.00</span>
                                <span class="text-gray-500 text-sm">/night</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Offer Card 3 -->
                <div class="hotel-card bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1560185007-5f0bb1866cab?w=600&h=400&fit=crop" 
                             alt="Coastal Resort" 
                             class="hotel-image w-full h-48 object-cover">
                    </div>
                    <div class="p-5">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-bold text-gray-900 text-lg">Coastal Resort</h3>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-blue-500 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <span class="ml-1 text-sm text-gray-600">4.8</span>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm mb-3">📍 Seattle, USA</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-gray-400 line-through text-sm">$380.00</span>
                                <span class="text-2xl font-bold text-gray-900 ml-2">$320.00</span>
                                <span class="text-gray-500 text-sm">/night</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-8 h-8 bg-blue-500 rounded flex items-center justify-center">
                            <span class="text-white font-bold text-xl">H</span>
                        </div>
                        <span class="ml-2 text-xl font-bold">Hotel</span>
                    </div>
                    <p class="text-gray-400 text-sm">Your trusted partner for comfortable hotel bookings worldwide.</p>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition text-sm">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition text-sm">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition text-sm">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition text-sm">Terms of Service</a></li>
                    </ul>
                </div>
                
                <!-- Services -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Services</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition text-sm">Hotel Booking</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition text-sm">Resort Packages</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition text-sm">Travel Insurance</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition text-sm">24/7 Support</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Contact</h3>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li>123 Hotel Street</li>
                        <li>Northern Samar, Philippines</li>
                        <li>Phone: +63 9876 542 312</li>
                        <li>Email: chrlseddd@hotel.com</li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; 2025 Chrlseddd. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>