<?php

function getExperiences(){
    return executeQuery("SELECT * FROM experiences e INNER JOIN user u ON e.user_id=u.id");
}