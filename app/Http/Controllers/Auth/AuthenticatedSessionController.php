<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        // Log::debug($this->getRenderFilePath());
        return Inertia::render($this->getRenderFilePath(), [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route($this->getRedirectDashboard(), absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route($this->getRedirectLogin()));
    }

    private function getRedirectDashboard()
    {
        return request()->is('staff/*') ? 'staff.dashboard' : 'enduser.dashboard';
    }

    private function getRedirectLogin()
    {
        return request()->is('staff/*') ? 'staff.login' : 'enduser.login';
    }

    private function getRenderFilePath()
    {
        return request()->is('staff/*') ? 'Staff/Auth/Login' : 'Enduser/Auth/Login';
    }
}
