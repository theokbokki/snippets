<?php

use App\Models\Snippet;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;

uses(DatabaseTruncation::class);

it('lets a logged in user create a snippet', function () {
    $this->browse(function (Browser $browser) {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $browser->loginAs($user)
            ->visit(route('snippet.create'))
            ->waitFor('@title')
            ->type('@title', 'Test snippet')
            ->waitFor('@code')
            ->type('@code', '<div>Hello world</div>')
            ->waitFor('@language')
            ->type('@language', 'html')
            ->waitFor('@submit')
            ->click('@submit')
            ->assertPathIs('/snippet/1')
            ->waitForTextIn('@title', 'Test snippet');
    });
});

it('lets a logged in user edit a snippet', function () {
    $this->browse(function (Browser $browser) {
        $snippet = Snippet::factory()->create([
            'title' => 'Test snippet',
        ]);

        $user = User::factory()->create();

        $browser->loginAs($user)
            ->visit(route('snippet.edit', compact('snippet')))
            ->waitFor('@title')
            ->type('@title', 'Edited snippet')
            ->waitFor('@submit')
            ->click('@submit')
            ->assertPathIs('/snippet/1')
            ->waitForTextIn('@title', 'Edited snippet');
    });
});
