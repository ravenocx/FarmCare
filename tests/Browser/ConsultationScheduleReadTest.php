<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ConsultationScheduleReadTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testGetOnlineConsultationSchedule(): void
    {
        $this->browse(function (Browser $browser) {

        $browser->visit('/')
                ->assertSee('Login')
                ->press('Login')
                ->assertPathIs('/login')
                ->type('email', 'banawa17@example.net')
                ->type('password', '123456')
                ->pause(5000)
                ->press('Sign In')
                ->pause(5000)
                ->assertPathIs('/veterinarian')
                ->clickLink('Online Consultation')
                ->assertPathIs('/veterinarian/consultation')
                ->pause(5000)
                ->click('@schedule-viewall')
                ->assertPathIs('/veterinarian/consultation/schedule')
                ->assertSee('Online Consultation Schedule')
                ->pause(5000)
                ->pause(7000);
        });
    }
}
