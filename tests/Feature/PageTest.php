<?php

use function Pest\Laravel\get;

it('shows the home page', function () {
    get(route('home'))->assertStatus(200);
});

it('shows the login page', function () {
    get(route('login'))->assertStatus(200);
});
