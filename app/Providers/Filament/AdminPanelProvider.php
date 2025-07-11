<?php

namespace App\Providers\Filament;


use Filament\Panel;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\MaxWidth;
use RedJasmine\FilamentArticle\FilamentArticlePlugin;
use RedJasmine\FilamentCard\FilamentCardPlugin;
use RedJasmine\FilamentCommunity\FilamentCommunityPlugin;
use RedJasmine\FilamentCoupon\FilamentCouponPlugin;
use RedJasmine\FilamentLogistics\FilamentLogisticsPlugin;
use RedJasmine\FilamentOrder\FilamentOrderPlugin;
use RedJasmine\FilamentProduct\FilamentProductPlugin;
use RedJasmine\FilamentUser\FilamentUserPlugin;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;


class AdminPanelProvider extends \RedJasmine\FilamentAdmin\AdminPanelProvider
{


    public function panel(Panel $panel) : Panel
    {
        $panel = parent::panel($panel);
        return $panel
            ->colors([
                'primary' => Color::Amber,
            ])
            ->maxContentWidth(MaxWidth::Full)
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->middleware([
                'universal',
                InitializeTenancyByDomainOrSubdomain::class,
                //PreventAccessFromCentralDomains::class,
            ], isPersistent: true)
            ->sidebarWidth('10rem')
            ->plugins([
                FilamentUserPlugin::make(),
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
