import { productImages, image } from "../types";

export function ProductImage({ images }: productImages) {
    const firstImage: image = images[0] || null

    return (
        <img src={firstImage.src} alt={firstImage.alt} className="productImage" />
    )
}