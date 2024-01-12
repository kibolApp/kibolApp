<?php

namespace Tests\Unit\Http\Requests;

use Tests\TestCase;
use App\Http\Requests\TableRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TableRequestTest extends TestCase
{
    use RefreshDatabase;

    public function testValidDataPassesValidation()
    {
        $request = new TableRequest();

        $data = [
            'url' => 'http://example.com',
            'name' => 'Example Table',
            'url_logo' => 'http://example.com/logo.png',
        ];
        $validator = $this->app['validator']->make($data, $request->rules());
        $this->assertFalse($validator->fails());
    }

    public function testMissingUrlFailsValidation()
    {
        $request = new TableRequest();

        $dataWithoutUrl = [
            'name' => 'Example Table',
            'url_logo' => 'http://example.com/logo.png',
        ];
        $validatorWithoutUrl = $this->app['validator']->make($dataWithoutUrl, $request->rules());
        $this->assertTrue($validatorWithoutUrl->fails());
    }

    public function testMissingNameFailsValidation()
    {
        $request = new TableRequest();

        $dataWithoutName = [
            'url' => 'http://example.com',
            'url_logo' => 'http://example.com/logo.png',
        ];
        $validatorWithoutName = $this->app['validator']->make($dataWithoutName, $request->rules());
        $this->assertTrue($validatorWithoutName->fails());
    }

    public function testMissingUrlLogoFailsValidation()
    {
        $request = new TableRequest();

        $dataWithoutUrlLogo = [
            'url' => 'http://example.com',
            'name' => 'Example Table',
        ];
        $validatorWithoutUrlLogo = $this->app['validator']->make($dataWithoutUrlLogo, $request->rules());
        $this->assertTrue($validatorWithoutUrlLogo->fails());
    }
}
