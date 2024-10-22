<?php

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;

uses(DatabaseTruncation::class);

it('lets a user with correct credentials login', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);

    $this->browse(function (Browser $browser) {
        $browser->visit(route('login'))
            ->waitFor('@email')
            ->value('@email', 'test@example.com')
            ->waitFor('@password')
            ->value('@password', 'password')
            ->waitFor('@submit')
            ->click('@submit')
            ->waitForTextIn('@create-snippet', 'Create snippet');
    });
});

it('doesn\'t let a user with incorrect credentials login and shows them correct errors', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);

    $this->browse(function (Browser $browser) {
        // Required input
        $browser->visit(route('login'))
            ->waitFor('@submit')
            ->click('@submit')
            ->waitForTextIn('@email-error', 'The email field is required.')
            ->waitForTextIn('@password-error', 'The password field is required.');

        // Incorrect credentials
        $browser->waitFor('@email')
            ->value('@email', 'not@correct.email')
            ->waitFor('@password')
            ->value('@password', 'password')
            ->waitFor('@submit')
            ->click('@submit')
            ->waitForTextIn('@email-error', 'The provided credentials do not match our records.');
    });
});
