<?php

namespace LaravelScaffold\Middlewares;

use Closure;
use LaravelScaffold\Responses\UnauthorizedResponse;

class MustOwnMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, string $requestElement, string $key = 'user_id')
    {
        if ($request->$requestElement->$key != $request->user()->$id) {
            return (new UnauthorizedResponse(__("scaffold:errors.doesnt_belong_to_user")))
                ->send();
        }

        return $next($request);
    }
}
