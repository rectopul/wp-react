import { useState } from "react";
import { InputSearch } from "./Input";
import { Result } from "./Results";
import './style.css'

// interface PropsSeach {
//     setValue: (data: string) => void
// }

export function Search() {
    const [search, setSearch] = useState('')

    const sendValue = (data: string) => setSearch(data)
    return (
        <form className="form-box f-right searchForm-react">
            <div className="search-icon"><i className="ti-search"></i></div>
            <InputSearch onValueChange={sendValue} />
            <Result value={search} />
        </form>
    )
}