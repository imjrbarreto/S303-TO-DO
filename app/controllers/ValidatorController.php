<?php

class ValidatorController
{
    public function validateData ($name,$description,$owner)
    {
        $errors = [];
        $name = trim($name);
        if (empty($name))
            {
                $errors['name'] = "Title is mandatory";
            } 
        elseif (strlen($name) < 3 || strlen($name) > 50)
            {
                $errors['name'] = "Title must be between 3 y 50 characters"; 
            }
        elseif (preg_match('/^[0-9]+$/', $name))
            {
                $errors['name'] = "Title cannot be only numbers";
            }
        elseif(!preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\s]+$/', $name))
            {
                $errors['name'] = "Name cannot have special chars";
            }
        
        $description = trim($description);
        if (empty($description))
            {
                $errors['description'] = "Description is mandatory";
            } 
        elseif (strlen($description) < 3 || strlen($description) > 400)
            {
                $errors['description'] = "Description must be minimum of 3 and maximum of 400 characters"; 
            }
        elseif (preg_match('/^[0-9]+$/', $description))
            {
                $errors['description'] = "Description cannot be only numbers";
            }
        elseif(!preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\s\.\,\;\:\-\!\?\¿\¡\(\)]+$/', $description))
            {
                $errors['description'] = "Description cannot have special chars";
            }

        $owner = trim($owner);
        if (empty($owner))
            {
                $errors['owner'] = "Owner is mandatory";
            } 
        elseif (strlen($owner) < 3 || strlen($owner)>50)
            {
                $errors['owner'] = "Owner must be between 3 y 50 characters"; 
            }
        elseif (preg_match('/^[0-9]+$/', $owner))
            {
                $errors['owner'] = "Owner cannot be only numbers";
            }
        elseif(!preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\s]+$/', $owner))
            {
                $errors['owner'] = "Owner cannot have special chars";
            }
        
        return $errors;

    }

}
?>