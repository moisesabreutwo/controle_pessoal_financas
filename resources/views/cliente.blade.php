@include('includes.header')


    <!-- Conteúdo Principal -->
    <div class="container main-content">
        @if (session('success'))
            <div class="alert alert-info">{{ session('popupMessage') }}</div>
        @endif
        <div class="feature-box bg-primary">
            <h2 class="text-white">Quero ser cliente</h2>
            <p class="vantagens text-white">
                Prezado(a),
                É com satisfação que recepcionamos o seu interesse pela ferramenta.
                Para acessar as funcionalidades do Sistema Controle pessoal de finanças, por período de 1 (um) ano a partir da data de pagamento, o investimento é de
                <b>{{$dados->moedaReferencia }} {{$dados->valorDeposito}} ({{$dados->valorDepositoExtenso}})</b>. O pagamento deverá ser feito, via PIX,
                chave <b>{{$dados->chavePix}}</b>, em nome de <b>{{$dados->nomeEmpresa}}</b>.
                Para o caso de o Nome do cliente ser diferente do nome da pessoa que enviar o PIX, solicitamos enviar comprovante para o e-mail <b>{{$dados->emailContato}}</b>
                informando a chave de identificação do cliente (e-mail cadastrado) e o nome cadastrado.
                Para tornar-se cliente, solicitamos a gentileza de informar os dados a seguir. </p>
        </div>
 

        <form action="{{ route('cliente.store') }}" method="POST">
            @csrf

            @include('admin.clientes._form')

        </form>

           
@include('includes.footer')


