<?php

/**
 * Attributes [ TIPO ]
 * Esta classe serve para trabalhar com os parâmetros do médoto Update da classe AswModel.
 * Os métodos abaixo convertem os parametros passaddos em ARRAY de forma que possa aplicar o metodo bindValue do PDO    
 * @copyright (c) year, Marcio Marins Marins Produções
 */

class Update {
    //Update
    //MÉTODO QUE TRABALHA APENAS COM OS ÍNDICES DO ARRAY PASSADOs COMO ATRIBUTO
    //pega os atributos passados na variável $atributes (aray associativo) e os trasforma em um array combinando dois arrays formados a partir dds índices do próprio array.
    //Ex: ['nome'=>'marcio' , 'email'=>'xx@xx.com' , 'senha'=>'123'] vai retornar ['nome'=>':nome' , 'email'=>':email' , 'senha'=>':senha']
    private function PegaCampos($atributos) {
        $keys_array = array_keys($atributos); //monta um array com os índices do array passado na variável $atributos. Ex. [nome,email,senha]
        $junta = ":" . implode("*:", $keys_array); //cria uma string com o comando implode onde com os termos do array na variável $keys_array serão unidos por asterstisco e dois pontos (*:) Ex. string ":nome*:email*:senha"
        $separa = explode("*", $junta); //cria um array a partir da string criada e armazenada na variavel $separa quebrando/separando a string onde tem o asteristico (*) e deixando cada valor do array precedido de dois pontos (:) Ex:  [:nome,:emai:senha]
        $combina_array = array_combine($keys_array, $separa); //combina os dois arrays criados anteriormente ($keys_array com $separa) retornando outro array. Onde os termos se misturam na sua ordem exata.  Ex: ['nome'=>':nome', 'email'=>':email', 'senha' => ':senha']
        return $combina_array;
    }

    //MÉTODO QUE VAI MONTAR A SINTAX DO TECHO QUE SE REFERE AOS CAMPOS NA SINTAX DA QUERY NO PADRÃO PDO, USANDO O ARRAY RETORNADO ACIMA (nome=:nome, email=:email , senha=:senha)
    public function UpdateCampos($atributos) {
        $array_combinado = $this->PegaCampos($atributos); //chama o método acima, pegando o valor retornado (array combinado)
        $query = null;
        foreach ($array_combinado as $key => $values) {//pega o array armazenado na variavel $array_combinado e coloca os ÍNDICES na variavel $key e os valores na variável $values
            $query .= $key . "=" . $values . ","; //faz uma string unindo as duas variáves com igual (=) e coloca uma vírgula entre cada termo do loop foreach. O ponto igual (.=) concatena totas as variáveis $query formandas no loop, em uma só
        }
        $nova_query = rtrim($query, ","); // retira a ultima vírgula da string formada na variavel $query
        return $nova_query;
    }
    //MÉTODO QUE VAI MONTAR O ARRAY COM OS ÍNDICES E OS VALORES DO ARRAY ATRIBUIDO NA VARIÁVEL $atributos. Ele vai ser retornado na class SeriveDb e será colocado no comando PDO execute 
    public function CombinaArrayUpade($atributos) {
        $keys = array_keys($atributos);//monta um array com os índices no array passado na variável atributos [nome,email,senha]
        $junta = ":" . implode(",:", $keys);//cria uma string com o comando implode onde com os termos do array $keys_array serão unidos por vírgula e dois pontos (,:) Ex. string ":nome,:email,:senha"
        $separa = explode(",", $junta); //cria um array a partir da string criada e armazenada na variavel $separa quebrando/separando a string onde tem o vírgula (,) e deixando cada valor do array precedido de dois pontos (:) Ex:  [:nome,:emai,:senha]
        $array_combidado = array_combine($separa, array_values($atributos));//combina o array aramazenado na variável $separa com o array formado com os VALORES vindos do array armazenado na variavel $atributos: Ex: ['nome'=>'marcio', 'email'=>'xx@xx.com', 'senha' => '123']
        return $array_combidado;
    }

}
