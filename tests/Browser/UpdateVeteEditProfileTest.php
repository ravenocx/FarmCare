<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UpdateVeteEditProfileTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'opan.padmasari@example.net')
                    ->type('password', '123456')
                    ->press('Sign In')
                    ->visit('/veterinarian/profile')
                    ->clickLink('Edit')
                    ->visit('/veterinarian/profile/edit')
                    ->type('specialist', 'Nutrition and Vitamin')
                    ->type('consultation_price', '50000')
                    ->clickLink('Change Photo')
                    ->attach('#photo', 'D:\REY\SEMESTER 6\RPL\Projects\farmcare\public\Images\assets\Contoh.jpg')
                    ->press('Upload')
                    ->press('Save');
        });
    }
}
