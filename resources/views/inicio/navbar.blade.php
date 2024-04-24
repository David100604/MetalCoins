{{-- navbar --}}
<div class="navbar-color">
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">Vix Min S.A</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('produto.index')}}">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('servicos.index')}}">Serviços</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Usuários</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Pedidos</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <h6>Bem vindo(a), Fulano</h6>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-3" href="">Sair</a>
          </li>
      </ul>
    </div>
  </nav>
</div>