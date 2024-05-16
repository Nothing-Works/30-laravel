<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .active {
            color: blue;
        }
    </style>
</head>

<body>
    <div x-data="{ message: 'Hello World' }">
        <h1 x-text="message"></h1>
        <input type="text" x-model="message">
        <button @click="message = 'Changed!'">Click Me</button>
    </div>
    <div x-data="{ first: 0, second: 0 }">
        <input type="text" x-model.number="first">
        <input type="text" x-model.number="second">
        <h1 x-text="first + second"></h1>
    </div>

    <div x-data="{ show: false }">
        <h1 x-show="show">
            Hello World
        </h1>
        <button @click="show = !show" x-text="show ? 'hide' : 'show'"></button>

        <div x-show="show">
            <a href="/" style="display: block">Home</a>
            <a href="/" style="display: block">About</a>
            <a href="/" style="display: block">Contact</a>
        </div>
    </div>

    <div x-data="{ currentTab: 'first' }">
        <button @click="currentTab = 'first'" :class="{ 'active': currentTab === 'first' }">first</button>
        <button @click="currentTab = 'second'" :class="{ 'active': currentTab === 'second' }">second</button>
        <button @click="currentTab = 'third'" :class="{ 'active': currentTab === 'third' }">third</button>
        <div x-show="currentTab === 'first'">
            <p>
                First Tab
            </p>
        </div>
        <div x-show="currentTab === 'second'">
            <p>
                Second Tab
            </p>
        </div>
        <div x-show="currentTab === 'third'">
            <p>
                Third Tab
            </p>
        </div>
    </div>
</body>

</html>
