<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    protected $table="table_contact"; //ContactModel=>nazi tabele contact veza sa tabelom u bazi
    protected $fillable = ["email","subject","message"];// koja polja se mogu popuniti u bazi sa $fillable i mogu se modifikovati i korisiti
}
