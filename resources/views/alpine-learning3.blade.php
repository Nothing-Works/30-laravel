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
    <div x-data="{ show: true }">
        <div class="w-12 h-12">
            {{-- x-transition.duration.5000ms.scale.0 --}}
            <div class="w-full h-full bg-green-400" x-show="show"
                x-transition:enter="transition transform duration-1000"
                x-transition:enter-start="opacity-0 scale-125"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                >
                
            </div>
            <button @click="show = !show">Toggle</button>
        </div>
    </div>
</body>

</html>
