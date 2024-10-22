<?php

use App\Models\User;
use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\assertGuest;
use function Pest\Laravel\post;

it('lets a user with correct credentials login', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);

    $response = post(
        route('login.store'),
        [
            'email' => 'test@example.com',
            'password' => 'password',
        ],
        ['Referer' => route('login.show')]
    );

    $response->assertRedirect(route('home'));
    assertAuthenticated();
});

it('doesn\'t let a user with incorrect credentials login', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);

    $response = post(
        route('login.store'),
        [
            'email' => 'test@example.com',
            'password' => 'wrongpassword',
        ],
        ['Referer' => route('login.show')]
    );

    $response->assertRedirect(route('login.show'));
    assertGuest();
});
