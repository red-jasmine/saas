<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

// Route::middleware([
//     'web',
//     InitializeTenancyByDomainOrSubdomain::class,
//     PreventAccessFromCentralDomains::class,
// ])->group(function () {
//     Route::get('/', function () {
//         return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
//     });
// });
//
//
// Route::prefix('api')->middleware([
//     'api',
//     InitializeTenancyByDomainOrSubdomain::class,
//     PreventAccessFromCentralDomains::class,
// ])->group(function () {
//     \RedJasmine\Region\UI\Http\RegionRoute::api();
//     \RedJasmine\User\UI\Http\User\UserRoute::api();
//
//
//
//     Route::get('/', function () {
//         return tenant();
//     });
// });
//
