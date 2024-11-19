Here is the complete and detailed `README.md` file for your project:

---

# Admin Panel for Ticket Management System

## Overview

This project is an admin panel for managing ticket purchases in a bus service system. The system allows administrators to:
- Approve, cancel, and view ticket bookings.
- Visualize ticket purchase data with insightful graphs.
- Track ticket status trends (Approved, Canceled, Waiting).
- Authenticate with secure admin login.

The system is built using PHP for the backend, MySQL for database management, and Chart.js for visualizations. The front-end design is powered by Bootstrap for a responsive and user-friendly interface.

---

## Features

1. **Admin Authentication:**
   - Secure login system for administrators to access the panel.

2. **Ticket Management:**
   - Approve or cancel pending tickets.
   - View approved ticket details.

3. **Data Visualization:**
   - Bar chart: Users vs. Total purchase amounts.
   - Line chart: Daily total purchases.
   - Status trends: Approved, Canceled, and Waiting tickets visualized over time.

4. **User Management:**
   - Track ticket purchase history per user.
   - Show total number of users.

5. **Responsive UI:**
   - Designed using Bootstrap for modern, responsive layouts.

---

## Prerequisites

1. **Software Requirements:**
   - PHP 8.0 or above
   - MySQL 5.7 or above
   - Apache server

2. **Dependencies:**
   - Bootstrap 5
   - Chart.js (via CDN)

---

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/your-username/ticket-management-admin-panel.git
   cd ticket-management-admin-panel
   ```

2. Import the database:
   - Open MySQL or phpMyAdmin and create a new database named `ln_database`.
   - Import the SQL code provided below.

3. Configure the database connection:
   - Edit the `connection.php` file and update the following details:
     ```php
     $hostname = "your-hostname";
     $username = "your-username";
     $password = "your-password";
     $dbname = "ln_database";
     ```

4. Start the local server:
   - Ensure Apache and MySQL are running.
   - Place the project folder in your server's root directory (e.g., `htdocs` for XAMPP).
   - Access the application via `http://localhost/ticket-management-admin-panel`.

---

## Project Structure

```plaintext
ticket-management-admin-panel/
│
├── app.js                # JavaScript logic for UI functionality
├── connection.php        # Database connection script
├── index.php             # Entry point with admin login
├── admin_panel.php       # Admin dashboard and data visualization
├── login.php             # Login handling
├── signup.php            # User registration
├── ticket_history.php    # User ticket history
├── save_ticket.php       # Script to handle ticket bookings
├── style.css             # Custom styling
├── ln_database.sql       # SQL file to initialize the database
```

---

## Screenshots

### **Admin Login Page:**
Secure login interface for administrators.

### **Dashboard:**
Graphs showing purchase data and ticket status trends.

### **Ticket Management:**
Interactive interface for approving or canceling tickets.

---

## Database Schema

### SQL Code to Set Up the Database:

```sql
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2024 at 01:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `ln_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `ln_information`
--

CREATE TABLE `ln_information` (
  `ln_id` varchar(100) NOT NULL,
  `ln_mail` varchar(500) DEFAULT NULL,
  `ln_password` varchar(1000) DEFAULT NULL,
  `ln_phn` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `ln_information` (`ln_id`, `ln_mail`, `ln_password`, `ln_phn`) VALUES
('nafis', 'urmi.nafis@gmail.com', 'a123', '01736488799'),
('skb32', 'hasansakib461@gmail.com', '123456', '01757569074'),
('urmi', 'urmi@gmail.com', '1234', '01521366612');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_purchases`
--

CREATE TABLE `ticket_purchases` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `seats` text NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `travel_date` date NOT NULL,
  `approved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `ticket_purchases` (`id`, `username`, `name`, `phone`, `email`, `seats`, `total_amount`, `created_at`, `travel_date`, `approved`) VALUES
(13, 'skb32', 'Sakib Hasan', '01757569074', 'hasansakib461@gmail.com', 'A4', 550.00, '2024-11-18 22:56:08', '2024-11-22', 1),
(20, 'urmi', 'urmi', '01757569074', 'urmi@gmail.com', 'A1,F3,G4,H3', 2200.00, '2024-11-18 23:56:09', '2024-11-22', 0),
(21, 'urmi', 'urmi', '01757569074', 'urmi@gmail.com', 'G3,G4', 1100.00, '2024-11-19 00:16:35', '2024-11-22', 2);
```

---

## License

This project is licensed under the MIT License. Feel free to use, modify, and distribute it as needed.

---

## Contributions

Contributions are welcome! Follow these steps to contribute:
1. **Fork the repository.**
2. **Make your changes.**
3. **Submit a pull request with a detailed description.**

---

Enjoy building with this project! Happy coding! 🎉

--- 

Let me know if you want any further customizations.
