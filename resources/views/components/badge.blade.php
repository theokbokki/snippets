<span class="badge">{{ $slot }}</span>

@css()
<style>
.badge {
    dispay: inline-block;
    padding: .25rem .75rem .375rem;
    font-family: var(--sans);
    font-size: .875rem;
    color: var(--grey-700);
    background: var(--grey-200);
    border-radius: 12.5rem;
}
</style>
@endcss
