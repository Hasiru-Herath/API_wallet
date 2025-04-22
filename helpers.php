<?php
function loadData($filePath) {
    if (!file_exists($filePath)) file_put_contents($filePath, json_encode([]));
    return json_decode(file_get_contents($filePath), true);
}

function saveData($filePath, $data) {
    file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
}
?>
