<?php

namespace Tests\Feature;

use Crm\Customer\Models\customer;
use Crm\Customer\Services\CustomerServices;
use Crm\User\Models\User;
use Database\Seeders\RolesAndPermission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class CustomerTest extends TestCase
{
    use RefreshDatabase;
    protected $customerServices;
    protected customer $customer;
    protected Role $role;
    protected User $user;

    public function setUp(): void
    {

        parent::setUp();
        $this->seed(RolesAndPermission::class);
        $this->customerServices = CustomerServices::class;
        $this->customer = Customer::create([
            'name' => 'test'
        ]);
        $this->role = Role::create(['name' => 'Test Admin']);
        $this->user = User::create(
            [
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => str::random(10),
            ]
        )->assignRole('Test Admin');
    }

    public function test_create_customer_without_auth()
    {
        $response = $this->withHeader('accept', 'application/json')
            ->post('/api/customers', $this->customer->toArray());

        $response->assertStatus(401);
    }
    public function test_create_customer_without_Permission()
    {
        $response = $this->withHeader('accept', 'application/json')
            ->actingAs($this->user)
            ->post('/api/customers', $this->customer->toArray());

        $response->assertStatus(403);
    }
    public function test_create_customer_with_Permission()
    {

        $this->role->givePermissionTo('Create Customer');
        $response = $this->withHeader('accept', 'application/json')
            ->actingAs($this->user)
            ->post('/api/customers', $this->customer->toArray());
        dd($response);
        $response->assertStatus(201);
    }
    public function test_create_customer_without_data()
    {

        $this->role->givePermissionTo('Create Customer');
        $response = $this->withHeader('accept', 'application/json')
            ->actingAs($this->user)
            ->post('/api/customers');

        $response->assertStatus(400);
    }
    public function test_create_customer_with_data_and_auth_and_permission()
    {

        $this->role->givePermissionTo('Create Customer');
        $response = $this->withHeader('accept', 'application/json')
            ->actingAs($this->user)
            ->post('/api/customers', $this->customer->toArray());
        $response->assertStatus(201)
            ->assertJson(['name' => $this->customer->name]);
    }
    public function test_show_customers_auth_and_permission()
    {

        $this->role->givePermissionTo('Show Customer');
        $response = $this->withHeader('accept', 'application/json')
            ->actingAs($this->user)
            ->get('/api/customers');
        $response->assertStatus(200);
    }




}
