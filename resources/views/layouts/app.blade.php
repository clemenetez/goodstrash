<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEST Shop - Fashion Store</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1 0 auto;
        }
        footer {
            flex-shrink: 0;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('images/logo.png') }}" alt="WEST Shop Logo" class="h-10 w-auto">
                        <span class="ml-2 text-xl font-bold text-gray-800">WEST Shop</span>
                    </a>
                </div>
                
                <div class="flex items-center space-x-4">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('products.index') }}" 
                               class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                                Manage Products
                            </a>
                            <a href="{{ route('categories.index') }}" 
                               class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                                Manage Categories
                            </a>
                            <span class="text-sm text-gray-500">
                                Admin Panel
                            </span>
                        @else
                            <a href="{{ route('products.index') }}" 
                               class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                                My Products
                            </a>
                            <a href="{{ route('products.create') }}" 
                               class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                                Add Product
                            </a>
                        @endif
                        <div class="relative">
                            <button type="button" 
                                    class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900">
                                <span>{{ auth()->user()->name }}</span>
                                <span class="ml-1 text-xs text-gray-500">({{ auth()->user()->role_name }})</span>
                            </button>
                        </div>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" 
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium">
                            Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-white border-t">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('images/logo.png') }}" alt="WEST Shop Logo" class="h-8 w-auto">
                    <span class="text-gray-600">© {{ date('Y') }} WEST Shop. All rights reserved.</span>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="#" class="text-gray-600 hover:text-gray-900">Privacy Policy</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900">Terms of Service</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900">Contact</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
