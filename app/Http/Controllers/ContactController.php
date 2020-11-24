<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Http\Controllers\SaveContactController;


class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(EventsContact $saving)
    {
        $this->validateContacts();
        //$saving = new ToDB();
        $saving->savingMethod();
        return redirect(route('welcome'));
    }

    protected function validateContacts()
    {
        request()->validate([
            'name'=> ['required','min:3','max:255'],
            'tel' => ['required','min:11','numeric'],
            'body' => ['required','min:3']
        ]);
    }
}
