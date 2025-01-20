<header class="site-header">
    <div class="container-header">
        <div class="logo">           
            <img src="/assets/images/logo.png" alt="revvo Logo">
        </div>

        <div class="search-bar">
            <form action="index.php" method="get">
                <input type="text" name="search" placeholder="Pesquisar cursos..." aria-label="Pesquisar cursos">
                <button type="submit" aria-label="Buscar">     
                    <i class="fas fa-search"></i>
                </button> 
            </form>
        </div>

        <nav>
            <ul class="menu">
                <li class="dropdown">
                    <a href="#" class="dropbtn" onclick="toggleDropdown(event)">
                        <div class="user-info">
                            <img class="user-profile" src="https://github.com/BePenques.png" alt="Avatar do usuário">
                            <div>
                                <div class="dd-infos">
                                    <span>Seja bem-vindo,</span>
                                    <span>Betiza Penques</span>
                                </div>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            
                        </div>
                    </a>
                    <div class="dropdown-content">
                        <a href="/">Home</a>
                        <a href="/admin">Admin</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
    <script>
        function toggleDropdown(event) {
            event.preventDefault();
            var dropdownContent = event.currentTarget.nextElementSibling;
            dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
        }
    </script>
</header>
