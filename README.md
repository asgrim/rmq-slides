RabbitMQ Examples
=================

This code examples and Vagrant VM are part of my presentation "Adding 1.21 Gigawatts to Applications with RabbitMQ".

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
$ vagrant up
```

When it finishes booting you can open a terminal to the VM using:

```shell
$ vagrant ssh
```

Usage
=====

Once you're in the VM you can run the demos just like in the presentation, e.g.:

```shell
$ cd /vagrant/basic
$ php producer.php
$ php producer.php
$ php consumer.php
my test message
my test message
^C
$
```
