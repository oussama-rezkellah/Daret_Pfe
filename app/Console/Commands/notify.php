<?php

namespace App\Console\Commands;

use App\Models\Daret;
use App\Models\Notification;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Console\Command;

class notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification every week/month';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $darets = Daret::where('type_periode', 'week')->get();

        foreach ($darets as $daret) {
            $now = Carbon::now();
            $FinalDate = Carbon::parse($daret->date_final);
            if ($now->equalTo($FinalDate)) {
                $daret->etat = 2;
            } else {
                if ($daret->etat == 1) {
                    // Create monthly notifications
                    $notifyDate = Carbon::parse($daret->date_last);
                    $now = Carbon::now();
                    if ($notifyDate->diffInWeeks($now) >= 1) {
                        $daret->date_last = now();
                        $daret->curent_tour++;
                        $daret->save();
                        foreach ($daret->membre as $memb) {
                            $tour = Tour::where('membre_id', $memb->id)->where('tour', $daret->curent_tour)->get();
                            if ($tour->etat == "not_taked") {
                                Notification::create([
                                    'user_id' => $memb->user_id,
                                    'daret_id' => $memb->daret_id,

                                    'content' => 'Congrats it s your turn',
                                    // ...
                                ]);
                            } else if ($tour->etat == "not_payed") {
                                Notification::create([
                                    'user_id' => $memb->user_id,
                                    'daret_id' => $memb->daret_id,

                                    'content' => 'It s time to pay',
                                    // ...
                                ]);
                            }
                        }
                    }
                }
            }
        }

        $darets = Daret::where('type_periode', 'month')->get();

        foreach ($darets as $daret) {
            $now = Carbon::now();
            $FinalDate = Carbon::parse($daret->date_final);
            if ($now->equalTo($FinalDate)) {
                $daret->etat = 2;
            } else {
                if ($daret->etat == 1) {
                    // Create monthly notifications
                    $notifyDate = Carbon::parse($daret->date_last);
                    $now = Carbon::now();
                    if ($notifyDate->diffInMonths($now) >= 1) {
                        $daret->date_last = now();
                        $daret->curent_tour++;
                        $daret->save();
                        foreach ($daret->membre as $memb) {
                            $tour = Tour::where('membre_id', $memb->id)->where('tour', $daret->curent_tour)->get();
                            if ($tour->etat == "not_taked") {
                                Notification::create([
                                    'user_id' => $memb->user_id,
                                    'daret_id' => $memb->daret_id,

                                    'content' => 'Congrats it s your turn',
                                    // ...
                                ]);
                            } else if ($tour->etat == "not_payed") {
                                Notification::create([
                                    'user_id' => $memb->user_id,
                                    'daret_id' => $memb->daret_id,
                                    'content' => 'It s time to pay',
                                    // ...
                                ]);
                            }
                        }
                    }
                }
            }
        }
    }
}
