<x-admin-layout>
    <h1 dusk="title" class="admin__title">Snippets</h1>
    <div class="admin__list">
        @foreach($snippets as $snippet)
            <x-snippet-card :$snippet :href="route('snippet.show', compact('snippet'))"/>
        @endforeach
    </div>
</x-admin-layout>

@css()
<style>
.admin__list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}
</style>
@endcss
