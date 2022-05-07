<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class RoleCheck
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next)
  {
    $userId = $request->route('account');
    $logUserId = $request->user()->id;
    if ($request->user()->can('employee') && User::where('id', $userId)->where('created_user_id', $logUserId)->count() > 0) {
      return $next($request);
    } else if ($request->user()->can('admin')) {
      return $next($request);
    } else {
      abort(401, 'Unauthorized');
    }
  }
}
