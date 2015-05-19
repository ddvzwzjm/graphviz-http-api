<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo '<form name="graphviz" action="/" method="POST"><textarea name="script" cols="40" rows="15"></textarea><br><input type="submit" value="Submit"></form>';
    die;
}

if (!isset($_POST['script'])) {
    header('400 Bad request');
    die(json_encode(['error' => 'Bad request']));
}

$dotTmp = __DIR__.DIRECTORY_SEPARATOR.uniqid('dot.', true);
$pngTmp = __DIR__.DIRECTORY_SEPARATOR.uniqid('image.', true).'.png';
file_put_contents($dotTmp, $_POST['script']);

exec("dot -Tpng $dotTmp -o $pngTmp 2>&1", $output, $returnCode);


if ($returnCode != 0) {
    header('400 Bad request');
    die(json_encode(['error' => 'Invalid script', 'parseError' => $output]));
}

die(json_encode([
    'imageId' => basename($pngTmp),
    'parserOutput' => $output
]));

