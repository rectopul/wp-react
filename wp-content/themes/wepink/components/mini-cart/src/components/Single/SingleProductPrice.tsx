import './style.styl'

interface VariablesProps {
    name: string
    price: string
    regular_price: string
    review_count: string
    sale_price: string | null
    link: string
}

export function SingleProductPrice() {
    // @ts-ignore
    const variables: VariablesProps = window.wpSingleProduct

    if(variables.sale_price) {
        return (
            <div className="the_price">
                <div className="regular_price">{`R$ ${variables.regular_price}`}</div>
                <div className="sale_price">
                    {`R$ ${variables.sale_price}`}
                    <div className="parcel">{`ou 10x R$ ${(parseInt(variables.sale_price) / 10).toFixed(2)}`}</div>
                </div>
            </div>
        )
    }else{
        return (
            <div className="the_price">
                <div className="price">{`R$ ${variables.sale_price}`}</div>
            </div>
        )
    }
}