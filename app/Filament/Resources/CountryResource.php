<?php
namespace App\Filament\Resources;

use App\Filament\Resources\CountryResource\Pages;
use App\Models\Country;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CountryResource extends Resource
{
    protected static ?string $model = Country::class;
    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    public static function getModelLabel(): string { return __('dashboard.country'); }
    public static function getPluralModelLabel(): string { return __('dashboard.countries'); }
    public static function getNavigationGroup(): ?string { return __('dashboard.site_settings'); }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Translations')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make(__('dashboard.arabic'))
                            ->schema([
                                Forms\Components\TextInput::make('name.ar')
                                    ->label(__('dashboard.name_ar'))
                                    ->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make(__('dashboard.english'))
                            ->schema([
                                Forms\Components\TextInput::make('name.en')
                                    ->label(__('dashboard.name_en'))
                                    ->required(),
                            ]),
                    ])->columnSpanFull(),
                Forms\Components\TextInput::make('currency_code')
                    ->label(__('dashboard.currency_code'))
                    ->default('KWD')
                    ->required()
                    ->maxLength(10),
                Forms\Components\Toggle::make('is_active')
                    ->label(__('dashboard.is_active'))
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label(__('dashboard.name'))->searchable(),
                Tables\Columns\TextColumn::make('currency_code')->label(__('dashboard.currency_code')),
                Tables\Columns\IconColumn::make('is_active')->label(__('dashboard.is_active'))->boolean(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->hidden(fn (Country $record) => strtoupper($record->currency_code) === 'KWD'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCountries::route('/'),
            'create' => Pages\CreateCountry::route('/create'),
            'edit' => Pages\EditCountry::route('/{record}/edit'),
        ];
    }
}
