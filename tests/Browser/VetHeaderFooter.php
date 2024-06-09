<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class VetHeaderFooter extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testFooter(): void
    {
        $this->browse(function (Browser $browser) {
        $browser->visit('http://127.0.0.1:8000/login')
                ->waitForLocation('/login')
                ->assertSee('Welcome to')
                ->type('email', 'dprasetyo@example.net')
                ->type('password', '123456')
                ->press('Sign In')
                ->waitForLocation('/veterinarian')
                ->assertPathIs('/veterinarian')
                ->assertSee('QUICK LINKS')
                ->assertSee('Home')
                ->assertSee('Order History')
                ->assertSee('Health Tips Article')
                ->assertSee('Contact Us')
                ->assertSee('OUR SERVICES')
                ->assertSee('Consultation')
                ->assertSee('Offline Reservation')
                ->assertSee('CONTACT US')
                ->assertSee('Email:')
                ->assertSee('farmcareplus@gmail.com')
                ->assertSee('Address:')
                ->assertSee('Jl. Telekomunikasi. 1, Terusan')
                ->assertSee('Buahbatu - Bojongsoang,')
                ->assertSee('Bandung, Jawa Barat')
                ->assertSee('©2024 FarmCare+, All right reserved');
        });
    }
    public function testHeader(): void
    {
        $this->browse(function (Browser $browser) {
        $browser->assertPathIs('/veterinarian')
                ->click('summary')
                ->clickLink('Logout')
                ->assertPathIs('/login');
                
                
        });
    }
}
