<?php
namespace App\Filament\Resources;

use App\Filament\Resources\FeatureResource\Pages;
use App\Models\Feature;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FeatureResource extends Resource
{
    protected static ?string $model = Feature::class;
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    public static function getModelLabel(): string { return __('dashboard.feature'); }
    public static function getPluralModelLabel(): string { return __('dashboard.features'); }
    public static function getNavigationGroup(): ?string { return __('dashboard.content'); }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Translations')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make(__('dashboard.arabic'))
                            ->schema([
                                Forms\Components\TextInput::make('title.ar')
                                    ->label(__('dashboard.title_ar'))
                                    ->required(),
                                Forms\Components\Textarea::make('description.ar')
                                    ->label(__('dashboard.description_ar'))
                                    ->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make(__('dashboard.english'))
                            ->schema([
                                Forms\Components\TextInput::make('title.en')
                                    ->label(__('dashboard.title_en'))
                                    ->required(),
                                Forms\Components\Textarea::make('description.en')
                                    ->label(__('dashboard.description_en'))
                                    ->required(),
                            ]),
                    ])->columnSpanFull(),
                Forms\Components\TextInput::make('counter')
                    ->label(__('dashboard.counter'))
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\FileUpload::make('image')
                    ->label(__('dashboard.image'))
                    ->image()
                    ->directory('features')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label(__('dashboard.image')),
                Tables\Columns\TextColumn::make('title')->label(__('dashboard.title'))->searchable(),
                Tables\Columns\TextColumn::make('counter')->label(__('dashboard.counter'))->numeric()->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label(__('dashboard.created_at'))->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFeatures::route('/'),
            'create' => Pages\CreateFeature::route('/create'),
            'edit' => Pages\EditFeature::route('/{record}/edit'),
        ];
    }
}
