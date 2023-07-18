(1) Hide + & - Button in the /cart page
Dawn theme file name : main-cart-items.liquid
Code : 

 {% if item.product.type != "SAMPLE PRODUCT" %}
                      <quantity-input class="quantity cart-quantity">
</quantity-input>quantity-input class="quantity cart-quantity">
{% endif %}


(2) Product Page & Cart Page Target variables

window.cartPageSelector = document.querySelector(".cart__ctas");
window.prodPageSelector = document.querySelector(".product-form__buttons"); 
