jQuery( 'div.woocommerce' ).on( 'change', '.qty', function () {
    jQuery( "[name='update_cart']" ).trigger( "click" );
} );

(function($){ 

    $( document.body ).on( 'adding_to_cart', function( e, fragments, cart_hash, this_button ) {
        alert('product added to cart');
    } );

    //vitrines product-lists queridinhos
    var queridinhos = $('.product-lists.queridinhos').slick({
        slidesToShow: 4,
        slidesToScroll: 2,
        responsive: [
            {
              breakpoint: 700,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1
              }
            }
          ]
    });

 })(jQuery)

 const cart = (() => {
  const ck  = `ck_5baa6e72b4e69bfce7cc1e936025c2295016564e`
  const cs = `cs_6fb92b7502b212831dadfd9de65c4acfaad17000`

  function price(value) {
    return (value / 100).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })
  }
  //private var/functions
 

  function handleTotal(value) {
    const elmTotal = document.querySelector('.cart_summary .cart_totals_container .woocommerce-Price-amount bdi');

    elmTotal.innerHTML = price(value)
  }

  function open() {
    const cartSummary = document.querySelector('.cart_summary');
    cartSummary.classList.add('open')
  }

  function handleClickUpdate(btn) {
    btn.addEventListener('click', async function (e) {
      const id = btn.dataset.id

      if(!id) return

      e.preventDefault()

      const inptQuantity = btn.closest('.quantity-container').querySelector('input[name="quantity"]')

      if(!inptQuantity) return

      let quantity = inptQuantity.value

      if(btn.classList.contains('minus')) {
        quantity--
      }else{
        quantity++
      }

      inptQuantity.value = quantity

      const response = await handleUpdateItemCart(id, parseInt(quantity))

      const productId = btn.closest(`.cart-item`).dataset.id

      const product = response.items.filter(i => i.id == productId)

      btn.closest(`.col-lg-12`).querySelector(`.quantities .prices`).innerHTML = price(product[0].totals.line_subtotal)

      handleTotal(response.totals.total_price)
    });
  }

  function update(target) {
    const buttons = document.querySelectorAll(target);

    if(!buttons) return

    Array.from(buttons).forEach(btn => {
      handleClickUpdate(btn)
    })
  }

  function remove(target) {
    const buttons = document.querySelectorAll(target);

    if(!buttons) return

    Array.from(buttons).forEach(btn => handleRemove(btn))
  }

  function handleRemove(btn) {
    if(!btn) return

    btn.addEventListener('click', async function (e) {
      const id = btn.dataset.id

      if(!id) return

      e.preventDefault()
      const response = await handleRequestRemove(id)

      handleTotal(response.totals.total_price)

      btn.closest(`.cart-item`).remove()
    });
  }

  async function handleRequestRemove(key) {
    try {
      const options = {
        headers: {
          accept: 'application/json',
          contentType: 'application/x-www-form-urlencoded',
          'X-WP-Nonce': wpApiSettings.nonce,
          'X-WC-Store-API-Nonce': wpApiSettings.nonce,
          _wpnonce: wpApiSettings.nonce
        },
        method: `post`,
        body: new URLSearchParams({key})
      }
      const req = await fetch(`/wp-json/wc/store/cart/remove-item?consumer_key=${ck}&consumer_secret=${cs}`, options)

      if(!req.ok) return console.error(`erro ao remover item do carrinho`, req.statusText)

      const res = await req.json()

      return res
    } catch (error) {
      console.error(`erro ao remover item do carrinho`, error)
    }
  }
  async function handleUpdateItemCart(id, quantity) {
    try {
      const options = {
        headers: {
          accept: 'application/json',
          contentType: 'application/x-www-form-urlencoded',
          'X-WP-Nonce': wpApiSettings.nonce,
          'X-WC-Store-API-Nonce': wpApiSettings.nonce,
          _wpnonce: wpApiSettings.nonce
        },
        method: `post`,
        body: new URLSearchParams({key: id, quantity})
      }
      const req = await fetch(`/wp-json/wc/store/cart/update-item?consumer_key=${ck}&consumer_secret=${cs}`, options)

      if(!req.ok) return console.error(`erro ao adicionar ao carrinho`, req.statusText)

      const res = await req.json()

      return res
    } catch (error) {
      console.error(`erro ao adicionar ao carrinho`, error)
    }
  }

  async function handleAddToCartButton(id, quantity) {
    try {

      const options = {
        headers: {
          accept: 'application/json',
          contentType: 'application/x-www-form-urlencoded',
          'X-WP-Nonce': wpApiSettings.nonce,
          'X-WC-Store-API-Nonce': wpApiSettings.nonce,
          _wpnonce: wpApiSettings.nonce
        },
        method: `post`,
        body: new URLSearchParams({id, quantity})
      }
      const req = await fetch(`/wp-json/wc/store/cart/add-item?consumer_key=${ck}&consumer_secret=${cs}`, options)

      if(!req.ok) return console.error(`erro ao adicionar ao carrinho`, req.statusText)

      const res = await req.json()

      return res
    } catch (error) {
      console.error(`erro ao adicionar ao carrinho`, error)
    }
   }

   function createCartItem(data) {
    const { images, quantity, id, name, prices, totals, key} = data
    const gerPrice = price(totals.line_total)
    const item = document.createElement('div')

    item.classList.add('row', 'cart-item')
    item.setAttribute(`data-id`, id)

    let newItem = `
    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
        <!-- Image -->
        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
            <img width="800" height="800" src="${images[0] ? images[0].thumbnail : `none`}" class="w-100" alt="" decoding="async" loading="lazy" sizes="(max-width: 800px) 100vw, 800px">                                    <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
            </a>
        </div>
        <!-- Image -->
    </div>

    <div class="col">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4 mb-lg-0">
                <div class="row">
                    <div class="col">
                        <!-- Data -->
                        <p>
                            <strong class="cart_item_title">${name}</strong>
                        </p>
                        <!-- Data -->
                    </div>

                    <div class="col-lg-2 col-md-2 mb-4 mb-lg-0">
                        <button class="remove_item_cart" data-id="${key}"><i></i></button>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-12 col-md-6 mb-4 mb-lg-0">
                <div class="row">
                    <div class="col-lg col-md-5 mb-4 mb-lg-0">
                        <!-- Quantity -->
                        <div class="d-flex mb-4 quantity-container">
                            <button class="btn btn-item cartItemChangeValue px-3 me-2 minus" data-id="${key}">
                                <i class="fas fa-minus"></i>
                            </button>

                            <div class="form-outline">
                                <input id="form1" min="0" name="quantity" value="${quantity}" type="text" class="form-control">
                            </div>

                            <button class="btn btn-item cartItemChangeValue px-3 ms-2 plus" data-id="${key}">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <!-- Quantity -->
                    </div>

                    <div class="col-lg-6 col-md-6 mb-4 mb-lg-0 ps-0 quantities ">
                        <!-- Price -->
                        <p class="text-end text-md-right prices">${gerPrice}</p>
                        <!-- Price -->
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    `

    item.innerHTML = newItem

    const btnRemove = item.querySelector(`.remove_item_cart`)

    if(btnRemove) handleRemove(btnRemove)

    const listButtons = item.querySelectorAll(`.cartItemChangeValue`)

    if(listButtons) {
      Array.from(listButtons).forEach(btn => handleClickUpdate(btn))
    }

    return item
   }

   function handleCartQuantity(data) {
    const { items_count } = data

    if(!items_count) return

    const cartCountSelector = document.querySelector('.card-stor span');

    if(!cartCountSelector) return 

    cartCountSelector.innerHTML = items_count
   }

   function checkExists(id) {
    const product = document.querySelector(`.cart-items .cart-item[data-id="${id}"]`)

    if(!product) return false
    
    return product
   }

   function add(target){
    const buttons = document.querySelectorAll(target);

    if(!buttons) return

    Array.from(buttons).forEach(el => {
      el.addEventListener('click', async function (e) {
        e.preventDefault()

        const previous_text = el.innerHTML

        el.innerHTML = `<div class="spinner-border" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>`

        const id = parseInt(el.dataset.product)

        const res = await handleAddToCartButton(id, 1)

        const result = res.items.filter(i => i.id == id)

        const { id:productId, key, totals, images, quantity } = result[0]

        const product = checkExists(productId)

        if(!product && res.items) {
          const elCartItems = document.querySelector('.cart-items');

          if(!elCartItems) return

          elCartItems.innerHTML = ` `
          Array.from(res.items).forEach(it => {
            elCartItems.append(createCartItem(it))
            const line = document.createElement('hr')
            line.classList.add('my-4')
            elCartItems.append(line)
          })
        }else if(product && res.items) {
          product.querySelector(`.quantity-container input[name="quantity"]`).value = quantity
          product.querySelector(`.quantities .prices`).innerHTML = price(totals.line_subtotal)
        }

        handleCartQuantity(res)
        handleTotal(res.totals.total_price)

        el.innerHTML = previous_text

        open()
      });
    })
   }

  
  
  return {
    //public var/functions
    add,
    update,
    remove,
    //animaTionDelete
  }
 })()
// cart.remove(`.remove_item_cart`)
// cart.update(`.cartItemChangeValue`)
// cart.add(`button.buy, button.add_to_cart`)
//cart.cartToggle(`.card-stor`)

const card = (() => {
  //private var/functions
  function mask() {
    setTimeout(() => {
      if(document.querySelector(`#rct_card_number`)) {
        let card_number = new Cleave('#rct_card_number', {
            creditCard: true,
            onCreditCardTypeChanged: function(type) {
                console.log(`bandeira do cartão`, typeof type)
                if(type != `unknown`) {
                  document.querySelector('input#rct_card_number').closest('.form-row-wide').classList.add(`${type}`)
                }
                   
            }
        })
  
        let cvv = new Cleave('#rct_cvv', {
            numericOnly: true,
            blocks: [3]
        });
        let exp = new Cleave('#rct_expire_date', {
            numericOnly: true,
            delimiter: '/',
            blocks: [2, 2]
        });

      }
    }, 3000);
  }
  
  return {
    //public var/functions
    mask
  }
})()
card.mask()
 