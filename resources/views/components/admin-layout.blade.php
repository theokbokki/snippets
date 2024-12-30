<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snippets</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin">
    {{ $slot }}
</body>
</html>

@css()
<style>
    .admin {
        display: flex;
        flex-direction: column;
        max-width: 50rem;
        margin: 5rem auto;
    }

    .admin__title {
        margin-bottom: 2rem;
        font-family: var(--sans);
        font-size: 1.25rem;
        text-align: center;
    }

    .admin__form {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        padding: 1.5rem;
        background: var(--grey-50);
        border-radius: .5rem;
    }

    .admin__field {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .admin__label {
        font-family: var(--sans);
        font-size: 1rem;
        margin-bottom: .5rem;
    }

    .admin__input {
        padding: 0.625rem .75rem;
        overflow: hidden;
        font-family: var(--sans);
        font-weight: 400;
        font-size: 1rem;
        color: var(--grey-700);
        border-radius: .5rem;
        border: none;
        box-shadow: 0 0 0 1px var(--grey-200),
            0 0 0 0 var(--blue-50);
        transition: 200ms box-shadow ease-out;

        &:hover {
            box-shadow: 0 0 0 1px var(--grey-400),
                0 0 0 0 var(--grey-100);
        }

        &:focus-visible {
            outline: none;
            box-shadow: 0 0 0 1px var(--grey-400),
                0 0 0 3px var(--grey-100);
        }
    }

    .admin__input--textarea {
        min-height: 21.875rem;
    }

    .admin__error {
        margin-top: .25rem;
        font-family: var(--sans);
        font-size: .875rem;
        color: var(--red-600);
    }
</style>
@endcss
