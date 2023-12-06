<?php

use Models\DB;
use Repositories\NewsRepository;
use Controllers\NewsController;

require_once '../vendor/autoload.php';

// Load configuration
$config = include __DIR__ . '/../config/database.php';

// Create a database connector
$dbConnection = new DB($config['dsn'], $config['username'], $config['password']);

// Create a NewsRepository and inject the DB instance
$newsRepository = new NewsRepository($dbConnection);

// Instantiate the controller with dependency injection
$newsController = new NewsController($newsRepository);

// Simple routing based on a query parameter (you can use a router for more complex scenarios)
$action = $_GET['action'] ?? 'list'; // Default action is 'list'

// Handle the request based on the action
try {
    switch ($action) {
        case 'list':
            $newsController->listNewsWithComments();
            break;
        case 'add':
            // Type-check and sanitize input
            $title = isset($_GET['title']) ? (int)$_GET['title'] : null;
            $body = isset($_GET['body']) ? (int)$_GET['body'] : null;
            $newsController->addNews($title, $body);
            break;
        // Add more cases for routes as needed
        default:
            // Use constants for HTTP status codes
            header("HTTP/1.0 404 Not Found");
            echo "404 Not Found";
            break;
    }
} catch (Exception $e) {
    // Log exceptions and handle them gracefully
    // Display a user-friendly error message or redirect to an error page
    error_log($e->getMessage());
    header("HTTP/1.1 500 Internal Server Error");
    echo "500 Internal Server Error";
}
