<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SDB extends Contacts
{
    use HasFactory;
    public function savingContact()
    {
        $contact =  new Contacts(request(['name', 'tel', 'body']));
        $contact-> save();
    }
}
