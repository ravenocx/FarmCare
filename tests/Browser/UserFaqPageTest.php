<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserFaqPageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testFaqPage(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->scrollIntoView('#footer')
                    ->pause(5000)
                    ->clickLink('FAQ')
                    ->assertPathIs('/faq')
                    ->assertSee('Frequently Ask Question')
                    ->pause(7000);
        });
    }
}
