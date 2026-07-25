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
                Forms\Components\Tabs::make('MainTabs')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make(__('dashboard.general_settings') ?? 'General Settings')
                            ->schema([
                                Forms\Components\Section::make(__('dashboard.site_name') ?? 'Site Name')->schema([
                                    Forms\Components\TextInput::make('site_name.ar')->label(__('dashboard.arabic'))->required(),
                                    Forms\Components\TextInput::make('site_name.en')->label(__('dashboard.english'))->required(),
                                ])->columns(2),
                                Forms\Components\Section::make(__('dashboard.meta_tags') ?? 'Meta Tags')->schema([
                                    Forms\Components\TextInput::make('meta_title.ar')->label('Meta Title (AR)'),
                                    Forms\Components\TextInput::make('meta_title.en')->label('Meta Title (EN)'),
                                    Forms\Components\Textarea::make('meta_description.ar')->label('Meta Description (AR)'),
                                    Forms\Components\Textarea::make('meta_description.en')->label('Meta Description (EN)'),
                                ])->columns(2),
                                Forms\Components\Section::make(__('dashboard.footer_text') ?? 'Footer Text')->schema([
                                    Forms\Components\Textarea::make('footer_text.ar')->label(__('dashboard.arabic')),
                                    Forms\Components\Textarea::make('footer_text.en')->label(__('dashboard.english')),
                                ])->columns(2),
                                Forms\Components\Section::make(__('dashboard.logos_and_banners'))->schema([
                                    Forms\Components\FileUpload::make('favicon')->label(__('dashboard.favicon') ?? 'Favicon')->image()->directory('settings')->preserveFilenames(),
                                    Forms\Components\FileUpload::make('logo')->label(__('dashboard.logo'))->image()->directory('settings')->preserveFilenames(),
                                    Forms\Components\FileUpload::make('footer_logo')->label(__('dashboard.footer_logo'))->image()->directory('settings')->preserveFilenames(),
                                    Forms\Components\FileUpload::make('blogs_banner')->label(__('dashboard.blogs_banner') ?? 'Blogs Banner')->image()->directory('settings/banners'),
                                    Forms\Components\FileUpload::make('projects_banner')->label(__('dashboard.projects_banner') ?? 'Projects Banner')->image()->directory('settings/banners'),
                                    Forms\Components\FileUpload::make('other_pages_banner')->label(__('dashboard.other_pages_banner') ?? 'Other Pages Banner')->image()->directory('settings/banners')->columnSpanFull(),
                                ])->columns(2),
                                Forms\Components\Section::make(__('dashboard.contact_and_address'))->schema([
                                    Forms\Components\Textarea::make('address.ar')->label(__('dashboard.address_ar')),
                                    Forms\Components\Textarea::make('address.en')->label(__('dashboard.address_en')),
                                    Forms\Components\Repeater::make('phone_numbers')->label(__('dashboard.phone_numbers'))->schema([ Forms\Components\TextInput::make('phone')->label(__('dashboard.phone'))->required() ])->columnSpanFull(),
                                    Forms\Components\Repeater::make('emails')->label(__('dashboard.emails') ?? 'Emails')->schema([ Forms\Components\TextInput::make('email')->label(__('dashboard.email') ?? 'Email')->email()->required() ])->columnSpanFull(),
                                    Forms\Components\KeyValue::make('social_media')->label(__('dashboard.social_media'))->keyLabel(__('dashboard.platform'))->valueLabel(__('dashboard.url'))->columnSpanFull(),
                                ])->columns(2),
                            ]),

                        Forms\Components\Tabs\Tab::make(__('dashboard.home_settings') ?? 'Home Settings')
                            ->schema([
                                Forms\Components\Section::make(__('dashboard.homepage_sections_visibility'))
                                    ->description(__('dashboard.toggle_sections_desc'))
                                    ->schema([
                                        Forms\Components\Toggle::make('show_services_section')->label(__('dashboard.show_services_section'))->default(true),
                                        Forms\Components\Toggle::make('show_projects_section')->label(__('dashboard.show_projects_section'))->default(true),
                                        Forms\Components\Toggle::make('show_blogs_section')->label(__('dashboard.show_blogs_section'))->default(true),
                                        Forms\Components\Toggle::make('show_about_section')->label(__('dashboard.show_about_section'))->default(true),
                                        Forms\Components\Toggle::make('show_packages_section')->label(__('dashboard.show_packages_section'))->default(true),
                                        Forms\Components\Toggle::make('show_hero_social')->label(__('dashboard.show_hero_social'))->default(true),
                                    ])->columns(3),
                                Forms\Components\Section::make(__('dashboard.home_video_section_title') ?? 'Home Video')
                                    ->schema([
                                        Forms\Components\TextInput::make('home_video_url')->label(__('dashboard.home_video_url'))->url(),
                                        Forms\Components\FileUpload::make('home_video_file')->label(__('dashboard.home_video_file'))->acceptedFileTypes(['video/*'])->directory('settings'),
                                    ])->columns(2),
                                Forms\Components\Section::make(__('dashboard.home_services_texts_ar'))
                                    ->schema([
                                        Forms\Components\TextInput::make('home_services_title.ar')->label(__('dashboard.title_ar')),
                                        Forms\Components\TextInput::make('home_services_title.en')->label(__('dashboard.title_en')),
                                        Forms\Components\TextInput::make('home_services_subtitle.ar')->label(__('dashboard.sub_title_ar')),
                                        Forms\Components\TextInput::make('home_services_subtitle.en')->label(__('dashboard.sub_title_en')),
                                        Forms\Components\Textarea::make('home_services_text.ar')->label(__('dashboard.text_ar')),
                                        Forms\Components\Textarea::make('home_services_text.en')->label(__('dashboard.text_en')),
                                    ])->columns(2),
                                Forms\Components\Section::make(__('dashboard.home_projects_texts_ar'))
                                    ->schema([
                                        Forms\Components\TextInput::make('home_projects_title.ar')->label(__('dashboard.title_ar')),
                                        Forms\Components\TextInput::make('home_projects_title.en')->label(__('dashboard.title_en')),
                                        Forms\Components\TextInput::make('home_projects_subtitle.ar')->label(__('dashboard.sub_title_ar')),
                                        Forms\Components\TextInput::make('home_projects_subtitle.en')->label(__('dashboard.sub_title_en')),
                                        Forms\Components\Textarea::make('home_projects_text.ar')->label(__('dashboard.text_ar')),
                                        Forms\Components\Textarea::make('home_projects_text.en')->label(__('dashboard.text_en')),
                                    ])->columns(2),
                                Forms\Components\Section::make(__('dashboard.home_about_texts_ar') ?? 'About Section Texts')
                                    ->schema([
                                        Forms\Components\TextInput::make('home_about_title.ar')->label(__('dashboard.title_ar')),
                                        Forms\Components\TextInput::make('home_about_title.en')->label(__('dashboard.title_en')),
                                        Forms\Components\TextInput::make('home_about_subtitle.ar')->label(__('dashboard.sub_title_ar')),
                                        Forms\Components\TextInput::make('home_about_subtitle.en')->label(__('dashboard.sub_title_en')),
                                        Forms\Components\Textarea::make('home_about_text.ar')->label(__('dashboard.text_ar')),
                                        Forms\Components\Textarea::make('home_about_text.en')->label(__('dashboard.text_en')),
                                        Forms\Components\FileUpload::make('home_about_image')->label(__('dashboard.about_image') ?? 'About Image')->directory('settings')->columnSpanFull(),
                                        Forms\Components\Repeater::make('company_since_cards')
                                            ->label(__('dashboard.company_since_cards') ?? 'Company Since Cards')
                                            ->schema([
                                                Forms\Components\FileUpload::make('logo')
                                                    ->label(__('dashboard.logo') ?? 'Card Logo')
                                                    ->image()
                                                    ->directory('settings/about-cards')
                                                    ->columnSpanFull(),
                                                Forms\Components\TextInput::make('rank')
                                                    ->label(__('dashboard.rank') ?? 'Rank / Badge (e.g. #1)')
                                                    ->placeholder('#1')
                                                    ->maxLength(20),
                                                Forms\Components\TextInput::make('title_ar')
                                                    ->label(__('dashboard.title_ar') ?? 'Title (AR)')
                                                    ->required()
                                                    ->placeholder('أفضل وكالة تقنية إبداعية'),
                                                Forms\Components\TextInput::make('title_en')
                                                    ->label(__('dashboard.title_en') ?? 'Title (EN)')
                                                    ->required()
                                                    ->placeholder('Best Creative IT Agency And Solutions'),
                                                Forms\Components\TextInput::make('highlight_ar')
                                                    ->label(__('dashboard.highlight_ar') ?? 'Highlighted Text (AR)')
                                                    ->placeholder('منذ 2005')
                                                    ->helperText(__('dashboard.company_since_highlight_hint') ?? 'This text will be highlighted in color at the end of the title.'),
                                                Forms\Components\TextInput::make('highlight_en')
                                                    ->label(__('dashboard.highlight_en') ?? 'Highlighted Text (EN)')
                                                    ->placeholder('Since 2005.'),
                                            ])
                                            ->columns(2)
                                            ->addActionLabel(__('dashboard.add_card') ?? 'Add Card')
                                            ->columnSpanFull()
                                            ->reorderableWithButtons()
                                            ->collapsible(),
                                    ])->columns(2),
                                Forms\Components\Section::make(__('dashboard.home_packages_texts_ar') ?? 'Packages Section Texts')
                                    ->schema([
                                        Forms\Components\TextInput::make('home_packages_title.ar')->label(__('dashboard.title_ar')),
                                        Forms\Components\TextInput::make('home_packages_title.en')->label(__('dashboard.title_en')),
                                        Forms\Components\TextInput::make('home_packages_subtitle.ar')->label(__('dashboard.sub_title_ar')),
                                        Forms\Components\TextInput::make('home_packages_subtitle.en')->label(__('dashboard.sub_title_en')),
                                        Forms\Components\Textarea::make('home_packages_text.ar')->label(__('dashboard.text_ar')),
                                        Forms\Components\Textarea::make('home_packages_text.en')->label(__('dashboard.text_en')),
                                    ])->columns(2),
                                Forms\Components\Section::make(__('dashboard.home_partners_texts') ?? 'Partners Section Texts')
                                    ->schema([
                                        Forms\Components\TextInput::make('home_partners_title.ar')->label(__('dashboard.title_ar')),
                                        Forms\Components\TextInput::make('home_partners_title.en')->label(__('dashboard.title_en')),
                                        Forms\Components\TextInput::make('home_partners_subtitle.ar')->label(__('dashboard.sub_title_ar')),
                                        Forms\Components\TextInput::make('home_partners_subtitle.en')->label(__('dashboard.sub_title_en')),
                                    ])->columns(2),
                                Forms\Components\Section::make(__('dashboard.home_blog_texts_ar'))
                                    ->schema([
                                        Forms\Components\TextInput::make('home_blog_title.ar')->label(__('dashboard.title_ar')),
                                        Forms\Components\TextInput::make('home_blog_title.en')->label(__('dashboard.title_en')),
                                        Forms\Components\TextInput::make('home_blog_subtitle.ar')->label(__('dashboard.sub_title_ar')),
                                        Forms\Components\TextInput::make('home_blog_subtitle.en')->label(__('dashboard.sub_title_en')),
                                        Forms\Components\Textarea::make('home_blog_text.ar')->label(__('dashboard.text_ar')),
                                        Forms\Components\Textarea::make('home_blog_text.en')->label(__('dashboard.text_en')),
                                    ])->columns(2),
                            ]),

                        Forms\Components\Tabs\Tab::make(__('dashboard.navigation_menus') ?? 'Navigation Menus')
                            ->schema([
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('footer_column_1_title.ar')->label(__('dashboard.footer_column_1_title') . ' (AR)')->placeholder('e.g. خدماتنا')->columnSpan(1),
                                        Forms\Components\TextInput::make('footer_column_1_title.en')->label(__('dashboard.footer_column_1_title') . ' (EN)')->placeholder('e.g. Our Services')->columnSpan(1),
                                        Forms\Components\TextInput::make('footer_column_2_title.ar')->label(__('dashboard.footer_column_2_title') . ' (AR)')->placeholder('e.g. روابط سريعة')->columnSpan(1),
                                        Forms\Components\TextInput::make('footer_column_2_title.en')->label(__('dashboard.footer_column_2_title') . ' (EN)')->placeholder('e.g. Quick Links')->columnSpan(1),
                                    ]),
                                Forms\Components\Repeater::make('header_links')
                                    ->label(__('dashboard.header_links'))
                                    ->addActionLabel(__('dashboard.add_to_header'))
                                    ->schema([
                                        Forms\Components\TextInput::make('label_ar')->label(__('dashboard.label_ar'))->required(),
                                        Forms\Components\TextInput::make('label_en')->label(__('dashboard.label_en'))->required(),
                                        Forms\Components\TextInput::make('url')->label(__('dashboard.url_label'))->required(),
                                        Forms\Components\Toggle::make('is_dropdown')->label(__('dashboard.is_dropdown'))->reactive(),
                                        Forms\Components\Repeater::make('children')
                                            ->label(__('dashboard.dropdown_links'))
                                            ->addActionLabel(__('dashboard.add_sub_link'))
                                            ->schema([
                                                Forms\Components\TextInput::make('label_ar')->label(__('dashboard.label_ar'))->required(),
                                                Forms\Components\TextInput::make('label_en')->label(__('dashboard.label_en'))->required(),
                                                Forms\Components\TextInput::make('url')->label(__('dashboard.url_simple'))->required(),
                                            ])
                                            ->visible(fn ($get) => $get('is_dropdown'))
                                            ->columnSpanFull()
                                    ])->columns(2)->collapsible()->columnSpanFull(),
                                Forms\Components\Repeater::make('footer_links')
                                    ->label(__('dashboard.footer_links'))
                                    ->addActionLabel(__('dashboard.add_to_footer'))
                                    ->schema([
                                        Forms\Components\Select::make('column')->label(__('dashboard.footer_column'))->options([
                                            '1' => __('dashboard.column_1'),
                                            '2' => __('dashboard.column_2'),
                                        ])->required()->default('2'),
                                        Forms\Components\TextInput::make('label_ar')->label(__('dashboard.label_ar'))->required(),
                                        Forms\Components\TextInput::make('label_en')->label(__('dashboard.label_en'))->required(),
                                        Forms\Components\TextInput::make('url')->label(__('dashboard.url_simple'))->required(),
                                    ])->columns(4)->collapsible()->columnSpanFull(),

                                Forms\Components\Repeater::make('footer_bottom_links')
                                    ->label(__('dashboard.footer_bottom_links') ?? 'Footer Bottom Links')
                                    ->addActionLabel(__('dashboard.add_bottom_link') ?? 'Add Bottom Link')
                                    ->schema([
                                        Forms\Components\TextInput::make('label_ar')
                                            ->label(__('dashboard.label_ar'))
                                            ->required()
                                            ->placeholder('سياسة الخصوصية'),
                                        Forms\Components\TextInput::make('label_en')
                                            ->label(__('dashboard.label_en'))
                                            ->required()
                                            ->placeholder('Privacy Policy'),
                                        Forms\Components\TextInput::make('url')
                                            ->label(__('dashboard.url_simple'))
                                            ->required()
                                            ->placeholder('/p/privacy-policy'),
                                    ])
                                    ->columns(3)
                                    ->collapsible()
                                    ->reorderableWithButtons()
                                    ->columnSpanFull(),
                            ]),
                        
                        Forms\Components\Tabs\Tab::make(__('dashboard.contact_settings') ?? 'Contact Settings')
                            ->schema([
                                Forms\Components\TextInput::make('contact_lat')->label(__('dashboard.latitude') ?? 'Latitude (Lat)')->numeric(),
                                Forms\Components\TextInput::make('contact_lng')->label(__('dashboard.longitude') ?? 'Longitude (Lng)')->numeric(),
                                Forms\Components\FileUpload::make('contact_banner')->label(__('dashboard.contact_banner') ?? 'Contact Banner')->directory('settings'),
                                Forms\Components\FileUpload::make('contact_image')->label(__('dashboard.contact_image') ?? 'Contact Image')->directory('settings'),
                            ])->columns(2),
                        
                        Forms\Components\Tabs\Tab::make(__('dashboard.payment_methods') ?? 'Payment Methods')
                            ->schema([
                                Forms\Components\KeyValue::make('payment_settings')
                                    ->label(__('dashboard.payment_settings') ?? 'Payment Settings')
                                    ->keyLabel(__('dashboard.setting_key') ?? 'Setting Key')
                                    ->valueLabel(__('dashboard.setting_value') ?? 'Setting Value')
                                    ->columnSpanFull(),
                            ]),
                    ])->columnSpanFull()
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $setting = Setting::first() ?? new Setting();
        $setting->fill($this->form->getState());
        $setting->save();

        Notification::make()
            ->title(__('dashboard.saved_successfully') ?? 'Saved successfully')
            ->success()
            ->send();
    }
}
