
import { ShoppingCart } from 'lucide-react'
import { Close } from "./Close"
import './index.css'

interface CloseProps {
    onCloseClick: (data: string) => void;
}

export default function Header( {onCloseClick}: CloseProps ) {

    const handleCloseClick = (data: string) => {
        console.log(`click`)
        onCloseClick(data)
    } 

    return (
        <div className="card-header py-3">
            <h3 className="mb-0">
                <ShoppingCart size={20} strokeWidth={2} />
                Seu carrinho
                <Close onCloseClick={handleCloseClick} />
            </h3>
        </div>
    )
}