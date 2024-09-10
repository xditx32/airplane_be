<?php

namespace App\Filament\Pages;

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
// use App\Models\Home as Home;

use Illuminate\Database\Eloquent\Model;

class Home extends Page implements HasForms
{

    use InteractsWithForms;


    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $title = 'Home Page';

    protected static string $view = 'filament.pages.home';

    // public ?array $data = [];

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected function handleRecordCreation(array $data): Model
    {
        return static::getModel()::create($data);
    }

    public function mount(): void
    {
        $this->form->fill();
    }

    public function fillForm(): void
    {
        $data = $this->record->attributesToArray();

        $this->form->fill($data);
    }

     public function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                TextArea::make('description')
                    ->required(),

                Repeater::make('HomeSlider')
                   // ->relationship('HomeSlider')
                    ->schema([
                        TextInput::make('title')
                            ->required(),
                        TextInput::make('sub_title')
                            ->required(),
                        TextArea::make('description')
                            ->required(),
                        FileUpload::make('photo'),
                        TextInput::make('button_title')
                            ->required(),
                        TextInput::make('button_link')
                            ->required(),
                        Select::make('is_active')
                            ->options([
                                true => 'Active',
                                false => 'Not Active',
                            ])
                    ->required()
                ]),

                TextInput::make('gmap_link')
                    ->required()
                    ->maxLength(255),


            ])->statePath('data');
    }

    public function save(): void {
        try {
            // $home = Home::getHome();
            $data = $this->form->getState();

            $this->json = json_encode($data);
            // file_put_contents($this->json);
            //$this->save();
            // dd($data);

            // Home::updateOrInsert(
            //     ['title' => $data->title],
            //     $data
            // );
            Notification::make()
                ->title('Saved successfully')
                ->success()
                ->send();

        } catch (Halt $exception) {
            Notification::make()
                ->title('Something went wrong!')
                ->danger()
                ->send();
            return;
        }
    }

    // public function save():void
    // {
    //     try{
    //         $data = $this->form->getState();

    //         // $this->handleRecordUpdate($this->record, $data);

    //         // $data = $this->form->getState();
    //         $home = Home::updateOrCreate()
    //         $home->title = $data['title'];



    //            // dd($data);
    //         // $home = Home::find();
    //         // $home = Request::all();
    //         // $home->title = $data['title'];
    //         // $data->all();
    //         // $home->save();
    //         // dd($test);
    //         // foreach($data as $datas) {
    //         //         $datas[] = [
    //         //             'title_id' => $title_id,
    //         //             'screening_id' => $screening_id
    //         //         ];
    //         //     }
    //         Home::save($data);

    //     }catch(Halt $exception){
    //         return;
    //     }

    //     Notification::make()
    //         ->success()
    //         // ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
    //         ->send();
    // }

     protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    // public function save(): void
    // {

    //     try {
    //         $data = $this->form->getState();

    //         // auth()->user()->UserProfessionalExperience->update($data);
    //                 // auth()->user()->update($this->form->getState());
    //         $this->home->pages()->updateOrCreate(
    //             ['type' => ModelsPage::HOME],
    //             ['data' => $data],
    //         );

    //     } catch (Halt $exception) {
    //         return;
    //     }

    //     Notification::make()
    //         ->success()
    //         ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
    //         ->send();
    // }


    // public function update():void
    // {
    //     // try {
    //     //     $data = $this->form->getState();

    //     //     $this->home->pages()->updateOrCreate(
    //     //         ['type' => ModelsPage::HOME],
    //     //         ['data' => $data],
    //     //     );


    //     // } catch (Halt $th){
    //     //     return;

    //     // }
    //     auth()->user()->update(
    //     $this->form->getState()
    //  )
    // ;

    // Notification::make()
    //     ->title('Profile updated!')
    //     ->success()
    //     ->send();
    // }

}
