<?php
include ('Database.php');
class AutoStore
{
    private $autoList;
    private $link;
    public function __construct()
    {
        $db = new db;
        $this->link = $db->getConnection();
        
    }
    function show()
    {
        print_r($this->autoList);
    }

    function carsList()
    {
        $resultArray = array();

        foreach($this->con->query('SELECT Cars.id, CarsModel.name, model 
        from Cars,CarsModel 
        where id_name = CarsModel.id') as $row) {
            $tmp_arr = array('id'=>$row['id'],'model'=>$row['model'],'name'=>$row['name']);
            array_push($resultArray, $tmp_arr); 
        }
       
        return $resultArray;
    }

    function oneAuto($id)
    {
        $resultArray = array();
       
        $stmt = $this->con->prepare("SELECT Cars.id, CarsModel.name, model , year , engin , color, max_speed, price
        FROM Cars,CarsModel WHERE id_name = CarsModel.id  
        AND Cars.id = ?");
        $stmt->execute([$id]); 
        $row = $stmt->fetch();

            $tmp_arr = array(
            'id'=>$row['id'],    
            'modelName'=>$row['name'].":".$row['model'],
            'year'=>$row['year'],
            'engine'=>$row['engin'],
            'color'=>$row['color'],
            'maxspeed'=>$row['max_speed'],
            'price'=>$row['price']);
            array_push($resultArray, $tmp_arr); 
        
        return $resultArray;
    }

    function searchAuto()
    {
        $val = 'BMW';
        $searchParam = 'Name';

        $arr = array();

        $arr = array();

        foreach($this->con->query('SELECT Cars.id, CarsModel.name, model 
        from Cars,CarsModel 
        where id_name = CarsModel.id') as $row) {
            $tmp_arr = array('id'=>$row['id'],'model'=>$row['model'],'name'=>$row['name']);
            array_push($arr, $tmp_arr); 
        }
       
        return $arr;

        foreach ($this->autoCatalog as $item){
            if($item[$searchParam] == $val){
                $tmp_arr = array(
                    'modelName'=>$item['Name'].":".$item['Model'],
                    'year'=>$item['Year'],
                    'engine'=>$item['Engine'],
                    'color'=>$item['Color'],
                    'maxspeed'=>$item['MaxSpeed'],
                    'price'=>$item['Price']
                );
                array_push($arr, $tmp_arr);    
            }
        }
        return $arr;
    }

}