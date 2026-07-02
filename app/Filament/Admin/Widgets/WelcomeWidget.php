<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\Widget;

class WelcomeWidget extends Widget
{
    protected string $view = 'filament.admin.widgets.welcome-widget';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = -2;

    public static function canView(): bool
    {
        return auth()->user()?->hasRole('Colaborador') ?? false;
    }
}
