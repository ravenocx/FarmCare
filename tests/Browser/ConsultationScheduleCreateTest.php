<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Carbon\Carbon;

class ConsultationScheduleCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testAddOnlineConsultationSchedule(): void
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
                    ->assertPathIs('/veterinarian/consultation')
                    ->pause(5000)
                    ->press('Add Schedule')
                    ->assertPathIs('/veterinarian/consultation/schedule/create')
                    ->script([
                        "document.querySelector('#datetime-start').value = '" . $currentDateTime->format('Y-m-d\TH:i') . "'",
                        "document.querySelector('#datetime-end').value = '" . $currentDateTime->addHour()->format('Y-m-d\TH:i') . "'"
                    ]);

            $browser->pause(5000)
                    ->press('Add Schedule')
                    ->assertSee('Successfully add new online consultation schedule')
                    ->pause(5000);
            
            $browser->script([
                "document.querySelector('#datetime-start').value = '" . $currentDateTime->format('Y-m-d\TH:i') . "'",
                "document.querySelector('#datetime-end').value = '" . $currentDateTime->addMinute()->addHour()->format('Y-m-d\TH:i') . "'"
            ]);

            $browser->press('Add Schedule')
                    ->assertSee('Successfully add new online consultation schedule')
                    ->pause(5000);
        });
    }
}
