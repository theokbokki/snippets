<x-layout>
    <h1 class="sro">Snippets</h1>
    @auth
        <a href="{{ route('snippet.create') }}" dusk="create-snippet">Create snippet</a>
    @endauth

    <section>
        <h2>List of snippets</h2>
        @foreach($snippets as $snippet)
            <x-snippet :$snippet />
        @endforeach
    </section>
</x-layout>
