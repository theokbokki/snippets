<x-layout>
    <h1 class="sro">Snippets</h1>
    @auth
        <a href="{{ route('snippet.create') }}" dusk="create-snippet">Create snippet</a>
    @endauth
</x-layout>
