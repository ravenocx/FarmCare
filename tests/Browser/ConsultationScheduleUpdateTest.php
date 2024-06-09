<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Carbon\Carbon;


class ConsultationScheduleUpdateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testUpdateOnlineConsultationSchedule(): void
    {
        $this->browse(function (Browser $browser) {
            $currentDateTime = Carbon::now()->addHour();

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
                    ->press('Edit')
                    ->assertSee('Edit Schedule')
                    ->script([
                        "document.querySelector('#datetime-start').value = '" . $currentDateTime->format('Y-m-d\TH:i') . "'",
                        "document.querySelector('#datetime-end').value = '" . $currentDateTime->addHour()->format('Y-m-d\TH:i') . "'"
                    ]);
            $browser->press('Edit Schedule')
                    ->assertSee('Successfully edit online consultation schedule');
        });
    }
}
