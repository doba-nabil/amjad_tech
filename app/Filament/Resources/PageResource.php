<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function getModelLabel(): string { return __('dashboard.page'); }
    public static function getPluralModelLabel(): string { return __('dashboard.pages'); }
    public static function getNavigationGroup(): ?string { return __('dashboard.content'); }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('dashboard.page_details'))->schema([
                    Forms\Components\Tabs::make('Translations')
                        ->tabs([
                            Forms\Components\Tabs\Tab::make(__('dashboard.arabic'))
                                ->schema([
                                    Forms\Components\TextInput::make('title.ar')
                                        ->label(__('dashboard.title_ar'))
                                        ->required(),
                                    Forms\Components\RichEditor::make('content.ar')
                                        ->label(__('dashboard.content_ar')),
                                ]),
                            Forms\Components\Tabs\Tab::make(__('dashboard.english'))
                                ->schema([
                                    Forms\Components\TextInput::make('title.en')
                                        ->label(__('dashboard.title_en'))
                                        ->required(),
                                    Forms\Components\RichEditor::make('content.en')
                                        ->label(__('dashboard.content_en')),
                                ]),
                        ])->columnSpanFull(),

                    Forms\Components\TextInput::make('slug')
                        ->label(__('dashboard.slug'))
                        ->disabled()
                        ->dehydrated(false)
                        ->columnSpanFull(),

                    Forms\Components\FileUpload::make('banner')
                        ->label(__('dashboard.banner'))
                        ->image()
                        ->directory('pages/banners')
                        ->columnSpanFull(),

                    Forms\Components\Toggle::make('is_active')
                        ->label(__('dashboard.is_active'))
                        ->default(true),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('banner')->label(__('dashboard.banner')),
                Tables\Columns\TextColumn::make('title')->label(__('dashboard.title'))->searchable(),
                Tables\Columns\IconColumn::make('is_active')->label(__('dashboard.is_active'))->boolean(),
                Tables\Columns\TextColumn::make('created_at')->label(__('dashboard.created_at'))->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
