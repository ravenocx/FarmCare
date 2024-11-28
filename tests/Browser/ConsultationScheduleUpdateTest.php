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
            $currentDateTime = Carbon::now();

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
                    ->pause(5000)
                    ->assertPathIs('/veterinarian/consultation')
                    ->click('@schedule-viewall')
                    ->pause(5000)
                    ->assertPathIs('/veterinarian/consultation/schedule')
                    ->press('Edit')
                    ->pause(5000)
                    ->assertSee('Edit Schedule')
                    ->script([
                        "document.querySelector('#datetime-start').value = '" . $currentDateTime->format('Y-m-d\TH:i') . "'",
                        "document.querySelector('#datetime-end').value = '" . $currentDateTime->addHours(2)->format('Y-m-d\TH:i') . "'"
                    ]);
            $browser->pause(5000)
                    ->press('Edit Schedule')
                    ->assertSee('Successfully edit online consultation schedule')
                    ->pause(7000);
        });
    }
}
