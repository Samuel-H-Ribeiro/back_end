<?php
    class login {
    
    private $nome;
    private $email;
    private $senha;
        
        public function __construct($nome, $email, $senha) {
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
        }

        public function cadastroLogin ($obj, $conn) {
            $select = "SELECT email FROM login WHERE email LIKE :email";
            $result = $conn->prepare($select);
            $result->execute(array(':email' => $obj->email));
            $ret_email = $result->fetch(PDO::FETCH_ASSOC);
            $invalido = false;
                
            if ($ret_email != false) {
                if ($ret_email['email'] == $obj->email) {
                    $invalido = true;
                } 
            }elseif($invalido == false) {
                $obj->senha = password_hash($obj->senha, PASSWORD_DEFAULT);
                $insert = "INSERT INTO `login` (`nome`,`email`,`senha`) VALUES (:nome, :email, :senha)";
                $result = $conn->prepare($insert);
                $result->execute(array(':nome' => $obj->nome, ':email' => $obj->email, ':senha' =>$obj->senha));
            }
            return $invalido;
        } 
            
        // $result->execute(array(':email' => $obj->email));

        public function logar($obj, $conn) {
           
            $select = "SELECT id, nome, email, senha FROM login WHERE email = :email";
            $result = $conn->prepare($select);
            $result->execute(array(':email' => $obj->email));
            $login = $result->fetch(PDO::FETCH_ASSOC);
            echo"$login->senha";
            if(($obj->email == $login['email']) and (password_verify($obj->senha, $login['senha']))){
                if($login['id'] <= 0) {
                    $login = false;
                } 
            return $login;
            }
        }
    }
?>
            