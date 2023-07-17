<?php

namespace App\models;

use Cosanpa\PortalGlpi\Infra\TicketsRepository;

class Ticket
{
    private $ticketRepository;

    function __construct()
    {
        $this->ticketRepository = new TicketsRepository();
    }

    public function buscaTodos()
    {
        return $this->ticketRepository->findAll();
    }

    public function criarTicket($cod, $usuario, $info='', $assunto='', $descricao='')
    {
        switch ($cod) {
            case 1:
                break;
            case 2:
                $assunto = "Novo Ponto de Rede";
                $descricao = "Solicito criação de novo ponto de rede.";
                break;
            case 3:
                $assunto = "Esqueci minha senha de e-mail";
                $descricao = "Solicito redefinição da senha do meu e-mail.";
                break;
            case 4:
                $assunto = "Nova conta de e-mail";
                $descricao = "Solicito criação de nova conta de e-mail.";
                break;
            case 5:
                $assunto = "Estou sem acesso à internet";
                $descricao = "Solicito suporte relacionado à internet.";
                break;
            case 6:
                $assunto = "Acessar a pasta compartilhada";
                $descricao = "Solicito permissão de acesso à pasta compartilhada.";
                break;
            case 7:
                $assunto = "Nova conta de Usuário (Login de acesso ao computador)";
                $descricao = "Solicito criação de nova conta de usuário.";
                break;
            case 8:
                $assunto = "Não consigo enviar/receber e-mails";
                $descricao = "Solicito suporte relacionado à conta de e-mail.";
                break;
            case 9:
                $assunto = "O computador não liga";
                $descricao = "Solicito reparo de um computador que não está ligando.";
                break;
            case 10:
                $assunto = "Apareceu um aviso de vírus em meu computador";
                $descricao = "Solicito varredura e remoção de vírus de computador.";
                break;
            case 11:
                $assunto = "Impressora não está imprimindo";
                $descricao = "Solicito suporte relacionao à impressora.";
                break;
            default:
                return false;
        }

        $descricao .= "/n/nInformações Adicionais:\n" . $info;

        // Está setada a entidade raiz, alterar para a entidade padrão.
        $this->ticketRepository->save(
            ['entities_id'=> 0,
            'name'=> $assunto,
            'date' => date('Y-m-d H:i:s'),
            'users_id_recipient' => $usuario['id'],
            'descricao' => $descricao,
            'urgency' => 3,
            'impact' => 3,
            'priority' => 3,
            'date_creation' => date('Y-m-d H:i:s')]);
    }

}