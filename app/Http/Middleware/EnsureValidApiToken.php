<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class EnsureValidApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $header = $request->header('Authorization');

        //header must be "Bearer <token>"
        if (!$header || !str_starts_with($header, 'Bearer ')) {
            return response()->json(['code' => 401, 'error' => 'Missing bearer token'], 401);
        }

        // strip "Bearer "
        $plainToken = substr($header, 7);

        // find matching token record (hash comparison handled by Sanctum)
        $token = PersonalAccessToken::findToken($plainToken);

        if (!$token) {
            return response()->json(['code' => 401, 'error' => 'Invalid token'], 401);
        }

        /// check expiry; delete immediately if stale
        if ($token->expires_at && $token->expires_at->isPast()) {
            $token->delete();
            return response()->json(['code' => 401, 'error' => 'Token expired'], 401);
        }

        // bind the authenticated user to the request
        $request->setUserResolver(fn() => $token->tokenable);

        return $next($request);
    }
}