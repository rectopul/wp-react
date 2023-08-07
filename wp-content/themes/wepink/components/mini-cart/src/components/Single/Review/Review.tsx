import { Rating } from '@mui/material'
import { VariablesProps } from '../../types'
import './style.styl'
import { Attributes } from '../Attributes/Attributes'

export function ReviewRating() {
    // @ts-ignore
    const product_info: VariablesProps = window.wpSingleProduct

    return (
        <>
            <div className="short-description">{product_info.short_description}</div>
            <div className="rating-container">
                {`${product_info.average_rating} de 5 `}
                <Rating value={parseInt(product_info.average_rating)} size='medium' readOnly />
                {` ( ${product_info.review_count} )`}
            </div>
            <Attributes />
        </>
    )
}