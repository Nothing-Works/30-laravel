<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="grid items-center justify-center h-screen">
    <div x-data="{ show: false }" @click.away="show=false">
        <button @click="show = !show">Links</button>
        <div class="absolute py-2 mt-1 text-white bg-black rounded" x-show="show"
        x-transition:enter="transition duration-1000 transform ease-out"
        x-transition:enter-start="scale-75"
        x-transition:leave="transition duration-1000 transform ease-in"
        x-transition:leave-end="opacity-0 scale-90"
        >
            <a class="block px-4 py-px text-xs hover:bg-gray-800" href="#">Edit</a>
            <a class="block px-4 py-px text-xs hover:bg-gray-800" href="#">Delete</a>
            <a class="block px-4 py-px text-xs hover:bg-gray-800" href="#">Report Spam</a>
        </div>
    </div>
</body>

</html>
