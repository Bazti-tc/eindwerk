<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Game Shop</title>
  <link rel="stylesheet" href="WebShopCSS.css" />
</head>
<body>
  
  <div class="top-bar">
    <a href="WebShop.html" class="container-logo">
      <img src="LOGO.jpg" alt="WebShop" />
      <h1>WebShop</h1>
    </a>

    <!-- Barra de búsqueda -->
    <div class="search-container">
      <input type="text" id="searchInput" placeholder="Buscar productos..." oninput="filterProducts()" />
    </div>

    <!-- Carrito -->
    <a href="winkelmandje.html" class="cart-icon">
      🛒 Cart
    </a>
  </div>

  <!-- Menú -->
  <nav>
    <ul id="menu">
      <li>Categories</li>
      <li>PC</li>
      <li>XBOX</li>
      <li>PlayStation</li>
    </ul>
  </nav>
  <!-- Galería destacada -->
  <?php
  include 'connect.php';
  $sql = "SELECT * FROM producten";
  $result = $conn->query($sql);
  while($row = $result ->fetch_assoc()){
    ?>
    <div class="productos">
    <p><?php
      echo $row ['product'];
      ?>
      
      <img src="<?php echo $row ['afbeelding']?>" alt="<?php echo $row ['afbeelding']?>">
    </p>
  </div>
  <?php
  }
  ?>
 

  <h2 class="section-title">Products</h2>



  <div class="product-grid" id="productGrid">

    
  </div>

  <!-- Mensaje de no resultados -->
  <p id="noResults" class="no-results" style="display: none;">No se encontraron resultados.</p>

  <!-- Script -->
  <script>
    function addToCart(productName) {
      alert(productName + " añadido a la cesta.");
    }

    function filterProducts() {
      const input = document.getElementById('searchInput').value.toLowerCase();
      const cards = document.querySelectorAll('.product-card');
      const noResults = document.getElementById('noResults');
      let matches = 0;

      cards.forEach(card => {
        const name = card.getAttribute('data-name').toLowerCase();
        const visible = name.includes(input);
        card.style.display = visible ? 'block' : 'none';
        if (visible) matches++;
      });

      noResults.style.display = matches === 0 ? 'block' : 'none';
    }
  </script>

</body>
</html>
