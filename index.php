<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/app/core/initialize.php');

// Main Sections
Router::add('/', '/app/controllers/home.php');

// Users
Router::add('/users', '/app/controllers/users/list.php');
Router::add('/users/register', '/app/controllers/users/register/form.php');
Router::add('/users/register/process_form/', '/app/controllers/users/register/process_form.php');

// View Event
Router::add('/event', '/app/controllers/events/view_event.php');

// List Events
Router::add('/events', '/app/controllers/events/list_events.php');

// Create Account
Router::add('/signup', '/app/controllers/users/create_account.php');

// Login
Router::add('/login', '/app/controllers/users/login.php');

// Process User
Router::add('/process_user', '/app/controllers/users/process_user.php');

// Authenticate User
Router::add('/auth_login', '/app/controllers/users/auth_login.php');

// Authenticate User
Router::add('/logout', '/app/controllers/users/logout.php');

// Add Comment
Router::add('/add_comment', '/app/controllers/comment/add_comment.php');

// Create Event
Router::add('/create_event', '/app/controllers/events/create_event.php');

// Create Event
Router::add('/process_event', '/app/controllers/events/process_event.php');






// Issue Route
Router::route();