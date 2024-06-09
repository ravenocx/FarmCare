<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class OrderHistoryTest extends DuskTestCase
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
                    ->type('email', 'paris28@example.org')
                    ->pause(500)
                    ->type('password', '123456')
                    ->pause(500)
                    ->press('Sign In')
                    ->pause(1000)
                    ->assertSee('Order History')
                    ->clickLink('Order History')
                    ->pause(1000)
                    ->assertPathIs('/veterinarian/order/history')
                    ->pause(1000)
                    ->clickLink('Order Detail')
                    ->pause(1000)
                    ->back();
        });
        
    }
}
