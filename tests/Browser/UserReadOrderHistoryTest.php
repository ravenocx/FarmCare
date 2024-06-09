<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserReadOrderHistoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'haris@gmail.com')
                    ->type('password', '123123')
                    ->press('Sign In')
                    ->assertPathIs('/home')
                    ->visit('/order/history')
                    ->clickLink('View Order Detail')
                    ->visit('order/details/34');
        });
    }
}