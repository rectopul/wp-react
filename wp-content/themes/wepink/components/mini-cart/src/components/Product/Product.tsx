import { ProductProps } from '../types';
import { ProductImage } from './Image';
import './style.css'
import { Quantity } from './Quantity';
import { RemoveProduct } from './RemoveProduct';
import { Prices } from './Prices';

interface ProductObject {
    data: ProductProps;
}

export default function Product({ data }: ProductObject) {

    function decodeHtmlCharCodes(str: any) { 
        return str.replace(/(&#(\d+);)/g, function(_match?: any, _capture?: any, charCode?: any) {
          return String.fromCharCode(charCode);
        });
    }

    return (
        <div className="cart-item" data-key={data.key} data-id={data.id}>
            <article>
                <figure>
                    <ProductImage images={data.images} />
                </figure>
                <div className="productSummary">
                    <div className="productInfo">
                        <h3>{decodeHtmlCharCodes(data.name)}</h3>
                        <RemoveProduct props={data} />
                    </div>
                    <footer>
                        <Quantity props={data} />
                        <Prices prices={data.prices} />
                    </footer>
                </div>
            </article>
        </div>
    )
}