import { useEffect, useState } from "react"
import { searchProduct } from "../../modules/products"
import { ProductSearch } from "./ProductSearch"
import { Loader } from "../Loader/Loader"
import { Search } from 'lucide-react'

interface ResultProps {
    value: string
}


export function Result({ value }: ResultProps){
    const [products, setProducts] = useState<ProductSearch[]>([])
    const [display, setDisplay] = useState<boolean>(false)
    const fetchData = async () => {
        try {
            if(value.length >= 3 && value.length % 3 === 0) {
                const searchProd = await searchProduct(value)
                setProducts(searchProd)
            }else{
                setProducts([])
                setDisplay(false)
            }

            value.length >= 1 ? setDisplay(!!true) : setDisplay(!!false)
            
        } catch (error) {
            console.log(`erro ao buscar produto`, error)
        }
    }

    useEffect(() => {
        fetchData()
    }, [value])


    if(!products.length) {
        return (
            <div className={`result-search ${display ? 'show' : ''}`}>
                <div className="wrapper">
                    <Loader color="#ff0080" size={40} stroke={5} />
                </div>
                <div className="search-text">Resultado da busca <Search color="#000" strokeWidth={1} size={20} /></div>
            </div>
        )
    }
    return (
        <div className={`result-search ${display ? 'show' : ''}`}>
            <div className="wrapper">
                {products.map(p => <ProductSearch props={p} />)}
            </div>
            <div className="search-text">Resultado da busca <Search color="#000" strokeWidth={1} size={20} /></div>
        </div>
    )
}