<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Http\Controllers\SaveContactController;
use App\Models\SDB;
use App\Models\SFile;


class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }
    /*protected static $availableEngines = [
        Mercedes::class => MercedesEngine::class,
        Bmw::class => BmwEngine::class,
    ];
    public function make(Product $car): Contact
    {
        $carClass = get_class($car);
        if (!array_key_exists(get_class($car), self::$availableEngines)) {
            throw new CarEngineNotAvailableException();
        }
        $engineClass = self::$availableEngines[$carClass];
        return (new $engineClass());
    }*/

    public function store()
    {
        $this->validateContacts();
        $contactFactory = new SDB();
        //$phoneB = $contactFactory->saving();
        $contactFactory->savingContact();
        return redirect(route('welcome'));
    }

    protected function validateContacts()
    {
        request()->validate([
            'name'=> ['required','min:3','max:255'],
            'tel' => ['required','min:11','max:255'],
            'body' => ['required','min:3']
        ]);
    }

}




