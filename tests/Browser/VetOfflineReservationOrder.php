<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class VetOfflineReservationOrder extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testVetReadOrder(): void
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
                    ->clickLink('Offline Reservation')
                    ->waitForLocation('/veterinarian/offline-reservation')
                    ->assertPathIs('/veterinarian/offline-reservation')
                    ->assertSee('On Going Offline Reservation');

        });
    }
    public function testVetUpadateOrder(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->assertPathIs('/veterinarian/offline-reservation')
                    ->select('order_status', 'Complete')
                    ->press("#updateButton")
                    ->assertSee('Successfully update status order');


        });
    }
    

    public function testVetDetailOrder(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->assertPathIs('/veterinarian/offline-reservation')
                    ->assertSee('Latest Order')
                    ->clickLink('Order Detail')

                    ->pause(2000)
                    ->assertPathBeginsWith('/veterinarian/offline-reservation/')
                    ->assertSee('Order History Detail');



        });
    }
}
