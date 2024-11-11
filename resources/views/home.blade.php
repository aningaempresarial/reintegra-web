@extends('layouts.layout')
@section('titulo', 'Início | Reintegra')
@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/carrossel.css') }}">
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

<link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
@endsection
@section('conteudo')
<!-- Seção de doação -->
<section id="doacao" class="home-doacao">
    <div class="carousel-container">

        <div class="carousel-container">
            <div class="slides">
                <div class="slide">
                    <img src="{{ asset('images/foto1.jpg') }}">
                    <div class="carousel-text">
                        <h1>Por que <span class="highlight">doar?</span></h1>
                        <p>Por que doar? Doar para a reintegração de ex-presidiários é investir na recuperação de indivíduos
                            que buscam
                            uma segunda chance. O apoio financeiro é essencial para programas que oferecem educação,
                            qualificação
                            profissional e suporte emocional, ajudando a romper o ciclo de criminalidade.
                        </p>
                        <a href="#" class="button">Doe Aqui</a>
                    </div>
                </div>
                <div class="slide">
                    <img src="{{ asset('images/somos.png') }}">
                    <div class="carousel-text">
                        <h1>Quem somos <span class="highlight">nós?</span></h1>
                        <p>Somos um grupo dedicado a promover a reintegração social de ex-presidiários, acreditando que
                            todos merecem
                            uma segunda chance para reconstruir suas vidas. Nosso trabalho foca em quebrar as barreiras do
                            preconceito
                            e oferecer apoio através de programas educacionais.</p>
                        <a href="#" class="button">Sobre nós</a>
                    </div>
                </div>
                <div class="slide">
                    <img src="{{ asset('images/foto3.jpg') }}">
                    <div class="carousel-text">
                        <h1>Baixe nosso <span class="highlight"> aplicativo</span></h1>
                        <p> Baixe nosso aplicativo
                            Nosso aplicativo foi desenvolvido para facilitar a reintegração de ex-presidiários à sociedade,
                            conectando-os a oportunidades de emprego, capacitação profissional e serviços de apoio. Com uma
                            interface simples e intuitiva.</p>
                        <a href="#" class="button">Baixe aqui</a>
                    </div>
                </div>
                <div class="slide">
                    <img src="{{ asset('images/noticias.png') }}">
                    <div class="carousel-text">
                        <h1> Últimas <span class="highlight">notícias</span></h1>
                        <p> Fique por dentro das novidades sobre iniciativas de reintegração social, programas
                            de apoio e histórias inspiradoras de ex-presidiários que estão transformando suas vidas. Aqui,
                            você encontra atualizações sobre eventos, parcerias com empresas e projetos sociais, além de
                            reportagens
                            sobre a importância da reinserção no mercado de trabalho e os impactos positivos dessa mudança
                            na sociedade
                        </p>
                        <a href="#" class="button">Veja aqui</a>
                    </div>
                </div>
            </div>

            <div class="dots-container">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(4)"></span>
            </div>
        </div>
</section>


<!-- Seção de divulgação do app -->

<section id="app">
    <!-- <div class="container py-3"> -->
    <h1 class='title-app'>Conheça o App Reintegra!</h1>
    <div class="home-app py-5">
        <div class="img-app2">
            <img src="{{ asset('images/img-app2.png') }}">
        </div>
        <div class="img-install">
            <h1>Disponível para baixar em:</h1>
            <a href=""><img src="{{ asset('images/img-googleplay.png') }}"></a>
            <a href=""><img src="{{ asset('images/img-appstore.png') }}"></a>
        </div>
    </div>
    <!-- </div>  -->
</section>



<section class="" id="">
    <div class="containerCard">
        <h1>Acesso a <strong style="color: #ff914d;">Informações</strong></h1>
    </div>
    <div class="containerInfos">
        <img src="{{ asset('images/eja.jpg') }}">
        <div class="text">
            <h1>Falta de <strong style="color: #ff914d;">Educação Básica</strong></h1>
            <p>Cerca de 45.5% da população total carcerária não completou o ensino fundamental, tendo isso em vista
                vemos que o ensino básico não se aplica da forma forma que devia, Nos ajude a mudar esse cenário,
                junte-se á nós com o Reintegra</p>
        </div>
    </div>
    <div class="containerInfos">
        <img src="{{ asset('images/etnia.jpg') }}">
        <div class="text">
            <h1>Etnia da População <strong style="color: #ff914d;">Carcerária</strong></h1>
            <p>Quase 50% da população carcerária brasileira é composta por pessoas pretas e pardas, refletindo
                desigualdades raciais profundas no sistema de justiça. Esse dado destaca a urgência de políticas
                públicas que promovam a equidade social e abordem as causas estruturais que levam à marginalização
                dessas comunidades.</p>
        </div>
    </div>
    </div>

