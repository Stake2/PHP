# Stake2-PHP
The PHP files for the Stake2 Website https://thestake2.netlify.app/<br>
HTML files in here [Stake2 Website](https://github.com/Stake2/stake2-website)<br>
Made by me, [Stake2](https://github.com/Stake2)

The websites are loaded from the files inside the [Websites](https://github.com/Stake2/stake2-php/tree/master/Websites) folder.<br>
The user types the URL of the website like this:<br>
http://localhost:8080/?no-redirect=true&website_language=ptbr&website=website-name_here<br>
Typing the name of the website lower cased with spaces replaced by underlines on "website" get variable, and language on "website_language" get variable.<br>
Currently supported languages: English (enus), Brazilian Portuguese (ptbr), and European Portuguese (ptpt).<br>
The [Index.php](https://github.com/Stake2/stake2-php/blob/master/Index.php) file gets the get variables and defines the website the user typed and creates the web page.<br>