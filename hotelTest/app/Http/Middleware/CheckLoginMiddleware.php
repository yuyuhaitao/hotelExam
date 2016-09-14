<?php
namespace App\Http\Middleware;

use Closure;
use Cookie;
use Redirect;
use Illuminate\Contracts\Routing\Middleware;

/**
 * 检查用户登陆中间件
 * @author Robin
 *
 */
class OldMiddleware {

    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        die;
        if ($request->input('age') < 200)
        {
            return redirect('home');
        }

        return $next($request);
    }

}

?>