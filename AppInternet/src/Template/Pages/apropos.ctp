Frédéric England
</br>
420-5b7 MO Applications internet.
</br>
Automne 2018, Collège Montmorency.
</br>
<a href="https://github.com/Fred5B5/AppInternetTP3"> Mon github </a>
</br>
<h5>Tp3 en bas de la page.</h5>

Une description sommaires des étapes d'utilisation typiques permettant de vérifier le bon fonctionnement de votre application web:</br>
Vous devez indiquer clairement comment et avec quels éléments de vos pages interagir:</br>
Creer un usager en cliquant sur le bouton s'inscrire en haut a droite, se connecter, le email de confirmation seras envoyer, par contre la page de confirmation ne fonctionne pas au complet.</br>
Il y a un autocomplete dans les emplacements.</br>
On peut avoir en pdf la vue d'un vol.</br>
(Usager admin pour pouvoir tester USER : ADMIN PASSWORD : ADMIN)</br>
(Usager Super-User pour pouvoir tester USER : TEST2 PASSWORD : TEST2 )</br>
</br>
En tant qu'utilisateur confirmer, vous pouvez changer votre avatar en cliquant sur votre nom pour aller dans votre profil puis en cliquant edit pour changer de photos.</br>
Pour ajouter des photos a la base de donner cela ce fait par l'index puis en allant dans ImageUser, les photos sont communautaire.</br>
</br>
En tant qu'utilisateur vous pouvez allez reserver un vol dans l'index sous reservation.</br>
L'admin peut ajouter des vols, emplacements.</br>
</br>
Les visiteurs, usagers, usagers confirmer et admins on tous des droits differents.</br>
</br>
Les id des vols ont ete laisser pour des raisons evidentes que l'ont ne peut reconnaitre des vols sans leur id.</br>
</br>
Un usagers peut avoir plusieurs reservations de vols et un vols peut avoir plusieurs clients qui ont reserver pour celui-ci.</br>
Un emplacement peut avoir plusieurs vols, un vol a toujours 2 emplacement.</br>
</br>
Je pense que cela est tout, j'espere ne rien oublier.</br>
</br>
Ah oui, la page Apropos est à l'index et est accessible a tous.</br>
</br>
Je n'ai malheureusement plus le diagramme de l'an passer, voici quand meme celui de ma DB
<td><img src="/AppInternet/webroot/img/diag1.png" alt="CakePHP" /></td></br>
</br>
</br>
</br>

Du a cette erreur je ne peux export la page de coverage, c'est un probleme sensiblement sans solution sur internet...
</br>
PHP Fatal error:  Class 'PHPUnit\Framework\BaseTestListener' not found in E:\AMPPS\Ampps\www\AppInternet\vendor\cakephp\cakephp\src\TestSuite\Fixture\FixtureInjector.php on line 28
PHP Stack trace:
PHP   1. {main}() E:\AMPPS\Ampps\www\AppInternet\phpunit-7.4.3.phar:0
PHP   2. PHPUnit\TextUI\Command::main() E:\AMPPS\Ampps\www\AppInternet\phpunit-7.4.3.phar:616
PHP   3. PHPUnit\TextUI\Command->run() phar://E:/AMPPS/Ampps/www/AppInternet/phpunit-7.4.3.phar/phpunit/TextUI/Command.php:162
PHP   4. PHPUnit\TextUI\TestRunner->doRun() phar://E:/AMPPS/Ampps/www/AppInternet/phpunit-7.4.3.phar/phpunit/TextUI/Command.php:206
PHP   5. PHPUnit\TextUI\TestRunner->handleConfiguration() phar://E:/AMPPS/Ampps/www/AppInternet/phpunit-7.4.3.phar/phpunit/TextUI/TestRunner.php:159
PHP   6. class_exists() phar://E:/AMPPS/Ampps/www/AppInternet/phpunit-7.4.3.phar/phpunit/TextUI/TestRunner.php:1073
PHP   7. spl_autoload_call() phar://E:/AMPPS/Ampps/www/AppInternet/phpunit-7.4.3.phar/phpunit/TextUI/TestRunner.php:1073
PHP   8. Composer\Autoload\ClassLoader->loadClass() phar://E:/AMPPS/Ampps/www/AppInternet/phpunit-7.4.3.phar/phpunit/TextUI/TestRunner.php:1073
PHP   9. Composer\Autoload\includeFile() E:\AMPPS\Ampps\www\AppInternet\vendor\composer\ClassLoader.php:322
PHP  10. include() E:\AMPPS\Ampps\www\AppInternet\vendor\composer\ClassLoader.php:444

