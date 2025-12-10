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

    public function testDataAcceptedOnUpdate(): void
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
            'contactId' => 1,
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

        $this->assertFalse($validator->fails(), 'Data failed validation.');
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
}
