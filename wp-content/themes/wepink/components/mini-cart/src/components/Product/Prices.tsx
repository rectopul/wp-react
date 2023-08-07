import { PricesTypes } from '../types'
import { Price } from './Price'
import { RegularPrice } from './RegularPrice'


export function Prices({ prices }: PricesTypes) {
    if(prices?.regular_price) {
        return (
            <div className="pricesContainer">
                <RegularPrice prices={prices} />
                <Price prices={prices} />
            </div>
        )
    }else{
        return (
            <div className="pricesContainer">
                <Price prices={prices} />
            </div>
        )
    }

}