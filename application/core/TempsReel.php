<?php

require_once(APPPATH.'libraries/pathfinding/Pathfindable.php');

class TempsReel implements Pathfindable {

    public $records = array();

    static function from($response) {
        $instance = new TempsReel;

        foreach ($response->records as $envelop) {
            $idcourse = $envelop->record->fields->idcourse;
            if (!isset($instance->records[$idcourse])) {
                $instance->records[$idcourse] = array();
            }
            // Ajout en début pour ordre d'arrivée croissant
            array_unshift($instance->records[$idcourse], $envelop->record->fields);
        }

        return $instance;
    }

    function trajet_meme_ligne($iddepart, $idarrivee) {
        $results = array();
        
        // Parcours des "courses" (trajet d'un bus)
        foreach ($this->records as $idcourse => $arrets) {
            $depart_trouve = false;
            // Parcours des arrêts dans cette course
            foreach ($arrets as $arret) {
                if ($arret->idarret == $iddepart) {
                    $depart_trouve = true;
                } else if ($arret->idarret == $idarrivee) {
                    if ($depart_trouve) {
                        $results[] = $arret;
                    }
                    break;
                }
            }
        }

        return $results;
    }

    // Héritée
    function getVoisins($e) {

    }

    // Héritée
    function heuristic($e1, $e2) {
        return 0;
    }

    // Héritée
    function cost($e1, $e2) {
        return 1;
    }
}
