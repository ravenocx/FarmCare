<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class VeterinarianConsultationUpdate extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testEditOnlineConsultationStatus(): void
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
                    ->assertPathIs('/veterinarian/consultation')
                    ->pause(5000)
                    ->select('status' , 'Complete')
                    ->assertSee('Successfully edit online consultation status')
                    ->pause(7000);
        });
    }
}
