<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutVeteTesting extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
            ->type('email', 'banawa17@example.net')
            ->type('password', "123456")
            ->press('Sign In')
            ->assertPathIs('/veterinarian')
            ->click('img[alt=profile-image]')
            ->clicklink('Logout');
        });
    }
}
