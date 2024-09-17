<?php

namespace App\Filament\Pages;

use App\Models\User;
use App\Models\Coba;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn};
use Filament\Forms\Components\{Card, Component, TextInput, FileUpload, Select, Textarea, Repeater, Section};
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Support\Exceptions\Halt;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification as NotificationsNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use ExposesTableToWidgets;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Htmlable;

class Home extends Page implements HasForms
{

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $title = 'Home Page';

    protected static string $view = 'filament.pages.home';

    public ?array $data = [];

    use InteractsWithForms;

    //public ?Home $record = null;


    public function mount(): void
    {
         $this->form->fill();
    }

    public function form(Form $form): Form{
        return $form->schema([
            TextInput::make('name')
            ->default(Coba::get()->dd()->pluck('name', 'id'))
            //->formatStateUsing(fn(?Coba $record) => $record?->field ?? 'default')
            //->default(Coba::query()->pluck('name', 'id'))
            // ->afterStateUpdated(fn ($ => dd($state))
        ])
        ->statePath('data');
    }


    // public function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             //
    //             TextInput::make('title')->maxLength(255),

    //             TextArea::make('description')
    //                 ,

    //             // Repeater::make('HomeSlider')
    // ->dehydrated()
    //             // //    ->relationship('HomeSlider')
    //             //     ->schema([
    //             //         TextInput::make('title')
    //             //             ,
    //             //         TextInput::make('sub_title')
    //             //             ,
    //             //         TextArea::make('description')
    //             //             ,
    //             //         FileUpload::make('photo'),
    //             //         TextInput::make('button_title')
    //             //             ,
    //             //         TextInput::make('button_link')
    //             //             ,
    //             //         Select::make('is_active')
    //             //             ->options([
    //             //                 true => 'Active',
    //             //                 false => 'Not Active',
    //             //             ])

    //             // ]),

    //             TextInput::make('gmap_link')

    //                 ->maxLength(255),

    //         ])
    //         ->statePath('data');
    //         //  ->afterSave(function ($record) {
    //         //     $savedModelId = $record->id;
    //         //     dd($savedModelId);
    //         // });
    // }




    // public function save() {
    //     try{
    //         $data = $this->form->getState();
    //         $user = User::find(Auth::user()->id);
    //         $user->name = $data['name'];
    //         $user->save();
    //     }catch(Halt $ex) {
    //         return;
    //     }
    // }

    public function save(): void {
        try {

            $data = $this->form->getState();
            //$user = Coba::create(['name' => 'name']);
            $user = new Coba();
            // dd($user);
            $user->name = $data['name'];
            $user->save();

        }catch(Halt$ex) {
            return;
        }
        Notification::make()
        ->success()
        ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
        ->send();
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
