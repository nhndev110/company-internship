<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuthenticate
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
    // if ($request->isMethod('get') && $request->is('admin/login')) {
    //   if ($request->session()->has('user')) {
    //     return redirect()->route('admin.dashboard');
    //   }
    // }

    // if ($request->session()->has('user')) {
    //   return $next($request);
    // }

    // return redirect()->route('admin.login');
  }
}
