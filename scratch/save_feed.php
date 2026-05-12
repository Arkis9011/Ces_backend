<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::create('/feed', 'GET')
);
file_put_contents(__DIR__.'/full_feed.xml', $response->getContent());
echo "Full feed saved to scratch/full_feed.xml\n";
