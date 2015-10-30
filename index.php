<?php

define('ROOT',dirname(__FILE__));

require_once( ROOT.'/droits.conf.php');
require_once( ROOT.'/class/accessright.class.php');

$iAccess	=	0;

$oAccess	=	new AccessRight( $iAccess);

$oAccess->addAccess( LIRE_GROUPE, AJOUTER_GROUPE, SUPPRIMER_GROUPE, MODIFIER_GROUPE, LIRE_ITEM);

echo $oAccess->getAccess().' ( '.$oAccess->getBinAccess().' )<br/>';

?>