<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ReadAdminforApplicantTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin_login')
                    ->type('email', 'admin@gmail.com')
                    ->type('password', '123456')
                    ->press('Sign in')
                    ->visit('/admin')
                    ->clickLink('Applicant')
                    ->visit('/admin/applicant');
        });
    }
}
