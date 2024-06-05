<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>12DHTH_TD</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="text-lg font-bold">
                <a href="{{ url('/') }}" class="text-gray-800">WebnewsTD 2024</a>
            </div>
            <nav>
                <ul class="flex space-x-4">
                    <!-- Hardcoded category links -->
                    <li>
                        <a href="#chinh-tri" class="text-gray-800 hover:text-gray-600 transition">Chính Trị</a>
                    </li>
                    <li>
                        <a href="#the-thao" class="text-gray-800 hover:text-gray-600 transition">Thể Thao</a>
                    </li>
                    <li>
                        <a href="#kinh-doanh" class="text-gray-800 hover:text-gray-600 transition">Kinh Doanh</a>
                    </li>
                    <li>
                        <a href="#kinh-te" class="text-gray-800 hover:text-gray-600 transition">Kinh Tế</a>
                    </li>
                    <li>
                        <a href="#cong-nghe" class="text-gray-800 hover:text-gray-600 transition">Công Nghệ</a>
                    </li>
                    <li>
                        <a href="#quan-su" class="text-gray-800 hover:text-gray-600 transition">Quân Sự</a>
                    </li>
                </ul>
            </nav>
            <div class="flex space-x-4 items-center">
                <form action="/search" method="GET" class="relative">
                    <input type="text" name="query" placeholder="Search..." class="px-3 py-2 rounded-md border border-gray-300">
                </form>
                @if (Route::has('login'))
                    <nav class="space-x-4 flex">
                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-gray-800 ring-1 ring-transparent transition hover:text-gray-600 focus:outline-none focus-visible:ring-[#FF2D20]"
                            >
                                Dashboard
                            </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="rounded-md px-3 py-2 text-gray-800 ring-1 ring-transparent transition hover:text-gray-600 focus:outline-none focus-visible:ring-[#FF2D20]"
                            >
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="rounded-md px-3 py-2 text-gray-800 ring-1 ring-transparent transition hover:text-gray-600 focus:outline-none focus-visible:ring-[#FF2D20]"
                                >
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </div>
    </header>
    <div class="container mx-auto mt-5">
        @yield('content')
    </div>
    
    <footer>@include('admin.layout.footer');</footer>
</body>

</html>
