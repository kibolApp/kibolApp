<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Mail\ContactUsMail;
use Illuminate\Mail\Mailables\Content;

class ContactUsMailTest extends TestCase
{
    public function testContactUsMailConstructor()
    {
        $data = ['name' => 'John Doe', 'email' => 'john@example.com', 'message' => 'Hello!'];

        $mail = new ContactUsMail($data);

        $this->assertEquals($data, $mail->data);
    }

    public function testContactUsMailEnvelope()
    {
        $mail = new ContactUsMail(['name' => 'John Doe', 'email' => 'john@example.com', 'message' => 'Hello!']);

        $envelope = $mail->envelope();

        $this->assertEquals('Contact Us Mail', $envelope->subject);
    }
    public function testContactUsMailContentMethod()
    {
        $expectedData = ['name' => 'John Doe', 'email' => 'john@example.com', 'message' => 'Hello!'];

        $mail = new ContactUsMail($expectedData);

        $content = $mail->content();

        $this->assertInstanceOf(Content::class, $content);
        $this->assertEquals('mail.contactUsMail', $content->view);
        $this->assertEquals('Hello!', $mail->data['message']);
    }
}
