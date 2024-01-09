<?php

namespace Tests\Unit\Http\Requests;

use App\Http\Requests\ChangeNameRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ChangeNameRequestTest extends TestCase
{
    use RefreshDatabase;

    public function testChangeNameRequestValidationPasses()
    {
        $data = [
            'oldName' => 'Old Name',
            'newName' => 'New Name',
        ];

        $request = new ChangeNameRequest();
        $validator = Validator::make($data, $request->rules());

        $this->assertTrue($validator->passes(), 'Validation should pass.');
        $this->assertEmpty($validator->errors()->all(), 'No validation errors should be present.');
    }

    public function testChangeNameRequestValidationFails()
    {
        $data = [
            // Missing name'
            'newName' => 'New Name',
        ];

        $request = new ChangeNameRequest();
        $validator = Validator::make($data, $request->rules());

        $this->assertFalse($validator->passes(), 'Validation should fail.');

        $errors = $validator->errors()->all();
        $this->assertContains('The old name field is required.', $errors, 'Validation errors should include "oldName" error.');
    }
}
