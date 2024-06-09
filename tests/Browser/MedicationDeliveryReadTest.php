<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MedicationDeliveryReadTest extends DuskTestCase
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
                    ->type('email', 'haris@gmail.com')
                    ->type('password', '123123')
                    ->press('Sign In')
                    ->assertPathIs('/home')
                    ->assertSee('Order History')
                    ->clickLink('Order History')
                    ->pause(2000)
                    ->assertSee('View Order Detail')
                    ->clickLink('View Order Detail')
                    ->pause(3000)
                    ->assertSee('View Medicine');
        
            $browser->visit('/medicine/status/44')
                    ->pause(2000)
                    ->assertPathIs('/medicine/status/44');
        });
        
    }
}
