<?php
class ValidadorPasse{
    public function valida(string $passe): bool{
        if(strlen($passe) < 8){
            return false;
        }

        if(!preg_match('/[A-Z]/', $passe)){
            return false;
        }

        if(!preg_match('/\d/', $passe)){
            return false;
        }

        return true;
    }
}

?>