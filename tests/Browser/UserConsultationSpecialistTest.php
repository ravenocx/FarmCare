<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserConsultationSpecialistTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testViewVeterinarianBySpecialists()
    {
        $specialists = ['Livestock', 'Aquaculture', 'Poultry', 'Nutrition', 'Breeding', 'Dermatology'];

        $this->browse(function (Browser $browser) use ($specialists) {
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
                        ->clickLink('Online Consultation');
            foreach ($specialists as $specialist) {
                $browser->assertPathIs('/consultation')
                        ->scrollIntoView('#doctor_search')
                        ->pause(5000)
                        ->click('@'. $specialist . '-viewall')
                        ->pause(5000)
                        ->scrollIntoView('#doctor_search')
                        ->assertPathIs('/consultation/specialist/' . $specialist)
                        ->assertSee($specialist . ' Speciality')
                        ->pause(7000)
                        ->back();
            }
        });
    }
}
