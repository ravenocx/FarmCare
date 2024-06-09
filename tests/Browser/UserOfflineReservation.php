<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserOfflineReservation extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testSelectVeterinarian(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/login')
                    ->waitForLocation('/login')
                    ->assertSee('Welcome to')
                    ->type('email', 'dconroy@example.com')
                    ->type('password', 'password')
                    ->press('Sign In')
                    ->waitForLocation('/home')
                    ->assertPathIs('/home')
                    ->clickLink('Offline Consultation')
                    ->waitForLocation('/customer-offline-reservation')
                    ->assertPathIs('/customer-offline-reservation')
                    ->assertSee('Choose Specialist') // Pastikan dropdown "Choose Specialist" terlihat
                    ->select('specialist', 'Poultry') // Pilih opsi "Poultry" dari dropdown "Choose Specialist"
                    ->press('Filter')
                    ->assertSee('Violet Hariyah')
                    ->clickLink('Violet Hariyah')
                    ->assertSee('Make a Reservation');


        });
    }
    public function testCreateOfflineReservation(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->assertPathIs('/veterinarian/1/schedule')
                    ->type('cust_name', 'John Doe') 
                    ->type('order_address', '123 Main Street') 
                    ->type('cust_phone_number', '1234567890');
                    $options = $browser->elements('select[name="schedule_id"] option');

            // Check if there are available options
            if (count($options) > 0) {
                // Randomly select an option
                $randomIndex = rand(0, count($options) - 1);
                $selectedOption = $options[$randomIndex]->getAttribute('value');

        
    }

                    // Pilih opsi dalam dropdown
                    $browser->select('schedule_id', $selectedOption)
                            ->assertInputValue('veter_phone_number', '6287651334640')
                            ->attach('payment_proof', 'public/images/test/payment_proof.png')
                            ->assertInputValue('category', 'Poultry') 
                            ->assertInputValue('price', '223931.00') 
                            ->press('Submit')
                            ->pause(2000)
                            ->assertPathBeginsWith('/confirm-offline-reservation/')
                            ->assertSee('Offline Reservation Order created sucessfully!')
                            ->assertSee('Hello! Thank you for order! ♡');
            
            
                            

        });
    }
    
}
