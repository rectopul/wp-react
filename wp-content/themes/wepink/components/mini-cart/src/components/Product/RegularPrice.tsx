import { PricesTypes } from "../types"
import { formatPrice } from "../../modules/products"

export function RegularPrice({ prices }: PricesTypes) {
    const price = formatPrice(prices.regular_price)
    return (
        <span className="regular_for_sale_price">{price}</span>
    )
}