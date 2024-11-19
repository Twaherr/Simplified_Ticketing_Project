[22:41, 10/11/2024] :): -- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS ticketing_system;
USE ticketing_system;

-- Create the events table with a price column
CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    price DECIMAL(10, 2) NOT NULL -- Add the price column for the event
);

-- Create the seats table for events
CREATE TABLE IF NOT EXISTS seats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT,
    seat_number VARCHAR(10) NOT NULL,
    is_booked BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (event_id) REFERENCES events(id)
);

-- Insert sample events with ticket prices
INSERT INTO events (name, date, price) VALUES
('Football Match', '2024-11-15', 50.00),
('Dua Lipa Co…
[23:14, 10/11/2024] :): -- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS ticketing_system;
USE ticketing_system;

-- Create the events table with a price column
CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,  -- Event name
    date DATE NOT NULL,          -- Event date
    price DECIMAL(10, 2) NOT NULL  -- Ticket price (in dollars, e.g., 50.00)
);

-- Create the seats table for events
CREATE TABLE IF NOT EXISTS seats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT,                      -- Foreign key to the events table
    seat_number VARCHAR(10) NOT NULL,   -- Seat number (e.g., A1, B2, etc.)
    is_booked BOOLEAN DEFAULT FALSE,    -- Whether the seat is booked
    FOREIGN KEY (event_id) REFERENCES events(id)  -- Foreign key relationship with the events table
);

-- Insert events with the correct prices and names

-- Insert for Football Match event
INSERT INTO events (name, date, price) 
VALUES ('Football Match', '2024-11-15', 50.00);

-- Insert seats for the Football Match event (replace '1' with the actual event_id)
INSERT INTO seats (event_id, seat_number, is_booked)
VALUES 
(1, 'A1', FALSE),
(1, 'A2', FALSE),
(1, 'A3', FALSE),
(1, 'A4', FALSE),
(1, 'A5', FALSE),
(1, 'A6', FALSE);

-- Insert for Dua Lipa Concert event
INSERT INTO events (name, date, price) 
VALUES ('Dua Lipa Concert', '2024-12-10', 100.00);

-- Insert seats for the Dua Lipa Concert event (replace '2' with the actual event_id)
INSERT INTO seats (event_id, seat_number, is_booked)
VALUES 
(2, 'A1', FALSE),
(2, 'A2', FALSE),
(2, 'A3', FALSE),
(2, 'A4', FALSE),
(2, 'A5', FALSE),
(2, 'A6', FALSE);