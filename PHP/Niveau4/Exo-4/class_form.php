<?php
class form
{
	private $code; // code complet du formulaire
	private $codeinit; // code de l'entete du formulaire : balises form + fielset + legend
	private $codetext ; // code de chaque input
	private $codesubmit; // code du bouton submit

	public function __construct($action, $titre, $method="post")
	{
        $this->codeinit = "<form action=\"$action\" method=\"$method\">".
        "<fielset>".
        "<legend>".
        "<span> $titre</span>".
        "</legend>";

	
	}

	//********************************************
	public function settext($name, $libelle)
	{// notez que si vous appelez plusieurs fois la fonction settext, les input se concatènent
		$this->codetext.= "<span> $libelle  </span><input type=\"text\" name=\"$name\" /><br /><br />" ;
		
	}

	//************************************************
	public function setsubmit($name="envoi", $value="Envoyer")
	{
		$this->codesubmit= "<input type=\"submit\" name=\"$name\" value=\"$value\"/><br />" ;
	}
	
	//**************************
	public function getform()
	{
        $this->code= $this->codeinit.
        $this->codetext.
        $this->codesubmit;
        
        
        
        $this->code.="</fieldset></form>";
        echo $this->code;
	}
}
?>