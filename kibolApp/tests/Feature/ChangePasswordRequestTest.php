<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Validator;

class ChangePasswordRequestTest extends TestCase
{

    public function testValidChangePasswordRequest(): void
    {
        $data = [
            'oldPassword' => 'oldpassword',
            'newPassword' => 'newpassword',
            'confirmPassword' => 'newpassword',
        ];

        $request = new ChangePasswordRequest();
        $validator = Validator::make($data, $request->rules());

        $this->assertTrue($validator->passes());
    }
}
