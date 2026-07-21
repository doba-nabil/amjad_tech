<?php
$file = 'app/Filament/Pages/GeneralSettings.php';
$content = file_get_contents($file);

$newSchema = <<<PHP
                Forms\Components\Tabs::make('Settings')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make(__('dashboard.general_settings'))
                            ->schema([
                                Forms\Components\TextInput::make('site_name')->label(__('dashboard.site_name'))->required(),
                                Forms\Components\FileUpload::make('logo')->label(__('dashboard.logo'))->image()->directory('settings')->preserveFilenames(),
                                Forms\Components\FileUpload::make('footer_logo')->label(__('dashboard.footer_logo'))->image()->directory('settings')->preserveFilenames(),
                                Forms\Components\TextInput::make('address')->label(__('dashboard.address')),
                                Forms\Components\TextInput::make('meta_title')->label(__('dashboard.meta_title')),
                                Forms\Components\Textarea::make('meta_description')->label(__('dashboard.meta_description'))->rows(3),
                                Forms\Components\Textarea::make('footer_text')->label(__('dashboard.footer_text'))->rows(3)->columnSpanFull(),
                                Forms\Components\Repeater::make('phone_numbers')
                                    ->label(__('dashboard.phone_numbers'))
                                    ->addActionLabel(__('dashboard.add_phone'))
                                    ->schema([
                                        Forms\Components\TextInput::make('number')->label(__('dashboard.number'))->required(),
                                    ])->columns(1)->columnSpanFull(),
                                Forms\Components\Repeater::make('social_media')
                                    ->label(__('dashboard.social_media'))
                                    ->addActionLabel(__('dashboard.add_social'))
                                    ->schema([
                                        Forms\Components\Select::make('platform')
                                            ->label(__('dashboard.platform'))
                                            ->options([
                                                'facebook' => 'Facebook',
                                                'twitter' => 'Twitter/X',
                                                'instagram' => 'Instagram',
                                                'linkedin' => 'LinkedIn',
                                                'youtube' => 'YouTube',
                                            ])->required(),
                                        Forms\Components\TextInput::make('url')
                                            ->label(__('dashboard.url'))
                                            ->url()
                                            ->required(),
                                    ])->columns(2)->columnSpanFull(),
                            ])->columns(2),
                        
                        Forms\Components\Tabs\Tab::make(__('dashboard.home_settings'))
                            ->schema([
                                Forms\Components\Section::make(__('dashboard.homepage_sections_visibility'))
                                    ->description(__('dashboard.toggle_sections_desc'))
                                    ->schema([
                                        Forms\Components\Toggle::make('show_services_section')->label(__('dashboard.show_services_section'))->default(true),
                                        Forms\Components\Toggle::make('show_projects_section')->label(__('dashboard.show_projects_section'))->default(true),
                                        Forms\Components\Toggle::make('show_blogs_section')->label(__('dashboard.show_blogs_section'))->default(true),
                                    ])->columns(3),
                                Forms\Components\Section::make(__('dashboard.home_services_texts_ar'))
                                    ->schema([
                                        Forms\Components\TextInput::make('home_services_title')->label(__('dashboard.home_services_title'))->required(),
                                        Forms\Components\TextInput::make('home_services_subtitle')->label(__('dashboard.home_services_subtitle')),
                                        Forms\Components\Textarea::make('home_services_text')->label(__('dashboard.home_services_text'))->columnSpanFull(),
                                    ])->columns(2),
                                Forms\Components\Section::make(__('dashboard.home_projects_texts_ar'))
                                    ->schema([
                                        Forms\Components\TextInput::make('home_projects_title')->label(__('dashboard.home_projects_title'))->required(),
                                        Forms\Components\TextInput::make('home_projects_subtitle')->label(__('dashboard.home_projects_subtitle')),
                                        Forms\Components\Textarea::make('home_projects_text')->label(__('dashboard.home_projects_text'))->columnSpanFull(),
                                    ])->columns(2),
                                Forms\Components\Section::make(__('dashboard.home_blog_texts_ar'))
                                    ->schema([
                                        Forms\Components\TextInput::make('home_blog_title')->label(__('dashboard.home_blog_title'))->required(),
                                        Forms\Components\TextInput::make('home_blog_subtitle')->label(__('dashboard.home_blog_subtitle')),
                                        Forms\Components\Textarea::make('home_blog_text')->label(__('dashboard.home_blog_text'))->columnSpanFull(),
                                    ])->columns(2),
                            ]),

                        Forms\Components\Tabs\Tab::make(__('dashboard.navigation_menus'))
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
                                            ->visible(fn (\$get) => \$get('is_dropdown'))
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
                    ])->columnSpanFull(),
PHP;

$content = preg_replace('/Forms\\\\Components\\\\Section::make\(\'__\(\\\'dashboard\.general_settings\\\'\)\'\).*?\]\)/is', $newSchema, $content, 1);
file_put_contents($file, $content);
echo "Tabs applied.\n";
