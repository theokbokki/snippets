<x-admin-layout>
    <h1 class="admin__title">Create snippet</h1>

    <form action="{{ route('snippet.store') }}" method="post" class="admin__form">
        @csrf
        <div class="admin__field">
            <label for="title" class="admin__label">Title</label>
            <input type="text" name="title" id="title" dusk="title" class="admin__input">
        </div>
        <div class="admin__field">
            <label for="code" class="admin__label">Code</label>
            <textarea name="code" id="code" dusk="code" class="admin__input admin__input--textarea"></textarea>
        </div>
        <div class="admin__field">
            <label for="language" class="admin__label">Language</label>
            <input type="text" name="language" id="language" dusk="language" class="admin__input">
        </div>
        <x-button type="submit" dusk="submit">Create snippet</x-button>
    </form>
</x-layout>
