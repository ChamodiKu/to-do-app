<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do App</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>

<div class="container">
    <!-- Left side: Add Task -->
    <div class="form-section">
        <h2>Add a Task</h2>
        <form id="taskForm">
            <input type="text" id="title" placeholder="Title" required>
            <textarea id="description" placeholder="Description" rows="4"></textarea>
            <button type="submit">Add</button>
        </form>
    </div>

    <!-- Right side: Task List -->
    <div class="task-section">
        <div id="taskList"></div>
    </div><!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>To-Do App</title>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    </head>
    <body>

    <div class="container">
        <!-- Left side: Add Task -->
        <div class="form-section">
            <h2>Add a Task</h2>
            <form id="taskForm">
                <input type="text" id="title" placeholder="Title" required>
                <textarea id="description" placeholder="Description" rows="4"></textarea>
                <button type="submit">Add</button>
            </form>
        </div>

        <!-- Right side: Task List -->
        <div class="task-section">
            <div id="taskList"></div>
        </div>
    </div>

    <script>
        const API = "{{ env('APP_URL') }}/api/tasks";

        async function loadTasks() {
            const res = await fetch(API);
            const tasks = await res.json();
            const list = document.getElementById('taskList');
            list.innerHTML = '';
            tasks.forEach(task => {
                const div = document.createElement('div');
                div.className = 'task';
                div.innerHTML = `
                <div class="task-content">
                    <strong>${task.title}</strong>
                    ${task.description}
                </div>
                <button class="done-btn" onclick="markDone(${task.id})">Done</button>
            `;
                list.appendChild(div);
            });
        }

        async function markDone(id) {
            await fetch(`${API}/${id}/complete`, { method: 'PATCH' });
            loadTasks();
        }

        document.getElementById('taskForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const title = document.getElementById('title').value;
            const description = document.getElementById('description').value;
            await fetch(API, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ title, description })
            });
            e.target.reset();
            loadTasks();
        });

        loadTasks();
    </script>

    </body>
    </html>

</div>

<script>
    const API = "{{ env('APP_URL') }}/api/tasks";

    async function loadTasks() {
        const res = await fetch(API);
        const tasks = await res.json();
        const list = document.getElementById('taskList');
        list.innerHTML = '';
        tasks.forEach(task => {
            const div = document.createElement('div');
            div.className = 'task';
            div.innerHTML = `
                <div class="task-content">
                    <strong>${task.title}</strong>
                    ${task.description}
                </div>
                <button class="done-btn" onclick="markDone(${task.id})">Done</button>
            `;
            list.appendChild(div);
        });
    }

    async function markDone(id) {
        await fetch(`${API}/${id}/complete`, { method: 'PATCH' });
        loadTasks();
    }

    document.getElementById('taskForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const title = document.getElementById('title').value;
        const description = document.getElementById('description').value;
        await fetch(API, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ title, description })
        });
        e.target.reset();
        loadTasks();
    });

    loadTasks();
</script>

</body>
</html>
