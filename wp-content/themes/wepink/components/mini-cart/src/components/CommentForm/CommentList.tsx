import { useDispatch, useSelector } from "react-redux"
import { RootReducer, VariablesProps } from "../types"
import { Comment } from './Comment'
import { GetCommentPost } from "../../modules/products"
import { useEffect } from "react"

export function CommentList() {
    const { comments } = useSelector((rootReducer: RootReducer) => rootReducer.CommentReducer)
    const dispatch = useDispatch()

    const fetchData = async () => {
        try {
            // @ts-ignore
            const variables: VariablesProps = window.wpSingleProduct

            const comments = await GetCommentPost(variables.id)

            dispatch({ type: "get/comments", payload: comments })
        } catch (error) {
            console.log(`erro ao recuperar comentários`, error)
        }
    }

    useEffect(() => {
        fetchData()
    }, [])
    
    if(comments.length) {
        return (
            <div className="comments_list">
                {comments.map(cm => <Comment props={cm} />)}
            </div>   
        )
    }
}