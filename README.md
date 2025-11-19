# SilverStripe Elemental Testimonials

Testimonials Block for SilverStripe Elemental.

![CI](https://github.com/dynamic/silverstripe-elemental-testimonials/actions/workflows/ci.yml/badge.svg)
[![GitHub Sponsors](https://img.shields.io/github/sponsors/dynamic?label=Sponsors&logo=GitHub%20Sponsors&style=flat&color=ea4aaa)](https://github.com/sponsors/dynamic)

[![Latest Stable Version](https://poser.pugx.org/dynamic/silverstripe-elemental-testimonials/v/stable)](https://packagist.org/packages/dynamic/silverstripe-elemental-testimonials)
[![Total Downloads](https://poser.pugx.org/dynamic/silverstripe-elemental-testimonials/downloads)](https://packagist.org/packages/dynamic/silverstripe-elemental-testimonials)
[![License](https://poser.pugx.org/dynamic/silverstripe-elemental-testimonials/license)](https://packagist.org/packages/dynamic/silverstripe-elemental-testimonials)

## Requirements

* PHP: ^8.3
* SilverStripe: ^6
* SilverStripe Elemental: ^6
* symbiote/silverstripe-gridfieldextensions: ^5

## Installation

`composer require dynamic/silverstripe-elemental-testimonials`

## License

See [License](license.md)

## Features

- **Testimonials Element Block** - Display customer testimonials within Elemental content areas
- **Category-Based Filtering** - Organize testimonials by categories and display specific subsets
- **Random Display Order** - Testimonials are shown in random order for variety on each page load
- **Configurable Limit** - Control how many testimonials display (or show all with 0 limit)
- **Rich Testimonial Fields** - Includes Title, Content, Author Name, Position, and Affiliation
- **Bootstrap 4 Templates** - Default templates styled with Bootstrap 4 classes
- **CMS Permission Control** - Manage testimonial access with dedicated permissions
- **GridField Management** - Easy testimonial and category management through the CMS

## Usage

Elemental Testimonials Block will add the following Element to your site:

* Testimonials

The Testimonials Element pulls testimonials from a specified Testimonial Category. They are displayed on the front-end in a random order. You can also set how many should testimonials should display.

Each Testimonial includes the following fields:

* Title
* Content
* Name
* Position
* Affiliation

## Screen Shots

#### Front End sample of a Testimonial Element
The default templates are based off [Bootstrap 4](https://getbootstrap.com/) classes/styling

![Front End sample of a Testimonials Element](./docs/_en/images/testimonial-block-sample.jpg)

#### CMS - Testimonials Main Tab
![CMS - Testimonials Main Tab](./docs/_en/images/testimonial-block-cms-main.jpg)

#### CMS - Testimonials Category Tab
![CMS - Testimonials Category Tab](./docs/_en/images/testimonial-block-cms-categories.jpg)

#### CMS - Testimonials List
![CMS - Testimonials List](./docs/_en/images/testimonial-block-cms-testimonial-list.jpg)

#### CMS - Testimonials Edit
![CMS - Testimonials Edit](./docs/_en/images/testimonial-block-cms-testimonial-edit.jpg)

## Getting more elements

See [Elemental modules by Dynamic](https://github.com/orgs/dynamic/repositories?q=elemental&type=all&language=&sort=)

## Configuration

See [SilverStripe Elemental Configuration](https://github.com/dnadesign/silverstripe-elemental#configuration)

## Upgrading from version 3

SilverStripe Elemental Testimonials 4.0 is compatible with SilverStripe 6. Key changes:

- Updated to SilverStripe CMS 6
- Requires PHP 8.3 or higher
- Updated all major dependencies to their SS6-compatible versions:
  - `dnadesign/silverstripe-elemental`: ^5 → ^6
  - `silverstripe/framework`: ^5 → ^6
  - `symbiote/silverstripe-gridfieldextensions`: ^4 → ^5
  - `silverstripe/recipe-testing`: ^3 → ^4

See the [SilverStripe 6 Upgrade Guide](https://docs.silverstripe.org/en/6/) for more details.

## Maintainers

*  [Dynamic](https://www.dynamicagency.com) (<dev@dynamicagency.com>)

## Bugtracker
Bugs are tracked in the issues section of this repository. Before submitting an issue please read over
existing issues to ensure yours is unique.

If the issue does look like a new bug:

- Create a new issue
- Describe the steps required to reproduce your issue, and the expected outcome. Unit tests, screenshots
  and screencasts can help here.
- Describe your environment as detailed as possible: SilverStripe version, Browser, PHP version,
  Operating System, any installed SilverStripe modules.

Please report security issues to the module maintainers directly. Please don't file security issues in the bugtracker.

## Development and contribution
If you would like to make contributions to the module please ensure you raise a pull request and discuss with the module maintainers.
