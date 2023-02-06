<?php
/**
 * Plugin Name:       User Registration & Last Login Time
 * Plugin URI:        https://plugins.club/wordpress/user-registration-last-login-time/
 * Description:       Adds registration date and last login time columns to the users list table.
 * Version:           1.0
 * Author:            plugins.club
 * Author URI:        https://plugins.club
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Requires at least: 5.0
 * Tested up to: 	  6.1.1
*/

// Adding new columns to the users list table
add_filter("manage_users_columns", "pluginsclub_add_user_info_columns");

// Function to add the new columns to the users list table
function pluginsclub_add_user_info_columns($columns)
{
    $columns["registration_date"] = "Registration Date";
    $columns["last_login"] = "Last Login";
    return $columns;
}

// Adding data to the new columns in the users list table
add_action("manage_users_custom_column", "pluginsclub_show_user_info", 10, 3);

// Function to show the data in the new columns
function pluginsclub_show_user_info($value, $column_name, $user_id)
{
    $user = get_userdata($user_id);
    if ($column_name === "registration_date") {
        $value = date("Y-m-d H:i:s", strtotime($user->user_registered));
    } elseif ($column_name === "last_login") {
        $last_login = get_user_meta($user_id, "last_login", true);
        if (!empty($last_login)) {
            $now = new DateTime();
            $last_login = new DateTime($last_login);
            $interval = $now->diff($last_login);
            if ($interval->y > 0) {
                $value = $interval->format("%y years");
            } elseif ($interval->m > 0) {
                $value = $interval->format("%m months");
            } elseif ($interval->d > 0) {
                $value = $interval->format("%d days");
            } elseif ($interval->h > 0) {
                $value = $interval->format("%h hours");
            } elseif ($interval->i > 0) {
                $value = $interval->format("%i minutes");
            } else {
                $value = $interval->format("%s seconds");
            }
            $value .= " ago";
        } else {
            $value = "Never";
        }
    }
    return $value;
}



// Hook into the 'wp_login' action to update the last login time for each user
add_action('wp_login', 'pluginsclub_update_last_login');

// Update the last login time for each user
function pluginsclub_update_last_login($login) {
    $user = get_user_by('login', $login);
    update_user_meta($user->ID, 'last_login', date('Y-m-d H:i:s'));
}

