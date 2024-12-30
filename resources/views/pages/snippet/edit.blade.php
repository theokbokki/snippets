<x-admin-layout>
    <h1 class="admin__title">Edit snippet</h1>

    <form action="{{ route('snippet.update', compact('snippet')) }}" method="post" class="admin__form">
        @csrf
        <div class="admin__field">
            <label for="title" class="admin__label">Title</label>
            <input type="text" name="title" id="title" value="{{ $snippet->title }}" dusk="title" class="admin__input">
        </div>
        <div class="admin__field">
            <label for="code" class="admin__label">Code</label>
            <textarea name="code" id="code" dusk="code" class="admin__input admin__input--textarea">{{ $snippet->code }}</textarea>
        </div>
        <div class="admin__field">
            <label for="language" class="admin__label">Language</label>
            <input type="text" name="language" id="language" value="{{ $snippet->language }}" dusk="language" class="admin__input">
        </div>
        <x-button type="submit" dusk="submit">Edit snippet</x-button>
    </form>
</x-admin-layout>
