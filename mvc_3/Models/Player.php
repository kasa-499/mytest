<?php 
require_once(ROOT_PATH.'/Models/Db.php');

class Player extends Db {
    private $table = 'players';
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }
    /**
     * playersテーブルからすべてのデータを取得
     * 
     * @param integer $id 選手ID
     * @return array $result 指定の選手データ
     */
    public function findById($id = 0):Array {
        $sql = 'SELECT *, p.name as p_name, c.name as c_name,  p.id as p_id FROM '.$this->table;
        $sql .= ' p JOIN countries c ON c.id = p.country_id WHERE p.id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
      }
    public function findByCountryId($id = 0):Array {
        $sql = 'SELECT *, p.name as p_name, c.name as c_name,  p.id as p_id FROM '.$this->table;
        $sql .= ' p JOIN countries c ON c.id = p.country_id WHERE p.country_id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
      }
    public function findByCountryId_General($id):Array {
        $sql = 'SELECT *, p.name as p_name, c.name as c_name,  p.id as p_id FROM '.$this->table;
        $sql .= ' p JOIN countries c ON c.id = p.country_id WHERE p.country_id = :id AND p.del_flg = 0';
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
      }
    public function findGoalById($id = 0):Array {
        $sql = 'SELECT p2.kickoff as 試合日時, c.name as 対戦相手, g.goal_time as ゴールタイム, p1.id as p1_id FROM '.$this->table;
        $sql .= ' p1 JOIN goals g ON p1.id = g.player_id JOIN pairings p2 ON g.pairing_id = p2.id JOIN countries c ON p2.enemy_country_id = c.id';
        $sql .= ' WHERE p1.id = :id';
        $sql .= ' ORDER BY p2.kickoff ASC';
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    /**
     * playersテーブルからすべてのデータを取得
     * 
     * @param integer $page ページ番号
     * @return array $result 全選手データ(20件ごと)
     */
    public function findAll($page = 0):array{
        $sql = 'SELECT *, c.name as c_name, p.name as p_name, p.id as p_id FROM '.$this->table;
        $sql .= ' p JOIN countries c ON c.id = p.country_id';
        $sql .= ' WHERE p.del_flg = 0';
        $sql .= ' LIMIT 20 OFFSET '.(20 * $page);
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        // echo $sql;
        return $result;
      }
    /**
     * playersテーブルから全データ数を取得
     * 
     * @return int $count 選手データの件数
     */
    public function countAll():int {
        $sql = 'SELECT count(*) as count FROM players';
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $count = $sth->fetchColumn();
        return $count;
    }
    public function deleteById($id) {
        $sql = "UPDATE players SET del_flg = 1 WHERE id = :id";
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':id',$id,PDO::PARAM_INT);
        $sth -> execute();
    }
    public function findCountriesAll() {
        $sql = 'SELECT id, name FROM countries';
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function update($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9){
        $sql = 'UPDATE players SET uniform_num = :a2,position = :a3,name = :a4, country_id = :a5, club = :a6, birth = :a7, height = :a8, weight = :a9 WHERE id = :a1';
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':a1', $a1);
        $sth->bindParam(':a2', $a2);
        $sth->bindParam(':a3', $a3);
        $sth->bindParam(':a4', $a4);
        $sth->bindParam(':a5', $a5);
        $sth->bindParam(':a6', $a6);
        $sth->bindParam(':a7', $a7);
        $sth->bindParam(':a8', $a8);
        $sth->bindParam(':a9', $a9);
        $sth->execute();
      }
    public function getCountriesId($name){
        $sql = 'SELECT id FROM countries where name = :name';
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':name', $name);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getCountriesName($Id){
        $sql = 'SELECT name FROM countries where id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':id', $Id);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function insert_Players($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8){
        $sql = 'insert into players_tmp values ( :a1,:a2,:a3,:a4,:a5,:a6,:a7,:a8 ) ';
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':a1', $a1);
        $sth->bindParam(':a2', $a2);
        $sth->bindParam(':a3', $a3);
        $sth->bindParam(':a4', $a4);
        $sth->bindParam(':a5', $a5);
        $sth->bindParam(':a6', $a6);
        $sth->bindParam(':a7', $a7);
        $sth->bindParam(':a8', $a8);
        $sth->execute();
    }
    public function findAll_notPage():Array{
        $sql = 'SELECT *,a.name as name1,b.name as name2,a.id as id1 FROM '.$this->table;
        $sql .= ' as a LEFT JOIN countries as b ON a.country_id = b.id'.' WHERE a.del_flg = 0 ';
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function delete_DB(){
        $sql = 'delete from players_tmp ';
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
    }

}
?>