<?php

namespace Tests\Unit\Requests;

use App\Http\Requests\ChangeEmailRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ChangeEmailRequestTest extends TestCase
{
    use RefreshDatabase;

    public function testValidChangeEmailRequest()
    {
        $data = [
            'oldEmail' => 'old@example.com',
            'newEmail' => 'new@example.com',
            'confirmEmail' => 'new@example.com',
        ];

        $request = new ChangeEmailRequest();
        $validator = Validator::make($data, $request->rules());

        $this->assertTrue($validator->passes());
    }

    public function testInvalidEmailFormat()
    {
        $data = [
            'oldEmail' => 'old@example.com',
            'newEmail' => 'invalid-email-format',
            'confirmEmail' => 'invalid-email-format',
        ];

        $request = new ChangeEmailRequest();
        $validator = Validator::make($data, $request->rules());

        $this->assertFalse($validator->passes());
        $this->assertEquals('The new email field must be a valid email address.', $validator->errors()->first('newEmail'));
        $this->assertEquals('The confirm email field must be a valid email address.', $validator->errors()->first('confirmEmail'));
    }
}
