<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Carbon\Carbon;


class ConsultationSchedulexDeleteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testDeleteOnlineConsultationSchedule(): void
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
                    ->pause(5000)
                    ->assertPathIs('/veterinarian')
                    ->clickLink('Online Consultation')
                    ->pause(5000)
                    ->assertPathIs('/veterinarian/consultation')
                    ->click('@schedule-viewall')
                    ->pause(5000)
                    ->assertPathIs('/veterinarian/consultation/schedule')
                    ->press('Cancel')
                    ->pause(5000)
                    ->press('Yes, Delete it')
                    ->assertSee('Successfully cancel online consultation schedule')
                    ->pause(7000);
        });
    }
}
