<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MedicationDeliveryCreateTest extends DuskTestCase
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
                    ->type('email', 'haris@gmail.com')
                    ->pause(500)
                    ->type('password', '123123')
                    ->pause(500)
                    ->press('Sign In')
                    ->assertPathIs('/home')
                    ->pause(1000)
                    ->assertSee('Order History')
                    ->clickLink('Order History')
                    ->pause(1000)
                    ->assertSee('Order-34')
                    ->assertSee('View Order Detail')
                    ->press('View Order Detail')
                    ->pause(1000)
                    ->assertSee('View Medicine')
                    ->press('View Medicine')
                    ->pause(1000)
                    ->type('address', 'Jl. Cihanjuang No. 3, Bandung, Jawa Barat')
                    ->pause(1000)
                    ->press('Save')
                    ->pause(1000)
                    ->clickLink('Upload Evidence of Transfer')
                    ->pause(1000)
                    ->attach('payment_proof', 'S:\Ngoding\RPL\SI4501_Kelompok6_FarmCare\public\Images\test\payment_proof.jpeg')
                    ->pause(1000)
                    ->press('Process to Payment')
                    ->pause(1000);
        });
        
    }
}
