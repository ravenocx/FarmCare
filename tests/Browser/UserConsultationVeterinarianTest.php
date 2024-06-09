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
                    ->press('Sign In')
                    ->assertPathIs('/home')
                    ->click('@online-consultation-link')
                    ->assertPathIs('/consultation')
                    ->assertSee('Consult with a doctor at FarmCare+')
                    ->press('Chat')
                    ->assertSee('Veterinarian Details')
                    ->press('Chat')
                    ->attach('payment_proof', 'public/images/test/payment_proof.jpeg')
                    ->press('Submit')
                    ->assertSee('Online Consultation Order created sucessfully!');
        });

    }
}
