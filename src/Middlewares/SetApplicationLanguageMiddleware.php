<?php

namespace LaravelScaffold\Middlewares;

use Closure;
use Illuminate\Support\Facades\Lang;
use LaravelScaffold\Responses\FailResponse;

class SetApplicationLanguageMiddleware
{
    protected $langs = [
        "en", "ar"
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->has('lang')) {
            if (!in_array($request->lang, $this->langs)) {
                return (new FailResponse(__("responses.unknown_language")))
                    ->send();
            }

            Lang::setLocale($request->lang);
        }

        return $next($request);
    }
}
