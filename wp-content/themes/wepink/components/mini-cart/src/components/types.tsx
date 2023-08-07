// export type DataProps = {
//     data: ProductProps;
// }

export interface image {
    src: string;
    alt: string;
}

interface images {
    [index: number]: image;
}

export interface TotalsType {
    total_price: string | null
}

export interface RootReducer {
    CartReducer: {
        currentCart: CartProps
    }
    CommentReducer: {
        comments: CommentsProps[]
    }
}

export interface TotalsProps {
    totals: TotalsType | any
    handleClose: (data: any) => string | any
}

export interface productImages {
    images: images;
}

interface ArrAttributes {
    count: number
    description: string
    name: string
    parent: number
    slug: string
    taxonomy: string
    term_group: number
    term_id: number
    term_taxonomy_id: number
}
interface Attributes{
    notas?: ArrAttributes[]
}

export interface VariablesProps {
    id: string
    name: string
    price: string
    average_rating: string
    regular_price: string
    review_count: string
    rating_count: []
    sale_price: string | null
    link: string
    user_email: string
    user_name: string
    short_description: string
    description: string
    attributes: Attributes
    comments: {
        comment_ID: string
        post_id: string
    }
}

export interface CartProps {
    totals: TotalsType,
    items: ProductProps[],
    items_count: number
}

export interface ProductProps {
    name: string;
    key: string;
    id: string | any;
    quantity: number;
    images: productImages | any;
    prices: PricesFields
    totals?: {
        line_total: string | null;
    }
}

interface PricesFields {
    regular_price: string | null
    price: string
    sale_price: string | null
}

export interface PricesTypes {
    prices: PricesFields
}

export interface PricesProps {
    props: PricesTypes;
}

export interface PropsType {
    props: ProductProps
}

interface SelfLink {
    href: string;
}

export interface CommentsProps {
    id: number
    date_created: string
    review: string
    rating: number
    name: string
    email: string
    verified: boolean
    _links: {
        self: SelfLink[]
        collection: SelfLink[]
        up: SelfLink[]
    }
}

// name: string;
//     price: number;
//     key: string;
//     id: string;
//     quantity: number;
//     totals: {
//         line_total: string;
//     }