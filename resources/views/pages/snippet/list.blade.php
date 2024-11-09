<x-layout>
    <h1 dusk="title">Snippets</h1>
    <div>
        @foreach($snippets as $snippet)
            <div>
                <p>{{ $snippet->title }}</p>
            </div>
        @endforeach
    </div>
</x-layout>
