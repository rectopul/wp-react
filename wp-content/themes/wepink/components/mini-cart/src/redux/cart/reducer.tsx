import { Reducer } from "react"
import { CartProps, CommentsProps } from "../../components/types"


interface CartState {
    currentCart: CartProps
}

interface CommentState {
    comments: CommentsProps[]
}

const initialState: CartState = {
    currentCart: {items_count: 0, totals: { total_price: "0", }, items: []}
}

interface GetCartAction {
    type: 'get/cart'
    payload: CartProps
}

const CartReducer: Reducer<CartState, GetCartAction> = (state = initialState, action) => {
    switch (action.type) {
        case 'get/cart':
          return {
            ...state,
            currentCart: action.payload,
        };
        default:
          return state;
    }
}

interface GetCommentAction {
    type: 'get/comments'
    payload: CommentsProps[]
}

const initialCommentState: CommentState = { comments: [] }

const CommentReducer: Reducer<CommentState, GetCommentAction> = (state = initialCommentState, action) => {
    switch (action.type) {
        case 'get/comments':
            return {
                ...state,
                comments: action.payload
            }
        default:
          return state;
    }
}

export { CartReducer, CommentReducer }