<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserConsultationFitureTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testGetOnlineConsultation(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Login')
                    ->press('Login')
                    ->assertPathIs('/login')
                    ->type('email', 'haris@gmail.com')
                    ->type('password', '123123')
                    ->pause(5000)
                    ->press('Sign In')
                    ->assertPathIs('/home')
                    ->pause(5000)
                    ->click('@service-summary')
                    ->pause(2000)
                    ->clickLink('Online Consultation')
                    ->pause(5000)
                    ->scrollIntoView('#doctor_search')
                    ->assertPathIs('/consultation')
                    ->assertSee('Consult with a doctor at FarmCare+')
                    ->pause(7000);
        });
    }
}
