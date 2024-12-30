<x-admin-layout>
    <h1 class="admin__title">Login</h1>

    <form action="{{ route('login.store') }}" method="post" class="admin__form">
        @csrf
        <div class="admin__field">
            <label for="email" class="admin__label">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" dusk="email" class="admin__input">
            @error('email')
                <p dusk="email-error" class="admin__error">{{ $message }}</p>
            @enderror
        </div>
        <div class="admin__field">
            <label for="email" class="admin__label">Password</label>
            <input type="password" name="password" id="password" dusk="password" class="admin__input">
            @error('password')
                <p dusk="password-error" class="admin__error">{{ $message }}</p>
            @enderror
        </div>
        <x-button type="submit" dusk="submit">Login</x-button>
    </form>
</x-admin-layout>
