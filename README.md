# Auditeer - Work in progress
A package to audit requests and model data in Laravel

## Requirements
- PHP 7.3 or later
- Laravel 8 or later

## Installation
In order to run Auditeer you are required to follow these steps in your terminal

1. Install the package with ```composer require lewis15520/auditeer```
2. Copy the required package conents with ```php artisan vendor:publish```
3. Install the package migrations with ```php artisan migrate```

## Usage
### Enabling
To start auditing, go to ```config/auditeer.php``` and set the ```enabled``` value to ```true```.

### Config
The config is for you to configure Auditeer how you want it. There's documentation for each option and what it does. You can turn these on or off at any time.

### Traits
The Auditeer trait is for you to asign to your own models so you can track old and new data which will be stored in the ```parameters``` field. 

### Viewing recorded data
Viewing your Auditeer data is as easy as setting the ```enable_views``` option to ```true``` in the config and going to  ```{base_url}/auditeer_data``` in your url. Auditeer will provide you with a nice single page interface for you to look at and read your logs. You can edit the page settings in the config under the ```view_config``` section.
