    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>


        <h1>ADMIN</h1>
        <x-app-layout>
        @include('admin.layout.header');

        @yield('content')
        @include('admin.layout.footer');
        </x-app-layout>

    </body>
    </html>