<?php

use App\Models\Snippet;
use App\Models\User;
use function Laravel\Prompts\warning;
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

it('lets a logged in user edit a snippet', function () {
    $snippet = Snippet::factory()->create([
        'title' => 'Test snippet',
    ]);

    $user = User::factory()->create();

    $response = actingAs($user)
        ->get(route('snippet.show', compact('snippet')));

    $response->assertStatus(200)
        ->assertSee('Test snippet');

    $response = actingAs($user)
        ->followingRedirects()
        ->post(route('snippet.update', compact('snippet')), [
            'title' => 'Edited snippet',
            'code' => $snippet->code,
            'language' => $snippet->language,
        ]);

    $response->assertSee('Edited snippet');
});

it('lets a logged in user delete a snippet', function () {
    $snippet = Snippet::factory()->create([
        'title' => 'Test snippet',
    ]);

    $user = User::factory()->create();

    $response = actingAs($user)
        ->get(route('snippet.show', compact('snippet')));

    $response = actingAs($user)
        ->post(route('snippet.delete', compact('snippet')));

    $response->assertRedirect(route('snippet.show', compact('snippet')));

    $snippet = Snippet::withTrashed()->find($snippet->id);

    assertNotNull($snippet->deleted_at);
});

it('lets a logged in user restore a snippet', function () {
    $snippet = Snippet::factory()->create([
        'title' => 'Test snippet',
        'deleted_at' => now(),
    ]);

    $user = User::factory()->create();

    $response = actingAs($user)
        ->get(route('snippet.show', compact('snippet')));

    $response = actingAs($user)
        ->post(route('snippet.restore', compact('snippet')));

    $response->assertRedirect(route('snippet.show', compact('snippet')));

    $snippet = Snippet::query()->find($snippet->id);

    assertNull($snippet->deleted_at);
});
