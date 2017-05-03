<?php

namespace Model;

use \W\Model\Model;
use \W\Model\UsersModel;

class UserModel extends UsersModel
{
    function getAllTable($id_user){
	    $query = $this->dbh->prepare("
	    	SELECT u.*, b.*, r.*
			FROM users u
			INNER JOIN buildings b
			ON u.id = b.id_user
			INNER JOIN ressources r
			ON u.id = r.id_user
			WHERE u.id = :id_user
		");
	    $query->bindValue(":id_user", $id_user, \PDO::PARAM_INT);
	    $query->execute();

	    return $query->fetch(\PDO::FETCH_OBJ);
    }

    function getUTable($id_user){
	    $query = $this->dbh->prepare("
	    	SELECT u.*
			FROM users u
			WHERE u.id = :id_user
		");
	    $query->bindValue(":id_user", $id_user, \PDO::PARAM_INT);
	    $query->execute();

	    return $query->fetch(\PDO::FETCH_OBJ);
    }

    function getBTable($id_user){
	    $query = $this->dbh->prepare("
	    	SELECT b.*
			FROM users u
			INNER JOIN buildings b
			ON u.id = b.id_user
			WHERE u.id = :id_user
		");
	    $query->bindValue(":id_user", $id_user, \PDO::PARAM_INT);
	    $query->execute();

	    return $query->fetch(\PDO::FETCH_OBJ);
    }

    function getCTable($id_user){
	    $query = $this->dbh->prepare("
	    	SELECT c.*
			FROM users u
			INNER JOIN construct c
			ON u.id = c.id_user
			WHERE u.id = :id_user
		");
	    $query->bindValue(":id_user", $id_user, \PDO::PARAM_INT);
	    $query->execute();

	    return $query->fetch(\PDO::FETCH_OBJ);
    }

    function getBLevel($id_user){
	    $query = $this->dbh->prepare("
	    	SELECT b.*
			FROM users u
			INNER JOIN buildings b
			ON u.id = b.id_user
			WHERE u.id = :id_user
		");
	    $query->bindValue(":id_user", $id_user, \PDO::PARAM_INT);
	    $query->execute();

	    return $query->fetch(\PDO::FETCH_OBJ);
    }

    function getRTable($id_user){
	    $query = $this->dbh->prepare("
	    	SELECT r.*
			FROM users u
			INNER JOIN ressources r
			ON u.id = r.id_user
			WHERE u.id = :id_user
		");
	    $query->bindValue(":id_user", $id_user, \PDO::PARAM_INT);
	    $query->execute();

	    return $query->fetch(\PDO::FETCH_OBJ);
    }

    function refreshRessources($wood, $water, $food, $camper, $id_user){

    	$query = $this->dbh->prepare("
    		UPDATE ressources r
			SET wood = :wood, water = :water, food = :food, camper = :camper
			WHERE r.id_user = :id_user
    	");

        $query->bindParam(':wood', $wood, \PDO::PARAM_INT);
        $query->bindParam(':water', $water, \PDO::PARAM_INT);
        $query->bindParam(':food', $food, \PDO::PARAM_INT);
        $query->bindParam(':camper', $camper, \PDO::PARAM_INT);

        $query->bindParam(":id_user", $id_user, \PDO::PARAM_INT);

        return $query->execute();

    }


    function refreshAllBuildings($wood_farm, $water_farm,  $food_farm, $wood_stock, $water_stock, $food_stock, $cabanon, $radio, $wall, $camp, $id_user){


    	$query = $this->dbh->prepare("
    		UPDATE buildings b
			SET wood_farm = :wood_farm, water_farm = :water_farm,  food_farm = :food_farm, wood_stock = :wood_stock, water_stock = :water_stock, food_stock = :food_stock, cabanon = :cabanon, radio = :radio, wall = :wall, camp = :camp
			WHERE b.id_user = :id_user
    	");

        $query->bindParam(':wood_farm', $wood_farm, \PDO::PARAM_INT);
        $query->bindParam(':water_farm', $water_farm, \PDO::PARAM_INT);
        $query->bindParam(':food_farm', $food_farm, \PDO::PARAM_INT);
        $query->bindParam(':wood_stock', $wood_stock, \PDO::PARAM_INT);
        $query->bindParam(':water_stock', $water_stock, \PDO::PARAM_INT);
        $query->bindParam(':food_stock', $food_stock, \PDO::PARAM_INT);
        $query->bindParam(':cabanon', $cabanon, \PDO::PARAM_INT);
        $query->bindParam(':radio', $radio, \PDO::PARAM_INT);
        $query->bindParam(':wall', $wall, \PDO::PARAM_INT);
        $query->bindParam(':camp', $camp, \PDO::PARAM_INT);

        $query->bindParam(":id_user", $id_user, \PDO::PARAM_INT);

        $query->execute();

        return $query->rowCount() > 0 ? true : false;

    }

    function refreshBuildings($nom_bdd, $nom_jointure, $valeur, $id_user){

    	$query = $this->dbh->prepare("
    		UPDATE buildings b
			SET $nom_bdd = $nom_jointure
			WHERE b.id_user = :id_user
    	");

        $query->bindParam($nom_jointure, $valeur, \PDO::PARAM_INT);

        $query->bindParam(":id_user", $id_user, \PDO::PARAM_INT);

        $query->execute();

        return $query->rowCount() > 0 ? true : false;

    }

    function TimeConstruct($nom_bdd, $nom_jointure, $valeur, $id_user){

    	$query = $this->dbh->prepare("
    		UPDATE construct c
			SET $nom_bdd = $nom_jointure
			WHERE c.id_user = :id_user
    	");

        $query->bindParam($nom_jointure, $valeur, \PDO::PARAM_INT);

        $query->bindParam(":id_user", $id_user, \PDO::PARAM_INT);

        return $query->execute();

    }

	function selectTimeBDD ($id_user){
	    	$query = $this->dbh->prepare("
		    	SELECT u.refresh_wood, u.refresh_water, u.refresh_food, u.refresh_camper
				FROM users u
				WHERE u.id = :id_user
			");
		    $query->bindValue(":id_user", $id_user, \PDO::PARAM_INT);
		    $query->execute();

		    return $query->fetch(\PDO::FETCH_OBJ);
	    }

    function refreshTimeBDD ($nom_bdd, $nom_jointure, $valeur, $id_user){
    	$query = $this->dbh->prepare("
    		UPDATE users u
			SET $nom_bdd = $nom_jointure
			WHERE u.id = :id_user
    	");

        $query->bindParam($nom_jointure, $valeur, \PDO::PARAM_INT);

        $query->bindParam(":id_user", $id_user, \PDO::PARAM_INT);

        $query->execute();

        return $query->rowCount() > 0 ? true : false;
    }

    public function findAllJoinCampers($orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
	{

		$sql = 'SELECT * FROM ' . $this->table;

        $sql .= ' LEFT JOIN ressources ON users.id = ressources.id_user';

		if (!empty($orderBy)){

			//sécurisation des paramètres, pour éviter les injections SQL
			if(!preg_match('#^[a-zA-Z0-9_$]+$#', $orderBy)){
				die('Error: invalid orderBy param');
			}
			$orderDir = strtoupper($orderDir);
			if($orderDir != 'ASC' && $orderDir != 'DESC'){
				die('Error: invalid orderDir param');
			}
			if ($limit && !is_int($limit)){
				die('Error: invalid limit param');
			}
			if ($offset && !is_int($offset)){
				die('Error: invalid offset param');
			}

			$sql .= ' ORDER BY '.$orderBy.' '.$orderDir;
		}


        if($limit){
            $sql .= ' LIMIT '.$limit;
            if($offset){
                $sql .= ' OFFSET '.$offset;
            }
        }
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}

    public function getAttacked($id_user, $wallLevel = 0, $probaZombie, $probaPlayer) {
        $report_manager = new ReportsModel();
        // Chance d'attaque
        $atk = rand(0, 100);

        // Attaque de zombies ?
        if ($atk < $probaZombie){
            $atkResult = rand(0, 100);

            // 50% plus 2*le niveau du mur de ne pas subir de perte
            // mur niveau 25 = les zombies n'ont plus d'impact
            if ($atkResult > ( 50 + ($wallLevel * 2) )) {
                // Récupération des ressources de l'utilisateur
                $ressources = $this->getRtable($id_user);

                // Attaque de zombie = perdre entre 20 et 30% de ressources
                $newWater = round($ressources->water * (1 - 0.01*rand(20, 30)));
                $newFood  = round($ressources->food  * (1 - 0.01*rand(20, 30)));
                $newWood  = round($ressources->wood  * (1 - 0.01*rand(20, 30)));
                $newCamper= round($ressources->camper* (1 - 0.01*rand(10, 15)));

                // Rapport d'attaque
                $report = "Vous avez subi une attaque de zombies.<br>
                Vous avez perdu :<br>"
                .($ressources->water - $newWater)." eau,<br>"
                .($ressources->food - $newFood)." nourritures,<br>"
                .($ressources->wood - $newWood)." bois.<br>"
                .($ressources->camper - $newCamper)." campeurs.<br>";

                // Update les ressources
                $this->refreshRessources($newWood, $newWater, $newFood, $newCamper, $id_user);
                $_SESSION['ressources']->wood = $newWood;
                $_SESSION['ressources']->water = $newWater;
                $_SESSION['ressources']->food = $newFood;
                $_SESSION['ressources']->camper = $newCamper;

            } else {
                // Rapport d'attaque
                $report = "Vous avez subi une attaque de zombies.<br>
                Votre mur vous a permis de vous defendre sans perdre de ressources.";
            }
            $reportName = "Attaque de zombies";

            // Fin attaque de zombies
        } elseif ( $atk < ($probaZombie + $probaPlayer) ) {
            // Attaque de joueur
            $atkResult = rand(0, 100);
            $users = $this->findAll();
            foreach ($users as $user) {
                if ($user['attacking_campers']) {
                    // Les utilisateurs attaquant
                    $attackingUsers [] = $user;
                }
            }

            // Il y a des joueurs qui veulent attaquer
            if ( !empty($attackingUsers) ) {
              // Récupération des deux joueurs
              $a_user = $attackingUsers[rand(0, ( sizeof($attackingUsers) - 1 ))];
              $d_user = $this->find($id_user);

              // Campeur du défenseur
              $defendingCampers = $this->getRTable($id_user)->camper - $d_user['attacking_campers'];

              // Résultat de l'attque par rapport au mur
              $defense = ($wallLevel * 100) - $a_user['attacking_campers'];

              // Mur plus fort que l'attaque == défenseur win
              // Aucune modif. de ressources
              if ($defense > 0) { // A CHANGER
                // Perte de 70 à 90% des campers attaquant
                $attackersLeft = round($a_user['attacking_campers'] * (1-0.01*rand(70,90)));

                // Perte pour le défenseur
                if ($a_user['attacking_campers'] <= $defendingCampers) {
                    // Perte de 50% du nombre d'attaquant restant
                    $defendingCampersLost = round($attackersLeft * (1 - 0.5));
                } else {
                    // Si le def gagne mais qu'il y avait plus d'atcks que de défs
                    // S'il y a 10x plus d'atck perte de 10% de ses campeurs
                    // S'il y a 100x plus d'atck perte de 20% de ses campeurs
                    $defendingCampersLost = round( $defendingCampers - ( $defendingCampers * (1 - 0.01 * (10 * log10( $a_user['attacking_campers'] / $defendingCampers ))) ) );
                }

                $report = "Vous avez été attaqué par un groupe de campeurs, vous les avez repoussé mais "
                .$defendingCampersLost;
                $report .= ($defendingCampersLost == 1)? " de vos campeurs est mort.":" de vos campeurs sont morts.";

                $attackersLost = ($a_user['attacking_campers'] - $attackersLeft);
                $atkReport = "Vos campeurs sont revenus d'exploration, ils ont trouvé un camp qu'ils ont attaqué.<br>
                Malheureusement, les habitants du camp ont vu vos campeurs arriver, " . $attackersLost;
                $atkReport .= (($a_user['attacking_campers'] - $attackersLeft) == 1)? " de vos campeurs est mort.":" de vos campeurs sont morts.";
            } else {
                // Perte du défenseur, perte de campeurs + ressources
                // Perte de campeurs pour l'attaquant
                $attackersLeft = round($a_user['attacking_campers'] * (1-0.01*rand(1,5)));

                // Perte de campeurs pour le defenseur (entre 1 et 25%)
                $defendingCampersLost = round( $defendingCampers * (1-0.01*rand(1,25)) );

                // Capacité de transport de ressources
                $capacity = $attackersLeft * 100;

                // Calcul des ressources à prendre
                $ressources = $this->getRtable($id_user);

                // Butin bois
                if ( ($capacity / 2) > ($ressources->wood / 2)) {
                    $woodTaken = round($ressources->wood / 2);
                } else {
                    $woodTaken = round($capacity / 2);
                }
                // Butin nourriture
                if ( ($capacity / 3) > ($ressources->food / 2)) {
                    $foodTaken = round($ressources->food / 2);
                } else {
                    $foodTaken = round($capacity / 3);
                }
                // Butin eau
                if ( ($capacity / 5) > ($ressources->water / 2)) {
                    $waterTaken = round($ressources->water / 2);
                } else {
                    $waterTaken = round($capacity / 5);
                }

                // Actualisation des ressources du défenseur
                $this->refreshRessources(
                    ($ressources->wood - $woodTaken),
                    ($ressources->water - $waterTaken),
                    ($ressources->food - $foodTaken),
                    ($defendingCampersLost),
                    $id_user
                );
                $_SESSION['ressources']->wood = $ressources->wood - $woodTaken;
                $_SESSION['ressources']->water = $ressources->water - $waterTaken;
                $_SESSION['ressources']->food = $ressources->food - $foodTaken;
                $_SESSION['ressources']->camper = $defendingCampersLost;

                // Ajout des ressources à l'attaquant
                $attackersLost = ($a_user['attacking_campers'] - $attackersLeft);

                $atkRessources = $this->getRtable($a_user['id']);
                $this->refreshRessources(
                    $atkRessources->wood + $woodTaken,
                    $atkRessources->water + $waterTaken,
                    $atkRessources->food + $foodTaken,
                    $atkRessources->camper - $attackersLost,
                    $a_user['id']
                );

                // Création des rapports pour les deux joueurs
                $report = "Vous avez été attaqué par un groupe de campeurs.<br>
                Vous avez perdu :<br>"
                .($waterTaken)." eau,<br>"
                .($foodTaken)." nourritures,<br>"
                .($woodTaken)." bois.<br>"
                .($ressources->camper - $defendingCampersLost)." campeurs.<br>";

                $atkReport = "Vos campeurs sont revenus d'exploration.<br>
                Ils ont trouvé un camp qu'ils ont attaqué.<br>
                Ils raménent :<br>"
                .$waterTaken." eau,<br>"
                .$foodTaken." nourritures,<br>"
                .$woodTaken." bois.<br>".$attackersLost;
                $atkReport .= ($attackersLost == 1)? " de vos campeurs est mort.":" de vos campeurs sont morts.";
            }

              $reportName = "Vous avez été attaqué pendant la nuit";
              // Attaquant
              $report_manager->insert([
                  'id_user'   => $id_user,
                  'name'      => "Compte rendu de l'exploration",
                  'report'    => $atkReport,
              ], false);

              // Un joueur a attaqué, son nombre de campeurs voulant attaqué repasse à 0
              $this->update(['attacking_campers'=>0],$a_user['id']);
            } else {
              // Aucune attaque dans la nuit
              $reportName = "Compte rendu de la nuit";
              $report = "La nuit a été calme.";
            }
        } else {
            // Aucune attaque dans la nuit
            $reportName = "Compte rendu de la nuit";
            $report = "La nuit a été calme.";
        }

        // Ajouter le rapport à l'utilisateur en bdd
        // Défenseur
        $report_manager->insert([
            'id_user'   => $id_user,
            'name'      => $reportName,
            'report'    => $report,
        ], false);

        // var_dump($report);
        // if(isset($atkReport)){
        //     var_dump($atkReport);
        // }
    }

}
