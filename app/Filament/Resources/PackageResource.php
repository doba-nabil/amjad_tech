<?php
namespace App\Filament\Resources;

use App\Filament\Resources\PackageResource\Pages;
use App\Models\Package;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function getModelLabel(): string { return __('dashboard.package'); }
    public static function getPluralModelLabel(): string { return __('dashboard.packages'); }
    public static function getNavigationGroup(): ?string { return __('dashboard.content'); }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('dashboard.package_details'))->schema([
                    Forms\Components\Tabs::make('Translations')
                        ->tabs([
                            Forms\Components\Tabs\Tab::make(__('dashboard.arabic'))
                                ->schema([
                                    Forms\Components\TextInput::make('name.ar')
                                        ->label(__('dashboard.name_ar'))
                                        ->required(),
                                    Forms\Components\TextInput::make('sub_name.ar')
                                        ->label(__('dashboard.sub_title_ar')),
                                    Forms\Components\Repeater::make('features.ar')
                                        ->label(__('dashboard.features_ar'))
                                        ->simple(
                                            Forms\Components\TextInput::make('feature')->required()
                                        )
                                        ->addActionLabel('إضافة ميزة')
                                        ->reorderableWithButtons(),
                                ]),
                            Forms\Components\Tabs\Tab::make(__('dashboard.english'))
                                ->schema([
                                    Forms\Components\TextInput::make('name.en')
                                        ->label(__('dashboard.name_en'))
                                        ->required(),
                                    Forms\Components\TextInput::make('sub_name.en')
                                        ->label(__('dashboard.sub_title_en')),
                                    Forms\Components\Repeater::make('features.en')
                                        ->label(__('dashboard.features_en'))
                                        ->simple(
                                            Forms\Components\TextInput::make('feature')->required()
                                        )
                                        ->addActionLabel('Add Feature')
                                        ->reorderableWithButtons(),
                                ]),
                        ])->columnSpanFull(),
                    Forms\Components\TextInput::make('slug')
                        ->label(__('dashboard.slug'))
                        ->disabled()
                        ->dehydrated(false),
                    Forms\Components\Select::make('type')
                        ->label(__('dashboard.type'))
                        ->options([
                            'monthly' => 'Monthly',
                            'yearly' => 'Yearly',
                            'custom' => 'Custom'
                        ])
                        ->default('monthly')
                        ->required(),
                ])->columns(2),

                Forms\Components\Section::make(__('dashboard.prices_by_country'))->schema([
                    Forms\Components\Repeater::make('prices')
                        ->label('')
                        ->relationship('prices')
                        ->schema([
                            Forms\Components\Select::make('country_id')
                                ->label(__('dashboard.country_id'))
                                ->relationship('country', 'name')
                                ->required(),
                            Forms\Components\TextInput::make('price')
                                ->label(__('dashboard.price'))
                                ->numeric()
                                ->required()
                                ->prefix('$'),
                        ])->columns(2),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label(__('dashboard.name'))->searchable(),
                Tables\Columns\TextColumn::make('type')->label(__('dashboard.type'))->badge(),
                Tables\Columns\TextColumn::make('created_at')->label(__('dashboard.created_at'))->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPackages::route('/'),
            'create' => Pages\CreatePackage::route('/create'),
            'edit' => Pages\EditPackage::route('/{record}/edit'),
        ];
    }
}
