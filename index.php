<?php
/**
 * 01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
 * Created by Joseph Gage.
 * Date: 5/11/2016
 * Time: 6:53 PM
 * This is a simple message board test for a job. These are the instructions.
 * Create a very basic message board in pure PHP (no framework) and MySQL. An ORM or library is fine for the DB functionality. Anything can be
 * used for the UI (Bootstrap/Foundation/jQuery UI), but it doesn't have to be pretty, only functional.
 * There will be categories (single-level), in categories will be threads, and threads will consist of posts (again, just single level - no need
 * for nesting)
 * There will also be users with the following attributes: username, email (or use email for both), first and last name, password, an admin flag,
 * and a read-only flag.
 * Anyone that IS read only can only view the threads and posts, but not add new threads/posts.
 * Anyone that's NOT read-only can create new threads and will also see edit/delete controls on their own posts.
 * Anyone that's an admin can see the edit/delete controls on ALL posts.
 * Deleting a thread will also cascade delete child posts.
 * It also needs a very simple admin interface that displays all users and allows CRUD functionality.
 * Non-admins can change their own password, first name, and last name.
 * There is no need for a signup page, email validation, file attachments, security - beyond requiring a username/password to login, just encrypt
 * the passwords somehow
 * When you have it ready, just send me credentials for an admin account and either put the source on Github or email to me.
 */
require "header.php";

