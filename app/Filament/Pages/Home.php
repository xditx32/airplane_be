<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn};
use Filament\Forms\Components\{TextInput, FileUpload, Select, Textarea, Repeater};
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Support\Exceptions\Halt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Home extends Page implements HasForms
{

    use InteractsWithForms;

    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $title = 'Home Page';

    protected static string $view = 'filament.pages.home';

    // public static $label = 'Custom Navigation Label';

    // public static $slug = 'custom-url-slug';


    public Home $home;

    public function mount(): void
    {
        $this->form->fill();
    }

    // public function mount(): void
    // {
    //     $this->record = auth()->user();
    //     $this->fillForm();
    // }

//    public function mount(): void
//     {
//         $this->form->fill(auth()->user()->attributesToArray());
//     }

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
                        FileUpload::make('photo')
                            ->required(),
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
                    // ->record()
                ]),

                TextInput::make('gmap_link')
                    ->required()
                    ->maxLength(255),


            ])->statePath('data');
    }

    public function getFormActions():array
    {
        return [
            Action::make('save')
            ->submit('save'),
        ];
        return [
        Action::make('Update')
            ->color('primary')
            ->submit('Update'),
        ];
    }

    public function save()
    {
        try{
            $data = $this->form->getState();
            // $home = Home::updateOrCreate()
            // $home->title = $data['title'];


               // dd($data);
            // $home = Home::find();
            // $home = Request::all();
            // $home->title = $data['title'];
            // $data->all();
            // $home->save();
            // dd($test);
            // foreach($data as $datas) {
            //         $datas[] = [
            //             'title_id' => $title_id,
            //             'screening_id' => $screening_id
            //         ];
            //     }
            Home::save($data);

        }catch(Halt $ex){
            return;
        }

        Notification::make()
            ->success()
            // ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }

    //  protected function getFormActions(): array
    // {
    //     return [
    //         Action::make('save')
    //             ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
    //             ->submit('save'),
    //     ];
    // }

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
