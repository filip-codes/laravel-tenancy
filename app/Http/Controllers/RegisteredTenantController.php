<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterTenantRequest;
use App\Models\Tenant;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredTenantController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Register', [
            'central_domain' => Str::replace(['http://', 'https://'], '', config('app.url')),
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterTenantRequest $request)
    {
        $tenant = Tenant::create($request->only('company', 'domain'));
        $tenant->domains()->create(['domain' => $request->domain]);

        return Inertia::location(tenant_route($tenant->domains->first()->domain, 'tenant.login'));
    }
}
