<x-layout>
    <h1 dusk="title">{{ $snippet->title }}</h1>
    <form action="{{ route('snippet.'.($snippet->deleted_at ? 'restore' : 'delete'), compact('snippet')) }}" method="post">
        @csrf
        @if($snippet->deleted_at)
            <button type="submit" dusk="restore">Recover</button>
        @else
            <button type="submit" dusk="delete">Delete</button>
        @endif
    </form>
</x-layout>
