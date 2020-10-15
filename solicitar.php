<?php
$nomePlat = $_POST['nomePlat'];
$linkPlat = $_POST['linkPlat'];
$usuario = $_POST['usuario'];

$headers .= 'From: Plataforma UPCONVERT';
                        $headers  = "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=utf-8\r\n";

                        $content_mensagem = "   <html><body>
                                                Pedido de integração com a plataforma ".$nomePlat." feita pelo usuário: ".$usuario."                                            
                                                <br>
                                                Acessível pelo link ".$linkPlat."";                        

                        mail("cpt.expectron@gmail.com", "Solicitação de Integração", $content_mensagem, $headers);

?>