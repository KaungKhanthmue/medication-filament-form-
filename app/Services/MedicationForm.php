<?php

namespace App\Services;

use Filament\Forms;

final class MedicationForm
{
    public static function schema():array
    {
        $instervel = [
            'Day' => 'Day',
        ];

        for($day=2 ; $day <= 30; $day++) {
            $instervel["$day Days"] = "$day Days";
        }
        return 
        [
            Forms\Components\TextInput::make('dosage')
            ->required()
            ->numeric(),
            Forms\Components\TextInput::make('type')
            ->required(),
            Forms\Components\Select::make('intervel')
            ->options($instervel)
            ->required()
            
        ];
    }
}