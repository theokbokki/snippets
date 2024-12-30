<x-admin-layout>
    <h1 dusk="title" class="sro">{{ $snippet->title }}</h1>

    <x-snippet :$snippet />
</x-admin-layout>

@css()
<style>
    .admin__delete {
        margin-top: 2rem;
    }
</style>
@endcss
