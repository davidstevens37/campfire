<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/app/core/initialize.php');

// Main Sections
Router::add('/', '/app/controllers/home.php');

  	
/****************************************
*    Events       
*****************************************/
	
// View Event
Router::add('/event', '/app/controllers/events/view_event.php');

// List Events
Router::add('/events', '/app/controllers/events/list_events.php');

// Create Event
Router::add('/create_event', '/app/controllers/events/create_event.php');

// Process Event
Router::add('/process_event', '/app/controllers/events/process_event.php');

// Process Event Description
Router::add('/process_event_description', '/app/controllers/events/process_event_description.php');



  	
/****************************************
*    Comments     
*****************************************/
	
// Add Comment
Router::add('/add_comment', '/app/controllers/comment/add_comment.php');

// Delete Comment
Router::add('/delete_comment', '/app/controllers/comment/delete_comment.php');
  	
  	
/****************************************
*    Users       
*****************************************/
	
// Create Account
Router::add('/signup', '/app/controllers/users/create_account.php');

// Login
Router::add('/login', '/app/controllers/users/login.php');

// Process User
Router::add('/process_user', '/app/controllers/users/process_user.php');

// Authenticate User
Router::add('/auth_login', '/app/controllers/users/auth_login.php');

// Logout User
Router::add('/logout', '/app/controllers/users/logout.php');


/****************************************
*    User_Event       
*****************************************/
	
// Action Invitaions
Router::add('/action_invitation', '/app/controllers/user_event/action_invitation.php');

// Invite
Router::add('/invite', '/app/controllers/user_event/invite.php');

// Process Invite
Router::add('/process_invite', '/app/controllers/user_event/process_invite.php');

// Process Invite
Router::add('/remove_member', '/app/controllers/user_event/remove_member.php');


/****************************************
*    Items       
*****************************************/
	
// View Event Items
Router::add('/items', '/app/controllers/items/items.php');

// Claim item
Router::add('/claim', '/app/controllers/items/claim_item.php');

// Unclaim item
Router::add('/unclaim', '/app/controllers/items/unclaim_item.php');

// Add item
Router::add('/add_item', '/app/controllers/items/add_item.php');

// Remove item
Router::add('/remove_item', '/app/controllers/items/remove_item.php');

// Get My Items
Router::add('/get_self_claimed_items', '/app/controllers/items/get_self_claimed_items.php');





// Issue Route
Router::route();