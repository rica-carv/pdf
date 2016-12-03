<?php
/*
* Copyright (c) e107 Inc 2015 e107.org, Licensed under GNU GPL (http://www.gnu.org/licenses/gpl.txt)
*
* Log Stats shortcode batch class - shortcodes available site-wide. ie. equivalent to multiple .sc files.
*/

if (!defined('e107_INIT')) { exit; }

class pdf_shortcodes extends e_shortcode
{

	function sc_pdf($parm)
	{
		$pref = e107::getPref();

		if (!varset($pref['plug_installed']['pdf'])) { return ''; }
    $parms = explode("^",$parm);

    if (defined("ICONPRINTPDF") && file_exists(THEME."images/".ICONPRINTPDF)) 
    {
    	$icon = "<img src='".THEME_ABS."images/".ICONPRINTPDF."' style='border:0' alt='{$parms[0]}' title='{$parms[0]}' />";
    }
    elseif (deftrue('FONTAWESOME') || deftrue('BOOTSTRAP')) 
    {
// toGlyph useless here, since bootstrap & fontawesome icons have different names...
      $class = "class='e-tip btn btn-default hidden-print' data-original-title='{$parms[0]}'";
	  	$icon = deftrue('FONTAWESOME') ? "<i class='fa fa-file-pdf-o'></i>" : "<i class='glyphicon glyphicon-book'></i>";
    }
    else
    { 
	  	$icon = "<img src='".e_PLUGIN_ABS."pdf/images/pdf_16.png' style='border:0' alt='{$parms[0]}' title='{$parms[0]}' />";
    }
    return " <a ".$class." href='".e_PLUGIN_ABS."pdf/pdf.php?{$parms[1]}'>".$icon."</a>";
	}

}



?>