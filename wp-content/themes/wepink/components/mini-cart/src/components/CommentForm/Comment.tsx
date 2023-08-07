import { CommentsProps } from "../types";
import Rating from '@mui/material/Rating'

interface PropsComment {
    props: CommentsProps
}
export function Comment({ props }: PropsComment) {
    const numberAvatar = Math.floor(Math.random() * (70 - 1 + 1) + 1)
    const date = new Date(props.date_created)
    const day = date.toLocaleString('default', { day: "2-digit" })
    const month = date.toLocaleString('default', { month: "short" })

    return (
        <div className="comment">
            <header>
                <figure>
                    <img src={`https://i.pravatar.cc/150?img=${numberAvatar}`} alt="avatar_comment" />
                </figure>
                <div>
                    <span className="name">{props.name}</span>
                    <span className="date">{`${day} ${month}`}</span>
                    <span className="rating">
                        <Rating
                            name="simple-controlled"
                            value={props.rating}
                            readOnly
                        />
                    </span>
                </div>
            </header>
            <div className="review">{props.review}</div>
        </div>
    )
}