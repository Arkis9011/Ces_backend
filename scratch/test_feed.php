<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::create('/feed', 'GET')
);
echo "Status: " . $response->getStatusCode() . "\n";
echo "Content-Type: " . $response->headers->get('Content-Type') . "\n";
echo "Start of content: " . substr($response->getContent(), 0, 100) . "\n";
if ($response->getStatusCode() != 200) {
    echo "Error Content: " . substr($response->getContent(), 0, 1000) . "\n";
}
