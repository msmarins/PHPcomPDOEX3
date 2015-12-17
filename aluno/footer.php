<footer class="footer content">
    <div class="rodape">
        <a <?php if ($pg == 1 OR $pg == ""){echo "class='atual'";}?> href="index.php?sessao=1">ALUNOS</a>
        <a <?php if ($pg == 2){echo "class='atual'";}?> href="index.php?sessao=2">USUÁRIOS</a>
        <a <?php if ($pg == 3){echo "class='atual'";}?> href="index.php?sessao=3&acao=inserir_aluno">NOVO ALUNO</a>
        <a <?php if ($pg == 4){echo "class='atual'";}?> href="index.php?sessao=4&acao=inserir_usuario">NOVO USUÁRIO</a>
    </div>
    <p>
        XPTO ASSOCIADOS - <?php $ano = date('y'); echo "20" . $ano;?> <span> © Copyright - todos os direitos reservados</span>
    </p> 
    <address> 
        Rua xx, xx <span> CEP xxxxx-xxx - xxxxxx - xxxx/xx </span> <span>Tel: (21) xxxx-xxxx - marciomarins@gmail.com.br</span>
    </address>
</footer>

