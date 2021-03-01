<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            // Programación estructura
        
            // Red Social
        
             
            class Person {
                
                //getter / setter
                
                protected $firstName;
                protected $lastName;
                protected $nickname;
                        
                function __construct($firstName, $lastName) {
                    $this->firstName = $firstName;
                    $this->lastName = $lastName;
                }
                
                function getFirstName() {
                    return $this->firstName;
                }
                
                function setFirstName($firsName) {
                   $this->firstName = $firsName; 
                }
                
                function getNickname() {
                    return strtolower($this->nickname);
                }
                
                function setNickname($nickname) {
                   $this->nickname = $nickname; 
                }
                
                
                function fullName() {
                    return $this->firstName . ' ' . $this->lastName;
                }
            }
            
            $person1 = new Person("Laura", "Castillo");
            $person2 = new Person("Alicia", "Montemayor");
            
            $person2->setFirstName("Patricia");
            $person2->setNickname("PATRICIAX3");
            echo "{$person2->getNickname()}";
            
            
        ?>
    </body>
</html>
