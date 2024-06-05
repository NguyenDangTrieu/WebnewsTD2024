@extends('admin.index')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soạn thảo bài báo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/ye8t257tht9gs3ddxpeb8bgtvxfx151d52chif8tim4s3wr3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'image link media',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media',
            height: 500
        });
    </script>
</head>
<body>
    <div class="container">
        <h1>Soạn thảo bài báo</h1>
        <form action="Save_article.php" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" name="title" placeholder="Tiêu đề bài báo" required>
            </div>
            <div class="mb-3">
                <select class="form-control" name="category_id" required>
                    <option value="1">Thời sự</option>
                    <option value="2">Thể thao</option>
                    <option value="3">Kinh doanh</option>
                    <option value="4">Giáo dục</option>
                    <option value="5">Công nghệ</option>
                </select>
            </div>
            <div class="mb-3">
                <textarea id="shortcut" class="form-control" name="shortcut" placeholder="Tóm tắt"></textarea>
            </div>
            <div class="mb-3">
                <textarea id="content" class="form-control" name="content"></textarea>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="author_name" placeholder="Tên tác giả" required>
            </div>
            <button type="submit" class="btn btn-primary">Lưu bài báo</button>
        </form>
    </div>

    <!-- Bootstrap JS và Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>


@endsection
