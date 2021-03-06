<?php

$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$idCliente = $Dados['idCliente'];
$salvarinformacao = $Dados['salvarinformacao'];

$cep = $Dados['billingAddressPostalCode'];	
$endereco = $Dados['billingAddressStreet'];
$numero = $Dados['billingAddressNumber'];
$complemento = $Dados['billingAddressComplement'];
$bairro = $Dados['billingAddressDistrict'];
$cidade = $Dados['billingAddressCity'];
$estado = $Dados['billingAddressState'];

if ($Dados['paymentMethod'] == "creditCard") {
	if ($salvarinformacao == "1") {

		$cadastrar3=$pdo->prepare("update App_Cliente set CepCliente=(:Cep), EnderecoCliente=(:Endereco), NumeroCliente=(:Numero), ComplementoCliente=(:Complemento), BairroCliente=(:Bairro), CidadeCliente=(:Cidade), EstadoCliente=(:Estado) where idApp_Cliente=(:idCliente)");		
		$cadastrar3->bindValue(':Cep',$cep);
		$cadastrar3->bindValue(':Endereco',$endereco);
		$cadastrar3->bindValue(':Numero',$numero);
		$cadastrar3->bindValue(':Complemento',$complemento);
		$cadastrar3->bindValue(':Bairro',$bairro);
		$cadastrar3->bindValue(':Cidade',$cidade);
		$cadastrar3->bindValue(':Estado',$estado);
		$cadastrar3->bindValue(':idCliente',$Dados['idCliente']);
		$cadastrar3->execute();
		
	}
}

$DadosArray["email"] = EMAIL_PAGSEGURO;
$DadosArray["token"] = TOKEN_PAGSEGURO;

if ($Dados['paymentMethod'] == "creditCard") {
    $DadosArray['creditCardToken'] = $Dados['tokenCartao'];
    $DadosArray['installmentQuantity'] = $Dados['qntParcelas'];
    $DadosArray['installmentValue'] = $Dados['valorParcelas'];
    $DadosArray['noInterestInstallmentQuantity'] = $Dados['noIntInstalQuantity'];
    $DadosArray['creditCardHolderName'] = $Dados['creditCardHolderName'];
    $DadosArray['creditCardHolderCPF'] = $Dados['creditCardHolderCPF'];
    $DadosArray['creditCardHolderBirthDate'] = $Dados['creditCardHolderBirthDate'];
    $DadosArray['creditCardHolderAreaCode'] = $Dados['senderAreaCode'];
    $DadosArray['creditCardHolderPhone'] = $Dados['senderPhone'];

	$DadosArray['billingAddressStreet'] = $Dados['billingAddressStreet'];
	$DadosArray['billingAddressNumber'] = $Dados['billingAddressNumber'];
	$DadosArray['billingAddressComplement'] = $Dados['billingAddressComplement'];
	$DadosArray['billingAddressDistrict'] = $Dados['billingAddressDistrict'];
	$DadosArray['billingAddressPostalCode'] = $Dados['billingAddressPostalCode'];
	$DadosArray['billingAddressCity'] = $Dados['billingAddressCity'];
	$DadosArray['billingAddressState'] = $Dados['billingAddressState'];
	$DadosArray['billingAddressCountry'] = $Dados['billingAddressCountry'];
	
} elseif ($Dados['paymentMethod'] == "boleto") {
    
} elseif ($Dados['paymentMethod'] == "eft") {
    $DadosArray['bankName'] = $Dados['bankName'];
}

$DadosArray['paymentMode'] = 'default';
$DadosArray['paymentMethod'] = $Dados['paymentMethod'];


$DadosArray['receiverEmail'] = EMAIL_LOJA;
$DadosArray['currency'] = $Dados['currency'];
$DadosArray['extraAmount'] = $Dados['extraAmount'];

$query_car = "	SELECT 
					AP.ValorProduto, 
					AP.QtdProduto, 
					AP.QtdIncrementoProduto,
					AP.idTab_Produto_Pagamento,
					AP.idTab_Produtos_Produto,
					AP.NomeProduto,
					AP.idApp_Pagamento
				FROM 
					App_Produto_Pagamento AS AP
				WHERE 
					AP.idApp_Pagamento = '" . $Dados['reference'] . "'";

$resultado_car = $pdo->prepare($query_car);
$resultado_car->execute();

$cont_item = 1;
while ($row_car = $resultado_car->fetch(PDO::FETCH_ASSOC)) {
    $DadosArray["itemId{$cont_item}"] = $row_car['idTab_Produtos_Produto'];
    $DadosArray["itemDescription{$cont_item}"] = $row_car['NomeProduto'];
    $total_venda = number_format($row_car['ValorProduto'], 2, '.', '');
    $DadosArray["itemAmount{$cont_item}"] = $total_venda;
    $DadosArray["itemQuantity{$cont_item}"] = $row_car['QtdProduto'];
    $cont_item++;
}

