<?php

namespace App\Http\Controllers;
use App\Http\Controllers\EventsContact;
use Illuminate\Http\Request;

abstract class SaveContactController
{
    abstract public function savingMethod(): Saving;
}

class ToDB extends SaveContactController
{
    public function savingMethod(): Saving
    {
        return new SavingToDB();
    }
}

class ToFile extends SaveContactController
{
    public function savingMethod(): Saving
    {
        return new SavingToFile();
    }
}

interface Saving
{
    public function savingContact();
}

class SavingToDB implements Saving
{
    public function savingContact(): string
    {
        $contact =  new Contacts(request(['name', 'tel', 'body']));
        $contact-> save();
    }
}

class SavingToFile implements Saving
{
    public function savingContact(): string
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

