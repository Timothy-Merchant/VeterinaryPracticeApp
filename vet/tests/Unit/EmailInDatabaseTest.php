<?php

namespace Tests\Unit;

use App\Models\Owner;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmailInDatabaseTest extends TestCase
{

    use RefreshDatabase;
    public function testEmailInDatabase()
    {
        Owner::Create([
            'first_name' => 'Chiekk',
            'last_name' => 'Azukawa',
            'telephone' => '666666666',
            'email' => 'chieko@gmail.com',
            'address_1' => '14 Harmer Close',
            'address_2' => '14 Harmer Close',
            'town' => 'Tokyo',
            'postcode' => 'SW12379',
        ]);

        $ownerFromDB = Owner::first();

        $this->assertTrue(Owner::where('email', '=', $ownerFromDB->email)->exists());
    }
}
