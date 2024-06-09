<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DashboardTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Login')
                    ->pause(1000)
                    ->press('Login')
                    ->assertPathIs('/login')
                    ->pause(1000)
                    ->type('email', 'azka@gmail.com')
                    ->pause(500)
                    ->type('password', '123456')
                    ->pause(500)
                    ->press('Sign In')
                    ->pause(1000)
                    ->assertPathIs('/home');
        });
        
    }
}