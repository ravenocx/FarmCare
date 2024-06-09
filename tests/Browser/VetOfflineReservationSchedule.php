<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class VetOfflineReservationSchedule extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testVetCreateSchedule(): void
    {
        
        $this->browse(function (Browser $browser) {
            
            $datetime_start = now()->addHours()->format('Y-m-d\TH:i'); // Format tanggal dan waktu awal dalam format yang dapat diterima oleh JavaScript
            $datetime_end = now()->addHours(2)->format('Y-m-d\TH:i');

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
                    ->press('Add Schedule')
                    ->waitForLocation('/veterinarian/create-offline-reservation') // Ganti dengan teks tombol yang sesuai
                    ->assertPathIs('/veterinarian/create-offline-reservation')
                    ->assertSee('Make Offline Reservation')
                    ->script([
                        "document.querySelector('#datetime-start').value = '{$datetime_start}';", // Mengatur nilai properti value untuk elemen dengan ID datetime-start
                        "document.querySelector('#datetime-end').value = '{$datetime_end}';" // Tambahkan 2 jam ke waktu saat ini
                    ]);
            $browser ->press('Add Offline Schedule') // Ganti dengan teks tombol yang sesuai
                    ->assertPathIs('/veterinarian/offline-reservation')
                    ->waitForLocation('/veterinarian/offline-reservation') // Ganti dengan URL yang benar setelah submit
                    ->assertSee('Successfully add new offline consultation schedule');
            });

    }

    public function testVetReadSchedule(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->assertPathIs('/veterinarian/offline-reservation')
                    ->waitForLocation('/veterinarian/offline-reservation')
                    ->assertSee('Offline Reservation') // Memastikan judul reservasi offline terlihat
                    ->assertSee('My Offline Reservation Schedule'); // Memastikan nama dokter terlihat
                    
        });
    }
    public function testVetEditSchedule(): void
    
    {
        $this->browse(function (Browser $browser) {
            $newDatetimeStart = now()->addDays()->format('Y-m-d\TH:i');
            $newDatetimeEnd = now()->addDays(2)->format('Y-m-d\TH:i');
            
           

            $browser->assertPathIs('/veterinarian/offline-reservation')
                    ->waitForLocation('/veterinarian/offline-reservation')
                    ->assertSee('Offline Reservation'); // Memastikan judul reservasi offline terlihat

            $browser->press('[data-testid="edit-button"]');
            
            $browser->assertSee('Edit Schedule')
                    ->script([
                        "document.querySelector('#datetime-start').value = '{$newDatetimeStart}';", // Mengatur nilai properti value untuk elemen dengan ID datetime-start
                        "document.querySelector('#datetime-end').value = '{$newDatetimeEnd}';" // Tambahkan 2 jam ke waktu saat ini
                 ]);

            $browser->press('Update Schedule')
                    ->assertPathIs('/veterinarian/offline-reservation')
                    ->waitForLocation('/veterinarian/offline-reservation')
                    ->assertSee('Successfully edit offline consultation schedule');     
        });
    }
    public function testVetDeleteSchedule(): void
    
    {
        $this->browse(function (Browser $browser) {

            
            $browser->assertPathIs('/veterinarian/offline-reservation')
                    ->waitForLocation('/veterinarian/offline-reservation')
                    ->assertSee('Offline Reservation');

            $browser->press('[data-testid="delete-button"]');

            $browser->waitForLocation('/veterinarian/offline-reservation')
                    ->assertSee('Successfully cancel offline consultation schedule');
                 
        });
    }
    
}




