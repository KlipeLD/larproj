<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SFile extends Contacts
{
    use HasFactory;

    public function savingContact()
    {
        $arr = array(request('name'),\request('tel'),\request('body'));
        $filename = 'files/contacts.txt';
        $text = serialize($arr);
        file_put_contents($filename, $text);
        //прочитать из файла
        //$text = file_get_contents($filename);
        //восстановить массив из текстового представления
        //$arr = unserialize($text);
        //dd($arr);
    }
}
