Step 1  cd to root directory of the project in terminal or command promopt
<br>
Step 2  enter -:
```html
    php init
```

It will show like this -:

```html
Yii Application Initialization Tool v1.0

Which environment do you want the application to be initialized in?

  [0] Development
  [1] Production

  Your choice [0-1, or "q" to quit]
```
Step 3  enter <strong>0</strong>
<br>
It will show like this -:
```html
Initialize the application under 'Development' environment? [yes|no] 
```
Step 4 enter <strong>yes</strong>
<br>
Step 5 go to ```root -> common -> config ->main-local.php ```
<br>
Config your database
<br>
DATABASE_NAME -> <strong>your database name</strong>
<br>
DATABASE_USER_NAME -> <strong>username for database</strong>
<br>
DATABASE_PASSWORD -> <strong>password for database</strong>


<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname="DATABASE_NAME',  
            'username' => 'DATABASE_USER_NAME',
            'password' => 'DATABASE_PASSWORD',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
===============================================================================
step 6 enter "composer install"
step 7 enter "php yii migrate/up"
if user table alreay exist it will show like this -:
===============================================================================
Yii Migration Tool (based on Yii v2.0.39.3)

No new migrations found. Your system is up-to-date.
===============================================================================
if not exist it wil show like this -:
===============================================================================
Yii Migration Tool (based on Yii v2.0.39.3)

Creating migration history table "migration"...Done.
Total 2 new migrations to be applied:
	m130524_201442_init
	m190124_110200_add_verification_token_column_to_user_table

Apply the above migrations? (yes|no) [no]:
===============================================================================
enter "yes"
step 8 got to root -> frontend -> config -> main.php
now paste below code in main.php under component [ ] then put your client id and secret replace by xxxxxxxxxxxxxxxxxxxxxx
===============================================================================
'authClientCollection' => [
        'class' => 'yii\authclient\Collection',
        'clients' => [
            'google' => [
                'class' => 'yii\authclient\clients\Google',
                'clientId' => 'xxxxxxxxxxxxxxxxxxxxxxxx',
                'clientSecret' => 'xxxxxxxxxxxxxxxxxxxxxx',
            ],
            'facebook' => [
                'class' => 'yii\authclient\clients\Facebook',
                'clientId' =>  'xxxxxxxxxxxxxxxxxxxxxxxxx',
                'clientSecret' =>  'xxxxxxxxxxxxxxxxxxxxxxxxx',
            ],
            'instagram' => [
                'class' => 'kotchuprik\authclient\Instagram',
                'clientId' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'clientSecret' => 'xxxxxxxxxxxxxxxxxxxxxxxxx',
            ],
            'linkedin' => [
                'class' => 'yii\authclient\clients\LinkedIn',
                'clientId' =>  'xxxxxxxxxxxxxxxxxxxxxxxxx',
                'clientSecret' =>  'xxxxxxxxxxxxxxxxxxxxxxxxx',
            ],
           'twitter' => [
                'class' => 'yii\authclient\clients\Twitter',
                'attributeParams' => [
                    'include_email' => 'true'
                ],
                'consumerKey' =>  'xxxxxxxxxxxxxxxxxxxxxxxxx',
                'consumerSecret' =>  'xxxxxxxxxxxxxxxxxxxxxxxxx',,
            ],
        ],
===============================================================================
