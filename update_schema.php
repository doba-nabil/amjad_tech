<?php
$file = 'app/Filament/Pages/GeneralSettings.php';
$content = file_get_contents($file);

$newSchema = <<<'PHP'
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
                                Forms\Components\Section::make('Logos & Banners')->schema([
                                    Forms\Components\FileUpload::make('logo')->label(__('dashboard.logo'))->image()->directory('settings')->preserveFilenames(),
                                    Forms\Components\FileUpload::make('footer_logo')->label(__('dashboard.footer_logo'))->image()->directory('settings')->preserveFilenames(),
                                    Forms\Components\FileUpload::make('blogs_banner')->label(__('dashboard.blogs_banner') ?? 'Blogs Banner')->image()->directory('settings/banners'),
                                    Forms\Components\FileUpload::make('projects_banner')->label(__('dashboard.projects_banner') ?? 'Projects Banner')->image()->directory('settings/banners'),
                                ])->columns(2),
                                Forms\Components\Section::make('Contact & Address')->schema([
                                    Forms\Components\Textarea::make('address.ar')->label('Address (AR)'),
                                    Forms\Components\Textarea::make('address.en')->label('Address (EN)'),
                                    Forms\Components\Repeater::make('phone_numbers')->label(__('dashboard.phone_numbers'))->schema([ Forms\Components\TextInput::make('phone')->label(__('dashboard.phone'))->required() ])->columnSpanFull(),
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
                                    ])->columns(3),
                                Forms\Components\Section::make(__('dashboard.home_video_section_title') ?? 'Home Video')
                                    ->schema([
                                        Forms\Components\TextInput::make('home_video_url')->label(__('dashboard.home_video_url'))->url(),
                                        Forms\Components\FileUpload::make('home_video_file')->label(__('dashboard.home_video_file'))->acceptedFileTypes(['video/*'])->directory('settings'),
                                    ])->columns(2),
                                Forms\Components\Section::make(__('dashboard.home_services_texts_ar'))
                                    ->schema([
                                        Forms\Components\TextInput::make('home_services_title.ar')->label('Title (AR)'),
                                        Forms\Components\TextInput::make('home_services_title.en')->label('Title (EN)'),
                                        Forms\Components\TextInput::make('home_services_subtitle.ar')->label('Subtitle (AR)'),
                                        Forms\Components\TextInput::make('home_services_subtitle.en')->label('Subtitle (EN)'),
                                        Forms\Components\Textarea::make('home_services_text.ar')->label('Text (AR)'),
                                        Forms\Components\Textarea::make('home_services_text.en')->label('Text (EN)'),
                                    ])->columns(2),
                                Forms\Components\Section::make(__('dashboard.home_projects_texts_ar'))
                                    ->schema([
                                        Forms\Components\TextInput::make('home_projects_title.ar')->label('Title (AR)'),
                                        Forms\Components\TextInput::make('home_projects_title.en')->label('Title (EN)'),
                                        Forms\Components\TextInput::make('home_projects_subtitle.ar')->label('Subtitle (AR)'),
                                        Forms\Components\TextInput::make('home_projects_subtitle.en')->label('Subtitle (EN)'),
                                        Forms\Components\Textarea::make('home_projects_text.ar')->label('Text (AR)'),
                                        Forms\Components\Textarea::make('home_projects_text.en')->label('Text (EN)'),
                                    ])->columns(2),
                                Forms\Components\Section::make(__('dashboard.home_blog_texts_ar'))
                                    ->schema([
                                        Forms\Components\TextInput::make('home_blog_title.ar')->label('Title (AR)'),
                                        Forms\Components\TextInput::make('home_blog_title.en')->label('Title (EN)'),
                                        Forms\Components\TextInput::make('home_blog_subtitle.ar')->label('Subtitle (AR)'),
                                        Forms\Components\TextInput::make('home_blog_subtitle.en')->label('Subtitle (EN)'),
                                        Forms\Components\Textarea::make('home_blog_text.ar')->label('Text (AR)'),
                                        Forms\Components\Textarea::make('home_blog_text.en')->label('Text (EN)'),
                                    ])->columns(2),
                            ]),

                        Forms\Components\Tabs\Tab::make(__('dashboard.navigation_menus') ?? 'Navigation Menus')
                            ->schema([
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
                            ]),
                    ])->columnSpanFull()
            ])
PHP;

$content = preg_replace('/->schema\(\[.*?\]\)\s*->statePath\(\'data\'\)/is', $newSchema . "\n            ->statePath('data')", $content);
file_put_contents($file, $content);
echo "GeneralSettings tabs applied!\n";
