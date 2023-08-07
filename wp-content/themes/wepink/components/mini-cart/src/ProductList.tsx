
import { useEffect, useState } from "react";
import { listProducts } from "./modules/products";
import { ProductProps } from './components/types'
import { ProductInterface } from "./Product";

interface ProductClickProp {
    id: number
    quantity: number
}
// interface CartProps {
//     items: ProductProps[] | null
// }

interface clickProductProps {
    onDataProduct: (e: ProductClickProp) => void
}

export function ProductList( { onDataProduct }: clickProductProps ) {
    const [list, setList] = useState<ProductProps[]>([])

    const handleClickButton = (e: number) => {
        const id = e
        const quantity = 1
        onDataProduct({id, quantity})
    }

    async function fetchData() {
        try {
            const resp = await listProducts()
            setList(resp) 
        } catch (error) {
            console.error('Erro ao buscar itens:', error);
        }
    }

    useEffect(() => {
        fetchData()
    }, [])

    if(!list.length) return (
        <div className="products-wrapper">
            <ul>
                <li>Carregando</li>
            </ul>
        </div>
    )

    return (
        <div className="products-wrapper">
            <ul>
                {list && list.map((p: ProductProps) => <ProductInterface id={parseInt(p.id)}  item={p} onClickData={handleClickButton} />)}
            </ul>
        </div>
    )
} 