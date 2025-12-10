<?php

namespace Tests\Unit\Requests;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ContactRequestTest extends TestCase
{
    /**
     * @param array $dataAccepted
     * @return void
     * @test
     * @dataProvider dataSetAccepted
     * Tests if the data provided is accepted by the ContactRequest validation rules.
     */
    public function testDataAcceptedOnCreate(array $dataAccepted): void
    {
        /**
         * Arrange - Given
         */
        $request = new ContactRequest();
        $rules = $request->rules();

        /**
         * Act - When
         */

        $validator = Validator::make($dataAccepted, $rules);

        /**
         * Assert - Then
         */

        $this->assertFalse($validator->fails(), 'Data failed validation.');
    }

    /**
     * @param array $dataAccepted
     * @return void
     * @test
     * @dataProvider dataSetNameNotAccepted
     * @dataProvider dataSetEmailNotAccepted
     * @dataProvider dataSetContactNotAccepted
     * Tests if the data provided is not accepted by the ContactRequest validation rules.
     */
    public function testDataNotAccepted(array $dataAccepted, string $errorMessage, string $keyMessage): void
    {
        /**
         * Arrange - Given
         */
        $request = new ContactRequest();
        $rules = $request->rules();

        /**
         * Act - When
         */

        $validator = Validator::make($dataAccepted, $rules);
        $failedValidation = $validator->fails();
        $firstMessage = $validator->messages()->get($keyMessage)[0];

        /**
         * Assert - Then
         */

        $this->assertTrue($failedValidation, 'Data failed validation.');
        $this->assertEquals($firstMessage, $errorMessage, 'Validation error message does not match expected message.');
    }

//    public function testDataAcceptedOnUpdate(): void
//    {
//        /**
//         * Arrange - Given
//         */
//        DB::beginTransaction();
//        DB::unprepared('delete from contacts;');
//
//        $contact1 = new Contact();
//        $contact1->id = 1;
//        $contact1->name = 'Existing Name';
//        $contact1->email = 'mail@mail.com';
//        $contact1->contact = '123456789';
//        $contact1->save();
//
//        $request = new ContactRequest();
//        $rules = $request->rules();
//
//        $data1 = [
//            'contactId' => 1,
//            'name' => 'First Name',
//            'email' => 'mail123@mail.com',
//            'contact' => '222555888'
//        ];
//
//        /**
//         * Act - When
//         */
//
//        $validator = Validator::make($data1, $rules);
//
//        /**
//         * Assert - Then
//         */
//
//        $this->assertFalse($validator->fails(), 'Data failed validation.');
//    }

    public function testDataNotAcceptedOnUpdate(): void
    {
        /**
         * Arrange - Given
         */
        DB::beginTransaction();
        DB::unprepared('delete from contacts;');

        $contact1 = new Contact();
        $contact1->id = 1;
        $contact1->name = 'Existing Name';
        $contact1->email = 'mail@mail.com';
        $contact1->contact = '123456789';
        $contact1->save();

        $request = new ContactRequest();
        $rules = $request->rules();

        $data1 = [
            'contactId' => 2,
            'name' => 'First Name',
            'email' => 'mail123@mail.com',
            'contact' => '222555888'
        ];

        /**
         * Act - When
         */

        $validator = Validator::make($data1, $rules);

        /**
         * Assert - Then
         */

        $this->assertTrue($validator->fails(), 'Data failed validation.');
    }

    /**
     * @return array
     */
    public static function dataSetAccepted(): array
    {
        $data1 = [
            'name' => 'First Name',
            'email' => 'mailtest@mail.com',
            'contact' => '123456789'
        ];

        $data2 = [
            'name' => 'Second Name',
            'email' => 'mail123@mail.com',
            'contact' => '111222333'
        ];

        $data3 = [
            'name' => 'Third Name',
            'email' => 'mail77@mail.com',
            'contact' => '444555666'
        ];

        return [
            'acceptedData1' => [$data1],
            'acceptedData2' => [$data2],
            'acceptedData3' => [$data3]
        ];
    }

    /**
     * @return array
     */
    public static function dataSetNameNotAccepted(): array
    {
        $data1 = [
            'name' => 12345,
            'email' => 'mailtest@mail.com',
            'contact' => '123456789'
        ];

        $data2 = [
            'name' => 'abc',
            'email' => 'mail123@mail.com',
            'contact' => '111222333'
        ];

        $data3 = [
            'name' => '',
            'email' => 'mail77@mail.com',
            'contact' => '444555666'
        ];

        $data4 = [
            'name' => str_repeat('a', 256),
            'email' => 'mail77@mail.com',
            'contact' => '444555666'
        ];

        return [
            'name -> string' => [$data1, 'The name field must be a string.', 'name'],
            'name -> min:5' => [$data2, 'The name field must be at least 5 characters.', 'name'],
            'name -> required' => [$data3, 'The name field is required.', 'name'],
            'name -> max:255' => [$data4, 'The name field must not be greater than 255 characters.', 'name']
        ];
    }

    /**
     * @return array
     */
    public static function dataSetEmailNotAccepted(): array
    {
        $data1 = [
            'name' => 'Name Test',
            'email' => 'invalid-email',
            'contact' => '123456789'
        ];

        $data2 = [
            'name' => 'Name Test',
            'email' => 123,
            'contact' => '123456789'
        ];

        $data3 = [
            'name' => 'Name Test',
            'email' => str_repeat('a', 256),
            'contact' => '123456789'
        ];

        $data4 = [
            'name' => 'Name Test',
            'email' => '',
            'contact' => '123456789'
        ];

        return [
            'email -> email' => [$data1, 'The email field must be a valid email address.', 'email'],
            'email -> string' => [$data2, 'The email field must be a valid email address.', 'email'],
            'email -> max:255' => [$data3, 'The email field must be a valid email address.', 'email'],
            'email -> required' => [$data4, 'The email field is required.', 'email']
        ];
    }

    /**
     * @return array
     */
    public static function dataSetContactNotAccepted(): array
    {
        $data1 = [
            'name' => 'Name Test',
            'email' => 'mail@mail.com',
            'contact' => 'abc'
        ];

        $data2 = [
            'name' => 'Name Test',
            'email' => 'mail@mail.com',
            'contact' => ''
        ];

        $data3 = [
            'name' => 'Name Test',
            'email' => 'mail@mail.com',
            'contact' => '12345'
        ];

        $data4 = [
            'name' => 'Name Test',
            'email' => 'mail@mail.com',
            'contact' => '1234567891023'
        ];

        return [
            'contact -> string' => [$data1, 'The contact field must be at least 9 characters.', 'contact'],
            'contact -> required' => [$data2, 'The contact field is required.', 'contact'],
            'contact -> min:9' => [$data3, 'The contact field must be at least 9 characters.', 'contact'],
            'contact -> max:9' => [$data4, 'The contact field must not be greater than 9 characters.', 'contact']
        ];
    }
}
