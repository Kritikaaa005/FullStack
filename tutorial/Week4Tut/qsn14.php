

<?php
$data = [
  "username" => "forbidden",
  "role" => "reader",
  "active" => true
];

echo json_encode($data, JSON_PRETTY_PRINT);
?>