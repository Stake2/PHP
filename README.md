# Stake2-PHP
The PHP files for the Stake2 Website https://thestake2.netlify.app/<br>
HTML files in here [Stake2 Website](https://github.com/Stake2/stake2-website)<br>
Made by me, [Stake2](https://github.com/Stake2)

### License
Using [MIT License](https://github.com/Stake2/stake2-php/blob/main/LICENSE)<br>

### COC
Read [Code of Conduct](https://github.com/Stake2/stake2-php/blob/main/CODE_OF_CONDUCT.md)<br>

### Contribute
[How to Contribute](https://github.com/Stake2/stake2-php/blob/main/CONTRIBUTING.md)<br>

### Loading websites
The websites are loaded from the files inside the [Websites](https://github.com/Stake2/stake2-php/tree/master/Websites) folder.<br>
The user types the URL of the website like this:<br>
http://localhost:8080/?no-redirect=true&website_language=ptbr&website=website_name_here<br>
Typing the name of the website lower cased with spaces replaced by underlines on "website" get variable, and language on "website_language" get variable.<br>
Currently supported languages: English (enus), Brazilian Portuguese (ptbr), and European Portuguese (ptpt).<br>
The [Index.php](https://github.com/Stake2/stake2-php/blob/master/Index.php) file gets the get variables and searches for the typed website on Websites folder.
Then it defines the variables for it, loading is dependencies and PHP files.