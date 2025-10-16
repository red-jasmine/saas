<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use RedJasmine\FilamentArticle\FilamentArticlePlugin;
use RedJasmine\FilamentCard\FilamentCardPlugin;
use RedJasmine\FilamentCommunity\FilamentCommunityPlugin;
use RedJasmine\FilamentCoupon\FilamentCouponPlugin;
use RedJasmine\FilamentLogistics\FilamentLogisticsPlugin;
use RedJasmine\FilamentOrder\FilamentOrderPlugin;
use RedJasmine\FilamentProduct\FilamentProductPlugin;
use RedJasmine\FilamentUser\FilamentUserPlugin;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain;

class AdminPanelProvider extends \RedJasmine\FilamentCore\Panel\PanelProvider
{

    public function panel(Panel $panel) : Panel
    {
        $panel = parent::panel($panel);
        return $panel
            ->colors([
                'primary' => Color::Amber,
            ])
            //->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            //->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            //->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->authGuard('admin-panel')
            ->middleware([
                'universal',
                InitializeTenancyByDomainOrSubdomain::class,
                //PreventAccessFromCentralDomains::class,
            ], isPersistent: true)
            ->sidebarWidth('10rem')
            ->plugins([
                // FilamentUserPlugin::make(),
                FilamentProductPlugin::make(),
                FilamentOrderPlugin::make(),
                FilamentCardPlugin::make(),
                FilamentCommunityPlugin::make(),
                FilamentArticlePlugin::make(),
                FilamentLogisticsPlugin::make(),
                FilamentCouponPlugin::make(),


            ]);
    }

}