</section>

<section class="home-info py-5">
    <div class="containerCard">
        <h1>Quem Pode <strong style="color: #ff914d;">Ajudar?</strong></h1>
        <div class="card__container">
            <article class="card__article">
                <img class="imgCard" src="{{ asset('images/pessoas.png') }}">

                <div class="card__data">
                    <h2 class="card__title"><strong style="color: #ff914d; font-weight: bold;">Pessoas</strong></h2>
                    <span class="card__description">Saiba como você pessoa, pode contribuir para o projeto Reintegra,
                        clique no botão abaixo para mais informações</span>
                    <a href="#" class="card__button">Clique Aqui</a>
                </div>
            </article>

            <article class="card__article">
                <img class="imgCard" src="{{ asset('images/empresa.jpg') }}">

                <div class="card__data">
                    <h2 class="card__title"><strong style="color: #ff914d; font-weight: bold;">Empresas</strong></h2>
                    <span class="card__description">Saiba como você empresa, pode contribuir para o projeto Reintegra,
                        clique no botão abaixo para mais informações</span>
                    <a href="#" class="card__button">Clique Aqui</a>
                </div>
            </article>

            <article class="card__article">
                <img class="imgCard" src="{{ asset('images/ong.png') }}">

                <div class="card__data">
                    <h2 class="card__title"><strong style="color: #ff914d; font-weight: bold;">ONG's</strong></h2>
                    <span class="card__description">Saiba como você ong, pode contribuir para o projeto Reintegra,
                        clique no botão abaixo para mais informações</span>
                    <a href="#" class="card__button">Clique Aqui</a>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Seção de destaques -->
<!-- <section class="destaques container" id="destaques">

    <div class="destaques-header">
        <div class="title">
            <h1 class="destaques-title">Destaques</h1>
            <p class="more-destaque link">Ver mais iniciativas</p>
        </div>
        <div class="setas">
            <img class="prev" src="{{ asset('icons/seta_esquerda.png') }}" alt="">
            <img class="next" src="{{ asset('icons/seta_direita.png') }}" alt="">
        </div>
    </div>

    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="card">
                <div class="card-img-div">
                        <div class="card-imgD" style="background-image: url('{{ asset('images/d1.jpg') }}');"></div>
                    </div>
                    <div class="card-bodyD">
                        <h1 class="card-titleD">Dunder Mifflin</h1>
                        <p class="card-textD">Fornecendo soluções de papel personalizadas e de alta qualidade.</p>
                        <a class="btn btn-alt" href="">
                            <p>Conhecer</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card">
                    <div class="card-img-div">
                        <div class="card-imgD" style="background-image: url('{{ asset('images/d2.jpg') }}');"></div>
                    </div>
                    <div class="card-bodyD">
                        <h1 class="card-titleD">Inclusão Já</h1>
                        <p class="card-textD">Promovendo a igualdade e a integração social através de ações transformadoras.</p>
                        <a class="btn btn-alt" href="">
                            <p>Conhecer</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card">
                    <div class="card-img-div">
                        <div class="card-imgD" style="background-image: url('{{ asset('images/d3.jpg') }}');"></div>
                    </div>
                    <div class="card-bodyD">
                        <h1 class="card-titleD">Escola de Todos</h1>
                        <p class="card-textD">Transformando vidas através da educação inclusiva e de qualidade.</p>
                        <a class="btn btn-alt" href="">
                            <p>Conhecer</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card">
                    <div class="card-img-div">
                        <div class="card-imgD" style="background-image: url('{{ asset('images/d4.jpg') }}');"></div>
                    </div>
                    <div class="card-bodyD">
                        <h1 class="card-titleD">Vozes da liberdade</h1>
                        <p class="card-textD">Defendendo a liberdade de expressão em todas as suas formas.</p>
                        <a class="btn btn-alt" href="">
                            <p>Conhecer</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('js/home.js') }}"></script>
<script src="{{ asset('js/carrossel.js') }}"></script>

@include('partials.footer')
@endsection