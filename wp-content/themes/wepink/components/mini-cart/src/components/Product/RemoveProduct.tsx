import { X } from 'lucide-react'
import { removeProductToCart } from '../../modules/products';
import { useDispatch } from 'react-redux';

interface PropsRemoveProduct {
    props: {
        key: string
    }
}

export function RemoveProduct({ props }: PropsRemoveProduct) {
    const dispatch = useDispatch()
    const handleRemove = async () => {
        try {
            const requestRemove = await removeProductToCart(props.key, document.body.dataset.nonce)
            dispatch({ type: "get/cart", payload: requestRemove })
        } catch (error) {
            console.log(`erro ao remover produto`, error)
        }
        
    }

    return (
        <button onClick={handleRemove}><X color='#000' size={10} strokeWidth={3} /></button>
    )
}