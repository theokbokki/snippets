<?php

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
