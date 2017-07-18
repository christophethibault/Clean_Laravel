
# Quickbrain V2

Projet basé sur Laravel 5.4 <p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Pré-requis de développement sous Windows
 - Git
 - Virtual Box
 - Vagrant

## Initialisation environnement
 1. Récupérer le contenu du projet via Gitlab
 2. Créer le fichier .env à la racine (cf. .env.example)
 3. Créer le fichier vagrant.yml dans le répertoire /virtual/vagrant (cf. vagrant.yml.example)
 4. En ligne de commande bash dans /virtual/vagrant faire un _vagrant up_

## Git global setup

git config --global user.name "Damien M."
git config --global user.email "damien@dmn13.com"

## Create a new repository

git clone git@gitlab.ennovia.fr:crazylog/quickbrain-V2.git
cd quickbrain-V2
touch README.md
git add README.md
git commit -m "add README"
git push -u origin master

## Existing folder

cd existing_folder
git init
git remote add origin git@gitlab.ennovia.fr:crazylog/quickbrain-V2.git
git add .
git commit -m "Initial commit"
git push -u origin master

## Existing Git repository

cd existing_repo
git remote add origin git@gitlab.ennovia.fr:crazylog/quickbrain-V2.git
git push -u origin --all
git push -u origin --tags

## Logique de développement

 - BDD
 - Controlers + test
 - Routes
 - JS

## Arborescence

 - .doc
 - app
 - bootstrap
 - config
 - database
 - node_modules
 - public
 - resources
 - routes
 - storage
 - tests
 - tools
 - vendor
 - virtual
 - winbat (windows only)

## Règles de développements
 - Commenter son code :) en respectant les standards
 - Indentation par tabulation (permet la compatibilité entre plusieurs développeurs)

## Environnement Windows

Au premier lancement : utiliser la console pour appeler vagrant en mode administrateur.

Activer l'autorisation de création de Symlinks sur Windows via "Stratégie de sécurité locale" (secpol.msc) en administrateur
en ajoutant les utilisateurs nécessaires dans
    -> Paramètres de sécurité
        -> Statégies locales
            -> Attribution des droits utilisateur.

Si Windows 10 Home tout pourri alors : https://www.itechtics.com/enable-gpedit-windows-10-home/
Avec l'outil gpedit ajouter les utilisateurs dans
    -> Local Computer Policy
        -> Computer Configuration
            -> Windows Settings
                -> Paramètres de sécurité
                    -> Stratégies locales
                        -> Attribution...
                            ->Créer des liens symboliques

## Commandes utiles
Vagrant (dans le répertoire virtual/vagrant) :
 - vagrant up
 - vagrant halt
 - vagrant ssh
 - vagrant box list
 - vagrant reload
 - vagrant box update
 - vagrant reload -force-provision

Mise à jour environnement :
 - composer.phar selfupdate
 - composer.phar update
 - composer.phar dumpautoload
 - npm prune
 - npm install
 - bower install --allow-root
 - gulp
 - php artisan migrate

Php artisan :
 - Création migration : php artisan make:migration nomMigration
 - Migration (up) : php artisan migrate
 - Migration (rollback) : php artisan migrate:rollback
 - Migration (refresh) : php artisan migrate:refresh
 - Création des seeders a partir de la BDD : php artisan iseed documents, ... --force
 - Jouer les seeds : php artisan db:seed

Problèmes de droits avec bower, composer, gulp :
 - se placer dans : /home/vagrant
 - sudo su
 - chown -R vagrant:vagrant .cache/
 - chown -R vagrant:vagrant .composer/
 - chown -R vagrant:vagrant .config/
 - chown -R vagrant:vagrant .local/

## VirtualBox
### Problème avec Virtual Box 5.1.16 & Vagrant 1.9.2
Problème de répertoire vagrant au lancement de la machine : mount -t vboxsf -o uid=1000,gid=1000 vagrant /vagrant no such file or directory
Solution : modifier le fichier C:\HashiCorp\Vagrant\embedded\gems\gems\vagrant-1.9.2\lib\vagrant\util\platform.rb
 - remplacer : "\\?\" + path.gsub("/", "\")
 - par : path.gsub("/", "\")

### Problème avec Virtual Box 5.1.18 & Vagrant 1.9.3
Problème de connexion à 0.0.0.0 (/gems/vagrant-1.9.3/lib/vagrant/util/is_port_open.rb:21:in initialize': The requested address is not valid in its context. - connect(2) for "0.0.0.0")
Solution : rajouter l'host et l'id aux commandes config.vm.network "forwarded_port" dans vagrantFile :
 - config.vm.network "forwarded_port", guest: 80, host: fwd_web_port, host_ip: "127.0.0.1", id: 'web'
 - config.vm.network "forwarded_port", guest: 3306, host: fwd_bdd_port, host_ip: "127.0.0.1", id: 'bdd'

### Problème avec Virtual Box 5.1.20 & Vagrant 1.9.4
Problème de montage de répertoire : "Vagrant was unable to mount VirtualBox shared folders"
Solution :
 - vagrant ssh
 - sudo su
 - ls -lh /sbin/mount.vboxsf -> vérifier l'existence du dossier cible :
 - si non existant => source du problème, pour corriger :
    - ln -sf /opt/VBoxGuestAdditions-5.1.20/lib/VBoxGuestAdditions/mount.vboxsf /sbin/mount.vboxsf
    - exit
    - vagrant reload

## Accents et autres sur majuscules
 - É = Alt + 144
 - È = Alt + 200
 - Ê = Alt + 210
 - Ë = Alt + 203
 - Ç = Alt + 128
 - Ñ = Alt + 165
 - ß = Alt + 225
 - Ä = Alt + 142
 - Á = Alt + 181
 - À = Alt + 183
 - Â = Alt + 182
 - Æ = Alt + 140
 - Ö = Alt + 153
 - Ô = Alt + 226
 - ½ = Alt + 171
 - ¼ = Alt + 172
 - ¾ = Alt + 243
 - Ý = Alt + 221
