import { decodeHtmlCharCodes, formatPrice } from "../../modules/products"

interface Images {
    id: number
    thumbnail: string
    alt: string | any
}

interface Categories {
    name: string
    slug: string
    link: string
}

export interface ProductSearch {
    name: string
    images: Images[]
    categories: Categories[]
    price: string
    id: number
    short_description: string
    permalink: string
    prices: {
        price: string
    }
}

interface Props {
    props: ProductSearch
}

export function ProductSearch({ props }: Props) {
    return (
        <div className="product-search">
            <a href={props.permalink}>
                <figure>
                    <img src={props.images[0].thumbnail} alt={props.images[0].alt} />
                </figure>
                <article>
                    <h3><a href={props.permalink}>{decodeHtmlCharCodes(props.name)}</a></h3>
                    <div className="categories-product">
                        {props.categories.map(c => { return (
                            <span className="category"><a href={c.link}>{c.name}</a></span>
                        )})}
                        <div className="product-search-price">{formatPrice(props.prices.price)}</div>
                    </div>
                </article>
            </a>
        </div>
    )
}