<x-layout>
    <h1 class="sro">Snippets</h1>
    <aside class="index__sidebar">
        @auth
            <x-button :href="route('snippet.create')" :modifiers="['index-create', 'secondary']">
                Create snippet
            </x-button>
        @endauth

        @forelse($snippets as $snippet)
            <x-snippet-card :$snippet />
        @empty
            <x-snippet-card />
        @endforelse
    </aside>
    <main class="index__content">
        <form action="{{ route('search') }}" method="post" class="index__form">
            @csrf
            <div class="index__input">
                <input type="search" name="search" id="search" value="{{ session('search') }}">
            </div>
            <x-button type="submit">Search</x-button>
        </form>
        <a href="https://github.com/theokbokki/laravel-filter-search#the-syntax" class="index__link" target="_blank">Advanced filtering tutorial</a>
        <section class="index__snippet">
            <x-snippet :snippet="$activeSnippet ?? $snippets->first()"/>
        </section>
    </main>
</x-layout>

@css()
<style>
    .index__sidebar {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        max-height: calc(100vh - 2rem);
    }

    .index__form {
        display: flex;
        gap: 1rem;
    }

    .index__input {
        position: relative;
        display: flex;
        align-items: center;
        width: 100%;
        overflow: hidden;
        border-radius: .5rem;
        box-shadow: 0 0 0 1px var(--grey-200),
            0 0 0 0 var(--blue-50);
        transition: 200ms box-shadow ease-out;

        &:before {
            content: "";
            position: absolute;
            left: .75rem;
            width: 1rem;
            height: 1rem;
            background-image: url('../icons/filter.svg');
            background-repeat: no-repeat;
            pointer-events: none;
        }

        input {
            width: 100%;
            padding: 0.625rem 0.625rem 0.75rem 2.25rem ;
            font-family: var(--sans);
            font-weight: 400;
            font-size: 1rem;
            color: var(--grey-700);
            border: none;

            &:focus {
                outline: none;
            }
        }

        &:hover {
            box-shadow: 0 0 0 1px var(--grey-400),
                0 0 0 0 var(--grey-100);
        }

        &:has(input:focus-visible) {
            outline: none;
            box-shadow: 0 0 0 1px var(--grey-400),
                0 0 0 3px var(--grey-100);
        }
    }

    .index__link {
        display: inline-block;
        margin-top: .5rem;
        font-family: var(--sans);
        font-weight: 400;
        font-size: .875rem;
        color: var(--grey-700);

        &:hover,
        &:focus-visible {
            color: var(--grey-500);
        }

        &:focus-visible {
            outline-color: var(--grey-600);
            outline-offset: .25rem;
            border-radius: .125rem;
        }
    }

    .index__snippet {
        margin-top: 2.5rem;
    }

    .index__snippets {
        display: grid;
        gap: 2.5rem;
        margin-top: 4rem;
    }

    @media screen and (min-width: 80rem) {
        .index__snippets {
            grid-template-columns: 1fr 1fr;
        }
    }
</style>
@endcss
