//import { useState, useEffect } from 'react'
import { Plus, Minus } from 'lucide-react'
import { handleQtd } from '../../modules/products';
import { PropsType } from '../types';
import { useDispatch } from 'react-redux';

export function Quantity({ props }: PropsType) {
    //const [quantity, setQuantity] = useState(props.quantity)
    const dispatch = useDispatch()
    const nonce  = document.body.dataset.nonce

    async function fetchData(qtd: any) {
        try {
            const resp = await handleQtd(props.key, nonce, qtd)
            dispatch({ type: "get/cart", payload: resp })

        } catch (error) {
            console.error('Erro ao buscar itens:', error);
        }
    }

    async function handleQuantity(e: any) {
        if(e.currentTarget.classList.contains('minus')) {
            await fetchData(props.quantity - 1)
        }else{
            await fetchData(props.quantity + 1)
        }
    }

    return (
        <div className="formQuantity">
            <button className="qtd plus" onClick={handleQuantity}><Plus color='#FFFFFF' /></button>
            <input type="text" value={props.quantity} />
            <button className="qtd minus" onClick={handleQuantity}><Minus color='#FFFFFF' /></button>
        </div>
    )
}