<div class="content">
<?php include ROOT . '/views/layouts/header.php' ?>

<main class="main">
  <h1 class="main__title">Каталог товаров</h1>
  <div class="main__catalog">

    <?php foreach ($products as $product) : ?>
      <div class="product-block">
        <img src="../../template/img/<?php echo $product['img']; ?>" alt="<?php echo $product['desc_product']; ?>" class="product-img">
        <div class="product-desc"><?php echo $product['desc_product']; ?></div>
        <span class="product-price"><?php echo $product['price']; ?> ₽</span>

        <!-- Если товар был добавлен в корзину, то придаем кнопке "В корзине" соотв. стили-->
        <?php $isActiveBtn = Cart::isHavingInCart($product['id_product']) ? " btn-active" : ""; ?>
        <?php if ($isActiveBtn) : ?>
          <a href="/cart/add/<?php echo $product['id_product']; ?>/" class="product-btn <?php echo $isActiveBtn ?>" data-id="<?php echo $product['id_product']; ?>">в корзине</a>
        <?php else : ?>

          <!-- Если товар не был добавлен в корзину, тогда не меняем стиль кнопки-->
          <a href="/cart/add/<?php echo $product['id_product']; ?>/" class="product-btn" data-id="<?php echo $product['id_product']; ?>">Добавить в корзину</a>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
</main>
</div>
<?php include ROOT . '/views/layouts/footer.php' ?>
<script>
  let cordsHome = ['scrollX', 'scrollY'];
  // сохраняем позицию скролла в localStorage
  window.addEventListener('unload', e => cordsHome.forEach(cord => localStorage[cord] = window[cord]));
  window.addEventListener('load', e => {  
    if (localStorage[cordsHome[0]]) {
      window.scroll(...cordsHome.map(cord => localStorage[cord]));
      cordsHome.forEach(cord => localStorage.removeItem(cord));
    }
  });
  localStorage.removeItem('errForm');
</script>
</div>
</body>

</html>