#REST API in PHP

REST API for the permuation calculation 

**Prerequisites:** PHP, Composer, MySQL

## Getting Started

Clone this project using the following commands:

```
mkdir trimoz && cd trimoz
git init
git clone https://github.com/villalonjeremie/trimoz.git
```

Install Redis-Server on MacOs with brew:

```
brew update
brew install redis
```

Install the project dependencies and start the PHP server:

```
composer install
cd public
php -S 127.0.0.1:8000
```

Start Redis Server on local: 
```
redis-server
```

Communicate with Redis Server , Response should be PONG:
```
redis-cli ping
```

Create .env for .env.example and fill it out
```
SCHEME_REDIS="tcp"
SERVER_REDIS_IP="127.0.0.1"
SERVER_PORT_REDIS="6379"
```

## Help

You can email villalon.jeremie@gmail.com.