Fatal error: Class 'PHPUnit\Framework\BaseTestListener' not found in E:\AMPPS\Ampps\www\AppInternet\vendor\cakephp\cakephp\src\TestSuite\Fixture\FixtureInjector.php on line 28

Call Stack:
    0.0099     747392   1. {main}() E:\AMPPS\Ampps\www\AppInternet\phpunit-7.4.3.phar:0
    0.0872    8173512   2. PHPUnit\TextUI\Command::main() E:\AMPPS\Ampps\www\AppInternet\phpunit-7.4.3.phar:616
    0.0872    8178072   3. PHPUnit\TextUI\Command->run() phar://E:/AMPPS/Ampps/www/AppInternet/phpunit-7.4.3.phar/phpunit/TextUI/Command.php:162
    0.1826   12709224   4. PHPUnit\TextUI\TestRunner->doRun() phar://E:/AMPPS/Ampps/www/AppInternet/phpunit-7.4.3.phar/phpunit/TextUI/Command.php:206
    0.1826   12709248   5. PHPUnit\TextUI\TestRunner->handleConfiguration() phar://E:/AMPPS/Ampps/www/AppInternet/phpunit-7.4.3.phar/phpunit/TextUI/TestRunner.php:159
    0.1838   12783912   6. class_exists() phar://E:/AMPPS/Ampps/www/AppInternet/phpunit-7.4.3.phar/phpunit/TextUI/TestRunner.php:1073
    0.1838   12784024   7. spl_autoload_call() phar://E:/AMPPS/Ampps/www/AppInternet/phpunit-7.4.3.phar/phpunit/TextUI/TestRunner.php:1073
    0.1838   12784080   8. Composer\Autoload\ClassLoader->loadClass() phar://E:/AMPPS/Ampps/www/AppInternet/phpunit-7.4.3.phar/phpunit/TextUI/TestRunner.php:1073
    0.1839   12784208   9. Composer\Autoload\includeFile() E:\AMPPS\Ampps\www\AppInternet\vendor\composer\ClassLoader.php:322
    0.1841   12793128  10. include('E:\AMPPS\Ampps\www\AppInternet\vendor\cakephp\cakephp\src\TestSuite\Fixture\FixtureInjector.php') E:\AMPPS\Ampps\www\AppInternet\vendor\composer\ClassLoader.php:444

Fatal Error: Class 'PHPUnit\Framework\BaseTestListener' not found in [E:\AMPPS\Ampps\www\AppInternet\


<H1>TP3</H1>
</br>
Veuillez prendre l'application au complet (Dossier AppInternet) pour vous assurez la meilleur des experience.
</br>
(Cela s'assureras que les appels interne de l'application, par exemples les lien dynamique au sein de l'application, fonctionne optimalement)
</br>
</br>
<h4>Nouveautés !</h4>
</br>
Vous pouvez observer une liste lier dans l'ajout d'une reservation, celle-ci vous permet de choisir la destination et uniquement voir les vols y amenant.
</br>
</br>
Vous pouvez maintenant drag and drop ou glisser vos images pour l'ajout d'une image utilisateur.
</br>
</br>
Finalement, au grand désarois des robot, un captcha à été installer au login, les bloquant définitivement l'accès à notre site.
</br>
</br>
Vous retrouverez la base de données sqlite dans un dossier du même nom à la racine du projet
</br>
</br>
Du angular js a été utilisé pour les redirections de l'ajout d'image et les listes liées.
</br>
</br>
Malheureusement, n'ayant pas travailler beaucoup avec angular js dans le tp2 j'ai fait de mon mieux pour complété le tp3, mais tombe a court de temps pour terminer crud et les jetons jwt.
</br>
Merci d'avance pour votre compréhension.
</br>
</br>
<H1>Sur ce, je vous souhaite un merveilleux temps des fêtes !</H1>