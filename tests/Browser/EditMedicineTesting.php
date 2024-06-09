<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditMedicineTesting extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'banawa17@example.net')
                    ->type('password', '123456')
                    ->press('Sign In')
                    ->assertPathIs('/veterinarian')
                    ->clicklink('Online Consultation')
                    ->visit('/veterinarian/consultation')
                    ->press('Order Detail')
                    ->visit('/veterinarian/consultation/order/detail/52')
                    ->clicklink('View Medicine')
                    ->clicklink('Edit')
                    ->type('medicine48', 'Antibiotic')
                    ->type('quantity48', '15')
                    ->type('price48', '10000')
                    ->press('Save');
        });
    }
}
