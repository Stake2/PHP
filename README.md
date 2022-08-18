# Stake2 PHP

![PHP 7.4.26](https://img.shields.io/badge/PHP-7.4.26-brightgreen.svg)
[![Contributors](https://img.shields.io/github/contributors/Stake2/Websites.svg)](https://github.com/Stake2/Websites/graphs/contributors)

The PHP files for my [Websites](https://thestake2.netlify.app/)<br>
HTML files stay here [Websites Repository](https://github.com/Stake2/Websites)<br>
Made by me, [Stake2](https://github.com/Stake2)

## License
Using [MIT License](https://github.com/Stake2/PHP/blob/main/LICENSE)<br>

## COC
Read [Code of Conduct](https://github.com/Stake2/PHP/blob/main/CODE_OF_CONDUCT.md)<br>

## Contribute
[How to Contribute](https://github.com/Stake2/PHP/blob/main/CONTRIBUTING.md)<br>

## Websites
The websites are loaded from the files inside the [Websites](https://github.com/Stake2/PHP/tree/main/Websites/) folder.<br>

## Loading websites
1. Change the ``Document Root`` folder of your server to the folder where you cloned the repository
2. Start your server
3. You can open the [Select_Website.php](https://github.com/Stake2/PHP/blob/main/Select_Website.php) file on ``localhost`` to select a website using the form<br>
Or type the localhost URL with the website and language you want to use<br>
URL parameters:
```
http://localhost/?website=[website_name_here]&language=English
website: website name
language: language of the website
```
- A list of website names in English can be found in [English Websites.txt](https://github.com/Stake2/Stake2-PHP/blob/main/Variables/Website%20PHP%20Files/Websites%20List/English%20Websites.txt)
- Currently supported languages: ``English`` and ``Portuguese``<br>

## How websites are loaded
1. The [Index.php](https://github.com/Stake2/stake2-php/blob/master/Index.php) file gets the GET variables from the URL<br>
2. Defines the language related variables using the ``language`` from GET
3. Searches for the ``website`` from GET on the [Websites](https://github.com/Stake2/PHP/tree/master/Websites) folder<br>
3. Defines the variables for the website and loads its dependencies and PHP files