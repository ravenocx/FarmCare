<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistUserTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
            ->type('fullName', 'Reihaini')
            ->type('phoneNumber', '082127365989')
            ->type('email', 'rhn@gmail.com')
            ->type('password', '12345678')
            ->type('password_confirmation', '12345678')
            ->press('Sign Up')
            ->visit('/login')   
            ->type('email', 'rhn@gmail.com')
            ->type('password', "12345678")
            ->press('Sign In');
            // ->assertPathIs('/home');
        });
    }
}
