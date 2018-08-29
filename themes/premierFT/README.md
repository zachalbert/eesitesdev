# Setup Instructions

* Run Local (by flywheel), and get a multisite running locally. Call it eesitesdev, and make sure to make it a multisite (subdomain)
* Once running, clone this repository in the themes directory:
  * Make sure git, composer, and npm are installed (google it)
  * Open the command prompt, and `cd` your way to the themes directory in the local wordpress install
  * From this github repo page, click the "clone or download" button at the top and copy and paste the address you see. SSH is preferable, but may require some setup. Follow github's instructions for doing that.
  * Once you've copied the SSH url (e.g. git@github.com:zachablert/eesitesdev.git), go back to the command prompt. Make sure you're in the themes directory, and execute `git clone <PASTE REPO SSH URL>`. Things will happen. You should now see the directory in explorer.
  * In the command prompt, make sure you've installed composer and run `composer install`
  * In the command prompt, make sure you've installed npm and run `npm install`
  * Go into the network admin and activate the theme.

## Making changes

* Before you start working, always start by pulling the latest changes to the repo to ensure we're working on the most updated code. In a command prompt, `cd` to the `eesitesdev` theme folder and execute `git pull origin master`
* Execute `npm run watch`.
* Any time you complete a small feature or fix, do a commit. Make these small and bite sized, so we can easily understand what's changed. Do so by typing `git commit -m "A descriptive message about what you changed"`
* Commits are saved locally until you push them to the remote repo. When you are ready for me to have access to your commits, first execute `git pull origin master` to make sure you're pushing to the most updated codebase. If there are merge conflicts, let's discuss on the phone. Assuming there are no merge conflicts, then execute `git push origin master`.

# ![awps](http://www.alecaddd.com/wp-content/uploads/2017/05/awps-logo.png)
> A Modern WordPress Starter Theme for savvy Developers

[![Build Status](https://travis-ci.org/Alecaddd/awps.svg?branch=master)](https://travis-ci.org/Alecaddd/awps) ![Dependecies](https://david-dm.org/Alecaddd/awps.svg) ![NPM latest](https://img.shields.io/npm/v/npm.svg) ![GPL License](https://img.shields.io/badge/license-GPLv3-blue.svg) [![Code Climate](https://codeclimate.com/github/Alecaddd/awps/badges/gpa.svg)](https://codeclimate.com/github/Alecaddd/awps)

## Prerequisites

This theme relies on **NPM** and **Composer** in order to load dependencies and packages.
**Webpack** should always be running and watching during the development process, in order to properly compile and update files.

* Install [Composer](https://getcomposer.org/)
* Install [Node](https://nodejs.org/)


## Installation

* Move the `.env.example` to your WordPress root directory, rename it as `.env`, and setup your website variables
* Move the `wp-config.sample.php` to your WordPress root directory and rename it as `wp-config.php`, to replace the default one
* Open a Terminal window on the location of the theme folder
* Execute `composer install`
* Execute `npm install`


## Webpack

AWPS uses [Laravel Mix](https://laravel.com/docs/5.6/mix) for assets management. Check the official documentation for advanced options

* Edit the `webpack.mix.js` in the root directory of your theme to set your localhost URL and customize your assets
* `npm run watch` to start browserSync with LiveReload and proxy to your custom URL
* `npm run dev` to quickly compile and bundle all the assets without watching
* `npm run prod` to compile the assets for production


## Features

* Bult-in `webpack.mix.js` for fast development and compiling.
* `OOP` PHP, and `namespaces` with `PSR4` autoload.
* `Customizer` ready with boilerplate and example classes.
* `Gutenberg` ready with boilerplate and example blocks.
* `ES6 Javascript` syntax ready.
* Compatible with `JetPack`, `WooCommerce`, `ACF PRO`, and all the most famous plugins.
* Built-in `FlexBox` Responsive Grid.
* Modular, Components based file structure.


## License

[GPLv3](https://github.com/Alecaddd/awps/blob/master/LICENSE.txt)