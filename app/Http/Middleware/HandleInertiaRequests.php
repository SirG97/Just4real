<?php

namespace App\Http\Middleware;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        $permissions = [];
        $roles = [];
        $warehouses = [];
        $userWarehouse = [];
        if(Auth::check()){
            $user = Auth::user();
            $userWarehouse = Warehouse::where('id', '=', $user->warehouse_id)->first();
            $warehouses = Warehouse::all();
            $permissions = $user->getAllPermissions()->pluck('name');
            $roles = $user->roles()->pluck('name');
        }

        return array_merge(parent::share($request), [
            'user.permissions' => $permissions,
            'user.roles' => $roles,
            'warehouses' => $warehouses,
            'userWarehouse' => $userWarehouse,
            'flash' => function () use ($request) {
                return [
                    'success' => $request->session()->get('success'),
                    'error' => $request->session()->get('error'),
                ];
            },
        ]);
    }
}
