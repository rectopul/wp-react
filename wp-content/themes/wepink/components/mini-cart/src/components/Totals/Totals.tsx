import React from "react";
import { formatPrice } from "../../modules/products";
import { RootReducer, TotalsProps } from "../types";
import { useSelector } from "react-redux";

export function Totals({ handleClose }: TotalsProps) {
    const { currentCart } = useSelector((rootReducer: RootReducer) => rootReducer.CartReducer)

    if(!currentCart) return

    const { totals } = currentCart

    const sendCommandClose = ( e: React.MouseEvent<HTMLAnchorElement> ) => {
        e.preventDefault()
        handleClose(`close`)
    }

    return (
        <div className="resumeCart">
            <article><strong>Total</strong> <span>{formatPrice(totals.total_price)}</span></article>
            <footer>
                <a href="" onClick={sendCommandClose}>continuar <br /> comprando</a>
                <a className="btn-cart" href="/carrinho" rel="noopener noreferrer">finalizar compra</a>
            </footer>
        </div>
    )
}