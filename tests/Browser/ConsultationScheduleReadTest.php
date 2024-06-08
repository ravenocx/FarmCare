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

        $browser->clickLink('Online Consultation')
                ->assertPathIs('/veterinarian/consultation')
                ->click('@schedule-viewall')
                ->assertPathIs('/veterinarian/consultation/schedule')
                ->assertSee('Online Consultation Schedule');
        });
    }
}
