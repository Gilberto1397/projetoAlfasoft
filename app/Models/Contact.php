<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
 * Contact Model
 * @property int $id
 * @property string $name
 * @property string $contact
 * @property string $email
 */
class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    public $timestamps = false;
}
