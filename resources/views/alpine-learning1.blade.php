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

<body class="max-w-lg p-10 mx-auto">
    <form x-data="{
        form: {
            name: ''
        },
        user: null,
        submit() {
            fetch('https://reqres.in/api/users', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(this.form)
            }).then(r => r.json()).then(u => this.user = u)
        }
    }" @submit.prevent="submit">
        <div class="mb-6">
            <label for="name" class="block mb-2 text-xs font-bold text-gray-700 uppercase">name</label>
            <input type="text" name="name" id="name" class="w-full p-2 border border-gray-400"
                x-model="form.name" required>
        </div>
        <template x-if="user">
            <div x-text="'The user ' + user.name + ' was created at ' + user.createdAt">
            </div>
        </template>
    </form>
</body>

</html>
