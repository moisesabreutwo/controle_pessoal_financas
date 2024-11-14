
@include('includes.header')
    <!-- Conteúdo Principal -->
    <div class="container main-content">
        <!-- Texto de introdução -->
        <h2 class="featurette-heading">Penso que se você veio visitar este sítio é porque está com suas finanças desequilibradas e, 
            melhor que tudo, quer fazer os ajustes necessários para modificar essa situação.</h2>

        <div class="row">
            <!-- Foto e descrição -->
            <div class="col-md-6">
                <div>
                    <img src="{{ $dadosExcep->conteudoFoto }}" class="img">
                </div>          
            </div>
            <div class="col-md-6">

                <p class="lead">A presente proposta surgiu de experiência própria em não entender o porquê de as minhas
                    despesas superarem as receitas e eu ter que recorrer, frequentemente, ao cheque especial
                    e/ou empréstimos bancários. Em ambos os casos, com o passar do tempo, a minha situação
                    financeira só piorava.
                    
                    Um belo dia, percebendo que não poderia mais conviver com essa situação, resolvi dar um
                    basta e passei a estabelecer um rigoroso controle de despesas. A partir daí, identifiquei em
                    detalhe para onde estava indo o meu dinheiro. Fiquei surpreso com gastos em coisas
                    desnecessárias.
                    
                    Com sua dedicação e com a ferramenta aqui proposta – a um valor simbólico - você também
                    poderá sair do vermelho. Assim como funcionou comigo, pode funcionar com você.
                    
                    Acredite, assista aos <a href="#">VÍDEOS EDUCACIONAIS</a>. 
                    <b>INVISTA NESSE PROJETO.</b></p>
            </div>
        </div>

        <!-- Título da seção de vantagens -->
        <h3 class="section-title">Vantagens em utilizar a ferramenta</h3>

        <!-- Vantagens em utilizar a ferramenta -->
        <div class="row">
            <div class="col-md-3">
                <div class="feature-box bg-secondary">
                    <h5>Identificar onde se gasta o dinheiro</h5>
                    <p class="vantagens text-white">A ferramenta ajuda o cliente a identificar os grupos de despesas em que gasta o dinheiro. Saber onde se gasta o dinheiro é o passo inicial para reequilibrar as finanças.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box bg-secondary ">
                    <h5>Reduzir e/ou eliminar despesas</h5>
                    <p class="vantagens text-white">Ao saber detalhadamente onde se gasta o dinheiro, o próximo passo é identificar em quais grupos de despesas se pode reduzir ou eliminar gastos.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box bg-secondary ">
                    <h5>Receber alertas automáticos &ensp; &ensp; &ensp;</h5>
                    <p class="vantagens text-white">Alertas automáticos são emitidos conforme as definições que o cliente já informou para as despesas e receitas atuais.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box bg-secondary ">
                    <h5>Extrair relatórios periódicos &ensp; &ensp; &ensp;</h5>
                    <p class="vantagens text-white">A ferramenta disponibiliza relatórios automáticos a partir do período informado pelo cliente.</p>
                </div>
            </div>
        </div>


@include('includes.footer')
