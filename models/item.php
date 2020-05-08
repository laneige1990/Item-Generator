<?php
 class Item{

    public function __construct(){
        $this->potentialImages();
    }

    private function potentialImages(){
        $connection = new Database();
        $item_ids = $this->getItemsByType($connection);

       
        $this->getItemsByAttributes($connection, $item_ids);

       // echo "<script>console.log(".json_encode($temp_image_datas).");</script>";
        // insert into image_meta table
       
    }

    private function getItemsByAttributes($connection, $item_ids){
       
        if ($_POST['gen--attributes'] == "")
         print_r( $item_ids);
            return $item_ids;  

        $gen_attributes = $_POST['gen--attributes'];
        
        $gen_attributes = explode(',',$gen_attributes);
        
        foreach($item_ids as $item_id){ // each image
            foreach($gen_attributes as $attribute){ // each attribute
                $sql = "SELECT img_ID FROM image_attributes WHERE img_ID=$item_id AND attribute_id=$attribute";
                $result = $connection->query($sql);
                if($result == ""){
                    continue;
                }   
                $copy_ids = array(); 
                while($row = $result->fetch_assoc()){
                    if (in_array($row["img_ID"], $copy_ids)){
                        continue;
                    }
                    $copy_ids[] = $row["img_ID"]; 
                   
                    print_r($copy_ids);
                }
                
            }            
        }
    }

    private function getItemsByType($connection){
        $gen_type = $_POST['gen--type'];
        $gen_sub_type = "";
        $img_ids_return = array();
        if (isset($_POST['gen--sub_type'])){$gen_sub_type = $_POST['gen--sub_type'];}
        // get by type and subtype
        $sql = "SELECT img_ID FROM image_attributes WHERE attribute_id=$gen_type";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $index = 0;  
            while($row = $result->fetch_assoc()){
                $img_ids[] = $row['img_ID'];
                if ($gen_sub_type != ""){
                    // subtype
                    $img_id = $img_ids[$index];
                    $sql = "SELECT img_ID FROM image_attributes WHERE img_ID=$img_id AND attribute_id=$gen_sub_type";
                    $sub_result = $connection->query($sql);
                    if ($sub_result->num_rows > 0) {
                        while($row2 = $sub_result->fetch_assoc()){
                            $img_ids_[] = $row2['img_ID'];
                        }
                    }
                    $index++;  
                }else{
                    $img_ids_[] = $row['img_ID'];
                }   
            }
        }
        // rarity
        $rarity = $_POST['gen--rarity'];
        foreach($img_ids_ as $img_id_rarity){
            $sql = "SELECT img_ID FROM image_attributes WHERE img_ID=$img_id_rarity AND attribute_id=$rarity";
            $result = $connection->query($sql);
            while($row = $result->fetch_assoc()){
                $img_ids_return[] = $row['img_ID'];
            }
        }
        return $img_ids_return;
    }

 }
?>