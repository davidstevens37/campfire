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
Router::add('/event', '/app/controllers/event/view_event.php');




// Issue Route
Router::route();