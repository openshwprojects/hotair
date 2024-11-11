<?php

function getEpochTimestamp() {
    return time();
}

function formatGetArguments() {
    $arguments = [];

    foreach ($_GET as $key => $value) {
        $arguments[] = "$key=$value";
    }

    return implode(';', $arguments);
}

function writeToTextFile($data) {
    $filename = 'log.txt';
    file_put_contents($filename, $data . PHP_EOL, FILE_APPEND);
}

if (!empty($_GET)) {
    $timestamp = getEpochTimestamp();

    $arguments = formatGetArguments();

    $logEntry = "$timestamp;$arguments";

    writeToTextFile($logEntry);

    echo "Data logged successfully!";
} else {
    echo "No GET parameters received.";
}
