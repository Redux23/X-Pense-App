<?php 
require_once '../../db/connection.php';

$stmt = $connection->PDO::prepare('SELECT SUM(budget) AS value_sum FROM budget');
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $sum = $row['value_sum'];
