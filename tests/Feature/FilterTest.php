<?php

use App\Models\Snippet;
use App\Models\User;
use function Pest\Laravel\actingAs;

it('lets a user filter the snippets based on a word in the title', function () {
    $snippet1 = Snippet::factory()->create([
        'title' => 'test1',
    ]);

    $snippet2 = Snippet::factory()->create([
        'title' => 'test2',
    ]);

    $user = User::factory()->create();

    $response = actingAs($user)->get(route('home'));

    $response->assertStatus(200)
        ->assertSee($snippet1->title)
        ->assertSee($snippet2->title);

    $response = actingAs($user)
        ->followingRedirects()
        ->post(route('search'), [
            'search' => $snippet1->title,
        ]);

    $response->assertSee($snippet1->title)
        ->assertDontSee($snippet2->title);
});

it('lets a user filter the snippets based on the language', function () {
    $snippet1 = Snippet::factory()->create([
        'title' => 'test1',
        'language' => 'php',
    ]);

    $snippet2 = Snippet::factory()->create([
        'title' => 'test2',
        'language' => 'css',
    ]);

    $snippet3 = Snippet::factory()->create([
        'title' => 'test3',
        'language' => 'html',
    ]);

    $user = User::factory()->create();

    $response = actingAs($user)->get(route('home'));

    $response->assertStatus(200)
        ->assertSee($snippet1->title)
        ->assertSee($snippet2->title)
        ->assertSee($snippet3->title);

    $response = actingAs($user)
        ->followingRedirects()
        ->post(route('search'), [
            'search' => 'language:php,css',
        ]);

    $response->assertSee($snippet1->title)
        ->assertSee($snippet2->title)
        ->assertDontSee($snippet3->title);
});

it('lets a user filter the snippets based on a word in the code', function () {
    $snippet1 = Snippet::factory()->create([
        'code' => 'Spongebob Squarepants',
    ]);

    $snippet2 = Snippet::factory()->create([
        'code' => 'Patrick Star',
    ]);

    $user = User::factory()->create();

    $response = actingAs($user)->get(route('home'));

    $response->assertStatus(200)
        ->assertSee($snippet1->code)
        ->assertSee($snippet2->code);

    $response = actingAs($user)
        ->followingRedirects()
        ->post(route('search'), [
            'search' => $snippet1->code,
        ]);

    $response->assertSee($snippet1->code)
        ->assertDontSee($snippet2->code);
});
