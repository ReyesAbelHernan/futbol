<div class="container">
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
      {if isset($username) && $username}
          <li class="nav-item"><a href="renderNewTeam" class="nav-link px-2 text-muted">NewTeam</a></li>
          <li class="nav-item"><a href="renderNewPlayer" class="nav-link px-2 text-muted">NewPlayer</a></li>
      {/if} 
    </ul>
    <p class="text-center text-muted">© 2022 Fulbo, Inc</p>
  </footer>
</div>
