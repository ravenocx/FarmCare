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
                ->type('email', 'paris28@example.org')
                ->type('password', '123456')
                ->press('Sign In')
                ->assertPathIs('/veterinarian')
                ->clickLink('Online Consultation')
                ->assertPathIs('/veterinarian/consultation')
                ->click('@schedule-viewall')
                ->assertPathIs('/veterinarian/consultation/schedule')
                ->assertSee('Online Consultation Schedule');
        });
    }
}
