<?php

function getUsers(){
return executeQuery("SELECT * FROM user");
}
