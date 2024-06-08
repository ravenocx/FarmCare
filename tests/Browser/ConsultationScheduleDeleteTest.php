<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Carbon\Carbon;


class ConsultationScheduleDeleteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testDeleteOnlineConsultationSchedule(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->clickLink('Online Consultation')
                    ->assertPathIs('/veterinarian/consultation')
                    ->click('@schedule-viewall')
                    ->assertPathIs('/veterinarian/consultation/schedule')
                    ->press('Cancel')
                    ->press('Yes, Delete it')
                    ->assertSee('Successfully cancel online consultation schedule');
        });
        // $this->browse(function (Browser $browser) {
        //     $browser->click('@profile-summary')
        //             ->clickLink('Logout')
        //             ->assertPathIs('/login')
        //             ->assertSee('Sign in');
        // });
    }
}
