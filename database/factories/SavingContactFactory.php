<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\ContactFactory;

class SavingContactFactory implements ContactFactory
{
    protected static $availableMethods = [
        ContactDB::class => DBSaving::class,
        ContactFile::class => FileSaving::class,
        //Bmw::class => BmwEngine::class,
    ];
    public function saving(Contact $contact): Saving
    {
        $contactClass = get_class($contact);
        /*if (!array_key_exists(get_class($car), self::$availableMethods)) {
            throw new CarEngineNotAvailableException();
        }*/
        $savingClass = self::$availableMethods[$contactClass];
        return (new $savingClass());
    }
}
