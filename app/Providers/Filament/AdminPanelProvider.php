<?php

namespace App\Providers\Filament;

use BezhanSalleh\LanguageSwitch\LanguageSwitch;
use Closure;
use Filament\Panel;
use Filament\Support\Colors\Color;
use RedJasmine\FilamentAddress\FilamentAddressPlugin;
use RedJasmine\FilamentArticle\FilamentArticlePlugin;
use RedJasmine\FilamentCard\FilamentCardPlugin;
use RedJasmine\FilamentCommunity\FilamentCommunityPlugin;
use RedJasmine\FilamentCore\Pages\EmojiIconsPage;
use RedJasmine\FilamentCoupon\FilamentCouponPlugin;
use RedJasmine\FilamentLogistics\FilamentLogisticsPlugin;
use RedJasmine\FilamentOrder\FilamentOrderPlugin;
use RedJasmine\FilamentProduct\FilamentProductPlugin;
use RedJasmine\FilamentRegion\FilamentRegionPlugin;

class AdminPanelProvider extends \RedJasmine\FilamentCore\Panel\PanelProvider
{


    public function panel(Panel $panel) : Panel
    {
        $panel
            ->id('admin')
            ->path('admin');

        static::configure($panel);

        return $panel
            ->brandName('RedJasmineShop')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->authGuard('admin-panel')
            ->pages([
            ])
            ->plugins([
                // FilamentUserPlugin::make(),
               FilamentProductPlugin::make(),
                //FilamentOrderPlugin::make(),
                //FilamentCardPlugin::make(),
                //FilamentCommunityPlugin::make(),
                //FilamentArticlePlugin::make(),
                //FilamentLogisticsPlugin::make(),
                //FilamentCouponPlugin::make(),
                //FilamentRegionPlugin::make(),
                //FilamentMarketPlugin::make(),
                //FilamentTaxPlugin::make(),
                //FilamentAddressPlugin::make(),

            ]);
    }


    public function boot(): void
    {
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch->locales(['zh_CN','en']); // also accepts a closure
        });
    }
}
