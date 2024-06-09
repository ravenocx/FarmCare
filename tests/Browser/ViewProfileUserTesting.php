<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewProfileUserTesting extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'sza@gamil.com')
                    ->type('password', "12345678")
                    ->press('Sign In')
                    ->assertPathIs('/home')
                    ->click('img[alt=profile-image]')
                    ->clicklink('Edit Profile') 
                    ->assertPathIs('/profile');
        });
    }
}