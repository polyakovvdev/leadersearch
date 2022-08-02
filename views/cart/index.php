<div class="container">
  <?php include ROOT . '/views/layouts/header.php' ?>

  <main class="main">
    <h1 class="cart__title">Корзина</h1>
    <div class="cart__catalog">

      <?php if (isset($products) && is_array($products)) : ?>
        <?php foreach ($products as $product) : ?>
          <div class="cart__item">
            <img src="../../template/img/<?php echo $product['img']; ?>" alt="<?php echo $product['desc_product']; ?>" class="item-img" />
            <div class="item-desc">
              <?php echo $product['desc_product']; ?>
            </div>
            <?php
            $blokedDec = ($productsInCart[$product['id_product']] < 2) ? "blocked" : "";
            $blokedInc = ($productsInCart[$product['id_product']] > 9) ? "blocked" : "";
            ?>
            <div class="item-counter">
              <a href="/cart/item-dec/<?php echo $product['id_product']; ?>" class="decrement-counter <?php echo $blokedDec ?>">
                <svg class="svg" width="20" height="20" viewBox="0 0 20 20">
                  <line x1="0" y1="10" x2="20" y2="10" />
                </svg>
              </a>
              <span class="counter"><?php echo $productsInCart[$product['id_product']]; ?></span>
              <a href="/cart/item-inc/<?php echo $product['id_product']; ?>" class="increase-counter <?php echo $blokedInc ?>">
                <svg class="svg" width="20" height="20" viewBox="0 0 20 20">
                  <line x1="0" y1="10" x2="20" y2="10" />
                  <line x1="10" y1="0" x2="10" y2="20" />
                </svg>
              </a>
            </div>
            <span class="item-price"><?php echo $product['price']; ?> ₽</span>
            <a href='/cart/delete/<?php echo $product['id_product']; ?>/' class="cart__btn-delete">
              <svg class="svg" width="14" height="13" viewBox="0 0 14 13">
                <line y1="-0.5" x2="17.5227" y2="-0.5" transform="matrix(0.727587 0.686015 -0.727587 0.686015 0.250488 0.843262)" />
                <line y1="-0.5" x2="17.5227" y2="-0.5" transform="matrix(-0.727587 0.686015 -0.727587 -0.686015 13 0.135986)" />
              </svg>
            </a>
          </div>

        <?php endforeach; ?>
        <div class="total-price">
          <pre>Сумма <span><?php echo Cart::getTotalPrice($products); ?> ₽</span></pre>
        </div>
    </div>
  </main>
</div>
<?php include ROOT . '/views/layouts/footer.php' ?>
</div>
<section class="feedback">
  <div class="feedback__form">
    <form id="form" action="check#form" method="post">
      <h3 class="feedback__title">Пожалуйста, представьтесь</h3>
      <input type="text" name="user-name" class="user-name" placeholder="Ваше имя" value="<?php echo $userName; ?>">
      <p class="name-err"><?php echo $errName; ?></p>
      <input type="tel" name="user-tel" id="user-tel" class="user-tel" placeholder="Телефон" value="<?php echo $userTel; ?>">
      <p class="name-err"><?php echo $errTel; ?></p>
      <input type="email" name="user-email" class="user-email" placeholder="Email" value="<?php echo $userEmail; ?>">
      <p class="name-err"><?php echo $errEmail; ?></p>
      <button name="feedback__btn" class="feedback__btn ">Оформить заказ</button>
    </form>
  </div>
</section>

<?php if (CartController::visiblePopup()) : ?>
  <div class="popup">
    <div class="popup__body">
      <div class="popup__area"></div>
      <div class="popup__content">
        <div class="popup__title">Cпасибо <b><?php echo $userName; ?></b>, ваш заказ <b>№<?php echo $randomId; ?></b> оформлен.</div>
        <a href="/cart/close/" class="popup__close">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16 1.61714L14.3829 0L8 6.38286L1.61714 0L0 1.61714L6.38286 8L0 14.3829L1.61714 16L8 9.61714L14.3829 16L16 14.3829L9.61714 8L16 1.61714Z" fill="black" />
          </svg>
        </a>
        <div class="popup__text">В ближайщее время мы свяжемся с вами по телефону <b><?php echo $userTel; ?></b> для его подтверждения.</div>
      </div>
    </div>
  </div>
<?php endif ?>

<?php else : ?>
  <?php echo "<script type='text/javascript'>window.top.location='/';</script>"; exit; ?>
<?php endif; ?>
<script>
  document.addEventListener("DOMContentLoaded", function(event) {
    var scrollpos = localStorage.getItem('scrollpos');
    if (scrollpos) window.scrollTo(0, scrollpos);
  });

  window.onbeforeunload = function(e) {
    localStorage.setItem('scrollpos', window.scrollY);
  };
</script>
</body>

</html>