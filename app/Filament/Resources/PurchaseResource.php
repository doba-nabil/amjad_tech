<?php
namespace App\Filament\Resources;

use App\Filament\Resources\PurchaseResource\Pages;
use App\Models\Purchase;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PurchaseResource extends Resource
{
    protected static ?string $model = Purchase::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function getModelLabel(): string { return __('dashboard.purchase'); }
    public static function getPluralModelLabel(): string { return __('dashboard.purchases'); }
    public static function getNavigationGroup(): ?string { return __('dashboard.content'); }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('dashboard.name'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->label(__('dashboard.phone'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('package_id')
                    ->label(__('dashboard.package'))
                    ->relationship('package', 'name')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->label(__('dashboard.status'))
                    ->options([
                        'active' => 'Active',
                        'expired' => 'Expired',
                        'cancelled' => 'Cancelled',
                    ])
                    ->default('active')
                    ->required(),
                Forms\Components\DatePicker::make('purchase_date')
                    ->label(__('dashboard.purchase_date'))
                    ->required(),
                Forms\Components\DatePicker::make('expiration_date')
                    ->label(__('dashboard.expiration_date')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label(__('dashboard.name'))->searchable(),
                Tables\Columns\TextColumn::make('phone')->label(__('dashboard.phone'))->searchable(),
                Tables\Columns\TextColumn::make('package.name')->label(__('dashboard.package')),
                Tables\Columns\TextColumn::make('status')->label(__('dashboard.status'))->badge(),
                Tables\Columns\TextColumn::make('purchase_date')->label(__('dashboard.purchase_date'))->date()->sortable(),
                Tables\Columns\TextColumn::make('expiration_date')->label(__('dashboard.expiration_date'))->date()->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPurchases::route('/'),
            'create' => Pages\CreatePurchase::route('/create'),
            'edit' => Pages\EditPurchase::route('/{record}/edit'),
        ];
    }
}
