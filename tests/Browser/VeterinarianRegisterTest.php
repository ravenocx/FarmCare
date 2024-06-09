<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class VeterinarianRegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/veterinarian')
                ->type('fullName', 'Putri')
                ->select('gender', 'female')
                ->select('specialist', 'Livestock')
                ->type('university', 'Telkom University')
                ->type('graduateYear', '2022')
                ->type('email', 'putri@gmail.com')
                ->type('password', '123456')
                ->type('password_confirmation', '123456')
                ->attach('certification', '/Users/putrinadia/Downloads/Megazine Article_Group 7.pdf')
                ->pause(1000)
                ->press('Sign Up')
                ->visit('/login')   
                ->type('email', 'putri@gmail.com')
                ->type('password', "12345678")
                ->press('Sign In');
            // ->assertPathIs('/home');

            
        });
    }
}
