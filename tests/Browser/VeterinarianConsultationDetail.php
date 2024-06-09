<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class VeterinarianConsultationDetail extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testConsultationOrderDetail(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Login')
                    ->press('Login')
                    ->assertPathIs('/login')
                    ->type('email', 'paris28@example.org')
                    ->type('password', '123456')
                    ->pause(5000)
                    ->press('Sign In')
                    ->assertPathIs('/veterinarian')
                    ->pause(5000)
                    ->clickLink('Online Consultation')
                    ->pause(5000)
                    ->scrollIntoView('#latest-order')
                    ->pause(5000)
                    ->assertPathIs('/veterinarian/consultation')
                    ->press('Order Detail')
                    ->assertSee('Order History Detail')
                    ->pause(7000);
        });
    }
}
