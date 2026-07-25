<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

    public static function getModelLabel(): string { return __('dashboard.project'); }
    public static function getPluralModelLabel(): string { return __('dashboard.projects'); }
    public static function getNavigationGroup(): ?string { return __('dashboard.portfolio'); }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->label(__('dashboard.category_id'))
                    ->relationship('category', 'name')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Section::make('Client Details')
                    ->schema([
                        Forms\Components\TextInput::make('client_name')
                            ->label('Client Name'),
                        Forms\Components\TextInput::make('company_name')
                            ->label('Company Name'),
                        Forms\Components\TextInput::make('location')
                            ->label('Location'),
                        Forms\Components\TextInput::make('duration')
                            ->label('Duration'),
                        Forms\Components\DatePicker::make('project_date')
                            ->label('Project Date'),
                    ])->columns(2),
                Forms\Components\Tabs::make('Translations')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make(__('dashboard.arabic'))
                            ->schema([
                                Forms\Components\TextInput::make('name.ar')
                                    ->label(__('dashboard.name_ar'))
                                    ->required(),
                                Forms\Components\RichEditor::make('description.ar')
                                    ->label(__('dashboard.description_ar')),
                                Forms\Components\RichEditor::make('client_needs.ar')
                                    ->label('Client Needs (AR)'),
                                Forms\Components\RichEditor::make('working_process.ar')
                                    ->label('Working Process (AR)'),
                                Forms\Components\RichEditor::make('check_and_launch.ar')
                                    ->label('Check & Launch (AR)'),
                            ]),
                        Forms\Components\Tabs\Tab::make(__('dashboard.english'))
                            ->schema([
                                Forms\Components\TextInput::make('name.en')
                                    ->label(__('dashboard.name_en'))
                                    ->required(),
                                Forms\Components\RichEditor::make('description.en')
                                    ->label(__('dashboard.description_en')),
                                Forms\Components\RichEditor::make('client_needs.en')
                                    ->label('Client Needs (EN)'),
                                Forms\Components\RichEditor::make('working_process.en')
                                    ->label('Working Process (EN)'),
                                Forms\Components\RichEditor::make('check_and_launch.en')
                                    ->label('Check & Launch (EN)'),
                            ]),
                    ])->columnSpanFull(),
                Forms\Components\FileUpload::make('main_image')
                    ->label(__('dashboard.main_image'))
                    ->image()
                    ->directory('projects'),
                Forms\Components\FileUpload::make('project_banner')
                    ->label(__('dashboard.project_banner'))
                    ->image()
                    ->directory('projects'),
                Forms\Components\FileUpload::make('company_banner')
                    ->label(__('dashboard.company_banner'))
                    ->image()
                    ->directory('projects'),
                Forms\Components\FileUpload::make('client_banner')
                    ->label(__('dashboard.client_banner'))
                    ->image()
                    ->directory('projects'),
                Forms\Components\SpatieMediaLibraryFileUpload::make('sub_images')
                    ->label(__('dashboard.sub_images'))
                    ->collection('sub_images')
                    ->multiple()
                    ->acceptedFileTypes(['image/*', 'video/*'])
                    ->maxFiles(10)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('main_image')->label(__('dashboard.main_image')),
                Tables\Columns\TextColumn::make('name')->label(__('dashboard.name'))->searchable(),
                Tables\Columns\TextColumn::make('category.name')->label(__('dashboard.category_id'))->sortable(),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
