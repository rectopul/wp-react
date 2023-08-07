import { X } from 'lucide-react';

interface CloseProps {
    onCloseClick: (data: string) => void;
}

export function Close({ onCloseClick }: CloseProps) {

    const handleCloseClick = () => onCloseClick(`close`)

    return (
        <button onClick={handleCloseClick}><X size={30} color='#000000' /></button>
    )
}