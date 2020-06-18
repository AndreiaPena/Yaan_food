<?php 
 /*
 Plugin Name: Satisfaction
 Plugin URI: http://satisfaction.com/
 Description: Un plugin de satisfaction pour le site.
 Version: 1.0.0
 Author: Yaan Food
 Author URI: http://satisfaction.com/
 License: GPL3
 Text Domain: satisfaction
 */


//require_once( __DIR__ . '\\satisfaction.php');

class Satisfaction{
    public function __construct(){
        add_action('admin_menu',array($this,'declareAdmin'));
    }
    public static function declareAdmin(){
        add_menu_page('Réponses du questionnaire', 'Questionnaire', 'manage_options', 'question', array('Satisfaction', 'menuHtml'));
        add_submenu_page('question','Réinitialisation du questionnaire','Réinitialisation','manage_options','reinit',array('Satisfaction','menuHtmlInit'));
    }
    public static function menuHtml(){
        echo '<h1>'.get_admin_page_title().'</h1>';
        echo '<p>Vous êtes sur la page du plugin Satisfaction</p>';
        echo Satisfaction::resume();
    }
    public static function menuHtmlInit(){
        global $wpdb;
        echo '<h1>Réinitialisation</h1>';
        echo '<p>Cliquez sur le bouton suivant pour réinitialiser le questionnaire</p>';
        echo "<form method='POST' action='#'>
        <input type='submit' name='reinit'>
        </form>
        ";
        if(isset($_POST['reinit'])){
          $query = 'TRUNCATE TABLE '.$wpdb->prefix.'reponse_question';
          $wpdb->query($query);
          echo "La table à été réinitialisée :)"; 
        }
    }
    public static function install(){
        Satisfaction::install_db();
    }
    public static function uninstall(){
        Satisfaction::uninstall_db();
    }
    public static function desactivate(){
    
    }

    // méthode pour créer une table reponse-question dans notre database Wordpress2
    static public function install_db(){
        // La base de données dans wordpress est gérée de manière très simple. Tout est dans la variable $wpdb (wordpress database).
        global $wpdb;
        $wpdb->query("CREATE TABLE IF NOT EXISTS ".$wpdb->prefix."reponse_question (id int(11) AUTO_INCREMENT PRIMARY KEY, reponse tinyint(1), idUser int(11));");
    }

    // méthode pour supprimer la table reponse-question
    static public function uninstall_db(){
        global $wpdb;
        $wpdb->query("DROP TABLE IF EXISTS ".$wpdb->prefix."reponse_question;"); 
      
    }

    public static function resume(){
        global $wpdb;
        $query = "SELECT * FROM ".$wpdb->prefix."reponse_question";
        $resultats = $wpdb->get_results($query) ;
        $oui = 0;
        $non = 0;
        foreach($resultats as $rep){
          if($rep->reponse==1)
            $oui++;
          else
            $non++;
          }
        return "Oui : $oui, Non : $non";
       }

}
// instanciation de Satisfaction et création des hooks pour l'activation, la désactivation et la désinstallation du plugin
new Satisfaction();
register_activation_hook(__FILE__,array('Satisfaction','install')); 
register_deactivation_hook(__FILE__,array('Satisfaction','desactivate'));
register_uninstall_hook(__FILE__,array('Satisfaction','uninstall'));



//require_once(__DIR__ . '\\afficheQuestion.php');

// class affiche Question pour la création du widget sur Wordpress
class afficheQuestion extends WP_Widget{
  public function __construct()
  {
    parent::__construct('idAfficheQuestion', 'Affiche Question', array('description', 'Un formulaire pour répondre'), array());
 
  }

  // permet de construire le form visible sur le site
  public function widget($args, $ins){
    echo "
    <form class='form-satisfaction' action='' method='post'>
      <p>".$ins['question']."</p>
      <input type='checkbox' name='oui' id='oui'/> Oui
      <input type='checkbox' name='non' id='non'/> Non <br/>
      <input class='satisfaction-button-submit' value='Envoyer' type='submit'/>
    </form>";
  }

  // Permet de créer une question dans les paramètres du widget
  public function form($instance){
    $question = isset($instance['question'])?$instance['question']:'Aimez-vous ce site ?';
    $id = $this->get_field_id('question');
    $name = $this->get_field_name('question');
    echo "<p>Nom de la question <input type='text' id=$id name='".$name."' value='".$question."'></p>";
  }

  
}

function declarerWidget(){
    register_widget('afficheQuestion');
}

add_action('widgets_init','declarerWidget');

// permet d'insérer les réponses dans la DB
global $wpdb;

$table =$wpdb->prefix.'reponse_question';
$idUser = get_current_user_id();
if(isset($_POST['oui'])){
  $wpdb->insert( $table, array('idUser'=>$idUser,'reponse'=>1));
}
if(isset($_POST['non'])){
  $wpdb->insert( $table, array('idUser'=>$idUser,'reponse'=>0));
}


