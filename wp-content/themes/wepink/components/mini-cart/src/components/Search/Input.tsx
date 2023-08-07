import React from "react"

interface onValueChange {
    onValueChange: (data: string) => void
}

export function InputSearch({ onValueChange }: onValueChange) {
    function handlerSearch(e: React.KeyboardEvent<HTMLInputElement>) {
        const value = e.currentTarget.value
        onValueChange(value)
    }

    return (
        <input type="text" name="s" onKeyUp={handlerSearch} placeholder="digite aqui o que procura"></input>
    )
}