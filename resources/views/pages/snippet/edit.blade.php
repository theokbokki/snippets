<x-layout>
    <h1>Edit snippet</h1>

    <form action="{{ route('snippet.update', compact('snippet')) }}" method="post">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $snippet->title }}"  dusk="title">
        </div>
        <div>
            <label for="code">Code</label>
            <textarea name="code" id="code" dusk="code">{{ $snippet->code }}</textarea>
        </div>
        <div>
            <label for="language">Language</label>
            <input type="text" name="language" id="language" value="{{ $snippet->title }}"  dusk="language">
        </div>
        <button type="submit" dusk="submit">Create snippet</button>
    </form>
</x-layout>
