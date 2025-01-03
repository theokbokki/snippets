<article class="snippet">
    @isset($snippet)
        <div class="snippet__top">
            <h3 class="snippet__title">{{ $snippet->title }}</h3>
            <x-badge>{{ $snippet->language }}</x-badge>
            <div class="snippet__actions">
                @auth
                    <form action="{{ route('snippet.'.($snippet->deleted_at ? 'restore' : 'delete'), compact('snippet')) }}" method="post">
                        @csrf
                        @if($snippet->deleted_at)
                            <x-button type="submit" dusk="restore" :modifiers="['secondary']">Recover</x-button>
                        @else
                            <x-button type="submit" dusk="delete" :modifiers="['secondary', 'danger']">Delete</x-button>
                        @endif
                    </form>
                   <x-button :href="route('snippet.edit', compact('snippet'))" :modifiers="['secondary']">Edit</x-button>
                @endauth
                <x-button type="button" :modifiers="['copy']">Copy code</x-button>
            </div>
        </div>
        <p class="snippet__time"><time datetime="{{ $snippet->updated_at->format('Y-m-d\TH:i:s') }}">Last updated on {{ $snippet->updated_at->format('d F Y') }}</time></p>
        <pre class="snippet__code"><code>{!! $getCode !!}</code></pre>
    @else
        <div class="snippet__empty"></div>
    @endisset
</article>

@css()
<style>
    .snippet {
        display: flex;
        flex-direction: column;
    }

    .snippet__top {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .snippet__title {
        font-family: var(--sans);
        font-weight: 700;
        font-size: 1.5rem;
    }

    .snippet__actions {
        display: flex;
        gap: .5rem;
        margin-left: auto;
    }

    .snippet__time {
       margin-top: .5rem;
       font-family: var(--sans);
       font-size: 1rem;
       color: var(--grey-700);
    }

    .snippet__code {
        margin-top: 2rem;
        flex: 1;
        min-height: calc(100vh - 18.5rem);
        padding: 1rem;
        font-family: var(--code);
        font-size: .875rem;
        line-height: 160%;
        background: var(--grey-50);
        border-radius: 0.375rem;

        code {
            background: var(--grey-50);
        }
    }

    .snippet__empty {
        background: var(--grey-50);
        min-height: calc(100vh - 10.5rem);
        border-radius: .5rem;
    }
</style>
@endcss
