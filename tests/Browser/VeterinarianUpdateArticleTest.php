<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class VeterinarianUpdateArticleTest extends DuskTestCase
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
                    ->clickLink('Edit')
                    ->assertPathIs('/veterinarian/article/edit/14')
                    ->type('title', 'Penyakit koi')
                    ->select('category', 'Herpes Koi')
                    ->type('content', 'Rabies adalah penyakit virus yang menyerang sistem saraf pusat dan dapat menular dari hewan ke manusia melalui gigitan hewan yang terinfeksi.')
                    ->press('Edit Article');
                    
        });

    }
}
