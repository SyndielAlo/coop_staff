<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Log;

class LoginSuccess
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;

        $logData = [
            'user_id' => $user->id,
            'name' => $user->name,
            'ip_address' => request()->ip(),
            'mac_address' => $this->getMacAddress(request()->ip()), // Implement this method
            'login_time' => now(),
        ];

        // Save log data to your logs table
        \DB::table('logs')->insert($logData);
    }

    /**
     * Get the MAC address from an IP address (Linux specific example).
     *
     * @param  string  $ip
     * @return string|null
     */
    private function getMacAddress($ip)
    {
        // Note: Retrieving MAC address from IP address is not straightforward in web environments.
        // The following is a placeholder implementation and may not work in all scenarios.
        
        // This is a sample command to get the MAC address on a Linux system.
        // You may need to adapt this based on your server environment.
        $output = shell_exec("arp -n $ip");
        $lines = explode("\n", $output);

        // Assuming the MAC address is present in the first line after the IP address.
        if (isset($lines[1])) {
            $parts = preg_split('/\s+/', trim($lines[1]));
            if (isset($parts[2])) {
                return $parts[2];
            }
        }

        return null;
    }
}
