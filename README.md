RabbitMQ Examples
=================

This code examples and Vagrantfile are part of my presentation "Practical Message Queuing with RabbitMQ".

Installation guide (Ubuntu)
===========================

Clone the repo and start the VM:

```
git clone git@github.com:asgrim/rmq-slides.git
vagrant up
```

When it finishes booting:

```
vagrant ssh
```

Then running the following commands in the VM will set up RabbitMQ:

```
echo "deb http://www.rabbitmq.com/debian/ testing main" | sudo tee /etc/apt/source.list.d/rabbitmq.list
wget http://www.rabbitmq.com/rabbitmq-signing-key-public.asc
sudo apt-key add rabbitmq-signing-key-public.asc
sudo apt-get update
sudo apt-get install rabbitmq-server
```

Management (Web Interface)
--------------------------

To enable management (web interface), you need to:

```
echo "[{rabbit, [{loopback_users, []}]}]." | sudo tee /etc/rabbitmq/rabbitmq.config
rabbitmq-plugins enable rabbitmq_management
sudo service rabbitmq-server restart
```

The configuration above will allow "guest" account to log in from anywhere (not just localhost).

PHP
---

Set up the PHP environment required...

```
sudo apt-get install python-software-properties curl
sudo apt-add-repository ppa:ondrej/php5
sudo apt-get update
sudo apt-get install php5-cli
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
cd /vagrant
composer install
```

