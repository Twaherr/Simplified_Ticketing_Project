<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'ticketing_system');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get event_id from URL
$event_id = isset($_GET['event_id']) ? intval($_GET['event_id']) : 0;

// Fetch event details (including price)
$sql = "SELECT * FROM events WHERE id = $event_id";
$result = $conn->query($sql);

// Check if event exists
if ($result && $result->num_rows > 0) {
    $event = $result->fetch_assoc();
    $event_name = $event['name'];
    $event_date = $event['date'];
    $ticket_price = $event['price']; // Ticket price
} else {
    echo "<p style='color: red; text-align: center;'>Error: Event not found.</p>";
    exit; // Stop further execution if event not found
}

// Fetch available seats for the event
$sql = "SELECT * FROM seats WHERE event_id = $event_id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Selection</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('images/selection_background.jpeg'); /* Set your background image */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            color: #fff;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
            border-radius: 10px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .seat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(40px, 1fr));
            gap: 10px;
            justify-items: center;
            margin-bottom: 20px;
        }
        .seat {
            width: 30px;
            height: 30px;
            background-color: #28a745; /* Green for available seats */
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 3px;
            cursor: pointer;
        }
        .seat.booked {
            background-color: #dc3545; /* Red for booked seats */
            cursor: not-allowed;
        }
        .seat.selected {
            background-color: #ffc107; /* Yellow for selected seats */
        }
        .seat:hover:not(.booked) {
            opacity: 0.8;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .event-info {
            text-align: center;
            margin-bottom: 20px;
        }
        .event-info p {
            font-size: 18px;
            margin: 5px;
        }
    </style>
    <script>
        function toggleSeatSelection(seat) {
            if (!seat.classList.contains('booked')) {
                seat.classList.toggle('selected');
            }
        }

        function confirmBooking() {
            const selectedSeats = document.querySelectorAll('.seat.selected');
            if (selectedSeats.length === 0) {
                alert('Please select at least one seat.');
                return;
            }
            let seatNumbers = [];
            selectedSeats.forEach(seat => {
                seatNumbers.push(seat.textContent);
            });
            document.getElementById('selectedSeatsInput').value = seatNumbers.join(',');
            document.getElementById('seatForm').submit();
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Seat Selection for <?php echo $event_name; ?></h1>
        <div class="event-info">
            <p><strong>Date:</strong> <?php echo $event_date; ?></p>
            <p><strong>Price:</strong> $<?php echo number_format($ticket_price, 2); ?> per ticket</p>
        </div>

        <div class="seat-grid">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $seat_class = $row['is_booked'] ? 'seat booked' : 'seat';
                    echo "<div class='$seat_class' onclick='toggleSeatSelection(this)'>" . $row['seat_number'] . "</div>";
                }
            } else {
                echo "<p>No seats available for this event.</p>";
            }
            ?>
        </div>

        <form id="seatForm" method="POST" action="">
            <input type="hidden" id="selectedSeatsInput" name="selected_seats">
            <button type="button" class="btn" onclick="confirmBooking()">Confirm Booking</button>
        </form>

        <?php
        // Handle seat booking submission
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['selected_seats'])) {
            $selected_seats = explode(',', $_POST['selected_seats']);
            
            // Reconnect to database to update seat bookings
            $conn = new mysqli('localhost', 'root', '', 'ticketing_system');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Mark selected seats as booked
            foreach ($selected_seats as $seat_number) {
                $seat_number = $conn->real_escape_string($seat_number);
                $update_sql = "UPDATE seats SET is_booked = 1 WHERE event_id = $event_id AND seat_number = '$seat_number'";
                $conn->query($update_sql);
            }

            // Calculate total cost
            $total_cost = count($selected_seats) * $ticket_price;

            echo "<p style='color: #28a745; text-align: center;'>Your booking has been confirmed for seats: " . implode(', ', $selected_seats) . ".</p>";
            echo "<p style='color: #28a745; text-align: center;'>Total cost: $" . number_format($total_cost, 2) . "</p>";

            // Close the connection
            $conn->close();
        }
        ?>
    </div>
</body>
</html>