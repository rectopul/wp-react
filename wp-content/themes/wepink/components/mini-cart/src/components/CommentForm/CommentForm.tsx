import './style.styl'
import { Send } from './Send'
import { useState } from 'react'
import { CommentPost } from '../../modules/products'
import Rating from '@mui/material/Rating'
import { VariablesProps, RootReducer } from '../types'
import { TextareaAutosize } from '@mui/material'
import { useDispatch, useSelector } from 'react-redux'
import CircularProgress from '@mui/material/CircularProgress';




export function CommentForm() {
    const [value, setValue] = useState("");
    const [progress, setProgress] = useState<boolean>(false);
    const [rating, setRating] = useState<number | null>(1)
    const [error, setError] = useState<string | any>("")
    const { comments } = useSelector((rootReducer: RootReducer) => rootReducer.CommentReducer)
    const dispatch = useDispatch()

    

    const handleComment = async () => {
        try {
            if(!value) return setError("error")
            setProgress(true)

            const data = {
                review: value,
                post: variables.comments.post_id,
                email: variables.user_email,
                name: variables.user_name,
                rating,
                id: variables.id
            }

            const comment = await CommentPost({ data })
            const payload = [...comments, comment]
            console.log(`comment prop`)
            dispatch({ type: "get/comments", payload })
            setValue("")
            setProgress(false)
        } catch (error) {
            console.log(error)
        }
    }

    // @ts-ignore
    const variables: VariablesProps = window.wpSingleProduct

    return (
        <div className="single_comment_form">
            <figure>
                <img src="https://i.pravatar.cc/150?img=8" alt="avatar" />
            </figure>
            <div className="comment">
                <TextareaAutosize
                    name='comment'
                    id='comment'
                    minRows={1}
                    placeholder='Insira seu comentário'
                    value={value}
                    onInput={(event) => setValue(event.currentTarget.value)}
                    className={error}
                />

                <div className="rating">
                    <Rating
                        name="simple-controlled"
                        value={rating}
                        // @ts-ignore
                        onChange={(event, newValue) => setRating(newValue)}
                    />
                </div>
                <button onClick={handleComment}>
                    {progress ? <CircularProgress size={17} color='inherit' /> : <Send color='#ffffff' size={17} />}
                </button>
            </div>
        </div>
    )
}