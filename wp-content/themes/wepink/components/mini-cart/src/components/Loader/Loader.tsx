interface LoaderProps {
    size: number
    stroke: number,
    color: string
}

export function Loader({size, stroke, color}: LoaderProps) {
    return (
        <div className="loading" style={
            {
                width: `${size}px`,
                height: `${size}px`,
                flex: `0 0 ${size}px`,
                borderWidth: stroke,
                borderTopColor: color,
                borderLeftColor: color,
                borderBottomColor: color,
                margin: `0 auto`
            }
        }></div>
    )
}