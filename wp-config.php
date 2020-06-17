<?php

// Configuration common to all environments
include_once __DIR__ . '/wp-config.common.php';

/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress2' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'kv&>~ }Wdr@~`bQ{3uJe[c?Ikga+LUR)v[EgZIBc:86?o37/y9t6 7Z0G/7]=vd{' );
define( 'SECURE_AUTH_KEY',  'bM!B:S.M7]`!=W4LIvt$1U+6faO@$3y ?r0^D;[wcvJg!Z5`Pr90>BdmojMWZP.W' );
define( 'LOGGED_IN_KEY',    '<-Oy<X;;;?k.QLn)jn.Z3npLJhihvD3C#5Qdm?b?Z^QIj{UL,#.>b:G`u3H#qKJn' );
define( 'NONCE_KEY',        'pBNeeNf/JDe(OV>uPaADN|Z.89@qzg[9-K{kbsTc!CJ$dw1Xac[cuGG}x;8<.E7L' );
define( 'AUTH_SALT',        'Ul5BK1kp/Va8v8uuZ=TDh:<53qv?`dg:O@5+[aVEHisteceh:RL`[,T=J$L:+DKR' );
define( 'SECURE_AUTH_SALT', 'as~rIDauKDMlcwwZbQCMj.8@7,d9m;s][v%}_Q9/Dzr#WM@{u+6dZgb>$J|2iAR0' );
define( 'LOGGED_IN_SALT',   'I|[`L1~iQ~<TV``T9iwU3Xb[~5Z|.1F3VpY8~.?cVe}7j|}+0 #3ihvZb*LU_EgG' );
define( 'NONCE_SALT',       '$m*(!K)I9Hvv]D$1c,f2*KzHg``QJJ #8(c[N5Be7n2#^^9F%=R_Y^Ch_Ly@dnlo' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );


/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
