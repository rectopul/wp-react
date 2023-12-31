interface SendProps {
    color: string
    size?: number
}

export function Send({color, size}: SendProps) {
    return (
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width={size} height={size} x="0" y="0" viewBox="0 0 32 32" className=""><g><path d="M2.001 21.223a.898.898 0 0 1-.636-1.536l2.862-2.862a.898.898 0 0 1 1.272 0 .898.898 0 0 1 0 1.272l-2.862 2.862a.893.893 0 0 1-.636.264zM4.318 28.583a.898.898 0 0 1-.636-1.536l5.384-5.384a.898.898 0 0 1 1.272 0 .898.898 0 0 1 0 1.272L4.954 28.32a.896.896 0 0 1-.636.263zM11.678 30.9a.898.898 0 0 1-.636-1.536l2.862-2.862a.898.898 0 0 1 1.272 0 .898.898 0 0 1 0 1.272l-2.862 2.862a.893.893 0 0 1-.636.264zM27.473 2.084 3.969 9.094c-1.775.529-1.899 2.995-.187 3.7l10.092 4.159a.88.88 0 0 1 .195-.293l5.161-5.161a.898.898 0 0 1 1.272 0 .898.898 0 0 1 0 1.272l-5.161 5.161a.896.896 0 0 1-.294.196l4.161 10.097c.704 1.709 3.166 1.585 3.694-.187l7.012-23.513c.446-1.494-.946-2.886-2.441-2.441z" fill={color} data-original="#000000" opacity="1" className=""></path></g></svg>
    )
}