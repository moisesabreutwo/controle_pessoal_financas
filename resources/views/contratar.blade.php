@include('includes.header')

<!-- Hero Section -->
<section class="bg-primary text-white text-center py-5">
    <div class="container">
        <h1 class="display-4">Controle Pessoal de Finanças</h1>
        <p class="lead">Transforme sua vida financeira agora mesmo! Identifique, organize e economize com facilidade.</p>
        <a href="#cta" class="btn btn-light btn-lg mt-3">Quero Transformar Minhas Finanças!</a>
    </div>
</section>

<!-- Problema e Solução -->
<section class="py-5">
    <div class="container text-center">
        <h2>Você sabe para onde vai o seu dinheiro?</h2>
        <p class="fs-5 mt-3">A maioria das pessoas não tem ideia de onde estão gastando e acabam ficando no vermelho. Nosso sistema resolve isso com:</p>
        <div class="row g-4 mt-4">
            <div class="col-md-4">
                <i class="bi bi-pie-chart-fill fs-1 text-primary"></i>
                <h5 class="mt-3">Análise de Despesas</h5>
                <p>Veja exatamente onde você está gastando e economize mais.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-bell-fill fs-1 text-primary"></i>
                <h5 class="mt-3">Alertas Automáticos</h5>
                <p>Receba notificações antes de ultrapassar os limites financeiros.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-file-earmark-text-fill fs-1 text-primary"></i>
                <h5 class="mt-3">Relatórios Detalhados</h5>
                <p>Obtenha uma visão clara do seu orçamento em poucos cliques.</p>
            </div>
        </div>
    </div>
</section>

<!-- Benefícios -->
<section class="bg-light py-5">
    <div class="container text-center">
        <h2>Por que escolher nosso sistema?</h2>
        <p class="fs-5 mt-3">Seja o protagonista das suas finanças com uma ferramenta que realmente funciona:</p>
        <div class="row g-4 mt-4">
            <div class="col-md-6">
                <i class="bi bi-speedometer2 fs-1 text-primary"></i>
                <h5 class="mt-3">Fácil e Rápido</h5>
                <p>Configure sua conta em minutos e veja os resultados.</p>
            </div>
            <div class="col-md-6">
                <i class="bi bi-shield-check fs-1 text-primary"></i>
                <h5 class="mt-3">100% Seguro</h5>
                <p>Privacidade garantida com tecnologia de ponta.</p>
            </div>
        </div>
    </div>
</section>

<!-- Depoimentos -->
<section class="py-5">
    <div class="container text-center">
        <h2>O que nossos clientes dizem</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p>"Economizei mais de R$ 500 no primeiro mês! Recomendo a todos."</p>
                    <footer class="blockquote-footer">Marcos Silva</footer>
                </blockquote>
            </div>
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p>"Antes eu vivia no vermelho, agora tenho total controle das minhas finanças."</p>
                    <footer class="blockquote-footer">Ana Santos</footer>
                </blockquote>
            </div>
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p>"A melhor decisão financeira que tomei. Excelente ferramenta!"</p>
                    <footer class="blockquote-footer">Lucas Almeida</footer>
                </blockquote>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="bg-primary text-white text-center py-5" id="cta">
    <div class="container">
        <h2>Adquira Agora por Apenas R$ 49,90</h2>
        <p class="fs-5 mt-3">Oferta limitada! Comece hoje mesmo e transforme suas finanças.</p>
        <a href="/comprar" class="btn btn-light btn-lg">Comprar Agora</a>
    </div>
</section>

<!-- Garantia -->
<section class="py-5">
    <div class="container text-center">
        <h2>100% de Garantia</h2>
        <p class="fs-5 mt-3">Se você não estiver satisfeito em até 7 dias, devolvemos seu dinheiro. Sem perguntas, sem complicações!</p>
    </div>
</section>

@include('includes.footer')
