//import React from "react"
import { CartProps, ProductProps } from "../components/types"

// @ts-ignore
import oauthSignature from 'oauth-signature'

const baseUrl = `http://wepink.localhost/wp-json/wc/store/cart/`
const nonceURL = `http://wepink.localhost/wp-json/wc/v3/store/nonce`
const listProductsUrl = `http://wepink.localhost/wp-json/wc/store/products?per_page=20`
//const addItemURL = `http://wepink.localhost/wp-json/wc/v3/cart/add-item`
const legacyAddUrl = `http://wepink.localhost/wp-json/wc/store/cart/add-item`
const searchUrl = `http://wepink.localhost/wp-json/wc/store/products?search=`


export interface OAuthKey {
  oauth_consumer_key: string;
  oauth_nonce: string;
  oauth_signature_method: string;
  oauth_timestamp: number;
  oauth_version: string;
  oauth_signature: string;
}

interface CommentProps {
    data: {
        review: string
        post: string
        email: string
        name: string
        id: string
        rating: number | null
    }
}

function OAuth(url: string, method: string) {
    const parameters = {
        oauth_consumer_key : 'ck_49bc25102745eb876b809a0be6aaaca13fbf60aa',
        oauth_nonce : Math.random().toString(32).replace(/[^a-z]/, '').substr(2),
        oauth_timestamp : Math.floor(Date.now() / 1000),
        oauth_signature_method : 'HMAC-SHA1',
        oauth_version : '1.0',
    },
    consumerSecret = 'cs_982eba16918599a544cc37bc67741ad5a955a18e'

    const signature = oauthSignature.generate(method, url, parameters, consumerSecret);

    const auth = `OAuth oauth_consumer_key=${parameters.oauth_consumer_key}, oauth_nonce=${parameters.oauth_nonce}, oauth_signature=${signature}, oauth_signature_method="HMAC-SHA1", oauth_timestamp=${parameters.oauth_timestamp}, oauth_version="1.0"`

    return auth
}

export async function GetCommentPost(productId: any) {
    try {
        const httpMethod = `GET`,
        url = `http://wepink.localhost/wp-json/wc/v1/products/${productId}/reviews`

        const requestOptions = {
            method: httpMethod,
            headers: {
                'Content-Type': 'application/json',
                accept: `application/json`,
                Authorization: OAuth(url, httpMethod)
            }
        };

        const req = await fetch(url, requestOptions)
        //const req = await fetch(`/wp-json/wp/v2/comments`, requestOptions)

        if(!req.ok) {
            console.log(`Erro ao buscar comentários`, req)
            throw new Error(`rro ao buscar comentários`)
        }

        const res = await req.json()

        return res
    } catch (error) {
        console.log(`rro ao buscar comentários`, error)
        throw new Error(`rro ao buscar comentários`)
    }
}
export async function CommentPost({ data }: CommentProps) {
    try {
        const httpMethod = `POST`,
        url = `http://wepink.localhost/wp-json/wc/v1/products/${data.id}/reviews`

        const requestOptions = {
            method: httpMethod,
            headers: {
                'Content-Type': 'application/json',
                accept: `application/json`,
                Authorization: OAuth(url, httpMethod)
            },
            body: JSON.stringify(data)
        };

        const req = await fetch(`/wp-json/wc/v1/products/${data.id}/reviews`, requestOptions)
        //const req = await fetch(`/wp-json/wp/v2/comments`, requestOptions)

        if(!req.ok) {
            console.log(`Erro ao registrar comentário`, req)
            throw new Error(`Erro ao registrar comentário`)
        }

        const res = await req.json()

        return res
    } catch (error) {
        console.log(`Erro ao registrar comentário`, error)
        throw new Error(`Erro ao registrar comentário`)
    }
}

export function decodeHtmlCharCodes(str: any) { 
    return str.replace(/(&#(\d+);)/g, function(_match?: any, _capture?: any, charCode?: any) {
      return String.fromCharCode(charCode);
    });
}

export async function searchProduct(value: string) {
    try {
 

        // Configurações da requisição
        const requestOptions = {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                acept: `application/json`,
            }
        };


        const req = await fetch(`${searchUrl}${value}`, requestOptions);

        if(!req.ok) {
            console.log(`Erro ao buscar produto`, req)
            throw new Error(`Erro ao buscar produto`)
        }

        const res = await req.json()

        return res
    } catch (error) {
        console.log(`Erro ao buscar produto`, error)
    }
}

export async function removeProductToCart(key: any, nonce: any) {
    try {

        if(!key) throw new Error(`Key do produto não identificada para remover item do carrinho`)
        const headers = new Headers()

        headers.append(`X-WC-Store-API-Nonce`, nonce)
        headers.append(`accept`, 'application/json')
        headers.append(`Content-Type`, 'application/json')

        const options = {
            method: `POST`,
            headers,
            body: JSON.stringify({key})
        }

        const req = await fetch(`http://wepink.localhost/wp-json/wc/store/cart/remove-item`, options)

        if(!req.ok) {
            console.log(`Erro ao remover produto`, req)
            throw new Error(`Erro ao remover produto`)
        }

        const res = await req.json()

        return res
    } catch (error) {
        console.log(`Erro ao remover produto`)
        throw new Error(`Erro ao remover produto`)
    }
}

