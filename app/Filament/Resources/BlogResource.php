<?php
namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function getModelLabel(): string { return __('dashboard.blog'); }
    public static function getPluralModelLabel(): string { return __('dashboard.blogs'); }
    public static function getNavigationGroup(): ?string { return __('dashboard.content'); }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->label(__('dashboard.category_id'))
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\Select::make('tags')
                    ->label('Tags')
                    ->relationship('tags', 'name')
                    ->multiple()
                    ->preload(),
                Forms\Components\Toggle::make('enable_comments')
                    ->label('Enable Comments')
                    ->default(true),
                Forms\Components\Tabs::make('Translations')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make(__('dashboard.arabic'))
                            ->schema([
                                Forms\Components\TextInput::make('main_title.ar')
                                    ->label(__('dashboard.main_title_ar'))
                                    ->required(),
                                Forms\Components\TextInput::make('sub_title.ar')
                                    ->label(__('dashboard.sub_title_ar')),
                                Forms\Components\TextInput::make('author_name.ar')
                                    ->label(__('dashboard.author_name_ar')),
                                Forms\Components\RichEditor::make('content.ar')
                                    ->label(__('dashboard.content_ar'))
                                    ->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make(__('dashboard.english'))
                            ->schema([
                                Forms\Components\TextInput::make('main_title.en')
                                    ->label(__('dashboard.main_title_en'))
                                    ->required(),
                                Forms\Components\TextInput::make('sub_title.en')
                                    ->label(__('dashboard.sub_title_en')),
                                Forms\Components\TextInput::make('author_name.en')
                                    ->label(__('dashboard.author_name_en')),
                                Forms\Components\RichEditor::make('content.en')
                                    ->label(__('dashboard.content_en'))
                                    ->required(),
                            ]),
                    ])->columnSpanFull(),
                Forms\Components\TextInput::make('slug')
                    ->label(__('dashboard.slug'))
                    ->disabled()
                    ->dehydrated(false),
                Forms\Components\DateTimePicker::make('published_at')
                    ->label(__('dashboard.published_at')),
                Forms\Components\FileUpload::make('image')
                    ->label(__('dashboard.image'))
                    ->image()
                    ->directory('blogs')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('banner')
                    ->label(__('dashboard.blog_details_banner') ?? 'Details Banner')
                    ->image()
                    ->directory('blogs/banners')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label(__('dashboard.image')),
                Tables\Columns\TextColumn::make('main_title')->label(__('dashboard.title'))->searchable(),
                Tables\Columns\TextColumn::make('category.name')->label(__('dashboard.category_id'))->sortable(),
                Tables\Columns\TextColumn::make('published_at')->label(__('dashboard.published_at'))->dateTime()->sortable(),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
