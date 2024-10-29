<?php

use App\Models\Snippet;
use App\Models\User;
use function PHPUnit\Framework\assertNotNull;
use function PHPUnit\Framework\assertNull;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

it('shows the snippet creation page to a logged in user', function () {
    $user = User::factory()->create();
    $response = actingAs($user)
        ->get(route('snippet.create'));

    $response->assertStatus(200)
        ->assertSee('Create snippet');
});

it('doesn\'t show the snippet creation page to a logged out user', function () {
    $response = get(route('snippet.create'));

    $response->assertRedirect(route('login'));
});

it('lets a logged in user create a snippet', function () {
    $user = User::factory()->create();

    $response = actingAs($user)
        ->followingRedirects()
        ->post(route('snippet.store'), [
            'title' => 'Test snippet',
            'code' => '<div>Hello wolrd</div>',
            'language' => 'html',
        ]);

    $snippet = Snippet::query()->find(1);
    assertNotNull($snippet);

    $response->assertSee($snippet->title);
});

it('doesn\'t let a logged out user create a snippet', function () {
    $response = post(route('snippet.store'), [
            'title' => 'Test snippet',
            'code' => '<div>Hello wolrd</div>',
            'language' => 'html',
        ]);

    $snippet = Snippet::query()->find(1);
    assertNull($snippet);

    $response->assertStatus(302)
        ->assertRedirectToRoute('login');
});
