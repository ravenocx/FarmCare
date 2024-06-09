<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class VeterinarianDashboard extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/login')
            ->waitForLocation('/login')
            ->assertSee('Welcome to')
            ->type('email', 'dprasetyo@example.net')
            ->type('password', '123456')
            ->press('Sign In')
            ->waitForLocation('/veterinarian')
            ->assertPathIs('/veterinarian')
            ->assertSee('Total Income')
            ->assertSee('Total Patients')
            ->assertSee('Ongoing Appointments')
            ->assertSee('The Most Comprehensive Animal Health Solution')
            ->clickLink('Online Consultation')
            ->assertPathIs('/veterinarian/consultation')
            ->back()
            ->clickLink('Offline Reservation')
            ->assertPathIs('/veterinarian/offline-reservation');


        });
    }
}
