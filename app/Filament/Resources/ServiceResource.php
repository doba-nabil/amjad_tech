<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function getModelLabel(): string { return __('dashboard.service'); }
    public static function getPluralModelLabel(): string { return __('dashboard.services'); }
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
                                Forms\Components\RichEditor::make('description.ar')
                                    ->label(__('dashboard.description_ar'))
                                    ->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make(__('dashboard.english'))
                            ->schema([
                                Forms\Components\TextInput::make('title.en')
                                    ->label(__('dashboard.title_en'))
                                    ->required(),
                                Forms\Components\RichEditor::make('description.en')
                                    ->label(__('dashboard.description_en'))
                                    ->required(),
                            ]),
                    ])->columnSpanFull(),
                Forms\Components\TextInput::make('slug')
                    ->label(__('dashboard.slug'))
                    ->disabled()
                    ->dehydrated(false)
                    ->helperText('Auto-generated based on title.'),
                Forms\Components\FileUpload::make('image')
                    ->label(__('dashboard.image'))
                    ->image()
                    ->directory('services')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label(__('dashboard.image')),
                Tables\Columns\TextColumn::make('title')->label(__('dashboard.title'))->searchable(),
                Tables\Columns\TextColumn::make('slug')->label(__('dashboard.slug'))->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label(__('dashboard.created_at'))->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
               Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
