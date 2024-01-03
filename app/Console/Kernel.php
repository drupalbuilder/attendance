<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\whatsapp::class,
        Commands\whatsappCallingVerify::class,
        Commands\whatsappCallingVerifyPerHour::class,
        Commands\whatsappCallingVerifyPerDay::class,
        Commands\WhatsappReminder::class,
        Commands\CustomerCall::class,
        Commands\FeedbackSubmission::class,
        Commands\ReminderFeedbackSubmission::class,
        commands\FollowUpFeedback::class,
        commands\WhatsappReminderAfterSevenDays::class,
        commands\SegmentScheduler::class,
        commands\LeadUpdate::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('whatsapp:send')->everyMinute();
       // $schedule->command('whatsapp:verify')->everyMinute();
       // $schedule->command('whatsapp:verifyPerHour')->hourly();
       // $schedule->command('whatsapp:verifyPerDay')->daily();
        // $schedule->command('feedback:submission')->hourly();
        // $schedule->command('reminderfeedback:submission')->hourly();
        // $schedule->command('followup:feedback')->hourly();
        // $schedule->command('whatsapp:reminder-msg')->hourly();
        // $schedule->command('reminder:seven-days')->hourly();
        // $schedule->command('customer:call')->hourly();
        
       // $schedule->command('crm:update')->everyMinute();
        // $schedule->command('notification:send')->dailyAt('9:00');
        $schedule->command('send:EmiPlanEmail')->dailyAt('12:00');
        $schedule->command('send:EmiPlanEmail')->dailyAt('15:00');
       // $schedule->command('segment:scheduler')->everyMinute();
       // $schedule->command('lead:update')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
