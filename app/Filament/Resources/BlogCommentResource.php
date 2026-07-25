<?php
namespace App\Filament\Resources;

use App\Filament\Resources\BlogCommentResource\Pages;
use App\Models\BlogComment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BlogCommentResource extends Resource
{
    protected static ?string $model = BlogComment::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    public static function getModelLabel(): string { return __('dashboard.blog_comment'); }
    public static function getPluralModelLabel(): string { return __('dashboard.blog_comments'); }
    public static function getNavigationGroup(): ?string { return __('dashboard.content'); }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('blog_id')
                    ->label(__('dashboard.blog'))
                    ->relationship('blog', 'main_title')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label(__('dashboard.name'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label(__('dashboard.email'))
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_approved')
                    ->label(__('dashboard.is_approved'))
                    ->required(),
                Forms\Components\Textarea::make('comment')
                    ->label(__('dashboard.comment'))
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label(__('dashboard.name'))->searchable(),
                Tables\Columns\TextColumn::make('email')->label(__('dashboard.email'))->searchable(),
                Tables\Columns\IconColumn::make('is_approved')->label(__('dashboard.is_approved'))->boolean(),
                Tables\Columns\TextColumn::make('created_at')->label(__('dashboard.created_at'))->dateTime()->sortable(),
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
            'index' => Pages\ListBlogComments::route('/'),
            'edit' => Pages\EditBlogComment::route('/{record}/edit'),
        ];
    }
}