$DadosArray['notificationURL'] = URL_NOTIFICACAO;
$DadosArray['reference'] = $Dados['reference'];
$DadosArray['senderName'] = $Dados['senderName'];
$DadosArray['senderCPF'] = $Dados['senderCPF'];
$DadosArray['senderAreaCode'] = $Dados['senderAreaCode'];
$DadosArray['senderPhone'] = $Dados['senderPhone'];
$DadosArray['senderEmail'] = $Dados['senderEmail'];
$DadosArray['senderHash'] = $Dados['hashCartao'];
$DadosArray['shippingAddressRequired'] = $Dados['shippingAddressRequired'];
$DadosArray['shippingAddressStreet'] = $Dados['shippingAddressStreet'];
$DadosArray['shippingAddressNumber'] = $Dados['shippingAddressNumber'];
$DadosArray['shippingAddressComplement'] = $Dados['shippingAddressComplement'];
$DadosArray['shippingAddressDistrict'] = $Dados['shippingAddressDistrict'];
$DadosArray['shippingAddressPostalCode'] = $Dados['shippingAddressPostalCode'];
$DadosArray['shippingAddressCity'] = $Dados['shippingAddressCity'];
$DadosArray['shippingAddressState'] = $Dados['shippingAddressState'];
$DadosArray['shippingAddressCountry'] = $Dados['shippingAddressCountry'];
$DadosArray['shippingType'] = $Dados['shippingType'];
$DadosArray['shippingCost'] = $Dados['shippingCost'];

$buildQuery = http_build_query($DadosArray);
$url = URL_PAGSEGURO . "transactions";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HTTPHEADER, Array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $buildQuery);
$retorno = curl_exec($curl);
curl_close($curl);
$xml = simplexml_load_string($retorno);

//QUERY para pagamento com cart??o de cr??dito 
if ($xml->paymentMethod->type == 1) {
    $result_cadastrar = "INSERT INTO App_Pag_Online_Pagamento (tipo_pg, cod_trans, status, idApp_Pagamento, created) VALUES (:tipo_pg, :cod_trans, :status, :idApp_Pagamento, NOW())";
    $cadastrar = $pdo->prepare($result_cadastrar);
//QUERY para pagamento com boleto	
} elseif ($xml->paymentMethod->type == 2) { 
    $result_cadastrar = "INSERT INTO App_Pag_Online_Pagamento (tipo_pg, cod_trans, status, link_boleto,idApp_Pagamento, created) VALUES (:tipo_pg, :cod_trans, :status, :link_boleto, :idApp_Pagamento, NOW())";
    $cadastrar = $pdo->prepare($result_cadastrar);
    $cadastrar->bindParam(':link_boleto', $xml->paymentLink, PDO::PARAM_STR);
//QUERY para pagamento com d??bito online	
}elseif ($xml->paymentMethod->type == 3) { 
    $result_cadastrar = "INSERT INTO App_Pag_Online_Pagamento (tipo_pg, cod_trans, status, link_db_online,idApp_Pagamento, created) VALUES (:tipo_pg, :cod_trans, :status, :link_db_online, :idApp_Pagamento, NOW())";
    $cadastrar = $pdo->prepare($result_cadastrar);
    $cadastrar->bindParam(':link_db_online', $xml->paymentLink, PDO::PARAM_STR);   
}


$cadastrar->bindParam(':tipo_pg', $xml->paymentMethod->type, PDO::PARAM_INT);
$cadastrar->bindParam(':cod_trans', $xml->code, PDO::PARAM_STR);
$cadastrar->bindParam(':status', $xml->status, PDO::PARAM_INT);
$cadastrar->bindParam(':idApp_Pagamento', $xml->reference, PDO::PARAM_STR);

$cadastrar->execute();

$cadastrar2=$pdo->prepare("update App_Pagamento set status=(:status), FormaPagamento=(:FormaPagamento), ValorBoleto=(:ValorBoleto), cod_trans=(:cod_trans) where idApp_Pagamento=(:reference)");
$cadastrar2->bindValue(':status',$xml->status);
$cadastrar2->bindValue(':FormaPagamento',$xml->paymentMethod->type);
if ($xml->paymentMethod->type == 2) {
	$cadastrar2->bindValue(':ValorBoleto',1.00);
}else { 
	$cadastrar2->bindValue(':ValorBoleto',0.00);
}
$cadastrar2->bindValue(':cod_trans',$xml->code);
$cadastrar2->bindValue(':reference',$xml->reference);
$cadastrar2->execute();

$retorna = ['erro' => true, 'dados' => $xml, 'DadosArray' => $DadosArray];
header('Content-Type: application/json');
echo json_encode($retorna);
