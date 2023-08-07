import { PricesTypes } from '../types'
import { formatPrice } from '../../modules/products'
import './style.styl'

export function Price({prices}: PricesTypes) {
    const thePrice = formatPrice(prices?.price)
    return (
        <span className="price">{thePrice}</span>
    )
}