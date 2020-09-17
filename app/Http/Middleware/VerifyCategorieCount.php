<?php

namespace App\Http\Middleware;

use App\Category;
use Closure;

class VerifyCategorieCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Category::all()->count()==0)
           {
               session()->flash('error','you need to add catergories to be able to create a post.');
               return redirect(route('categories.create'));
           }
           
        return $next($request);
    }
}
