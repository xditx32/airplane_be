<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn};
use Filament\Forms\Components\{Component, TextInput, FileUpload, Select, Textarea, Repeater, Section};
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

    use InteractsWithForms;

    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $title = 'Home Page';

    protected static string $view = 'filament.pages.home';

    public ?Home $record = null;

   public $Home = '';
    public $HomeSlider = [];



    public function mount(): void
    {
         $this->form->fill();
    }

    public function form(Form $form): Form{
        return $form->schema([
            TextInput::make('title')->maxLength(255),
        ])->statePath('data');
        // return $form->schema([
        //     TextInput::make('name')->maxLength(255)->default(auth()->user()->name),
        // ])->statePath('data');
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


    protected function getSaveFormAction(): Action
    {
        return Action::make('save')
            ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
            ->submit('save')
            ->keyBindings(['mod+s']);
    }

    // public function saveee() {
    //     try{
    //         $data = $this->form->getState();
    //         $user = User::find(Auth::user()->id);
    //         $user->name = $data['name'];
    //         $user->save();
    //     }catch(Halt $ex) {
    //         return;
    //     }
    // }

    public function saveee() {
        try {
            //$tenant = Filament::getTenant();

            $data = $this->form->getState();
            $home = new Home;
            //$home->title = $data['title'];
            $home->save();

        //$results = [];
        // $data = $this->form->getState();

        // $state = array_filter([
        //     'title' => $this['title'],
        // ]);
        //  Home::record($data);

        // foreach ($data as $key => $item) {
        //     $results[] = [
        //         'title' => $item['title'],
        //         //'title' => $item['title'],
        //     ];
        // }

        // Home::insert($results);

        // $insert = [];
        // foreach($data as $row){
        //     array_push($insert,[
        //         'title' => $row
        //     ]);
        // }
        // Home::record($insert);

        }catch(Halt$ex) {
            return;
        }
    }


    public function getFormActions(): array
    {
        return [
            Action::make('saveee')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

}
