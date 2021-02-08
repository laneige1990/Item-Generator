<?php
 class Data{

    public function __construct(){
        require_once('models/item.php');
        $this->getDataObject();
    }

    private function getDataObject(){
        $connection = new Database();
        $data = [];
        $data = $this->getImages($connection);
       
        echo json_encode($data);
    }

    private function getImages($connection){
        $item_model = new Item();
        $sql = "SELECT ID, image_url 
                FROM image_meta 
                ORDER BY ID ASC";
        $result = $connection->query($sql);
        $result_val = [];
        while($row = $result->fetch_assoc()){
            $row = (array) $row;
            $row['state'] = $item_model->getState($connection, $row);
            $row['element'] = $item_model->getElement($connection, $row);
            $row['type'] = $this->getAttributes($connection, $row, [1,2] /* type tax id */);
            $row['rarity'] = $this->getAttributes($connection, $row, [5] /* rarity tax id */);
            $result_val[] = $row;
            
        }   
        return $result_val;
    }

    private function getAttributes($connection, $row, $taxonomy){
        $id = $row['ID'];
        $sql = "SELECT attribute_id
                FROM image_attributes 
                WHERE img_id=$id";
        $result = $connection->query($sql);
        while($row = $result->fetch_assoc()){
            $attribute_id = $row['attribute_id']; 
            $sql = "SELECT attribute
                    FROM gear_attributes 
                    WHERE ID=$attribute_id AND taxonomy_id IN (" . implode(',', $taxonomy) . ")";
            $result2 = $connection->query($sql);
            while($row2 = $result2->fetch_row()){
                return $row2;
            }
        }
    }
}

