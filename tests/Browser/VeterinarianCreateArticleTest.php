<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class VeterinarianCreateArticleTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'banawa17@example.net')
                    ->type('password', '123456')
                    ->press('Sign In')
                    ->assertPathIs('/veterinarian')
                    ->visit('/veterinarian/article')
                    ->clickLink('Add a Article') 
                    ->assertPathIs('/veterinarian/article/add')
                    ->type('title', 'Penyakit Hewan')
                    ->select('category', 'Flu Burung')
                    ->type('content', 'Penyakit ini disebabkan oleh virus Foot-and-Mouth Disease Virus (FMDV) dan sangat menular di antara hewan berkuku belah seperti sapi, domba, kambing, dan babi.')
                    ->attach('photo','/Users/putrinadia/Downloads/Order History - 1 (3).png')
                    ->press('Add Article');
                });

    }
}
