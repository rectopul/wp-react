import Header from "../Header/Header";
import '../../App.css'
import './index.css'
import Body from "../Body/Body";
import { Totals } from "../Totals/Totals";
import { useState, useEffect } from "react";
import { Products, cartAddItem, getNonce } from "../../modules/products";
import {  RootReducer } from "../types";
import { useDispatch, useSelector } from "react-redux";


interface ProductClickProp {
    id: number | null
    quantity: number | null
}

interface StateProps {
    onChangeState: (data: string) => void
    productAdd: ProductClickProp | any
    onAddProduct?: (data: void) => ProductClickProp
}


export default function Wrapper({ onChangeState, productAdd }: StateProps) {
    const [nonce, setNonce] = useState<any>(null)
    const { currentCart } = useSelector((rootReducer: RootReducer) => rootReducer.CartReducer)
    const dispatch = useDispatch()

    async function fetchData() {
        try {
            const nonce = document.body.dataset.nonce || await getNonce()
            const resp = await Products()
            setNonce(nonce)
            dispatch({ type: "get/cart", payload: resp })
            
        } catch (error) {
            console.error('Erro ao buscar itens:', error);
        }
    }

    const cartCount = document.querySelector(`.card-stor span`)

    if(cartCount) {
        cartCount.innerHTML = currentCart.items_count.toString()
    }
    

    useEffect(() => {
        
        if(!productAdd) fetchData()
        else productAdd && handleAddProduct(productAdd)

    }, [productAdd])

    const handleAddProduct = async (e: ProductClickProp) => {
        try {
            const { id, quantity } = e

            if(id && quantity) {
                const cartConfig = await cartAddItem(id, quantity, nonce)
                dispatch({ type: "get/cart", payload: cartConfig })
            }
            onChangeState('open')
        } catch (error) {
            console.log(`erro ao adicionar produto`)
        }
        
    }

    const handleStateCart = (data:string) => onChangeState(data)

    if(currentCart.items && !currentCart?.items.length) {
        return (
            <div className="d-flex cart-wrapper">
                <Header onCloseClick={handleStateCart} />
                <div className="cart-items">
                    <div className="cartLoadData">Seu carrinho está vazio</div>
                </div>
                <Totals handleClose={handleStateCart} totals={currentCart.totals} />
            </div>
        )
    }

    return (
        <div className="d-flex cart-wrapper">
            <Header onCloseClick={handleStateCart} />
            <Body />
            <Totals handleClose={handleStateCart} totals={currentCart.totals} />
        </div>
    )
}