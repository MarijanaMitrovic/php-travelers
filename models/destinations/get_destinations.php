<?php


function getHomeDestinations(){
    return executeQuery("SELECT *, d.id AS dest_id FROM destinations d WHERE hot='yes' LIMIT 6");
}

function get_one_dest($dest_id){
    global $conn;
    try{
       $select_dest=$conn->prepare("SELECT *, d.id AS dest_id FROM destinations d INNER JOIN continent c ON d.continent_id=c.id WHERE d.id=?");
       $select_dest->execute([$dest_id]);
       $destination=$select_dest->fetch();

       return $destination;

    }
    catch(PDOException $ex){
        return $ex->getMessage();
        errorsList($ex->getMessage());
    }
}

function getDestinations(){
    return executeQuery("SELECT *, d.id AS dest_id FROM destinations d INNER JOIN continent c ON d.continent_id=c.id ");
}



?>