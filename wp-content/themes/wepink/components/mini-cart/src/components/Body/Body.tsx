import { useSelector } from 'react-redux'
import Product from '../Product/Product'
import { ProductProps, RootReducer } from '../types'


export default function Body() {
    const { currentCart } = useSelector((rootReducer: RootReducer) => rootReducer.CartReducer )

    if(!currentCart) return

    const { items } = currentCart

    return (
        <div className="cart-items">
            {items && items.map((p: ProductProps) => <Product data={p} />)}
        </div>
    )
}