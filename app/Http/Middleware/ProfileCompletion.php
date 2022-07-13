<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProfileCompletion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if (!empty($user->email) && empty($user->mobile) && empty($user->email_verified_at)) {
            return redirect()->route('customer.sales-process.profile_completion');
        }

        if (!empty($user->mobile) && empty($user->email) && empty($user->mobile_verified_at)) {
            return redirect()->route('customer.sales-process.profile_completion');
        }

        if (empty($user->first_name) || empty($user->last_name) || empty($user->national_code)) {
            return redirect()->route('customer.sales-process.profile_completion');
        }

        return $next($request);
    }
}
