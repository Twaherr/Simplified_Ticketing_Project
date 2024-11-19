
<?php
include 'config.php'; 


$result = $conn->query("SELECT * FROM events");


echo "<ul>";


while ($row = $result->fetch_assoc()) {
    
    echo "<li>
            <a href='seat_selection.php?event_id=" . $row['id'] . "'>" . $row['name'] . "</a>
            <span> - Price: $" . number_format($row['price'], 2) . "</span>  <!-- Display the price here -->
          </li>";
}


echo "</ul>";
?>
