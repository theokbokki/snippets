<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('Shows the snippet creation page to a logged in user', function () {
    $user = User::factory()->create();
    $response = actingAs($user)
        ->get(route('snippet.create'));

    $response->assertStatus(200)
        ->assertSee('Create snippet');
});

it('Doesn\'t show the snippet creation page to a logged out user', function () {
    $response = get(route('snippet.create'));

    $response->assertRedirect(route('login'));
});
