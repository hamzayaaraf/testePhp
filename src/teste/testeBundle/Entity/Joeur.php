<?php

namespace teste\testeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joeur
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Joeur
{
	
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var array
     *
     * @ORM\Column(name="cards", type="array")
     */
    private $cards;
	
	
	/**
     * Constructor
     */
    public function __construct()
    {
		$this->setCards($this->triCard());
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cards
     *
     * @param array $cards
     * @return Joeur
     */
    public function setCards($cards)
    {
        $this->cards = $cards;
    
        return $this;
    }

    /**
     * Get cards
     *
     * @return array 
     */
    public function getCards()
    {
        return $this->cards;
    }
	
	// Tri function
	public function triCard(){
	
		$url="https://recrutement.local-trust.com/test/cards/57187b7c975adeb8520a283c";
		$requete=file_get_contents($url);
		$requete=json_decode($requete);
		
		$main_joueur= $requete->data->cards;
		
		$car_num=["ACE"=>"AS","TWO"=>"2","THREE"=>"3","FOUR"=>"4","FIVE"=>"5","SIX"=>"6","SEVEN"=>"7","EIGHT"=>"8","NINE"=>"9","TEN"=>"10","JACK"=>"Valet","QUEEN"=>"Dame","KING"=>"Roi"];
		$main_tempc=[];
		$main_tempco=[];
		$main_tempp=[];
		$main_tempt=[];
		$main_sort=[] ;
		
		for($i=0;$i<count($main_joueur);$i++){
		
			if($main_joueur[$i]->category=="ACE"){
				$main_joueur[$i]->value="1";
			}
			if($main_joueur[$i]->category=="JACK"){
				$main_joueur[$i]->value="12";
			}
			if($main_joueur[$i]->category=="QUEEN"){
				$main_joueur[$i]->value="13";
			}
			if($main_joueur[$i]->category=="KING"){
				$main_joueur[$i]->value="14";
			}
		}
		
		for($i=0;$i<count($main_joueur);$i++){
			if($main_joueur[$i]->category=="DIAMOND"){
				array_push($main_tempc,$main_joueur[$i]);
			}
			if($main_joueur[$i]->category=="HEART"){
				array_push($main_tempco,$main_joueur[$i]);
			}
			if($main_joueur[$i]->category=="SPADE"){
				array_push($main_tempp,$main_joueur[$i]);
			}
			if($main_joueur[$i]->category=="CLUB"){
				array_push($main_tempt,$main_joueur[$i]);
			}
		}
		
		for($I = count($main_tempc) - 2;$I >= 0; $I--) {
			for($J = 0; $J <= $I; $J++) {
			 if($main_tempc[$J + 1]->value < $main_tempc[$J]->value) {
			  $t = $main_tempc[$J + 1];
			  $main_tempc[$J + 1] = $main_tempc[$J];
			  $main_tempc[$J] = $t;
			 }
			}
		}
		   
		for($I = count($main_tempco) - 2;$I >= 0; $I--) {
			for($J = 0; $J <= $I; $J++) {
			 if($main_tempco[$J + 1]->value < $main_tempco[$J]->value) {
			  $t = $main_tempco[$J + 1];
			  $main_tempco[$J + 1] = $main_tempco[$J];
			  $main_tempco[$J] = $t;
			 }
			}
		}
		
		for($I = count($main_tempp) - 2;$I >= 0; $I--) {
			for($J = 0; $J <= $I; $J++) {
			 if($main_tempp[$J + 1]->value < $main_tempp[$J]->value) {
			  $t = $main_tempp[$J + 1];
			  $main_tempp[$J + 1] = $main_tempp[$J];
			  $main_tempp[$J] = $t;
			 }
			}
		}
		
		for($I = count($main_tempt) - 2;$I >= 0; $I--) {
			for($J = 0; $J <= $I; $J++) {
			 if($main_tempt[$J + 1]->value < $main_tempt[$J]->value) {
			  $t = $main_tempt[$J + 1];
			  $main_tempt[$J + 1] = $main_tempt[$J];
			  $main_tempt[$J] = $t;
			 }
			}
		}
		
			for($i=0;$i<count($main_tempc);$i++){
				array_push($main_sort,$main_tempc[$i]);
			}
			for($i=0;$i<count($main_tempco);$i++){
				array_push($main_sort,$main_tempco[$i]);
			}
			for($i=0;$i<count($main_tempp);$i++){
				array_push($main_sort,$main_tempp[$i]);
			}
			for($i=0;$i<count($main_tempt);$i++){
				array_push($main_sort,$main_tempt[$i]);
			}
			
		  for($i=0;$i<count($main_sort);$i++){
		  
				$main_sort[$i]->value = $car_num[$main_sort[$i]->value];
			}
		
   return $main_sort;
	}
}
