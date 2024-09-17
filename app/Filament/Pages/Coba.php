<?php

namespace App\Filament\Pages;

use App\Models\User;
use App\Models\Home;
use Filament\Actions\Action;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
// use Filament\Infolists\Components\Component;
use Filament\Pages\Page;
use Filament\Support\Components\Component as SupportComponentsComponent;
use Filament\Support\Exceptions\Halt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Coba extends Page implements HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.coba';

    public ?array $data = [];

    use InteractsWithForms;

    public ?Home $record = null;


    public function mount(): void
    {
         $this->form->fill();
    }

    // protected function mutateFormDataBeforeFill(array $data): array
    // {
    //     return $data;
    // }

    //     protected function mutateFormDataBeforeSave(array $data): array
    // {
    //     return $data;
    // }

    // protected function handleRecordUpdate(Model $record, array $data): Model
    // {
    // $record->update($data);

    // return $record;
    // }

     public function form(Form $form): Form
      {
        return $form
        ->schema([
            TextInput::make('name')->required()->maxLength(255),
            //TextInput::make('description')->required()->maxLength(255)
        ])
        //->model($this->record);
        ->statePath('data');
        // ->operation('edit');
    }

      public function save() : void
      {
        try{

              $data = $this->form->getState();
              $user = User::find(Auth::user()->id);
              dd($user);
              //$user = new Home();
              //$user = User::find(Auth::user()->id);
              $user->title = $data['title'];
              $user->description = $data['description'];
              $user->save();



        }catch(Halt $ex) {
            return;
        }
    }


    public function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }


}
