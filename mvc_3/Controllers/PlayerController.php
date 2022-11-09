<?php 

require_once(ROOT_PATH.'/Models/Player.php');
require_once(ROOT_PATH.'/Models/Goal.php');

class PlayerController{
    private $Player;
    private $request;
    private $Goal;

    public function __construct(){
        //リクエストパラメーター
        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;

        //モデルオブジェクトの生成
        $this->Player = new Player();
        //別モデルと連携
        $dbh = $this->Player->get_db_handler();
        $this->Goal = new Goal($dbh);
    }
    public function index(){
        $page = 0;
        if(isset($this->request['get']['page'])) {
            $page = $this->request['get']['page'];
        }

        $players = $this->Player->findAll($page);
        $players_count = $this->Player->countAll();
        $params = [
            'players' => $players,
            'pages' => $players_count / 20
        ];
        return $params;
    }
    public function indexGeneral(){
        $this->request['session'] = $_SESSION;
        if(empty($this->request['session']['country_id'])){
            echo '指定のパラメーターが不正です。このページは表示できません。';
            exit;
        }
        $player = $this->Player->findByCountryId_General($this->request['session']['country_id']);
        $params = [
            'player' => $player
        ];
        return $params;
    }
    public function view(){
        if(empty($this->request['get']['id'])){
            echo '指定のパラメーターが不正です。このページは表示できません。';
            exit;
        }
        $player = $this->Player->findById($this->request['get']['id']);
        $params = [
            'player' => $player
        ];
        return $params;
    }
    public function viewGoal(){
        if(empty($this->request['get']['id'])){
            echo '指定のパラメーターが不正です。このページは表示できません。';
            exit;
        }
        $goal = $this->Player->findGoalById($this->request['get']['id']);
        $params = [
            'goal' => $goal
        ];
        return $params;        
    }
    public function delete() {
        if (empty($this->request["post"]["id"])) {
            echo "指定のパラメータが不正です。このページを表示できません。";
            exit();
        }
        $this->Player->deleteById($this->request["post"]["id"]);
    }
    public function edit() {
        if (empty($this->request["post"]["id"])) {
            echo "指定のパラメータが不正です。このページを表示できません。";
            exit();
        }
        $player = $this->Player->findById($this->request["post"]["id"]);
        $Countries = $this->Player->findCountriesAll($this->request["post"]["id"]);
        $params = [
            'player' => $player,
            'Countries' => $Countries

        ];
        return $params;
    }
    public function update($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9){
        $this->Player->update($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9);
        $this->players_tmp_set();
    }
    public function nameToCountriesId($name){
        $nameId = $this->Player->getCountriesId($name);
        $params = [
          'Countries2' => $nameId
        ];
        return $params['Countries2'][0]['id'];
    }
    public function players_tmp_set(){
        $paramsAll = $this->Player->findAll_notPage();
        $this->Player->delete_DB();
        foreach($paramsAll as $value){
        $this->Player->insert_Players($this->Player->getCountriesName($value['country_id'])[0]['name'],$value['uniform_num'],$value['position'],$value['name1'],$value['club'],$value['birth'],$value['height'],$value['weight']);
        }
    }
    public function signup(){
        $Countries = $this->Player->findCountriesAll($this->request["get"]);
        $params = [
            'Countries' => $Countries
        ];
        return $params;
    }
}
?>