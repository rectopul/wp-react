import { VariablesProps } from "../../types"
import { Box } from '@mui/material'
import { TabContent } from "./TabContent"

interface Values {
    name: string
}
interface TabProps {
    name: string
    slug: string
    value: Values[]
}

export function Attributes() {
    // @ts-ignore
    const product_info: VariablesProps = window.wpSingleProduct,
    attributesToArray = Object.keys(product_info.attributes)

    let list: TabProps[] = [{ name: `Descrição`, slug: `descricao`, value: [{name: product_info.description}] }]

    for (let i = 0; i < attributesToArray.length; i++) {
        const element = attributesToArray[i];

        // @ts-ignore
        console.log(`attr`, element)
        const object = {
            slug: element,
            // @ts-ignore
            name: element,
            // @ts-ignore
            value: product_info.attributes[element]
        }

        list = [...list, object]
    }

    console.log(`lista de tabs`, list)

    // @ts-ignore
    return (
        <div className="attributes">
            
            <Box>
                <ul className="nav nav-tabs" id="attributes_tabs" role="tablist">
                    {list.map((tb: TabProps, key: number) => <li className="nav-item" role="presentation">
                        <button 
                            className={`nav-link ${key == 0 ? `active`: ``}`}
                            id="home-tab" 
                            data-bs-toggle="tab"
                            data-bs-target={`#${tb.slug}`}
                            role="tab"
                            aria-controls={tb.slug}
                            aria-selected={key == 0 ? true: false}
                            type="button"
                        >{tb.name}</button>
                    </li>)}
                </ul>
            </Box>
            <>
                <div className="tab-content" id="myTabContent">
                    <div className="tab-content">
                        {list.map((tb: TabProps, key: number) => <TabContent props={{slug: tb.slug,name: tb.name, value: tb.value}} active={key} /> )} 
                    </div>
                </div>
            </>
        </div>
    )
}