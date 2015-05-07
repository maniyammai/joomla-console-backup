Joomla Console - Example Plugin
===============================

This is an example plugin for use with the Joomlatools [Joomla Console](https://github.com/joomlatools/joomla-console).

The plugin adds a `site:backup` command which you can use to
quickly create a database dump and tar file of any installed Joomla site.

Installation
------------

1.  Run the following command

 `$ joomla plugin:install joomlatools/joomla-console-backup`

1. Verify that the plugin is available:

 `$ joomla plugin:list`

Writing your own plugin
-----------------------

It's very easy to add custom commands to the tool. We recommended installing this plugin on your local setup and then starting off from there.

A few pointers to help you get started:

1. All plugins are installed in the `plugins` directory. If you installed joomla-console globally you'll find this directory at `~/.composer/vendor/joomlatools/joomla-console/plugins`

1. All commands must be in the `Joomlatools\Console\Command` namespace or they won't be found. Make sure to setup the [autoload mapping](https://getcomposer.org/doc/04-schema.md#autoload) according to the composer specs.

1. If you are developing a new plugin make sure to register it manually in Composer's `autoload_namespaces.php` file in the `plugins/vendor/composer` directory. Also add it to the composer.json file in the `plugins` directory or the joomla-console tool will not be able to load it. Once published via Packagist this will all be done automatically when you install it.

1. The entire tool is build on the [Symfony Console package](http://symfony.com/doc/current/components/console/introduction.html). Instructions on how to build a command are explained on their documentation pages.

1. Plugins are discovered via [Packagist](http://www.packagist.org). If you want to make your plugin installable through the `joomla plugin:install` command, you need to publish it there. Then you can install using the `vendor/package` name you defined in your composer.json manifest.

## Requirements

* Composer
* [Joomla Console](https://github.com/joomlatools/joomla-console) >= 1.3

## Contributing

Fork the project, create a feature branch, and send us a pull request.

## Authors

See the list of [contributors](https://github.com/joomlatools/joomla-console-backup-plugin/contributors).

## License

The `joomlatools/joomla-console-backup` plugin is licensed under the MPL v2 license - see the LICENSE file for details.
