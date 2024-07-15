<?php

        class Manager extends Conexao{
            public function insert_client($data){
                $pdo = parent::get_instance();

                $sql = "INSERT INTO client VALUES(NULL, :name, :email, :cpf, :birth, :phone, :address)";

                $statement = $pdo->prepare($sql);
                foreach($data as $key => $value){
                    $statement->bindValue(":$key", $value);
                }

                $statement->execute();
            }
        
            public function list_client(){
                $pdo = parent::get_instance();
                $sql = "SELECT * FROM client order by id desc";
                $statement = $pdo->query($sql);
                $statement->execute();

                return $statement->fetchAll();
            }
            public function delete_client($id){
                $pdo = parent::get_instance();
                $sql = "DELETE FROM client WHERE id = :id";
                $statement = $pdo->prepare($sql);
                $statement->bindValue("id", $id);
                $statement->execute();
            }
            public function update_client($data)
            {
                $pdo = parent::get_instance();
                $sql = "UPDATE client
                            SET nome = :name,
                                email = :email,
                                    cpf = :cpf,
                                        dtnascimento = :birth,
                                            telefone = :phone,
                                                endereco = :address
                                                    WHERE id = :id";
                $statement = $pdo->prepare($sql);
                foreach ($data as $key => $value){
                    $statement->bindValue(":$key", $value);
                }
                $statement->execute();

            }
        }
