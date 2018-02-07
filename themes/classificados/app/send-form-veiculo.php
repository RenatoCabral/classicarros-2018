<?php

function send_form_veiculo(){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $cpf = $_POST['cpf'];
    $details = $_POST['details'];
    $url = $_POST['url'];
    $title = $_POST['title'];
    $to = $_POST['to'];
    $subject = 'Interesse no Veículo '. $title. ' | Classicarros';

    $message = '<h3> Olá, alguém está interessado em um veículo que você publicou no Classicarros!</h3>';
    $message .='<p><strong>Nome: </strong>'.$name.' </p>';
    $message .='<p><strong>CPF: </strong>'.$cpf.' </p>';
    $message .='<p><strong>E-mail: </strong>'.$email.' </p>';
    $message .='<p><strong>Telefone: </strong>'.$phone.' </p>';
    $message .='<p><strong>Detalhe da Proposta/Interesse: </strong>'.$details.' </p>';
    $message .='<p><strong>URL do Veículo: </strong>'.$url.'</p>';

    if ( ! wp_mail( $to, $subject, $message ) ) {
      echo '<p class="form-error">Erro ao enviar, verifique os dados</p>';
    } else {
        echo '<p class="form-ok">Formulário enviado com sucesso!';
    }

    die();
}


