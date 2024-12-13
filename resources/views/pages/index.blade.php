<x-layout>
    <h1 class="sro">Snippets</h1>
    @auth
        <a href="{{ route('snippet.create') }}" dusk="create-snippet">Create snippet</a>
    @endauth

    <form action="{{ route('search') }}" method="post">
        @csrf
        <input type="search" name="search" id="search" @session('search')value="{{ $value }}"@endsession>
        <button type="submit">Submit</button>
    </form>

    <section>
        <h2>List of snippets</h2>
        @foreach($snippets as $snippet)
            <x-snippet :$snippet />
        @endforeach
    </section>
</x-layout>
