<?php

namespace Fomvasss\ItsLte\Http\Middleware;

use Closure;
use function GuzzleHttp\Psr7\build_query;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApplyRequestOptions
{
    /** @var string */
    protected $nextDestinationUrlSessionKey = 'destination';

    /** @var array */
    protected $enabledOptionKeys = [
        'per_page' => 13,
    ];

    /** @var array */
    protected $toggleKeysValues = [
        'product_group_collapse' => ['in', 'on'], // first item - is default, max items = 2
        'lte_sidebar_collapse' => [0, 1],
        'show_products_type_list' => [0, 1],
    ];

    /** @var array */
    protected $indexPageRouteNamesForBackAction = [
        //'admin.products.index',
        '*.index'
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
        // установить конфиги
        $this->beforeHandle($request);

        // установить Destination URL
        if ($request->has($this->nextDestinationUrlSessionKey) && $request->get($this->nextDestinationUrlSessionKey)) {
            $request->session()->put($this->nextDestinationUrlSessionKey, $request->get($this->nextDestinationUrlSessionKey));
        }

        // установить Back URL
        if ($request->method() === 'GET' && $request->route() && ! $request->expectsJson()) {
            $this->putIndexPageRouteNamesForBackAction($request);

            $this->putEnabledOptionKeys($request);

            if ($response = $this->toggleKeysValues($request)) {
                return $response;
            }
        }

        $response = $next($request);
        
        $this->afterHandle($response);
        
        return $next($request);
    }

    /**
     * @param $request
     */
    protected function putIndexPageRouteNamesForBackAction(Request $request)
    {
        if (Str::is($this->indexPageRouteNamesForBackAction, $request->route()->getName())) {
            //$request->session()->put($request->route()->getName(), $request->fullUrlWithQuery([
            //    'product_group_collapse' => null,
            //]));
            $request->session()->put($request->route()->getName(), $request->fullUrl());
        }
    }

    /**
     * @param $request
     */
    protected function putEnabledOptionKeys(Request $request)
    {
        foreach ($this->enabledOptionKeys as $key => $defaultValue) {
            if ($request->has($key)) {
                $request->session()->put($key, $request->get($key));
            }

            if (! $request->session()->has($key) && isset($defaultValue)) {
                $request->session()->put($key, $defaultValue);
            }
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|null
     */
    protected function toggleKeysValues(Request $request)
    {
        foreach ($this->toggleKeysValues as $key => $toggles) {
            if (is_array($toggles) && count($toggles) > 1) {
                if ($request->has($key) ) {
                    $oldToggleKey = array_search($request->session()->get($key), $toggles);
                    $newToggleValue = $oldToggleKey == 0 ? $toggles[1] : $toggles[0];

                    $request->session()->put($key, $newToggleValue);

                    return redirect($request->fullUrlWithQuery([
                        $key => null,
                    ]));
                } elseif (! $request->session()->has($key)) {
                    $newToggleValue = $toggles[0];

                    $request->session()->put($key, $newToggleValue);
                }
            }
        }

        return null;
    }

    /**
     * Set custom configs.
     *
     * @param Request $request
     */
    public function beforeHandle(Request $request)
    {
        // \Config::set('key', 'value');
    }

    public function afterHandle($request)
    {
        //...
    }
}
