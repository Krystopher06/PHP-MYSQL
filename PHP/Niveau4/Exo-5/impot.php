<?php
    
    class Impot
    {
        private $nom;
        private $revenu;
        private $montant;
        
//constructeur = montant revenu 
 //Quand on est dans un objet, on modifiera toujours les valeurs initial avec this

        public function __construct($n, $r){
            $this->nom = $n;// initialise le nom de l'objet avec $n
            $this->revenu = $r; // initialise le revenu de l'objet avec $r;
        }


        
        public function calculeImpot(){
            
            $tauxInf = 15;
            $tauxSup = 20;
            if($this->revenu <=15000){
                $this->montant = $this->revenu * $tauxInf / 100;
               
            }else{
                $this->montant = $this->revenu * $tauxSup / 100;
                
            }
            return $this->montant;
        }
        
        
        
      /*   
            //Version 1

            public function afficheImpot(){                                              
            $grp ="Monsieur ".$this->nom.", votre impôt est de ".$this->montant."€ <br>";
            echo $grp;
        } */
        
        public function afficheImpot(){
            $grp ="Monsieur ".$this->nom.", votre impôt est de ".$this->calculeImpot()."€ <br>";
            echo $grp;                                              // ($this->montant)
        }



    }



?>