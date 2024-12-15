<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snippets</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="app">
    {{ $slot }}
</body>
</html>

@css()
<style>
    .app {
        padding: 2rem 1rem;
        display: grid;
        grid-template-columns: 25rem 1fr;
        gap: 2.5rem;
    }
</style>
@endcss
