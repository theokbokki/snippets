<x-layout>
    <h1>Login</h1>

    <form action="{{ route('login.store') }}" method="post">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" dusk="email">
            @error('email')
                <p dusk="email-error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email">Password</label>
            <input type="password" name="password" id="password" dusk="password">
            @error('password')
                <p dusk="password-error">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" dusk="submit">login</button>
    </form>
</x-layout>
