<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MahasiswaAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_create_mahasiswa_page(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)->get(route('mahasiswa.create'));

        $response->assertOk();
    }
}
