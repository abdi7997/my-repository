<?php
include '../config/db.php';
$result = $conn->query("SELECT magaalo, SUM(shidaalka_litres) as total FROM fuel GROUP BY magaalo");
?>
<h2>Fuel Reports by Magaalo</h2>
<table border="1">
<tr><th>Magaalo</th><th>Total Litres</th></tr>
<?php while($row = $result->fetch_assoc()): ?>
<tr><td><?= $row['magaalo'] ?></td><td><?= $row['total'] ?></td></tr>
<?php endwhile; ?>
</table>
