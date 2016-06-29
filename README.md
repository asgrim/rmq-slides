RabbitMQ Examples
=================

This code examples and Vagrant VM are part of my presentation "Adding 1.21 Gigawatts to Applications with RabbitMQ".

The VM is provided by a git submodule from the https://github.com/asgrim/rmq-vm repo.

Prerequisites
=============

To use the VM as intended you need:

* [Vagrant](http://docs.vagrantup.com/v2/installation/)
* [Ansible](http://docs.ansible.com/intro_installation.html) (Note: Version 1.8+ required)

Installation guide (Ubuntu)
===========================

Clone the repo and start the VM (provisions with ansible):

```shell
$ git clone git@github.com:asgrim/rmq-slides.git
$ cd rmq-slides
$ git submodule init
$ git submodule update
$ cd vm
$ vagrant up
$ cd ..
$ composer install
```

Usage
=====

Once the VM is booted you can run the demos just like in the presentation, e.g.:

```shell
$ cd basic
$ php producer.php
$ php producer.php
$ php consumer.php
my test message
my test message
^C
$
```
