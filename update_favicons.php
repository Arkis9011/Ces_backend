<?php

$dir = new RecursiveDirectoryIterator(__DIR__ . '/resources/views');
$iterator = new RecursiveIteratorIterator($dir);
$files = new RegexIterator($iterator, '/^.+\.blade\.php$/i', RecursiveRegexIterator::GET_MATCH);

$faviconTag = '  <link rel="icon" type="image/png" href="{{ asset(\'assets/images/logo_header.png\') }}">';

foreach ($files as $file) {
    $filePath = $file[0];
    $content = file_get_contents($filePath);
    
    // Si le fichier contient <head> et n'a pas déjà le favicon
    if (strpos($content, '<head>') !== false && strpos($content, 'favicon') === false && strpos($content, 'logo_header.png') === false) {
        echo "Updating $filePath...\n";
        
        // On insère après <title>...</title> ou après <head> si pas de title
        if (preg_match('/<title>.*?<\/title>/i', $content, $matches)) {
            $newContent = str_replace($matches[0], $matches[0] . "\n" . $faviconTag, $content);
        } else {
            $newContent = str_replace('<head>', "<head>\n" . $faviconTag, $content);
        }
        
        file_put_contents($filePath, $newContent);
    }
}
echo "Done!\n";
