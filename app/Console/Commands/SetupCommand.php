<?php

    namespace App\Console\Commands;

    use Illuminate\Console\Command;

    class SetupCommand extends Command
    {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'app:setup {--force : Should the setup begin afresh?}';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Runs various setup commands in the required order.';

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
            $this->info("== ".getenv('APP_NAME').' Setup ==');

            $force = $this->option('force');

            $this->comment('Running Migrations...');
            if($force)
            {
                $this->call('migrate:fresh');
                $this->comment('Seeding Database...');
                $this->call('db:seed');

                $this->comment('Generating Set Data...');
                $this->call('sets:sync');

                $this->comment('Generating Card Data...');
                $this->call('cards:sync');
            }
            else
            {
                $this->call('migrate', ['--force'=>true]);
            }


            $this->comment('Importing Card Collection...');
            $this->call('collection:sync', ['filename'=>'app/data/collection.csv']);

            $this->info("Application setup completed.");
            return 0;
        }
    }
