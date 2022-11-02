<?php

    include_once('../../app_comp_php/funcoes_bd.php');

    $bd = new banco_dados();

    $sql = "SELECT cod, titulo, status FROM tarefas ORDER BY cod DESC";
	$query = $bd->select($sql);
	$num_rows = $bd->num_rows($query);

    if($num_rows < 1){

        $html ='
        <p class="p_nenhum_result">Nenhum Item Cadastrado!</p>
        ';

    }else{

        $tabela ='
        <table class="table" id="results">
            <tbody id="body">  
        ';
        
        $linhas = '';
        $pt_concluidos = 0;
        $pt_totais = 0;
        
        while($dado = $bd->row($query)){

            switch($dado['status']){
                case 1:
                    $status = '
                    <a onClick="status_tarefa'.'('.$dado['cod'].', 2)" title="Pendente | Clique para Concluído" class="pendente">
                        <i class="fal fa-check-circle icone-info"></i>
                    </a>
                    ';
                    break;
                case 2:
                    $status = '
                    <a onClick="status_tarefa'.'('.$dado['cod'].', 1)" title="Concluído | Clique para Pendente" class="concluido">
                        <i class="fas fa-check-circle icone-info"></i>
                    </a>
                    ';
                    $pt_concluidos++;
                    break;
            }
            
            $linhas .= '

            <tr>
                <td>'.mb_strimwidth($dado['titulo'], 0, 38, "...").'</td>
                <td class="info-table">
                    '.$status.'
                    <a onClick="modal_ed_tarefa'.'('.$dado['cod'].')" title="Editar | Clique para Editar">
                        <i class="fas fa-edit icone-info"></i>
                    </a>
                    <a onClick="ex_tarefa'.'('.$dado['cod'].')" title="Excluir | Clique para Excluir">
                        <i class="fas fa-trash icone-info"></i>
                    </a>
                </td>
            </tr>

            ';

            $pt_totais++;
        }
        
        $tabela .= $linhas;
        
        $tabela .='
            </tbody>
        </table>
        ';
	    
        $html = '<div class="base-superior"><p class="progresso">'.$pt_concluidos.'/'.$pt_totais.' tarefas completas.</p><div class="excluir_concluidos"><button type="button" onclick="ex_tarefas_concluidas()">Limpar Concluídos</button></div></div>';


        $html .= $tabela;

    }
	
 

    echo $html;

?>
