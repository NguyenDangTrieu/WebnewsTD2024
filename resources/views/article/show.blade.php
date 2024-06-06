
<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>{{ $article->title }}</h1>
        <p><strong>Tác giả:</strong> {{ $article->author_name }}</p>
        <p><strong>Chuyên mục:</strong> {{ $article->category->name }}</p>
        <div>
            {!! $article->content !!}
        </div>
    </div>
    <form action="" method="POST" class="mb-6 bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <div class="text-lg font-semibold text-gray-900">
                    @auth
                        {{ Auth::user()->name }}
                    @else
                        noname
                    @endauth
                </div>
            </div>
            <div class="mb-4">
                <label for="comment" class="block text-lg font-medium text-gray-700 mb-2">Comment</label>
                <textarea name="comment" id="comment" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required></textarea>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-blue-700 transition duration-300">Submit</button>
        </form>

    <!-- Bootstrap JS và Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
</x-app-layout>