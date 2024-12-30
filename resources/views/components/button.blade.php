<{{ $tag }}
    {{ $contextualizedAttributes($attributes) }}
>
    <span class="button__content">
        {{ $slot }}
    </span>
</{{ $tag }}>

@css()
<style>
.button {
    display: flex;
    align-items: center;
    width: max-content;
    padding: 0.625rem 0.75rem;
    font-family: var(--sans);
    font-weight: 400;
    font-size: 1rem;
    color: var(--white);
    text-decoration: none;
    background: var(--grey-700);
    border: none;
    box-shadow: 0 -4px 0 0 var(--grey-900) inset,
        0 0 0 0 var(--grey-200);
    border-radius: .5em;
    cursor: pointer;
    transition: 200ms box-shadow ease-out,
        200ms transform ease-out,
        200ms background ease-out,
        200ms opacity ease-out;

    &:hover,
    &:focus-visible {
        background: var(--grey-800);
        box-shadow: 0 -4px 0 0 var(--grey-900) inset,
            0 0 0 0px var(--grey-200);
    }

    &:focus-visible {
        outline: none;
        box-shadow: 0 -4px 0 0 var(--grey-900) inset,
            0 0 0 2px var(--grey-200);
    }

    &:active {
        background: var(--grey-900);
        transform: scale(0.95);
    }
}

.button--secondary {
    background: var(--grey-50);
    color: var(--grey-700);
    box-shadow: 0 0 0 1px var(--grey-200) inset,
        0 0 0 0 var(--grey-50);

    &:hover,
    &:focus-visible {
        background: var(--grey-100);
        box-shadow: 0 0 0 1px var(--grey-200) inset,
            0 0 0 0 var(--grey-50);
    }

    &:focus-visible {
        outline: none;
        box-shadow: 0 0 0 1px var(--grey-200) inset,
            0 0 0 2px var(--grey-50);
    }

    &:active {
        background: var(--grey-100);
        transform: scale(0.95);
    }
}

.button--danger {
    box-shadow: none;
    background: var(--red-600);
    color: var(--white);

    &:hover,
    &:focus-visible,
    &:active {
        background: var(--red-600);
        opacity: .8;
        box-shadow: none;
    }
}

.button--index-create {
    min-width: calc(100% - 1.5rem);
    justify-content: center;
}
</style>
@endcss
