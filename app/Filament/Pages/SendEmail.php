<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Notifications\Notification;
use Filament\Actions\Action;
use App\Models\Purchase;
use App\Models\Subscriber;
use App\Models\Package;
use App\Mail\AdminNotificationMail;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Page implements HasForms, HasActions
{
    use InteractsWithForms;
    use InteractsWithActions;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationGroup = 'Communication';
    protected static ?string $navigationLabel = 'Send Broadcast Email';
    protected static ?string $title = 'Send Broadcast Email';

    public ?array $data = [];

    protected static string $view = 'filament.pages.send-email';

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Target Audience')
                    ->schema([
                        Select::make('target')
                            ->label('Send To')
                            ->options([
                                'active_subs'  => 'Users with Active Subscriptions',
                                'expired_subs' => 'Users with Expired Subscriptions',
                                'all_subs'     => 'All Subscribed Users',
                                'newsletter'   => 'Newsletter Subscribers',
                                'package'      => 'Specific Package Subscribers',
                                'custom'       => 'Custom Email Address',
                            ])
                            ->required()
                            ->live(),

                        Select::make('package_id')
                            ->label('Select Package')
                            ->options(Package::pluck('name', 'id'))
                            ->required()
                            ->visible(fn (\Filament\Forms\Get $get) => $get('target') === 'package'),

                        TextInput::make('custom_email')
                            ->label('Email Address')
                            ->email()
                            ->required()
                            ->visible(fn (\Filament\Forms\Get $get) => $get('target') === 'custom'),
                    ]),

                Section::make('Email Content')
                    ->schema([
                        TextInput::make('subject')
                            ->label('Email Subject')
                            ->required()
                            ->maxLength(255),

                        RichEditor::make('content')
                            ->label('Email Content')
                            ->required()
                            ->toolbarButtons([
                                'bold', 'italic', 'h2', 'h3', 'link',
                                'bulletList', 'orderedList', 'redo', 'undo',
                            ]),
                    ]),
            ])
            ->statePath('data');
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('sendEmail')
                ->label('Send Email')
                ->icon('heroicon-o-paper-airplane')
                ->color('primary')
                ->requiresConfirmation()
                ->modalHeading('Confirm Sending')
                ->modalDescription('Are you sure you want to send this email to the selected audience? This action cannot be undone.')
                ->modalSubmitActionLabel('Yes, send it')
                ->action(function () {
                    $this->sendEmail();
                }),
        ];
    }

    public function sendEmail(): void
    {
        $data = $this->form->getState();

        $target  = $data['target'];
        $subject = $data['subject'];
        $content = $data['content'];

        $emails = collect();

        switch ($target) {
            case 'active_subs':
                $emails = Purchase::where('status', 'active')->pluck('email')->unique();
                break;
            case 'expired_subs':
                $emails = Purchase::where('status', 'expired')->pluck('email')->unique();
                break;
            case 'all_subs':
                $emails = Purchase::pluck('email')->unique();
                break;
            case 'newsletter':
                $emails = Subscriber::pluck('email')->unique();
                break;
            case 'package':
                $emails = Purchase::where('package_id', $data['package_id'])
                    ->where('status', 'active')
                    ->pluck('email')
                    ->unique();
                break;
            case 'custom':
                $emails = collect([$data['custom_email']]);
                break;
        }

        if ($emails->isEmpty()) {
            Notification::make()
                ->title('No recipients found')
                ->danger()
                ->send();
            return;
        }

        foreach ($emails as $email) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                try {
                    Mail::to($email)->send(new AdminNotificationMail($subject, $content));
                } catch (\Exception $e) {
                    \Log::error('Failed to send admin email to ' . $email . ': ' . $e->getMessage());
                }
            }
        }

        $this->form->fill(); // reset form

        Notification::make()
            ->title('Emails Queued!')
            ->body('Successfully queued for ' . $emails->count() . ' recipients.')
            ->success()
            ->send();
    }
}
