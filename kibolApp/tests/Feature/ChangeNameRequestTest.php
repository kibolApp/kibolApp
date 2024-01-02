<?php

namespace Tests\Feature;

use App\Models\User;
use App\Http\Requests\ChangeNameRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChangeNameRequestTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanChangeOwnName(): void
    {
        $user = User::factory()->create(['name' => 'Josh']);

        $data = [
            'oldName' => 'Josh',
            'newName' => 'Gerald',
        ];

        $this->actingAs($user);

        $request = new ChangeNameRequest();

        $validator = Validator::make($data, $request->rules());
        $this->assertTrue($validator->passes());

        $user->update(['name' => $data['newName']]);

        $this->assertDatabaseHas('users', ['id' => $user->id, 'name' => 'Gerald']);
    }
}
