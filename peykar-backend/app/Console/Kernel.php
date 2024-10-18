<?php

namespace App\Console;

use App\Models\User;
use App\Mail\Reminder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $users = User::all();
            $tokens = DB::table('personal_access_tokens')->get();

            foreach ($users as $user) {
                $userId = $user->id;

                foreach ($tokens as $token) {
                    $tokenableId = $token->tokenable_id;

                    if ($tokenableId == $userId) {
                        echo "User ID: $userId, Token ID: $tokenableId\n ";
                    } else {
                        if (!$user->reminder_sent) {

                            Mail::to($user->email)->send(new Reminder());

                            $user->update(['reminder_sent' => true]);
                        } else {
                            $user->delete();
                        }
                    }
                }
            }
        })->monthlyOn(1, '12:00');
    }

    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
