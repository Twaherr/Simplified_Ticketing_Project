<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Ticketing System</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('images/main_background.jpg'); /* Background image */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            color: #fff;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #000; /* Black font for the heading */
            font-weight: bold; /* Bold text for heading */
            font-size: 36px; /* Larger font size for header */
        }
        p {
            text-align: center;
            color: #000; /* Black font for the description */
            font-weight: bold; /* Bold text for the description */
            font-size: 18px; /* Slightly larger font for description */
        }
        
        /* New description section for event booking system */
        .description-container {
            text-align: center;
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background for description */
            padding: 30px;
            margin: 20px;
            border-radius: 10px;
        }
        .description-container h2 {
            font-size: 28px;
            margin-bottom: 10px;
            color: #ffcc00; /* Gold color for title */
        }
        .description-container p {
            font-size: 18px;
            color: #fff;
            margin-bottom: 20px;
        }

        .description-container p.cheesy {
            font-style: italic;
            font-size: 22px;
            color: #ff4500; /* Orange color for cheesy lines */
        }

        /* Event Card Container */
        .event-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 20px;
            background: rgba(0, 0, 0, 0.5); /* Transparency for better contrast */
            padding: 15px;
            border-radius: 10px;
        }
        
        /* Event Card Styling */
        .event-card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 300px;
            margin: 15px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            color: #000; /* Text color for cards */
        }
        .event-card:hover {
            transform: translateY(-5px);
        }
        .event-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .event-card h3 {
            margin: 15px 0;
        }
        .event-card p {
            margin: 10px 0;
            font-size: 16px;
        }
        .event-card a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .event-card a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Welcome to TSR Event Ticketing System</h1>

    <!-- New description section -->
    <div class="description-container">
        <h2>Your Ultimate Gateway to Unforgettable Events</h2>
        <p>Welcome to TSR Event Ticketing System! Get ready to experience world-class events, all from the comfort of your home. With just a few clicks, you can secure your tickets for the most exciting concerts, sports events, and live shows.</p>
        <p class="cheesy">"Why wait in line when you can have the best seat in the house, delivered straight to you?"</p>
        <p>Our seamless booking system ensures that you never miss out on an event again. Book your tickets now and make memories that last a lifetime!</p>
    </div>

    <p>Select an event to book tickets:</p>

    <div class="event-container">
        <!-- Football Match Card -->
        <div class="event-card">
            <img src="images/football_match.jpg" alt="Football Match">
            <h3>Football Match</h3>
            <p>Price: $50.00</p>
            <a href="seat_selection.php?event_id=1">Book Now</a>
        </div>
        
        <!-- Dua Lipa Concert Card -->
        <div class="event-card">
            <img src="images/dua_lipa_concert.jpg" alt="Dua Lipa Concert">
            <h3>Dua Lipa Concert</h3>
            <p>Price: $100.00</p>
            <a href="seat_selection.php?event_id=2">Book Now</a>
        </div>
    </div>
</body>
</html>

