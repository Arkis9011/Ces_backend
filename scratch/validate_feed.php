<?php

use App\Models\Post;
use Illuminate\Support\Facades\View;

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$posts = Post::orderBy('date_publication', 'desc')
    ->orderBy('created_at', 'desc')
    ->take(20)
    ->get();

try {
    $content = View::make('public.feed', compact('posts'))->render();
    
    // Test XML validity
    libxml_use_internal_errors(true);
    $xml = simplexml_load_string($content);
    
    if ($xml === false) {
        echo "XML Errors found:\n";
        foreach(libxml_get_errors() as $error) {
            echo "\t" . $error->message . " on line " . $error->line . "\n";
        }
    } else {
        echo "XML is valid.\n";
    }
} catch (\Exception $e) {
    echo "Exception: " . $e->getMessage() . "\n";
    echo "Trace: " . $e->getTraceAsString() . "\n";
}
