<?php

namespace App\Filament\Pages;

use App\Models\HomeSlider;
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


    public function mount(): void
    {
         $this->form->fill();
    }

    // public function mount(): void
    // {
    //     try {
    //         $appearance = Home::where('home_id', Filament::getTenant()->id)->first();

    //         if($appearance) {
    //             $this->form->fill($appearance->toArray());
    //         }

    //     } catch (Halt $exception) {
    //         return;
    //     }
    // }

    //     public function fillForm(): void
    // {
    //     $data = $this->record->attributesToArray();

    //     $this->form->fill($data);
    // }

    //  public function save(): void
    // {
    //     try {
    //         $data = $this->form->getState();

    //         $this->handleRecordUpdate($this->record, $data);

    //     } catch (Halt $exception) {
    //         return;
    //     }

    //     $this->getSavedNotification()->send();
    // }


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('title')->maxLength(255),

                TextArea::make('description')
                    ,

                // Repeater::make('HomeSlider')
                // //    ->relationship('HomeSlider')
                //     ->schema([
                //         TextInput::make('title')
                //             ,
                //         TextInput::make('sub_title')
                //             ,
                //         TextArea::make('description')
                //             ,
                //         FileUpload::make('photo'),
                //         TextInput::make('button_title')
                //             ,
                //         TextInput::make('button_link')
                //             ,
                //         Select::make('is_active')
                //             ->options([
                //                 true => 'Active',
                //                 false => 'Not Active',
                //             ])

                // ]),

                TextInput::make('gmap_link')

                    ->maxLength(255),

            ])
            ->statePath('data');
            //  ->afterSave(function ($record) {
            //     $savedModelId = $record->id;
            //     dd($savedModelId);
            // });
    }

    //     protected function getDataPresentationSection(): Component
    // {
    //     return Section::make('Data Presentation')
    //         ->schema([
    //             Select::make('table_sort_direction')
    //                 ->softRequired()
    //                 ->localizeLabel()
    //                 ->options(TableSortDirection::class),
    //             Select::make('records_per_page')
    //                 ->softRequired()
    //                 ->localizeLabel()
    //                 ->options(RecordsPerPage::class),
    //         ])->columns();
    // }


    //    protected function handleRecordUpdate(Home $record, array $data): Home
    // {
    //     $record->fill($data);

    //     $keysToWatch = [
    //         'primary_color',
    //         'max_content_width',
    //         'has_top_navigation',
    //         'font',
    //     ];

    //     if ($record->isDirty($keysToWatch)) {
    //         $this->dispatch('appearanceUpdated');
    //     }

    //     $record->save();

    //     return $record;
    // }

    //  protected function getFormActions(): array
    // {
    //     return [
    //         $this->getSaveFormAction(),
    //     ];
    // }


       protected function getSaveFormAction(): Action
    {
        return Action::make('save')
            ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
            ->submit('save')
            ->keyBindings(['mod+s']);
    }

    // public static function canView(Model $record): bool
    // {
    //     try {
    //         return authorize('update', $record)->allowed();
    //     } catch (AuthorizationException $exception) {
    //         return $exception->toResponse()->allowed();
    //     }
    // }

//     protected function handleRecordUpdate(Model $record, array $data): Model
// {
//     $data['slide_id'] = $data['slide_id'] ?? null;

//     $record->update($data);

//     return $record;
// }

//  public function save($record): void
//    {
//      $savedModelId = $record->id;

//      dd($savedModelId);
//  }


     public function save(): void {
        try {
            $tenant = Filament::getTenant();
            // $data = $this->form->getState();

            // $data = $this->form->getState();
            // $record->update($data);
            // return $record;

                $results = [];
                $players = $this->form->getState();

                foreach ($players as $key => $item) {
                    $results[] = [
                        // 'user_id' => auth()->id(),
                        //'slider_id' => $slider_Id,
                        // 'position' => $key + 1,
                        // 'player_id' => $item['name'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                Home::insert($results);

            // $record = $this->form->getState();
            // $record->save();

            // dd($data);
            // $data['slide_id'] = $data['slide_id'] ?? null;

            // $record->update($data);

            // return $record;

            // Home::updateOrInsert(
            //      $data['slide_id'] = $data['slide_id'] ?? null;
            // );

            // Home::updateOrInsert(
            //    ['slider_id' => $tenant->id],
            // //    ['title' => $tenant->title],
            // //    ['description' => $tenant->description],
            // //    ['gmap_link' => $tenant->gmap_link],
            //     $data
            // );
            // // Home::updateOrInsert(
            // //    $data['slider_id'] = $tenant->id,
            // //    $data['title'] = $tenant->title,
            // //    $data['description'] = $tenant->description,
            // //    $data['gmap_link'] = $tenant->gmap_link,
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

    public function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }







    // public function save(array $data): void
    // {
    //     try {
    //         $record = new ($this->getModel())($data);

    //         // $record = new ($this->getModel())($data);
    //         $record = $this->form->getState();
    //         $record->save();

    //         // return $record;

    //         // if (
    //         //     static::getResource()::isScopedToTenant() &&
    //         //     ($tenant = Filament::getTenant())
    //         // ) {
    //         //     return $this->associateRecordWithTenant($record, $tenant);
    //         // }

    //         // $record->save();

    //         // return $record;

    //         // $this->validate();

    //         // $data = $this->form->getState();
    //         // $this->update($data);
    //         // return $data;
    //         //$this->handleRecordUpdate($this->getUser(), $data);

    //         // dd($data);

    //         // dd($this);
    //         //  auth()->user()->home->update($data);

    //     //     $this->update($data);

    //     //     $this->validate();

	// 	// $attrs = $this->form->getState();

	// 	// foreach ($data as $key => $attr) {
	// 	// 	if (isset($attr) && ! empty($attr)) {
	// 	// 		\App\Models\Home::set($key, $attr);
	// 	// 	} else {
	// 	// 		\App\Models\Home::forget($key);
	// 	// 	}
	// 	// }

    //     } catch (Halt $exception) {
    //         return;
    //     }
    // }

    // // // public function save(): void {
    // // //     try {
    // // //         $record->update($data);
    // // //         return $record;
    // // //         // $home = Home::getHome();
    // // //         // $data = $this->form->getState();

    // // //         // $this->json = json_encode($data);
    // // //         // file_put_contents($this->json);
    // // //         //$this->save();
    // // //         // dd($data);

    // // //         // Home::updateOrInsert(
    // // //         //     ['title' => $data->title],
    // // //         //     $data
    // // //         // );
    // // //         Notification::make()
    // // //             ->title('Saved successfully')
    // // //             ->success()
    // // //             ->send();

    // // //     } catch (Halt $exception) {
    // // //         Notification::make()
    // // //             ->title('Something went wrong!')
    // // //             ->danger()
    // // //             ->send();
    // // //         return;
    // // //     }
    // // // }


    //  protected function getFormActions(): array
    // {
    //     return [
    //         Action::make('save')
    //             ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
    //             ->submit('save'),
    //     ];
    // }

}
