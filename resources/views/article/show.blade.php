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
    <form id="commentForm" class="mb-6 bg-white p-6 rounded-lg shadow-md">
        @csrf
        <input type="hidden" name="article_id" value="{{ $article->id }}">
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
            <textarea name="content" id="comment" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required></textarea>
        </div>
        <button type="submit" class="w-full bg-black text-white px-4 py-2 rounded-lg font-medium hover:bg-gray-800 transition duration-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50">Comment</button>
    </form>
    <div id="commentsContainer" class="space-y-6">
        <!-- Comments will be loaded here dynamically -->
    </div>
    <footer>@include('admin.layout.footer');</footer>
    <!-- Bootstrap JS và Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <!-- Custom JavaScript to handle comments -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const commentsContainer = document.getElementById('commentsContainer');
            const commentForm = document.getElementById('commentForm');

            // Load comments on page load
            loadComments();

            // Handle form submission
            commentForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(commentForm);
                postComment(formData);
            });

            function loadComments() {
                const articleId = {{ $article->id }};
                fetch(`/comments/${articleId}`)
                    .then(response => response.json())
                    .then(comments => {
                        commentsContainer.innerHTML = '';
                        comments.forEach(comment => {
                            commentsContainer.innerHTML += `
                                <div class="bg-gray-100 p-4 rounded shadow">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-gray-800 font-bold">${comment.name ?? 'noname'}</span>
                                        <span class="text-gray-600 text-sm">${new Date(comment.created_at).toLocaleString()}</span>
                                    </div>
                                    <p class="text-gray-700">${comment.content}</p>
                                </div>
                            `;
                        });
                    });
            }

            function postComment(formData) {
                fetch('/comments', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(comment => {
                    commentsContainer.innerHTML = `
                        <div class="bg-gray-100 p-4 rounded shadow">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-800 font-bold">${comment.name ?? 'noname'}</span>
                                <span class="text-gray-600 text-sm">${new Date(comment.created_at).toLocaleString()}</span>
                            </div>
                            <p class="text-gray-700">${comment.content}</p>
                        </div>
                    ` + commentsContainer.innerHTML;
                    commentForm.reset();
                });
            }
        });
    </script>
</body>
</html>
</x-app-layout>
