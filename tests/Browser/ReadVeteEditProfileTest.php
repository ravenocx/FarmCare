<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ReadVeteEditProfileTest extends DuskTestCase
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
            ->visit('/veterinarian/profile/edit');
        });
    }
}
