<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book CRUD</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-white text-black">
    <div class="min-h-screen flex flex-col items-center justify-center">
        {{ $slot }}
    </div>
    @livewireScripts
</body>

</html>
