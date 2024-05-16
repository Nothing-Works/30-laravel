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
    <div class="px-10 py-6 bg-gray-300 rounded" x-data="taskApp()">
        <form @submit.prevent="submit()">
            <input type="text" placeholder="Go to the market..." x-model="newTask" class="w-full px-1">
        </form>
        <ul class="mt-3 list-disc">
            <template x-for="(task, index) in tasks" :key="index">
                <li>
                    <input type="checkbox" x-model="task.completed">
                    <span x-text="task.body" :class="{ 'line-through': task.completed }"></span>
                </li>
            </template>
        </ul>
    </div>
    <script>
        function taskApp() {
            return {
                newTask: '',
                tasks: [],
                submit() {
                    this.tasks.push({
                        body: this.newTask,
                        completed: false
                    });
                    this.newTask = '';
                }
            }
        }
    </script>
</body>

</html>
