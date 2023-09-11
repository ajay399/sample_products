(0) Add file in theme.liquid {% render 'sampleProdHelper' %}

& Check with metafields the app should be on first

{% assign zsSample = shop.metafields.sampleProd.Settings %}
{% if  zsSample.app_status == '1' %}


(1) Hide + & - Button in the /cart page
Dawn theme file name : main-cart-items.liquid
Code : 

 {% if item.product.type != "SAMPLE PRODUCT" %}
                      <quantity-input class="quantity cart-quantity">
</quantity-input>quantity-input class="quantity cart-quantity">
{% endif %}


(2) Product Page & Cart Page Target variables  
// note set both variables

window.cartPageSelector = document.querySelector(".cart__ctas");
window.prodPageSelector = document.querySelector(".product-form__buttons"); 
window.pMsgProductSelector = document.querySelector(".product-form__buttons");   
window.pMsgCartSelector = document.querySelector(".cart__ctas");   


(3) Currency Variable

window.ShopMoneySymbolVar = '₹';


(4) Cart Drawer Trigger
$(".ProductForm__AddToCart, .cart_dr").click(function()
               {
                 Zs_intervalId = setInterval(function() {
                if ($('#sidebar-cart').attr('aria-hidden') == "false") {
                  if(allowedSamples > '0')
                  {
                    $(".CartDrawer_sampleProdBtnWrapper").html($(".sampleProdBtnWrapper").html());
                  }
                  else
                  {
                    $(".CartDrawer_sampleProdBtnWrapper").html();
                  }
                    clearInterval(Zs_intervalId);
                }
               },500);
                 
                 setTimeout(function() {
                clearInterval(Zs_intervalId);
            }, 10000); 
               });
