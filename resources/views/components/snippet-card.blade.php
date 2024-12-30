<article class="snippet-card">
    @isset($snippet)
    <div class="snippet-card__top">
        <h3 class="snippet-card__title"><a href="{{ isset($href) ? $href : '?snippet='.$snippet->id }}" class="snippet-card__link">{{ $snippet->title }}</a></h3>
        <x-badge>{{ $snippet->language }}</x-badge>
    </div>
    <p class="snippet-card__time"><time datetime="{{ $snippet->updated_at->format('Y-m-d\TH:i:s') }}">Last updated on {{ $snippet->updated_at->format('d F Y') }}</time></p>
    @else
    <div class="snippet-card__top">
        <h3 class="snippet-card__title">No snippets found</h3>
    </div>
    <p class="snippet-card__time">Try searching for something else</p>
    @endisset
</article>

@css()
<style>
    .snippet-card {
        position: relative;
        padding: 1rem;
        background: var(--grey-50);
        border-radius: .5rem;
        transition: 200ms background ease-out,
            200ms transform ease-out;

        &:hover {
            background: var(--grey-100);
        }

        &:has(.snippet-card__link:active) {
            transform: scale(.99);
        }
    }

    .snippet-card__top {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .snippet-card__title {
        font-family: var(--sans);
        font-size: 1rem;
        font-weight: 600;
    }

    .snippet-card__link {
        color: var(--grey-900);
        text-decoration: none;

        &:before {
            content: "";
            position: absolute;
            inset: 0;
        }
    }

    .snippet-card__time {
        margin-top: .25rem;
        font-family: var(--sans);
        font-size: .875rem;
    }
</style>
@endcss
