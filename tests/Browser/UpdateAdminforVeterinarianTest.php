<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UpdateAdminforVeterinarianTest extends DuskTestCase
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
                    ->clickLink('Veterinarian')
                    ->visit('/admin/veterinarian')
                    ->press('Edit profile')
                    ->visit('/admin/veterinarian/edit/202')
                    ->type('university', 'Universitas Padjajaran')
                    ->type('graduate_year', '2020')
                    ->type('consultation_price', '70000')
                    ->type('reservation_price', '180000')
                    ->press('Submit');
        });
    }
}
