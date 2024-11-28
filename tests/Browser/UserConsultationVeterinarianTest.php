<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserConsultationVeterinarianTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testCreateConsultationOrder()
    {
        $this->browse(function (Browser $browser) {
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
                    ->clickLink('Online Consultation')
                    ->assertPathIs('/consultation')
                    ->assertSee('Consult with a doctor at FarmCare+')
                    ->pause(5000)
                    ->scrollIntoView('#doctor-recommendation')
                    ->pause(5000)
                    ->press('Chat')
                    ->pause(5000)
                    ->assertSee('Veterinarian Details')
                    ->press('Chat')
                    ->pause(5000)
                    ->attach('payment_proof', 'public/images/test/payment_proof.jpeg')
                    ->press('Submit')
                    ->assertSee('Online Consultation Order created sucessfully!')
                    ->pause(7000);
        });

    }
}
