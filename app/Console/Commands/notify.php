<?php

namespace App\Console\Commands;

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
        $darets = Daret::where('type', 'week')->get();

        foreach ($darets as $daret) {
            $now = Carbon::now();
            $FinalDate = Carbon::parse($daret->date_final);
            if($now->equalTo($FinalDate)){
                $daret->etat = 2;
            
    }else{
        if($daret->etat == 1){
        // Create monthly notifications
        $notifyDate = Carbon::parse($daret->date_last);
        $now = Carbon::now();
    if ($notifyDate->diffInWeeks($now) >= 1){
        $daret->date_last=now();
        $daret->curent_tour++;
        $daret->save();
    foreach ($daret->membres() as $member){
        $tour = Tour::where('membre_id', $member->id)->where('tour', $daret->curent_tour)->get();
        if($tour->etat == "not_taked"){
                Notification::create([
                'user_id' => $member->user_id,
                'contenu' => 'Congrats it s your turn',
                // ...
                            ]);}
        else if($tour->etat == "not_payed"){
            Notification::create([
                'user_id' => $member->user_id,
                'contenu' => 'It s time to pay',
                // ...
                            ]);}					

    }
}
}
    }
    }

    $darets = Daret::where('type', 'month')->get();

        foreach ($darets as $daret) {
            $now = Carbon::now();
            $FinalDate = Carbon::parse($daret->date_final);
            if($now->equalTo($FinalDate)){
                $daret->etat = 2;
            
    }else{
        if($daret->etat == 1){
        // Create monthly notifications
        $notifyDate = Carbon::parse($daret->date_last);
        $now = Carbon::now();
    if ($notifyDate->diffInMonths($now) >= 1){
        $daret->date_last=now();
        $daret->curent_tour++;
        $daret->save();
    foreach ($daret->membres() as $member){
        $tour = Tour::where('membre_id', $member->id)->where('tour', $daret->curent_tour)->get();
        if($tour->etat == "not_taked"){
                Notification::create([
                'user_id' => $member->user_id,
                'contenu' => 'Congrats it s your turn',
                // ...
                            ]);}
        else if($tour->etat == "not_payed"){
            Notification::create([
                'user_id' => $member->user_id,
                'contenu' => 'It s time to pay',
                // ...
                            ]);}					

    }
}
}
    }
    }
    
    }
}
