<?php
require_once "conection.class.php";

class Pagamentos {

    use Conection;

    public function checkoutCreditCard($idUser, $nomeCliente, $emailCliente, $cpfCliente, $telefoneCliente, $cepCliente, $ruaCliente, $bairroCliente, $numeroEndereco, $complementoEndereco, $cidadeCliente, $estadoCliente, $parcelaCartao, $valorFrete, $idPagSeguro, $tokenCard){
        
        $sql = "INSERT INTO purchase SET
        id_user = :id_user, 
        nome_completo = :nome_completo,
        cpf_cliente = :cpf_cliente,
        telefone_cliente = :telefone_cliente,
        cep_cliente = :cep_cliente,
        rua_cliente = :rua_cliente,
        bairro_cliente = :bairro_cliente,
        numero_endereco = :numero_endereco,
        complemento_endereco = :complemento_endereco,
        cidade_cliente = :cidade_cliente,
        estado_cliente = :estado_cliente,
        email_cliente = :email_cliente,
        parcela_cartao = :parcela_cartao,
        valor_frete = :valor_frete,
        id_pag_seguro = :id_pag_seguro,
        token_card = :token_card,";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_user", $idUser);
        $sql->bindValue(":nome_completo", $nomeCliente);
        $sql->bindValue(":cpf_cliente", $cpfCliente);
        $sql->bindValue(":telefone_cliente", $telefoneCliente);
        $sql->bindValue(":cep_cliente", $cepCliente);
        $sql->bindValue(":rua_cliente", $ruaCliente);
        $sql->bindValue(":bairro_cliente", $bairroCliente);
        $sql->bindValue(":numero_endereco", $numeroEndereco);
        $sql->bindValue(":complemento_endereco", $complementoEndereco);
        $sql->bindValue(":cidade_cliente", $cidadeCliente);
        $sql->bindValue(":estado_cliente", $estadoCliente);
        $sql->bindValue(":email_cliente", $emailCliente);
        $sql->bindValue(":parcela_cartao", $parcelaCartao);
        $sql->bindValue(":valor_frete", $valorFrete);
        $sql->bindValue(":id_pag_seguro", $idPagSeguro);
        $sql->bindValue(":token_card", $tokenCard);
        $sql->execute();
        
    }

    public function selectInfoCostumer(){
        $data = array();
        $sql = "SELECT * FROM purchase";
        $sql = $this->pdo->query($sql);
        
        if($sql->rowCount() > 0){
            return $data = $sql->fetchAll();
        }

    }
    public function selectAsIdUserCostumer($idUser){
        $data = array();
        $sql = "SELECT * FROM purchase WHERE id_user = :id_user";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id_user", $idUser);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            return $data = $sql->fetch();
        }

    }
}