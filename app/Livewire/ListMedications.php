<?php

namespace App\Livewire;

use App\Models\Medication;
use App\Services\MedicationForm;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Livewire\Component;
use Filament\Tables;
use Filament\Forms;

class ListMedications extends Component implements HasTable,HasForms
{
    use InteractsWithTable,InteractsWithForms;
    public function render()
    {
        return view('livewire.list-medications');
    }
    public function table(Table $table): Table
    {


        return $table
        ->query(Medication::query())
        ->columns([
            Tables\Columns\TextColumn::make("dosage"),
            Tables\Columns\TextColumn::make("type"),
            Tables\Columns\TextColumn::make("intervel"),

        ])
        ->actions([
            Tables\Actions\EditAction::make()
            ->model(Medication::class)
            ->form(MedicationForm::schema()),
            Tables\Actions\DeleteAction::make()
        ])
        ->headerActions([
            Tables\Actions\CreateAction::make()
            ->model(Medication::class)
            ->form(MedicationForm::schema())
        ]);
    }
}
