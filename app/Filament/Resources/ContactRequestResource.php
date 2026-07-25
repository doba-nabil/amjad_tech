<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ContactRequestResource\Pages;
use App\Models\ContactRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactRequestResource extends Resource
{
    protected static ?string $model = ContactRequest::class;
    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    public static function getModelLabel(): string { return __('dashboard.contact_request'); }
    public static function getPluralModelLabel(): string { return __('dashboard.contact_requests'); }
    public static function getNavigationGroup(): ?string { return __('dashboard.site_settings'); }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('dashboard.name'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label(__('dashboard.email'))
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->label(__('dashboard.phone'))
                    ->tel()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->label(__('dashboard.status'))
                    ->options([
                        'pending' => 'Pending',
                        'read' => 'Read',
                        'resolved' => 'Resolved',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('message')
                    ->label(__('dashboard.message'))
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
                Tables\Columns\TextColumn::make('phone')->label(__('dashboard.phone'))->searchable(),
                Tables\Columns\SelectColumn::make('status')
                    ->label(__('dashboard.status'))
                    ->options([
                        'pending' => 'Pending',
                        'read' => 'Read',
                        'resolved' => 'Resolved',
                    ]),
                Tables\Columns\TextColumn::make('created_at')->label(__('dashboard.created_at'))->dateTime()->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListContactRequests::route('/'),
            'edit' => Pages\EditContactRequest::route('/{record}/edit'),
        ];
    }
}
