<?php
    namespace application\models;
    use PDO;

    class ApiModel extends Model {
        //지역 카테고리
        public function selArea() {
            $sql = "SELECT * FROM `area`";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function AreaCate1List() {
            $sql = "SELECT area1 FROM area";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    
        public function AreaCate2List(&$param) {
            $sql = "SELECT area2 FROM area
                    WHERE area1 = :area1
                    GROUP BY area2";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":area1", $param["area1"]);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    
        public function AreaCate3List(&$param) {
            $sql = "SELECT area3 FROM area
                    WHERE area1 = :area1
                    AND area2 = :area2
                    GROUP BY area3";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":area1", $param["area1"]);
            $stmt->bindValue(":area2", $param["area2"]);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    


        //
        public function selRestaurant() {
            $sql = "SELECT 
                        bobf.*,
                        rest.rest_name, rest.rest_address,
                        user.nick
                    FROM bobf
                        LEFT JOIN restaurant rest
                        ON bobf.irest = rest.irest
                        LEFT JOIN user
                        ON bobf.iuser = user.iuser
                    ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function insBobF(&$param) {
            $sql = "INSERT INTO bobf SET
                    irest = :irest, 
                    iuser = :iuser, 
                    title = :title, 
                    partydt = :partydt, 
                    ctnt = :ctnt, 
                    total_mem = :total_mem, 
                    cur_mem = :cur_mem, 
                    img_path = :img_path
                    ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":irest", $param["irest"]);
            $stmt->bindValue(":iuser", $param["iuser"]);
            $stmt->bindValue(":title", $param["title"]);
            $stmt->bindValue(":partydt", $param["partydt"]);
            $stmt->bindValue(":ctnt", $param["ctnt"]);
            $stmt->bindValue(":total_mem", $param["total_mem"]);
            $stmt->bindValue(":cur_mem", $param["cur_mem"]);
            $stmt->bindValue(":img_path", $param["img_path"]);
            $stmt->execute();
            return intval($this->pdo->lastInserId());
        }

    }