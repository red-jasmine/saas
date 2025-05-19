<?php

namespace App\Providers\Filament;


use BezhanSalleh\FilamentShield\Facades\FilamentShield;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\MaxWidth;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Str;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use RedJasmine\FilamentCard\FilamentCardPlugin;
use RedJasmine\FilamentOrder\FilamentOrderPlugin;
use RedJasmine\FilamentProduct\FilamentProductPlugin;
use RedJasmine\FilamentUser\FilamentUserPlugin;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;


class AdminPanelProvider extends PanelProvider
{


    public function boot() : void
    {
        FilamentShield::configurePermissionIdentifierUsing(function ($resource) {

            return Str::of($resource::getModel())
                      ->toString();

        });

    }

    public function panel(Panel $panel) : Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            //->login(Login::class)
            ->colors([
                'primary' => Color::Amber,
            ])
            ->maxContentWidth(MaxWidth::Full)
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->middleware([
                InitializeTenancyByDomainOrSubdomain::class,
                PreventAccessFromCentralDomains::class,
            ], isPersistent: true)
            ->authMiddleware([
                Authenticate::class,
            ])
            ->sidebarWidth('10rem')
            ->authGuard('admin')
            //->registration()
            ->passwordReset()
            ->emailVerification()
            ->profile()
            ->plugins([
                FilamentShieldPlugin::make(),
                FilamentUserPlugin::make(),
                FilamentProductPlugin::make(),
                FilamentOrderPlugin::make(),
                FilamentCardPlugin::make(),


            ]);
    }
}
