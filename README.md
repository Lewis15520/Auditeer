# Auditeer - Work in progress
A package to audit requests and model data in Laravel

## Requirements
- PHP 7.3 or later
- Laravel 8 or later

## Installation
In order to run Auditeer you are required to follow these steps in your terminal

1. Install the package with ```composer require lewis15520/auditeer```
2. Copy the required package conents with ```php artisan vendor:publish --provider="Lewis15520\Auditeer\app\Providers\AuditeerServiceProvider"```
3. Install the package migrations with ```php artisan migrate```

## Usage
### Enabling
To start auditing, go to ```config/auditeer.php``` and set the ```enabled``` value to ```true```.

### Config
The config is for you to configure Auditeer how you want it. There's documentation for each option and what it does. You can turn these on or off at any time.

### Traits
The Auditeer trait is for you to asign to your own models. This allows you to track old and new data and the change log will be stored in the ```parameters``` field. To do this, you first need to enable ```track_model_changes``` in the config by setting it to ```true```. On each mode you would like to track, you can add ```use Lewis15520\Auditeer\Traits\AuditLog;``` and then inside the model class, add ```use AuditLog;```. To test this works properly for you, make an update on a single object and check the audit view for that change. If there is ```model_changes``` in the parameters, this is successfully working. 

### Viewing recorded data
Viewing your Auditeer data is as easy as setting the ```enable_views``` option to ```true``` in the config and going to  ```{base_url}/auditeer_data``` in your url. Auditeer will provide you with a nice single page interface for you to look at and read your logs. You can edit the page settings in the config under the ```view_config``` section.

##### Displaying user data
Under ```view_config > user``` in the config, you can edit how the user is shown in the audit log data views. You can define the model class the user is from (the default is set to ```\App\Models\User::class```). Inside the ```display_column``` key, you can define column names to show the relevant data you would like to see (e.g ```name``` or ```email```). You can also concatinate columns with a ```|``` inbetween (e.g ```name|email```). The first one in the value will display normally and every column after will be put into its own brackets and will be displayed like the following: ```Jon Doe (jon.doe@example.com)```.
