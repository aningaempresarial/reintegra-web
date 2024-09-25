@extends('layouts.layout')
@section('titulo', 'Reintegra | Home')
@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

<link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
@endsection
@section('style')
<!-- Não deu para colocar a imagem de fundo pelo css, por isso está aqui -->
<style>
    .home-doacao {
        background-image: url("{{ asset('images/fundo.svg') }}");
        background-attachment: fixed;
    }
</style>
@endsection

<!-- Esquecendo sessão -->
{{session()->flush();}}

@section('conteudo')


<!-- Seção de doação -->
<section id="doacao" class="home-doacao">
    <div>
        <img class="img-doacao" src="{{ asset('images/img-doacao.png') }}">
    </div>
    <div>
        <h1>Pix Reintegra</h1>
        <p>Fortaleça organizações que quebram o ciclo da criminalidade.</p>
        <a href="{{ url('/doacao') }}">Doar</a>
    </div>
</section>


<section class="destaques container mt-3" id="porque">
    <h1 class="destaques-title">Por que Reintegra?</h1>

    <p>A Reintegra nasceu com o propósito de <b>oferecer uma segunda chance</b> para aqueles que cumpriram sua pena e desejam reconstruir suas vidas. Acreditamos que a tecnologia pode ser uma poderosa ferramenta para facilitar a reinserção social, profissional e emocional de ex-presidiários, ajudando-os a <b>quebrar o ciclo de reincidência</b>.</p>
    <p>Nosso compromisso é criar oportunidades através de capacitação, suporte psicológico, e conexão com empresas e ONGs. <b>Saiba mais</b> sobre nossa jornada e como estamos impactando a sociedade.</p>
    <p><a class="more-destaque link" href="">Conhecer mais sobre Reintegra!</a></p>

</section>

<!-- Seção de divulgação do app -->

<section id="app">
    <div class="container py-3">
        <h1 class='title-app'>Conheça o App Reintegra!</h1>
        <div class="home-app py-5">
            <div class="img-app">
                <img src="{{ asset('images/img-app.png') }}">
            </div>
            <div class="img-install">
                <h1>Disponível para baixar em:</h1>
                <a href=""><img src="{{ asset('images/img-googleplay.png') }}"></a>
                <a href=""><img src="{{ asset('images/img-appstore.png') }}"></a>
            </div>
        </div>
    </div>
</section>



<section class="destaques py-5" id="porque">
    <div class="container">
        <h1 class="info-title">Acesso à Informação</h1>
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="container color-1 py-4">
                <h3 class="informacao-title">Brasil no Topo da Criminalidade Mundial</h3>
                <p>Com uma população prisional de mais de 839 mil detentos, o Brasil se destaca entre os países com maiores índices de criminalidade no mundo. A reincidência criminal, que atinge 40% dos presos, reflete os desafios da reintegração social e a necessidade de políticas mais eficazes para reduzir esse ciclo.</p>
                <img src="{{ asset('images/grafico-ranking.png') }}" alt="" srcset="">
            </div>

        </div>
        <div class="col-md">
            <div class="img-info-1"></div>
        </div>
    </div>

    <div class="row mt-3">

        <div class="col-md">
            <div class="img-info-2"></div>
        </div>

        <div class="col-md-7">
            <div class="container color-2 py-4">
                <h3 class="informacao-title">Desigualdade Racial nas Prisões</h3>
                <p>Pretos e pardos compõem 48,2% da população carcerária no Brasil, evidenciando a desigualdade racial no sistema prisional.</p>
                <img src="{{ asset('images/grafico-populacao.png') }}" alt="" srcset="">
            </div>

        </div>
    </div>

</section>

<section class="home-info py-5">
    <div class="container">
        <h1 class="info-title">Quem pode ajudar?</h1>
        <div class="card-group py-2">
            <div class="card">
                <img class="img-ajudar" src="{{ asset('images/ong-icon.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">ONGs</h5>
                    <a href="#" class="btn btn-infos btn-ong">
                        <p>Saiba mais</p>
                    </a>
                </div>
            </div>
            <div class="card">
                <img class="img-ajudar" src="{{ asset('images/empresa-icon.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Empresas</h5>
                    <a href="/info-empresa" class="btn btn-infos btn-empresa">
                        <p>Saiba mais</p>
                    </a>
                </div>
            </div>
            <div class="card">
                <img class="img-ajudar" src="{{ asset('images/pessoa-icon.png') }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Pessoas</h5>
                    <a class="btn btn-infos btn-pessoa" href="">
                        <p>Saiba mais</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Seção de destaques -->
<section class="destaques container">
    <h1 class="destaques-title">Destaques</h1>
    <p class="more-destaque link">Ver mais iniciativas</p>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="card">
                    <img src="{{ asset('images/d1.jpg') }}" class="card-img-top">
                    <div class="card-body">
                        <h1 class="card-title">Dunder Mifflin</h1>
                        <p class="card-text">Fornecendo soluções de papel personalizadas e de alta qualidade.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card">
                    <img src="{{ asset('images/d2.jpg') }}" class="card-img-top">
                    <div class="card-body">
                        <h1 class="card-title">Inclusão Já</h1>
                        <p class="card-text">Promovendo a igualdade e a integração social através de ações transformadoras.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card">
                    <img src="{{ asset('images/d3.jpg') }}" class="card-img-top">
                    <div class="card-body">
                        <h1 class="card-title">Escola de Todos</h1>
                        <p class="card-text">Transformando vidas através da educação inclusiva e de qualidade.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card">
                    <img src="{{ asset('images/d4.jpg') }}" class="card-img-top">
                    <div class="card-body">
                        <h1 class="card-title">Vozes da liberdade</h1>
                        <p class="card-text">Defendendo a liberdade de expressão em todas as suas formas.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controles de navegação -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

        <!-- Paginação -->
        <div class="swiper-pagination"></div>
    </div>
</section>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('js/home.js') }}"></script>

@include('partials.footer')
@endsection

