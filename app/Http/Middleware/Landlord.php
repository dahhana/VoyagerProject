<?php
namespace App\Http\Middleware;
use Closure;
use App\User;
use Landlord as LandlordManager;

class Landlord {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()) {
            LandlordManager::addTenant($request->user());
            LandlordManager::applyTenantScopesToDeferredModels();
        }
    }
}