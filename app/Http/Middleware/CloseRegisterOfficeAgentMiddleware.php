<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Closure;

class CloseRegisterOfficeAgentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $office_agent_start_close_register = Setting::where('key', 'office_agent_start_close_register')->first()->value ?? null;
        $office_agent_end_close_register = Setting::where('key', 'office_agent_end_close_register')->first()->value ?? null;

        if ($office_agent_start_close_register && $office_agent_end_close_register) {

            $today = Carbon::now()->startOfDay();
            $office_agent_start_close_register = Carbon::parse($office_agent_start_close_register)->startOfDay();
            $office_agent_end_close_register = Carbon::parse($office_agent_end_close_register)->startOfDay();

            if ($today->gte($office_agent_start_close_register) && $today->lte($office_agent_end_close_register)) {

                abort(503,
                    "Register Office Agent Is Closed Between "
                    . $office_agent_start_close_register
                    . ' To '
                    . $office_agent_end_close_register
                );
            }
        }

        return $next($request);
    }
}
