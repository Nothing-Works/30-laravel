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

<body class="p-12">
    <div x-data="{}">
        <button @click="flash('triggered')">Trigger flash</button>
        <button @click="$dispatch('flash', 'dispatch message')">Trigger flash dispatch</button>
    </div>
    <hr>
    <div x-data="{ show: false, message: '' }"
        @flash.window="
    show = true;
    message = $event.detail;
    setTimeout(()=> {show = false},3000);
    "
        x-text="message" x-show="show" x-transition.opacity.scale.75
        class="fixed bottom-0 right-0 p-4 mb-4 mr-4 text-white bg-blue-500 rounded">
    </div>
    <script>
        window.flash = (message) => {
            window.dispatchEvent(new CustomEvent('flash', {
                detail: message
            }));
        }
    </script>
</body>

</html>
