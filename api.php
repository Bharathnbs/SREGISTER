<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo json_encode(['name' => 'bharath', 'age' => 25]);
} else {
    echo json_encode(['name' => 'adi', 'age' => 25]);
}

?>