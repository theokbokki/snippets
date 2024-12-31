<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ Vite::asset('resources/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ Vite::asset('resources/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ Vite::asset('resources/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ Vite::asset('resources/favicons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ Vite::asset('resources/favicons/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00a300">
    <meta name="theme-color" content="#ffffff">

    <title>Théo's snippet repository</title>

    <meta name="keywords" content="Web, Code, Snippets, Go, PHP, Javascript, CSS, HTML, Blade, GLSL" />
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="snippets.theoo.dev">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@theokbokki_">
    <meta name="twitter:creator" content="@theokbokki_">

    <meta name="description" content="A collection of all my snippets with powerfull filtering capabilites." />
    <meta property="og:url" content="{{ route('home') }}">
    <meta property="og:title" content="Théo's snippet manager">
    <meta property="og:image" content="{{ Vite::asset('resources/img/card.png') }}">
    <meta property="og:description" content="A collection of all my snippets with powerfull filtering capabilites.">
    <meta name="twitter:title" content="Snippets">
    <meta name="twitter:description" content="A collection of all my snippets with powerfull filtering capabilites.">
    <meta name="twitter:image:src" content="{{ Vite::asset('resources/img/card.png') }}">

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
