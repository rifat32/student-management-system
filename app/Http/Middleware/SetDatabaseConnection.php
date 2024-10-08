<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SetDatabaseConnection
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
        error_log("not auth");
        Log::info("message");
        if (env("SELF_DB") == true) {


                $businessId = request()->input("business_id"); // Adjust this according to how you retrieve the business ID

                if (!empty($businessId)) {
                    // Fetch the database credentials (for example from a Business model or configuration)
                    $business = DB::table('businesses')->where('id', $businessId)->first();

                    if ($business) {
                        $databaseName = 'svs_business_' . $businessId;
                        $adminUser = env('DB_USERNAME', 'root'); // Admin user with privileges
                        $adminPassword = env('DB_PASSWORD', '');

                        // Dynamically set the default database connection configuration

                        Config::set('database.connections.mysql.database', $databaseName);
                        Config::set('database.connections.mysql.username', $adminUser);
                        Config::set('database.connections.mysql.password', $adminPassword);

                        // Reconnect to the database using the updated configuration
                        DB::purge('mysql');
                        DB::reconnect('mysql');

                    } else {
                        return response()->json([
                            "message" => "invalid business id"
                           ],409);
                    }
                } else {
                   return response()->json([
                    "message" => "invalid business id"
                   ],409);
                }


        }

        return $next($request);
    }
}
