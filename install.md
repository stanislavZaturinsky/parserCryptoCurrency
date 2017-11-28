## Installation

- git clone project
- git composer install
- add to configuration file .env - CURRENCY_PROVIDER='https://blockchain.info/ticker'
- php artisan migrate
- run in console: * * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1
- check parsing result in main page