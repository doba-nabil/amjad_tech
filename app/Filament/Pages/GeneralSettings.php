<?php
namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class GeneralSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static string $view = 'filament.pages.general-settings';
    public ?array $data = [];

    public static function getNavigationGroup(): ?string
    {
        return __('dashboard.site_settings');
    }

    public static function getNavigationLabel(): string
    {
        return __('dashboard.settings');
    }

    public function getTitle(): string 
    {
        return __('dashboard.settings');
    }

    public function mount(): void
    {
        $setting = Setting::first();
        if ($setting) {
            $this->form->fill($setting->toArray());
        } else {
            $this->form->fill();
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Translations')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make(__('dashboard.arabic'))->schema([
                            Forms\Components\TextInput::make('site_name.ar')->label(__('dashboard.site_name_ar')),
                            Forms\Components\TextInput::make('meta_title.ar')->label(__('dashboard.meta_title_ar')),
                            Forms\Components\Textarea::make('meta_description.ar')->label(__('dashboard.meta_description_ar')),
                            Forms\Components\Textarea::make('address.ar')->label(__('dashboard.address_ar')),
                        ]),
                        Forms\Components\Tabs\Tab::make(__('dashboard.english'))->schema([
                            Forms\Components\TextInput::make('site_name.en')->label(__('dashboard.site_name_en')),
                            Forms\Components\TextInput::make('meta_title.en')->label(__('dashboard.meta_title_en')),
                            Forms\Components\Textarea::make('meta_description.en')->label(__('dashboard.meta_description_en')),
                            Forms\Components\Textarea::make('address.en')->label(__('dashboard.address_en')),
                        ]),
                    ])->columnSpanFull(),
                Forms\Components\Section::make(__('dashboard.media'))
                    ->schema([
                        Forms\Components\FileUpload::make('logo')->label(__('dashboard.logo'))->image()->directory('settings'),
                        Forms\Components\FileUpload::make('footer_logo')->label(__('dashboard.footer_logo'))->image()->directory('settings'),
                        Forms\Components\FileUpload::make('favicon')->label(__('dashboard.favicon'))->image()->directory('settings')->columnSpanFull(),
                    ])->columns(3),
                Forms\Components\Section::make(__('dashboard.banners_section_title') ?? 'Banners')
                    ->description(__('dashboard.banners_section_desc') ?? 'Manage global banners for various pages.')
                    ->schema([
                        Forms\Components\FileUpload::make('blogs_banner')
                            ->label(__('dashboard.blogs_banner') ?? 'Blogs Banner')
                            ->image()
                            ->directory('settings/banners'),
                        Forms\Components\FileUpload::make('projects_banner')
                            ->label(__('dashboard.projects_banner') ?? 'Projects Banner')
                            ->image()
                            ->directory('settings/banners'),
                    ])->columns(2),
                Forms\Components\Section::make(__('dashboard.home_video_section_title'))
                    ->description(__('dashboard.home_video_section_desc'))
                    ->schema([
                        Forms\Components\TextInput::make('home_video_url')
                            ->label(__('dashboard.home_video_url'))
                            ->url(),
                        Forms\Components\FileUpload::make('home_video_file')
                            ->label(__('dashboard.home_video_file'))
                            ->acceptedFileTypes(['video/*'])
                            ->directory('settings'),
                    ])->columns(2),
                Forms\Components\Section::make(__('dashboard.contact'))
                    ->schema([
                        Forms\Components\Repeater::make('phone_numbers')
                            ->label(__('dashboard.phone_numbers'))
                            ->schema([ Forms\Components\TextInput::make('phone')->label(__('dashboard.phone'))->required() ]),
                        Forms\Components\KeyValue::make('social_media')
                            ->label(__('dashboard.social_media'))
                            ->keyLabel(__('dashboard.platform'))
                            ->valueLabel(__('dashboard.url')),
                    ])->columns(1),
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $setting = Setting::first() ?? new Setting();
        $setting->fill($this->form->getState());
        $setting->save();

        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
    }
}
