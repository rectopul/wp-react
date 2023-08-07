import { useState } from 'react'
import './style.styl'
import { Plus, Minus } from 'lucide-react'
import { cartAddItem } from '../../modules/products'
import { useDispatch } from 'react-redux'

export function BuyField() {
    const [quantity, setQuantity] = useState(1)
    const dispatch = useDispatch()

    //console.log(variables)

    const productId = document.querySelector(`.type-product`)?.id.replace('product-', '')
    const nonce = document.body.dataset.nonce

    const handlePlus = () => setQuantity(prevState => prevState + 1)
    const handleMinus = () => {
        console.log(productId)
        if(quantity > 1) setQuantity(prevState => prevState - 1)
    }
 
    const handleAdd = async () => {
        try {
            const product = await cartAddItem(productId, quantity, nonce)
            dispatch({ type: "get/cart", payload: product })
            console.log(product)
        } catch (error) {
            console.log(`erro ao adicionar produto`, error)
        }
    }

    return (
        <div className="buyfield">
            <div className="inputWrapper">
                <button className="plus" onClick={handlePlus}><Plus strokeWidth={3} size={16} color='#ffffff' /></button>
                <input type="text" value={quantity} />
                <button className="minus" onClick={handleMinus}><Minus strokeWidth={3} size={16} color='#ffffff' /></button>
            </div>
            <div className="buyButton">
                <button onClick={handleAdd}>Comprar</button>
            </div>
        </div>
    )
}