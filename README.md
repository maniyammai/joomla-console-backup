Joomla Console - Example Plugin
===============================

This is an example plugin for use with the Joomlatools [Joomla Console](https://github.com/joomlatools/joomla-console).

The plugin adds a `site:backup` command which you can use to
quickly create a database dump and tar file of any installed Joomla site.

Installation
------------

1.  Run the following command

 `$ joomla plugin:install joomlatools/joomla-console-backup-plugin`

1. Verify that the plugin is available:

 `$ joomla plugin:list`

1. You can now create a backup of a site by running the following command:

  `$ joomla site:backup sitename`

   The tarball and mysql dump will be stored in your home folder. You can change this using the `--directory` flag.

1. For available options, run

   `$ joomla help site:backup`

Writing your own plugin
-----------------------

It's very easy to add custom commands to the tool. We recommended installing this plugin on your local setup and then starting off from there. You can find a step-by-step description in [our developer documentation](http://developer.joomlatools.com/tools/console/plugins.html#creating-custom-plugins).

## Requirements

* Composer
* [Joomla Console](https://github.com/joomlatools/joomla-console) >= 1.3

## Contributing

Fork the project, create a feature branch, and send us a pull request.

## Authors

See the list of [contributors](https://github.com/joomlatools/joomla-console-backup-plugin/contributors).

## License

The `joomlatools/joomla-console-backup` plugin is licensed under the MPL v2 license - see the LICENSE file for details.
