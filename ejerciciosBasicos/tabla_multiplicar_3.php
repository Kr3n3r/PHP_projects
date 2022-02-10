<?php
echo "<table>";
for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";
    if ($i%2==0) {
        echo "<th>5*$i</th>";
        $resultado=5*$i;
        echo "<th>$resultado</th>";
    }
    else {
        echo "<td>5*$i</td>";
        $resultado=5*$i;
        echo "<td>$resultado</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>