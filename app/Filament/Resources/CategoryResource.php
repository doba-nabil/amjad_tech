<?php
namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;
    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function getModelLabel(): string { return __('dashboard.category'); }
    public static function getPluralModelLabel(): string { return __('dashboard.categories'); }
    public static function getNavigationGroup(): ?string { return __('dashboard.categorization'); }

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
                                Forms\Components\RichEditor::make('description.ar')
                                    ->label(__('dashboard.description_ar')),
                            ]),
                        Forms\Components\Tabs\Tab::make(__('dashboard.english'))
                            ->schema([
                                Forms\Components\TextInput::make('name.en')
                                    ->label(__('dashboard.name_en'))
                                    ->required(),
                                Forms\Components\RichEditor::make('description.en')
                                    ->label(__('dashboard.description_en')),
                            ]),
                    ])->columnSpanFull(),
                Forms\Components\TextInput::make('slug')
                    ->label(__('dashboard.slug'))
                    ->disabled()
                    ->dehydrated(false),
                Forms\Components\Select::make('type')
                    ->label(__('dashboard.type'))
                    ->options([
                        'blog' => 'Blog',
                        'project' => 'Project',
                        'service' => 'Service',
                    ])
                    ->default('blog')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->label(__('dashboard.image'))
                    ->image()
                    ->directory('categories'),
                Forms\Components\FileUpload::make('banner')
                    ->label(__('dashboard.banner'))
                    ->image()
                    ->directory('categories'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label(__('dashboard.image')),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
