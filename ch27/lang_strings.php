<?php
function defineStrings() {
	switch($_SESSION['lang']) {
		case "en":
			define("WELCOME_TXT","Welcome!");
			define("CHOOSE_TXT","Choose Language");
		break;

		case "de":
			define("WELCOME_TXT","Willkommen!");
			define("CHOOSE_TXT","Sprache auswählen");
		break;

		case "ja":
			define("WELCOME_TXT","æ­“è¿Ž");
			define("CHOOSE_TXT","è¨€èªžé¸æŠž");
		break;

		default:
			define("WELCOME_TXT","Welcome!");
			define("CHOOSE_TXT","Choose Language");
		break;
	}
}
?>
