interface Values {
    name: string
}

interface TabContentProps {
    props: {
        name: string
        value: Values[]
        slug: string
    }
    active: number
}

export function TabContent({ props, active }: TabContentProps) {
    console.log(`active tab`, active)
    return (
        <div 
            className={`tab-pane fade ${active == 0 ? `active`: ``}`}
            id={props.slug}
            role="tabpanel"
            aria-labelledby={props.slug}
            tabIndex={0}
        >
            {props.value.map(vl => <div className="values_attributes">{vl.name}</div>)}
        </div>
    )
}