export async function cartAddItem(id: any, quantity: number, nonce?: string) {
    try {
        const headers = new Headers();

        headers.append('accept', 'application/json')
        headers.append('Content-Type', 'application/json')

        if(nonce) {
            headers.append('X-WC-Store-API-Nonce', nonce)
        }

        const options = {
            headers,
            method: `POST`,
            body: JSON.stringify({id, quantity})
        }

          const req = await fetch(legacyAddUrl, options)

        if(!req.ok) throw new Error('erro ao adicionar item ao carrinho')

        const res = await req.json()

        return res
    } catch (error) {
        console.info(`erro ao adicionar item ao carrinho`, error)
        throw new Error('erro ao adicionar item ao carrinho')
    }
}


export async function listProducts(): Promise<ProductProps[]> {
    try {
        const options = {
            headers: {
              accept: 'application/json',
              ContentType: 'application/json; charset=utf-8'
            },
            method: `get`,
        }

        const req = await fetch(listProductsUrl, options)

        if(!req.ok) throw new Error('erro ao listar produtos')

        const res = await req.json()

        return res
    } catch (error) {
        console.info(`erro ao listar produtos`, error)
        throw new Error('erro ao listar produtos')
    }
}

// const animaTionDelete = () => {
//     document.querySelectorAll('.delete').forEach(function(item: Element) {
//         item.addEventListener('click', function(e: React.MouseEvent<HTMLAnchorElement>) {
//             // First we get the 
//             let newClass = e.getAttribute('data-delete');
//             let getParent = parent(e, '.cart-items', 1);
//             if(newClass === 'shredder') {
//                 getParent.classList.add('shredding');
//                 // Shredder animation
//                 // Slices
//                 let shredAmount = 10;
//                 let width = document.querySelector('.item.shred').getBoundingClientRect().width / shredAmount;
//                 let animationName = 'spinALittle';
//                 let animationDelay = 0;
//                 for(let x = 0; x <= shredAmount; ++x) {
//                     animationDelay += 1;
//                     if(x % 2 === 0) {
//                         animationName = 'spinALittleAlt';
//                     } else {
//                         animationName = 'spinALittle';
//                     }
//                     if(x % 3 === 0) {
//                         animationDelay = 0;
//                     }
//                     let newEl = document.createElement('div');
//                     newEl.classList.add('item-wrap');
//                     newEl.innerHTML = `<div class="item">${getParent.innerHTML}</div>`;
//                     newEl.querySelector('.animation-assets').innerHTML = '';
//                     let clip = `clip-path: inset(0px ${(shredAmount - x - 1) * width}px 0 ${(x * width)}px); animation-delay: 0.${animationDelay}s; transform-origin: ${x*width}px 125px; animation-name: ${animationName};`
//                     newEl.children[0].setAttribute('style', clip);
//                     getParent.querySelector('.animation-assets').append(newEl);
//                 }
//             } else {
//             getParent.classList.add(newClass);
//             }
//         });
//     });
// }

export async function getNonce() {
    try {
        const options = {
            headers: {
              accept: 'application/json',
            },
            method: `get`,
        }

        const req = await fetch(nonceURL, options)

        if(!req.ok) throw new Error('erro ao requisitar nonce')

        const res = await req.json()

        return res.nonce
    } catch (error) {
        console.info(`erro ao requisitar nonce`, error)
        throw new Error('erro ao requisitar nonce')
    }
}

export async function Products(): Promise<CartProps> {
    try {
        const req = await fetch(baseUrl)

        if (!req.ok) throw new Error('Erro ao buscar os dados')

        const resp = await req.json()

        return resp
    } catch (error) {
        console.log(error)
        throw new Error('Erro ao buscar os dados')
    }
}

export async function handleQtd(key: any, nonce: any | null, quantity: any): Promise<CartProps> {
    try {
        const options = {
            headers: {
              accept: 'application/json',
              contentType: 'application/x-www-form-urlencoded',
              'X-WP-Nonce': nonce,
              'X-WC-Store-API-Nonce': nonce,
              _wpnonce: nonce
            },
            method: `post`,
            body: new URLSearchParams({key, quantity})
        }

        const req = await fetch(`${baseUrl}update-item`, options)

        if(!req.ok) throw new Error(`erro ao atualizar produto`)

        const res = await req.json()

        //const { items } = res

        //const item: any = items.filter((i: any) => i.key == key)[0]

        return res

    } catch (error) {
        console.log(`erro ao atualizar produto`, error)
        throw new Error(`erro ao atualizar produto`)
    }
}

export function formatPrice(value: any) {
    return (value / 100).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })
  }
