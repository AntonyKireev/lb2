<?php

require_once __DIR__."/vendor/autoload.php";

use MongoDB\Client;

class DB
{
    private $db;
    private $team;
    private $game;

    public function __construct()
    {
        $this->db = new \MongoDB\Client("mongodb://127.0.0.1/");
        $this->team = $this->db->match->team;
        $this->game = $this->db->match->game;
    }

    public function showLeague()
    {
        $statement = $this->game->distinct("league");
        foreach ($statement as $data) {
            echo "<option value='$data'>$data</option>";
        }
    }

    public function showTeams()
    {
        $statement = $this->team->distinct("title");
        foreach ($statement as $data) {
            echo "<option value='$data'>$data</option>";
        }
    }

    public function findLeague($league)
    {
        $statement = $this->game->find(["league" => $league]);
        echo "<div id='content'>";
        foreach ($statement as $data) {
            $date = date("Y-m-d", substr(strval($data["date"]), 0, -3));
            echo "Date: {$date}, Place: {$data['place']}, Score: {$data['score']}, Team One: {$data['team1']}, Team Two: {$data['team2']}<br>";
        }
        echo "</div>";
    }

    public function findGames($team)
    {
        $statement = $this->game->find(['$or'=>[['team1'=>$team], ['team2'=>$team]]]);
        echo "<div id='content'>";
        foreach ($statement as $data) {
            $date = date("Y-m-d", substr(strval($data["date"]), 0, -3));
            echo "Date: {$date}, Place: {$data['place']}, Score: {$data['score']}, Team One: {$data['team1']}, Team Two: {$data['team2']}<br>";
        }
        echo "</div>";

    }

    public function findPlayers($player)
    {
        $statement = $this->team->find(["title" => $player]);
        echo "<div id='content'> Players:<br>";
        foreach ($statement->toArray()[0]['list'] as $data) {
            echo "$data<br>";
        }
        echo "</div>";
    }
}