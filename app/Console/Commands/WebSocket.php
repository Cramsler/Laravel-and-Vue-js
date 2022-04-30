<?php

namespace App\Console\Commands;

use App\Services\WebSockets\Chat;
use Illuminate\Console\Command;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

class WebSocket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'socket:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run web sockets server';

    /**
     * The console command answer.
     *
     * @var string
     */
    protected string $answer = 'Web sockets server was successfully run...';

    /**
     * Execute the console command.
     *
     *
     */
    public function handle()
    {
        $server = IoServer::factory(new HttpServer(new WsServer(new Chat())), 3000);
        $this->info($this->answer);
        $server->run();
    }
}
