<x-layout>
    <h1>Login</h1>

    <form action="{{ route('login.store') }}" method="post">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email">Password</label>
            <input type="password" name="password" id="password">
            @error('password')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <button type="submit">login</button>
    </form>
</x-layout>
