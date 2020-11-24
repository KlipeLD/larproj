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

}

class SavingToFile implements Saving
{

}

