<?php

namespace App\Console\Commands;

use App\Mail\AllTodo;
use App\Models\Entreprise;
use Illuminate\Console\Command;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;

class DailyMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan command to send daily messages';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $entreprise = Entreprise::all();
        foreach ($entreprise as $entreprise) {
            $taches= $entreprise->taches()->where('statut', '=', '0')->get();
            Mail::to( $entreprise->email_de_la_personne_de_contact)->send(new AllTodo($taches));
        }
    }
}
