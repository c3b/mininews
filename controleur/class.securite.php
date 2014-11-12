<?php
/**
 * Classe qui regroupe les fonctions de filtrage des données entrantes dans mysql
 * et d'affichage des données
 */
class Securite
{
        /**
         * filtre les caracteres contre une possible injection SQL
         * @param string $string
         * @return string
         */
        public static function bdd($string)
        {
                // On regarde si le type de string est un nombre entier (int)
                if(ctype_digit($string))
                {
                        $string = intval($string);
                }
                // Pour tous les autres types
                else
                {
                        $string = mysql_real_escape_string($string);
                        $string = addcslashes($string, '%_');
                }

                return $string;

        }
        /**
         * Filtre les données a l'affichage pour éviter la faille XSS
         * 
         * @param string $string
         * @return string
         */
        public static function html($string)
        {
                return htmlentities($string);
        }
}