<?php
      session_start();

      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $profissao = $_POST['profissao'];


      function salvaEmail($nome, $email, $profissao){
            define('FILE_PATH', "./emails.json");

            $arquivo = json_decode(file_get_contents(FILE_PATH), true);

            $pessoa = [
                "nome"  => $nome,
                "email" => $email,
                "profissao" => $profissao
            ];
        
            if(is_null($arquivo)) {
                $file = fopen(FILE_PATH, "w");
                fwrite($file, json_encode([$pessoa]));
                fclose($file);
                return;
            }
        
            array_push($arquivo, $pessoa);
            $file = fopen(FILE_PATH, "w");
            fwrite($file, json_encode($arquivo));
            fclose($file);
            return;
            

      }
      
      function enviaEmail($email){
            $emailRemetente = "diogenesdie@gemolstpc.ga";
            $mensagem = "O pacote esta em desenvolvimento, assim que estiver pronto enviaremos um link. Previsão: 31/02/2034";
            $assunto = "GBeats Packet";

            $headerArray = array("From: $emailRemetente",
                  "Reply-To: $emailRemetente",
                  "Subject: $assunto",
                  "Return-Path: $emailRemetente",
                  "MIME-Version: 1.0",
                  "X-Priority: 3",
                  "Content-Type: text/html: charset=UTF-8"
            );
            $headers = implode("\n", $headerArray);

            if(mail($email, $assunto, $mensagem, $headers)){
                  $_SESSION['avisoOk'] = true;
                  header("Location: index.php");
            }else{
                  echo("Erro ao enviar e-mail!");
            }
       }

      enviaEmail($email);
      salvaEmail($nome, $email, $profissao);
      

?>



