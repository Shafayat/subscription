# Subscription Platform

This is a simple subscription platform built with Laravel that allows users to subscribe to various websites. Whenever a new post is published on a website, all its subscribers receive an email notification containing the post title and description.

## Features

- Create websites entries
- Subscribe users to websites
- Create posts for websites
- Send email notifications to subscribers about new post

## Requirements

- PHP 7.* or 8.*
- Composer
- MySQL

## Installation

1. **Clone the repository**:

   ```bash
   git clone https://github.com/Shafayat/subscription.git
   cd subscription
 
### Install dependencies:
    
        composer install
 
### Copy the .env.example file to .env:
    
        cp .env.example .env
Update the .env file with your database and mail configuration.


 
### Run migrations:

        php artisan migrate


 
### (Optional) Seed the database:

        php artisan db:seed




## Sending Email Notifications
    php artisan emails:send
This command retrieves all email queues with unsent emails and sends out notifications to the subscribers of each post.
## Running the Application
   ```bash 
   php artisan serve
