import { ProductProps } from "./components/types";
import { formatPrice } from "./modules/products";

interface ProductInterfaceProp {
    onClickData: (e: number) => void;
    item: ProductProps,
    id: number
}


export function ProductInterface( { item, onClickData, id }: ProductInterfaceProp ) {
    const handleClickData = () => onClickData(id)

    if(item) 
        return (
            <li className="product">
                <h2>{item.name}</h2>
                <strong>{ formatPrice(item.prices.price) }</strong>
                <footer>
                    <button value={item.id} onClick={handleClickData}>Adicionar ao carrinho</button>
                </footer>
            </li>
        )
}