<?php

namespace App\Console;

use App\Console\Commands\StartDaret;
use App\Models\Daret;
use App\Models\Notification;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        StartDaret::class
    ];
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // Get all groups with "mois" type
            $darets = Daret::where('type', 'mois')->get();

            foreach ($darets as $daret) {
                // Create monthly notifications
                $startedDate = Carbon::parse($daret->date_de_debut);
                $now = Carbon::now();
                if ($startedDate->diffInMonths($now) >= 1) {
                    foreach ($daret->membres as $member) {
                        $daret->curent_tour++;
                        $daret->save();
                        $tour = Tour::where('membre_id', $member->id)->where('tour', $daret->current_tour)->get();
                        if ($tour->etat == "not_taked") {
                            Notification::create([
                                'daret_id' => $daret->id,
                                'contenu' => 'Congrats it s your turn',
                                // ...
                            ]);
                        } else if ($tour->etat == "not_payed") {
                            Notification::create([
                                'daret_id' => $daret->id,
                                'contenu' => 'It s time to pay',
                                // ...
                            ]);
                        }
                    }
                }
            }
        })->daily();

        $schedule->call(function () {
            // Get all groups with "semaine" type
            $darets = Daret::where('type', 'semaine')->get();

            foreach ($darets as $daret) {
                // Create monthly notifications
                $startedDate = Carbon::parse($daret->date_de_debut);
                $now = Carbon::now();
                if ($startedDate->diffInMonths($now) >= 1) {
                    foreach ($daret->membres() as $member) {
                        $daret->curent_tour++;
                        $daret->save();
                        $tour = Tour::where('membre_id', $member->id)->where('tour', $daret->current_tour)->get();
                        if ($tour->etat == "not_taked") {
                            Notification::create([
                                'daret_id' => $daret->id,
                                'contenu' => 'Congrats it s your turn',
                                // ...
                            ]);
                        } else if ($tour->etat == "not_payed") {
                            Notification::create([
                                'daret_id' => $daret->id,
                                'contenu' => 'It s time to pay',
                                // ...
                            ]);
                        }
                    }
                }
            }
        })->daily();
    }


    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
