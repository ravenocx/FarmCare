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
            foreach ($specialists as $specialist) {
                $browser->visit('/')
                        ->click('@online-consultation-link')
                        ->assertPathIs('/consultation')
                        ->click('@'. $specialist . '-viewall')
                        ->assertPathIs('/consultation/specialist/' . $specialist)
                        ->assertSee($specialist . ' Speciality');
            }
        });
    }
}
