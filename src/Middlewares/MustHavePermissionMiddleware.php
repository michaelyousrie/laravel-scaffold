<?php

namespace LaravelScaffold\Middlewares;

use Closure;
use LaravelScaffold\Responses\UnauthorizedResponse;

class MustHavePermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, string $permission)
    {
        if (!$request->user()->hasPermissionTo($permission)) {
            return (new UnauthorizedResponse("You don't the permission => {$permission}"))
                ->send();
        }

        return $next($request);
    }
}
