<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminLoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testAdminLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin_login')
                    ->assertSee('Sign in')
                    ->type('email', 'admin@gmail.com')
                    ->type('password', '123456')
                    ->press('Sign in')
                    ->assertSee('List of Veterinarians')
                    ->assertPathIs('/admin');
        });
    }
}
